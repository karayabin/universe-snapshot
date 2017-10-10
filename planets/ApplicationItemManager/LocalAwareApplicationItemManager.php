<?php


namespace ApplicationItemManager;


use ApplicationItemManager\Exception\ApplicationItemManagerException;
use ApplicationItemManager\Importer\Exception\ImporterException;
use ApplicationItemManager\Importer\GithubImporter;
use ApplicationItemManager\Importer\ImporterInterface;
use ApplicationItemManager\Installer\InstallerInterface;
use ApplicationItemManager\Repository\RepositoryInterface;
use Bat\FileSystemTool;
use Dir2Symlink\ProgramOutputAwareDir2Symlink;
use Output\ProgramOutputInterface;


class LocalAwareApplicationItemManager extends ApplicationItemManager implements LocalAwareApplicationItemManagerInterface
{
    public function setLocalRepo($localRepoPath)
    {
        $file = $this->getFile();
        if (true === FileSystemTool::mkfile($file, $localRepoPath)) {
            $this->write("ok", 'notice');
        } else {
            $this->write("couldn't create the file $file", 'error');
        }
    }

    public function getLocalRepo($write = true)
    {
        if (false !== ($content = $this->getLocalRepository())) {
            if (true === $write) {
                $this->write($content, 'notice');
            }
        }
        return $content;
    }

    public function toDir()
    {
        $this->dir2Symlink("toDirectories");
    }

    public function toLink()
    {
        $this->dir2Symlink("toSymlinks");
    }

    public function flash($asLink = true, $force = false)
    {
        if (false !== ($localRepoDir = $this->getLocalRepository())) {
            $importDir = $this->importDirectory;
            if (is_dir($localRepoDir)) {
                if ($this instanceof ProgramOutputAwareApplicationItemManagerInterface) {

                    if (true === ProgramOutputAwareDir2Symlink::create()->setProgramOutput($this->getOutput())->equalize($localRepoDir, $importDir, $force, $asLink)) {
                        $this->write("ok", 'notice');
                    } else {
                        $this->write("Couldn't equalize all the entries from local repository $localRepoDir to import dir $importDir, sorry", 'error');
                    }
                } else {
                    throw new \Exception("Case not handled yet");
                }
            } else {
                $this->write("Local repository is not a dir: $localRepoDir. Use the setlocalrepo command to update the value", 'error');
            }
        }
    }

    public function zimport($item, $force = false)
    {
        if (false !== ($repoId = $this->getRepoId($item))) {
            $this->write("zimporting item $item", "info");
            return $this->handleProcedure("zimport", $item, $repoId, $force, [
                "doZimport",
                "importingDependencyItem",
                "getDependencies",
                "checkingDependencies",
            ]);
        }
        return false;
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    protected function doZimport($itemName, $repoId = null, $force = false)
    {
        if (false === $force) {
            // is already imported?
            if (true === $this->isImported($itemName)) {
                $this->msg("itemAlreadyImported", $itemName);
                return true;
            }
        }


        try {

            $path = $this->importDirectory . "/" . $itemName;
            if (is_link($path)) {
                unlink($path);
            } elseif (file_exists($path)) {
                FileSystemTool::remove($path);
            }

            $target = $this->getLocalRepo(false) . "/" . $itemName;

            if (file_exists($target)) {
                if (true === symlink($target, $path)) {
                    $this->write("item zimported: $itemName, from repository $repoId", "success");
                    return true;
                }
            } else {
                $this->write("Target not found in local repo: $target", "error");
            }

        } catch (ImporterException $e) {
            $this->msg("importerProblem", $itemName, $e);
        }
        return false;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getFile()
    {
        if (null !== $this->importDirectory) {
            return $this->importDirectory . "/aimp.txt";
        } else {
            throw new ApplicationItemManagerException("importDirectory not set");
        }
    }

    private function getLocalRepository()
    {
        $file = $this->getFile();
        if (file_exists($file)) {
            return trim(file_get_contents($file));
        }
        $this->write("file does not exist: " . $file . ", you should probably use the setlocalrepo command first", "error");
        return false;
    }


    private function dir2Symlink($method)
    {
        $importDir = $this->importDirectory;
        if (false !== ($localRepoDir = $this->getLocalRepository())) {
            if (is_dir($localRepoDir)) {
                if ($this instanceof ProgramOutputAwareApplicationItemManagerInterface) {
                    if (true === ProgramOutputAwareDir2Symlink::create()->setProgramOutput($this->getOutput())->$method($localRepoDir, $importDir)) {
                        $this->write("ok", "notice");
                    } else {
                        $this->write("Couldn't convert all the entries in $importDir to directories, sorry", 'error');
                    }
                } else {
                    throw new \Exception("Case not handled yet");
                }
            } else {
                $this->write("Local repository is not a dir: $localRepoDir. Use the setlocalrepo command to update the value", "error");
            }
        }
    }


}