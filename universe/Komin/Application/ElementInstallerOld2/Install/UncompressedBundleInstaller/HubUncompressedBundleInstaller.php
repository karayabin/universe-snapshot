<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\Install\UncompressedBundleInstaller;

use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use Komin\Application\ElementInstaller\Install\Exception\InstallProcessInterruptedException;
use Komin\Application\ElementInstaller\Install\InstallVars\InstallVarsInterface;
use Komin\Application\ElementInstaller\MetaFile\Exception\MissingMetaPropertyException;
use Komin\Application\ElementInstaller\MetaFile\MetaFileAwareInterface;
use Komin\Application\ElementInstaller\MetaFile\MetaFileHubInterface;
use Komin\Component\Log\ProcessLogger\DisplayProcessLogger;
use Komin\Component\Log\ProcessLogger\ProcessLoggerAwareInterface;
use Komin\Component\Log\ProcessLogger\ProcessLoggerInterface;


/**
 * HubUncompressedBundleInstaller
 * @author Lingtalfi
 * 2015-05-22
 *
 */
class HubUncompressedBundleInstaller implements UncompressedBundleInstallerInterface, ProcessLoggerAwareInterface
{

    private $installers;

    /**
     * @var MetaFileHubInterface
     */
    private $metaHub;

    /**
     * @var ProcessLoggerInterface
     */
    private $processLogger;

    public function __construct()
    {
        $this->installers = [];
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS UncompressedBundleInstallerInterface
    //------------------------------------------------------------------------------/
    /**
     * @param $bundlePath , path to the uncompressed bundle dir
     * @return mixed
     */
    public function install($bundleDir, InstallVarsInterface $installVars)
    {
        try {
            if ($this->installers) {
                list($installer, $metaFile) = $this->prepareUncompressedBundleInstallerAndMeta($bundleDir);
                if ($installer instanceof ProcessLoggerAwareInterface) {
                    $installer->setProcessLogger($this->getProcessLogger());
                }

                if ($installer instanceof MetaFileAwareInterface) {
                    $installer->setMetaFile($metaFile);
                }

                /**
                 * @var UncompressedBundleInstallerInterface $installer
                 */
                $installer->install($bundleDir, $installVars);
            }
            else {
                $this->devError("No uncompressedBundleInstallers at all were found, please check your installer instance");
            }

        } catch (InstallProcessInterruptedException $e) {
            $this->processLogger->critical($e->getMessage());
        }
    }
    
    //------------------------------------------------------------------------------/
    // IMPLEMENTS ProcessLoggerAwareInterface
    //------------------------------------------------------------------------------/
    public function setProcessLogger(ProcessLoggerInterface $processLogger)
    {
        $this->processLogger = $processLogger;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setUncompressedBundleInstaller($type, UncompressedBundleInstallerInterface $i)
    {
        $this->installers[$type] = $i;
        return $this;
    }

    public function setUncompressedBundleInstallers(array $installers)
    {
        foreach ($installers as $type => $installer) {
            $this->setUncompressedBundleInstaller($type, $installer);
        }
        return $this;
    }


    public function setMetaFileHub(MetaFileHubInterface $h)
    {
        $this->metaHub = $h;
        return $this;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return array, [UncompressedBundleInstallerInterface, MetaFileInterface]
     */
    private function prepareUncompressedBundleInstallerAndMeta($bundlePath)
    {
        if (null !== $this->metaHub) {
            if (is_dir($bundlePath)) {
                $metaPath = $bundlePath . "/meta.yml";
                if (file_exists($metaPath)) {
                    if (false !== $conf = BabyYamlTool::parseFile($metaPath)) {
                        $metaVersion = (array_key_exists('metaVersion', $conf)) ? $conf['metaVersion'] : 1;

                        try {
                            if (false !== $metaFile = $this->metaHub->getMetaFile($metaVersion, $conf)) {
                                $type = $metaFile->getType();
                                if (array_key_exists($type, $this->installers)) {
                                    $installer = $this->installers[$type];
                                    return [$installer, $metaFile];
                                }
                                else {
                                    $this->problem("Cannot find an installer to use for element of type $type");
                                }
                            }
                            else {
                                $this->problem("Cannot find a metaFile for meta version $metaVersion");
                            }
                        } catch (MissingMetaPropertyException $e) {
                            $this->invalidBundleError($e->getMessage());
                        }
                    }
                    else {
                        $this->invalidBundleError("Invalid babyYaml file: could not read info from $metaPath");
                    }
                }
                else {
                    $this->invalidBundleError("Invalid bundle structure: meta.yml not found in $bundlePath");
                }
            }
            else {
                $this->userError("bundlePath not found: $bundlePath");
            }
        }
        else {
            $this->devError("Please set the metaHub");
        }
    }


    /**
     * @return ProcessLoggerInterface
     */
    private function getProcessLogger()
    {
        if (null === $this->processLogger) {
            $this->processLogger = DisplayProcessLogger::create();
        }
        return $this->processLogger;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function userError($msg)
    {
        $msg = "userError: " . $msg;
        throw new InstallProcessInterruptedException($msg);
    }

    private function invalidBundleError($msg)
    {
        $msg = "invalidBundleError: " . $msg;
        throw new InstallProcessInterruptedException($msg);
    }

    private function devError($msg)
    {
        $msg = "devError: " . $msg;
        throw new InstallProcessInterruptedException($msg);
    }

    private function problem($msg)
    {
        $msg = "problem: " . $msg;
        throw new InstallProcessInterruptedException($msg);
    }
}
