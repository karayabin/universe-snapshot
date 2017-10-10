<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Installer;

use BeeFramework\Bat\FileTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Component\Compression\CompressionUtil\ZipCommandCompressionUtil;
use BeeFramework\Notation\File\BabyYaml\Reader\BabyYamlReader;
use Komin\Application\ModuleInstaller\Client\ProtocolHelper\ProtocolHelper;
use Komin\Application\ModuleInstaller\Client\ProtocolHelper\ProtocolHelperInterface;


/**
 * DebugInstaller
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class DebugInstaller implements InstallerInterface
{

    private $cr;
    /**
     * @var ProtocolHelperInterface
     */
    private $protocolHelper;

    public function __construct($cr = "\n")
    {
        $this->cr = $cr;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS InstallerInterface
    //------------------------------------------------------------------------------/
    /**
     * @return bool
     */
    public function install($bundle)
    {

        echo "installing bundle $bundle in the application ...(fake)..." . $this->cr;
        if ('.zip' === substr($bundle, -4)) {

            $o = new ZipCommandCompressionUtil();
            $metaFile = $this->_getProtocolHelper()->getMetaFileBaseName();
            if (false !== $data = $o->extractFile($bundle, $metaFile)) {
                if (false !== $meta = BabyYamlReader::create()->readString($data)) {
                    echo "installing with meta: " . VarTool::toString($meta, ['details' => true]);
                }
                else {
                    throw new \RuntimeException("Invalid meta data in $metaFile; data should be in babyYaml format");
                }
            }
            else {
                throw new \RuntimeException("Couldn't extract the meta file from the given bundle $bundle");
            }
        }
        else {
            $extension = FileTool::getExtension($bundle);
            throw new \RuntimeException("bundle must have zip extension, $extension given");
        }


        echo "...done" . $this->cr;
        return true;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * @return ProtocolHelperInterface
     */
    public function getProtocolHelper()
    {
        return $this->protocolHelper;
    }

    public function setProtocolHelper(ProtocolHelperInterface $protocolHelper)
    {
        $this->protocolHelper = $protocolHelper;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * @return ProtocolHelperInterface
     */
    private function _getProtocolHelper()
    {
        if (null === $this->protocolHelper) {
            $this->protocolHelper = new ProtocolHelper();
        }
        return $this->protocolHelper;
    }


}
