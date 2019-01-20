<?php


namespace ApplicationItemManager;


use ApplicationItemManager\Exception\ApplicationItemManagerException;
use ApplicationItemManager\Helper\KamilleApplicationItemManagerHelper;
use ApplicationItemManager\Importer\Exception\ImporterException;
use ApplicationItemManager\Importer\GithubImporter;
use ApplicationItemManager\Importer\ImporterInterface;
use ApplicationItemManager\Installer\InstallerInterface;
use ApplicationItemManager\Repository\RepositoryInterface;
use Bat\FileSystemTool;
use Kamille\Module\DependencyAwareModuleInterface;


class ApplicationItemManager implements ApplicationItemManagerInterface
{


    /**
     * @var ImporterInterface[]
     *
     */
    protected $importers;


    /**
     * @var InstallerInterface
     */
    protected $installer;

    /**
     * @var RepositoryInterface[]
     */
    protected $repositories;
    protected $importDirectory;

    private $favoriteRepositoryId;
    private $debugMode;

    /**
     * @var array repositories, no aliases
     */
    private $_repositories;


    public function __construct()
    {
        $this->repositories = [];
        $this->importers = [];
        $this->debugMode = false;
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @return ApplicationItemManager
     */
    public function bindImporter($repositoryId, ImporterInterface $importer)
    {
        $this->importers[$repositoryId] = $importer;
        return $this;
    }

    /**
     * @return ApplicationItemManager
     */
    public function setInstaller(InstallerInterface $installer)
    {
        $this->installer = $installer;
        return $this;
    }

    /**
     * @return ApplicationItemManager
     */
    public function addRepository(RepositoryInterface $repository, array $aliases = [])
    {

        $name = $repository->getName();

        $this->repositories[$name] = $repository;

        if (!in_array($name, $this->repositories, true)) {
            $this->_repositories[] = $name;
        }

        // let's flatten all aliases right now, because why not?
        foreach ($aliases as $alias) {
            $this->repositories[$alias] = $repository;
        }
        return $this;
    }

    public function setImportDirectory($importDirectory)
    {
        $this->importDirectory = $importDirectory;
        return $this;
    }

    public function setFavoriteRepositoryId($favoriteRepositoryId)
    {
        $this->favoriteRepositoryId = $favoriteRepositoryId;
        return $this;
    }

    public function setDebugMode($debugMode)
    {
        $this->debugMode = $debugMode;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function listAvailable($repoId = null, array $keys = null)
    {
        $repoIds = $this->collectRepoIds($repoId);


        $ret = [];
        if (null === $keys) {
            // returning flat items
            foreach ($repoIds as $repoId) {
                $repo = $this->repositories[$repoId];
                $all = $repo->all($keys);
                $ret = array_merge($ret, $all);
            }
        } else {
            // returning combined items
            foreach ($repoIds as $repoId) {
                $repo = $this->repositories[$repoId];
                $all = $repo->all($keys);
                $repoName = $repo->getName();
                foreach ($all as $itemName => $metas) {
                    $ret[$repoName . "." . $itemName] = $metas;
                }
            }
        }
        return $ret;
    }


    public function listImported()
    {
        $d = $this->importDirectory;
        $files = scandir($d);
        $ret = [];
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                if (is_dir($d . "/" . $f)) {
                    $ret[] = $f;
                }
            }
        }
        return $ret;
    }


    public function listInstalled()
    {
        if (null === $this->installer) {
            throw new ApplicationItemManagerException("Not applicable: no installer set");
        }
        return $this->installer->getList();
    }

    public function search($text, array $keys = null, $repoId = null)
    {
        $repoIds = $this->collectRepoIds($repoId);

        $ret = [];
        if (null === $keys) {
            // returning flat items
            foreach ($repoIds as $repoId) {
                $repo = $this->repositories[$repoId];
                $all = $repo->search($text, $keys);
                $ret = array_merge($ret, $all);
            }
        } else {
            // returning combined items
            foreach ($repoIds as $repoId) {
                $repo = $this->repositories[$repoId];
                $all = $repo->search($text, $keys);
                $repoName = $repo->getName();
                foreach ($all as $itemName => $metas) {
                    $ret[$repoName . "." . $itemName] = $metas;
                }
            }
        }
        return $ret;
    }


    public function import($item, $force = false)
    {
        if (false !== ($repoId = $this->getRepoId($item))) {
            $this->msg("importingItem", $item);
            return $this->handleProcedure("import", $item, $repoId, $force);
        }
        return false;
    }

    public function importAll($repoId = null, $force = false)
    {

        $all = $this->getAllDeps($repoId);
        $allOk = true;
        foreach ($all as $item) {
            $itemName = $this->getItemNameByItem($item);
            $repoId = $this->getRepoIdByItemId($item);
            if (false === $this->doImport($itemName, $repoId, $force)) {
                $allOk = false;
            }
        }
        return $allOk;
    }

