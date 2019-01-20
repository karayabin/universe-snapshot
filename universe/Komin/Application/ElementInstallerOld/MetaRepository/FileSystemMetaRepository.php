<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\MetaRepository;

use Komin\Server\FileServer\FileServerInterface;
use Komin\Server\FileServer\HasherFileServer;


/**
 * FileSystemMetaRepository
 * @author Lingtalfi
 * 2015-04-20
 *
 *
 */
class FileSystemMetaRepository extends MetaRepository
{

    /**
     * @var FileServerInterface
     */
    protected $fileServer;

    public function __construct($srcDir = null)
    {
        if (null !== $srcDir) {
            $this->fileServer = new HasherFileServer($srcDir);
        }

    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS RepositoryInterface
    //------------------------------------------------------------------------------/
    public function hasMeta($type, $name, $version)
    {
        return (false !== $this->fileServer->getFile($this->getElementId($type, $name, $version)));
    }

    public function getMeta($type, $name, $version)
    {
        return $this->fileServer->getFile($this->getElementId($type, $name, $version));
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return FileServerInterface
     */
    public function getFileServer()
    {
        return $this->fileServer;
    }

    public function setFileWithMetaServer(FileServerInterface $fileServer)
    {
        $this->fileServer = $fileServer;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getElementId($type, $name, $version)
    {
        return "$type/$name/$version";
    }

}
