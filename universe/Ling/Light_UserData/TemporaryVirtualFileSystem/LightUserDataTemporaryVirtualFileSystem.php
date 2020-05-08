<?php


namespace Ling\Light_UserData\TemporaryVirtualFileSystem;


use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem;


/**
 * The LightUserDataTemporaryVirtualFileSystem class.
 *
 * This class knows to handle original files.
 * The file structure is this:
 *
 *
 * - $contextDir/
 * ----- operations.byml
 * ----- files/
 * --------- $fileId
 * ----- original/
 * --------- $fileId
 *
 *
 *
 *
 *
 */
class LightUserDataTemporaryVirtualFileSystem extends TemporaryVirtualFileSystem
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserDataTemporaryVirtualFileSystem instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @overrides
     */
    protected function getFileId(string $contextId, string $path, array $meta): string
    {
        return $this->container->get("user_data")->getNewResourceIdentifier();
    }


    /**
     * @overrides
     */
    protected function getFileRelativePath(string $contextId, string $id, string $path, array $meta): string
    {
        return $id;
    }


    /**
     * @overrides
     */
    protected function onFileAddedAfter(string $contextId, string $id, string $path, array $meta, string $type, string $dst)
    {
        $copyDst = $this->getContextDir($contextId) . "/original/$id";
        if (false === file_exists($copyDst)) { // we only create the original once
            FileSystemTool::copyFile($dst, $copyDst);
        }
    }


}