    public function reimportExisting($repoId = null)
    {

        $items = $this->listImported();
        foreach ($items as $item) {
            $this->import($item, true);
        }
    }


    public function installAll($repoId = null, $force = false)
    {
        $all = $this->getAllDeps($repoId);
        $allOk = true;
        foreach ($all as $item) {
            $itemName = $this->getItemNameByItem($item);
            $repoId = $this->getRepoIdByItemId($item);
            if (false === $this->doInstall($itemName, $repoId, $force)) {
                $allOk = false;
            }
        }
        return $allOk;
    }


    public function install($item, $force = false)
    {
        if (false !== ($repoId = $this->getRepoId($item))) {
            $this->msg("installingItem", $item);
            return $this->handleProcedure("install", $item, $repoId, $force);
        }
        return false;

    }


    public function uninstall($item)
    {
        if (false !== ($repoId = $this->getRepoId($item))) {
            $this->msg("uninstallingItem", $item);
            return $this->handleProcedure("uninstall", $item, $repoId, false);
        }
        return false;
    }

    private function doUninstall($itemName)
    {
        try {
            // is already installed?
            if (false === $this->isInstalled($itemName)) {
                $this->msg("itemAlreadyUninstalled", $itemName);
                return true;
            }


            if (true === $this->installer->uninstall($itemName)) {
                $this->msg("itemUninstalled", $itemName);
            } else {
                $this->msg("itemNotUninstalled", $itemName);
            }
        } catch (\Exception $e) {
            $this->msg("uninstallProblem", $itemName, $e);
            return false;
        }
    }

