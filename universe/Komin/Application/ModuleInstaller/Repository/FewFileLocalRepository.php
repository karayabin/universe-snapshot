<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Repository;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\SanitizerTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use BeeFramework\Notation\File\BabyYaml\Reader\BabyYamlReader;


/**
 * FewFileLocalRepository
 * @author Lingtalfi
 * 2015-05-06
 *
 * This repository stores modules in a local (on the current machine) tree.
 *
 *
 *
 * (tree structure)
 * - rootDir
 * ----- type                       (file version of)
 * --------- id                     (file version of)
 * ------------- versionId          (file version of)
 * ----------------- meta.yml  (userMeta)
 * ----------------- $bundle.zip
 *
 * With:
 * - $bundle: $type--$id--$versionId
 *
 *
 *
 */
class FewFileLocalRepository extends BaseRepository
{


    private $rootDir;

    public function __construct($rootDir = null)
    {
        $this->rootDir = $rootDir;
    }


    public function getRootDir()
    {
        return $this->rootDir;
    }

    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // PROVIDES BaseRepository
    //------------------------------------------------------------------------------/
    protected function resolveModuleMeta($type, $id, $versionId, &$concreteVersionId)
    {
        $base = $this->getBaseModuleDir($type, $id);
        $metaDir = null;
        if (null === $versionId) { // last version
            if (file_exists($base)) {
                $dirs = [];
                Finder::create($base)->directories()->maxDepth(0)->find(function (FinderFileInfo $file) use (&$dirs) {
                    $dirs[] = $file->getRealPath();
                });
                $metaDir = $this->getLastVersionByDirs($dirs);
                $concreteVersionId = basename($metaDir);
            }
        }
        elseif (is_string($versionId)) {
            $concreteVersionId = $versionId;
            $metaDir = "$base/$versionId";
        }
        else {
            throw new \InvalidArgumentException(sprintf("versionId argument must be of type string or null, %s given", gettype($versionId)));
        }


        if (null !== $metaDir) {
            /**
             * Note: this is the repository's responsibility to defined the
             * cached meta.yml internal baseName
             * (it's not part of the protocol).
             */
            $metaFile = $metaDir . "/meta.yml";
            if (file_exists($metaFile)) {
                return BabyYamlReader::create()->readFile($metaFile);
            }
        }
        return false;
    }

    /**
     * @return mixed, the download info corresponding to the given userMeta
     */
    protected function getDownloadInfo($type, $id, $concreteVersionId, array $userMeta)
    {
        $type = SanitizerTool::sanitizeFileName($type);
        $id = SanitizerTool::sanitizeFileName($id);
        $versionId = SanitizerTool::sanitizeFileName($concreteVersionId);

        return "file://" . $this->rootDir . "/$type/$id/$versionId/$type--$id--$concreteVersionId.zip";
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * returns the path to the dir corresponding to the module commonName
     */
    private function getBaseModuleDir($type, $id)
    {
        $this->checkInit();
        $type = SanitizerTool::sanitizeFileName($type);
        $id = SanitizerTool::sanitizeFileName($id);
        return $this->rootDir . "/$type/$id";
    }

    private function checkInit()
    {
        if (false === FileSystemTool::isValidDirPath($this->rootDir)) {
            throw new \InvalidArgumentException("rootDir is not a valid path: " . VarTool::toString($this->rootDir));
        }
    }

    private function getLastVersionByDirs(array $dirs)
    {
        sort($dirs);
        return array_pop($dirs);
    }
}