    public function updateAll($repoId = null)
    {

        $all = $this->getAllDeps($repoId);
        $allOk = true;
        foreach ($all as $item) {
            $itemName = $this->getItemNameByItem($item);
            $repoId = $this->getRepoIdByItemId($item);
            $importer = $this->findImporter($repoId);
            if ($importer instanceof GithubImporter) {
                $importer->update($itemName, $this->importDirectory);

            }
        }
        return $allOk;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function doInstall($itemName, $repoId = null, $force = false)
    {
        if (false === $force) {
            // is already installed?
            if (true === $this->isInstalled($itemName)) {
                $this->msg("itemAlreadyInstalled", $itemName);
                return true;
            }
        }

        if (false === $this->isImported($itemName)) {
            $this->msg("itemNotInstalledNotImported", $itemName);
            $force = false; // we don't need to force imports
            $this->doImport($itemName, $repoId, $force);
        }

        try {
            if (true === $this->installer->install($itemName)) {
                $this->msg("itemInstalled", $itemName);
                /**
                 * We return true as to signal to also process dependencies.
                 * If false were returned, the handleProcedure would not process the module dependencies.
                 */
                return true;
            } else {
                $this->msg("itemNotInstalled", $itemName);
            }
        } catch (\Exception $e) {
            $this->msg("installProblem", $itemName, $e);
        }
        return false;
    }


    protected function doImport($itemName, $repoId = null, $force = false)
    {
        if (false === $force) {
            // is already imported?
            if (true === $this->isImported($itemName)) {
                $this->msg("itemAlreadyImported", $itemName);
                return true;
            }
        }

        $this->msg("findingImporter");
        if (false !== ($importer = $this->findImporter($repoId))) {
            $this->msg("importerFound", $importer, $repoId);

            try {
                if (true === $importer->import($itemName, $this->importDirectory, $force)) {
                    $this->msg("itemImported", $itemName, $repoId);
                    return true;
                }
            } catch (ImporterException $e) {
                $this->msg("importerProblem", $itemName, $e);
            }
        } else {
            $this->msg("importerNotFound", $repoId, $itemName);
        }
        return false;
    }

    /**
     * @return ImporterInterface|false
     */
    protected function findImporter($repoId)
    {
        if (array_key_exists($repoId, $this->importers)) {
            return $this->importers[$repoId];
        }
        return false;
    }


    protected function isImported($itemName)
    {
        $itemDir = $this->importDirectory . "/$itemName";
        return (is_dir($itemDir));
    }

    /**
     * @return RepositoryInterface|false
     */
    protected function findItemList($item)
    {
        foreach ($this->repositories as $itemList) {
            if (true === $itemList->has($item)) {
                return $itemList;
            }
        }
        return false;
    }

    protected function msg($type, $param = null, $param2 = null)
    {
        $msg = "";
        $level = "info";
        switch ($type) {
            //--------------------------------------------
            // IMPORT/INSTALL/UNINSTALL
            //--------------------------------------------
            case 'checkingRepo':
                $msg = "checking repo from $param...";
                $level = "debug";
                break;
            case 'noRepositoryFound':
                $msg = "repo not found for $param";
                $level = "debug";
                break;
            case 'invalidRepository':
                $msg = "invalid repository $param";
                $level = "error";
                break;
            case 'repositoryFound':
                $msg = "repo found for $param: $param2";
                $level = "debug";
                break;
            case 'importingItem':
                $msg = "importing item $param";
                $level = "info";
                break;
            case 'installingItem':
                $msg = "installing item $param";
                $level = "info";
                break;
            case 'uninstallingItem':
                $msg = "uninstalling " . $param;
                $level = "info";
                break;
            case 'checkingDependencies':
            case 'checkingHardDependencies':

                if ("checkingHardDependencies" === $type) {
                    $msg = "checking hard dependencies for $param:";
                } else {
                    $msg = "checking dependencies for $param:";
                }

                if (count($param2) > 0) {
                    $br = PHP_EOL;
                    $msg .= $br;
                    $msg .= "- ";
                    $msg .= implode($br . "- ", $param2);
                } else {
                    $msg .= " none";
                }
                $level = "info";
                break;
            case 'importingDependencyItem':
                $msg = "importing dependency item $param";
                $level = "info";
                break;
            case 'installingDependencyItem':
                $msg = "installing dependency item $param";
                $level = "info";
                break;
            case 'uninstallingDependencyItem':
                $msg = "uninstalling dependency " . $param;
                $level = "info";
                break;
            //--------------------------------------------
            // DO IMPORT
            //--------------------------------------------
            case 'itemAlreadyImported':
                $msg = "$param already imported";
                $level = "success";
                break;
            case 'findingImporter':
                $msg = "finding importer...";
                $level = "debug";
                break;
            case 'importerFound':
                $msg = "importer found: " . get_class($param);
                $level = "debug";
                break;
            case 'itemImported':
                $msg = "$param imported from repository $param2";
                $level = "success";
                break;
            case 'importerProblem':
                $msg = "A problem occurred with the import: " . $param2->getMessage();
                $level = "error";
                break;
            case 'importerNotFound':
                if (null === $param) {
                    $msg = "no importer is able to handle item $param2";
                } else {
                    $msg = "no importer is able to handle repository $param";
                }
                $level = "warn";
                break;
            //--------------------------------------------
            // DO INSTALL
            //--------------------------------------------
            case 'itemAlreadyInstalled':
                $msg = "$param already installed";
                $level = "success";
                break;
            case 'itemNotInstalledNotImported':
                $msg = "$param not installed and not imported. Trying to import $param";
                $level = "info";
                break;
            case 'itemInstalled':
                $msg = "$param installed";
                $level = "success";
                break;
            case 'installProblem':
                $msg = "a problem occurred with the install: " . $param2->getMessage();
                $level = "error";
                break;
            case 'itemNotInstalled':
                $msg = "item $param couldn't be installed: no reason was given.";
                $level = "error";
                break;
            //--------------------------------------------
            // DO UNINSTALL
            //--------------------------------------------
            case 'itemAlreadyUninstalled':
                $msg = "$param already uninstalled";
                $level = "success";
                break;
            case 'itemUninstalled':
                $msg = "$param uninstalled";
                $level = "success";
                break;
            case 'uninstallProblem':
                $msg = "a problem occurred with the uninstall: " . $param2->getMessage();
                $level = "error";
                break;
            case 'itemNotUninstalled':
                $msg = "item $param couldn't be uninstalled: no reason was given.";
                $level = "error";
                break;
            default:
                break;
        }


        $levelsOff = ['debug'];
        if (false === $this->debugMode && in_array($level, $levelsOff, true)) {
            return;
        }
        $this->write($msg, $level);
    }

    protected function write($msg, $type)
    {
        echo $msg . PHP_EOL;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function collectRepoIds($repoId = null)
    {
        $repoIds = [];
        if (null === $repoId) {
            $repoIds = $this->_repositories;
        } elseif (is_array($repoId)) {
            $repoIds = $repoId;

        } else {
            $repoIds = [$repoId];
        }
        foreach ($repoIds as $repoId) {
            if (false === array_key_exists($repoId, $this->repositories)) {
                throw new ApplicationItemManagerException("Repo id doesn't exist: $repoId");
            }
        }
        return $repoIds;
    }


    private function getItemNameByItem($item)
    {
        $p = explode('.', $item, 2);
        if (2 === count($p)) {
            return $p[1];
        }
        return $item;
    }

    private function getRepoIdByItemId($itemId)
    {
        $p = explode('.', $itemId, 2);
        if (2 === count($p)) {
            return $p[0];
        }
        throw new ApplicationItemManagerException("Invalid itemId syntax: $itemId. itemId=repoId.itemName");
    }

    protected function getRepoId($item)
    {
        $this->msg("checkingRepo", $item);
        $repoId = $this->findRepo($item, $this->favoriteRepositoryId);
        if (null === $repoId) {
            $this->msg("noRepositoryFound", $item);
            if (false !== strpos($item, '.')) {
                $repoId = $this->getRepoIdByItemId($item);
                $this->msg("invalidRepository", $repoId);
                return false;
            }
        } else {
            $this->msg("repositoryFound", $item, $repoId);
        }
        return $repoId;
    }

    private function findRepo($item, $favoriteRepositoryId)
    {
        // itemId, the choice is non negotiable
        if (false !== strpos($item, '.')) {
            $p = explode(".", $item, 2);
            $repoId = $p[0];
            if (array_key_exists($repoId, $this->repositories)) {
                return $this->repositories[$repoId]->getName();
            }
        } else {
            // itemName
            // do we have a favorite choice?
            if (null !== $favoriteRepositoryId) {
                if (array_key_exists($favoriteRepositoryId, $this->repositories)) {
                    $repo = $this->repositories[$favoriteRepositoryId];
                    if (true === $repo->has($item)) {
                        return $repo->getName();
                    }
                }
            }

            // fallback solution, ask all repos
            foreach ($this->repositories as $repository) {
                if (true === $repository->has($item)) {
                    return $repository->getName();
                }
            }
        }
        return null;
    }


    protected function handleProcedure($type, $item, $repoId, $force, array $procedure = null)
    {

        if (null !== $procedure) {
            list($method, $msgType, $depMethod, $depMsgType) = $procedure;
        } else {


            if ('install' === $type) {
                $method = 'doInstall';
                $msgType = "installingDependencyItem";
                $depMethod = "getDependencies";
                $depMsgType = "checkingDependencies";
            } elseif ('uninstall' === $type) {
                $method = 'doUninstall';
                $msgType = "uninstallingDependencyItem";
                $depMethod = "getHardDependencies";
                $depMsgType = "checkingHardDependencies";
            } else {
                $method = 'doImport';
                $msgType = "importingDependencyItem";
                $depMethod = "getDependencies";
                $depMsgType = "checkingDependencies";
            }
        }

        $itemName = $this->getItemNameByItem($item);
        $r = $this->$method($itemName, $repoId, $force);
        if (false === $r) {
            return false;
        } else {
            if (null === $repoId) {
                return true;
            } elseif (array_key_exists($repoId, $this->repositories)) {
                $itemName = $this->getItemNameByItem($item);


                /**
                 * Here we first try to ask the module if it knows its own dependencies (which it SHOULD by the way,
                 * but in the original conception it wasn't...).
                 * If it doesn't know, then we ask the repository if it knows about the module's dependencies.
                 *
                 * NOTE: you should not use the repository for such functional info: the repository can
                 * be used to search for modules, and can potentially be aware of the modules dependencies,
                 * however it is first the module's task to be aware of its own dependencies.
                 *
                 * (I'm mad that I didn't get that right the first time when ApplicationItemManager was implemented...)
                 *
                 */
                $knowItsDependencies = false;
                $oInstance = KamilleApplicationItemManagerHelper::getInstallerInstance($itemName, false);
                if (false !== $oInstance) {
                    if ($oInstance instanceof DependencyAwareModuleInterface) {
                        $deps = $oInstance->getDependencies();
                        $knowItsDependencies = true;
                    }
                }
                if (false === $knowItsDependencies) {
                    $repo = $this->repositories[$repoId];
                    $deps = $repo->$depMethod($itemName);
                }

                $this->msg($depMsgType, $itemName, $deps);
                $allDepsOk = true;
                foreach ($deps as $dep) {
                    $this->msg($msgType, $dep);
                    $depName = $this->getItemNameByItem($dep);
                    $r = $this->$method($depName, $repoId);
                    if (false === $r) {
                        $allDepsOk = false;
                    }
                }
                return $allDepsOk;
            } else {
                throw new \LogicException("no repository set for repoId $repoId");
            }
        }
    }

    private function isInstalled($itemName)
    {
        return $this->installer->isInstalled($itemName);
    }

    /**
     * @return array (flattened) of all itemIds
     */
    private function getAllDeps($repoId = null)
    {
        $repoIds = $this->collectRepoIds($repoId);
        $all = [];
        foreach ($repoIds as $repoId) {
            $repo = $this->repositories[$repoId];
            $name = $repo->getName();
            $repoAll = $repo->all();
            foreach ($repoAll as $repoItem) {
                $fullRepoItem = $name . "." . $repoItem;
                $all[] = $fullRepoItem;
                $deps = $repo->getDependencies($repoItem);
                foreach ($deps as $dep) {
                    if (!in_array($dep, $all, true)) {
                        $all[] = $dep;
                    }
                }
            }
        }
        $all = array_unique($all);
        sort($all);
        return $all;
    }

}