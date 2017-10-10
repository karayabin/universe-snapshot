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

use Komin\Application\ElementInstaller\Install\Exception\InstallProcessInterruptedException;
use Komin\Application\ElementInstaller\Install\InstallVars\InstallVarsInterface;
use Komin\Application\ElementInstaller\MetaFile\MetaFileAwareInterface;
use Komin\Application\ElementInstaller\MetaFile\MetaFileInterface;
use Komin\Component\Log\ProcessLogger\ProcessLoggerAwareInterface;
use Komin\Component\Log\ProcessLogger\ProcessLoggerInterface;


/**
 * BaseUncompressedBundleInstaller
 * @author Lingtalfi
 * 2015-05-21
 *
 */
abstract class BaseUncompressedBundleInstaller implements UncompressedBundleInstallerInterface, ProcessLoggerAwareInterface, MetaFileAwareInterface
{

    /**
     * @var ProcessLoggerInterface
     */
    private $processLogger;

    /**
     * @var MetaFileInterface
     */
    private $metaFile;

    public function __construct()
    {
        $this->processLogger = null;
        $this->metaFile = null;
    }

    public static function create()
    {
        return new static();
    }


    abstract protected function doInstall($bundleDir, InstallVarsInterface $installVars);

    //------------------------------------------------------------------------------/
    // IMPLEMENTS UncompressedBundleInstallerInterface
    //------------------------------------------------------------------------------/
    public function install($bundleDir, InstallVarsInterface $installVars)
    {

        if (is_string($bundleDir)) {
            try {                
                $this->doInstall($bundleDir, $installVars);
            } catch (\Exception $e) {
                throw new InstallProcessInterruptedException($e->getMessage());
            }
        }
        else {
            throw new InstallProcessInterruptedException(sprintf("bundlePath argument must be of type string, %s given", gettype($bundleDir)));
        }
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS ProcessLoggerAwareInterface
    //------------------------------------------------------------------------------/
    public function setProcessLogger(ProcessLoggerInterface $processLogger)
    {
        $this->processLogger = $processLogger;
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS MetaFileAwareInterface
    //------------------------------------------------------------------------------/
    public function setMetaFile(MetaFileInterface $metaFile)
    {
        $this->metaFile = $metaFile;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return ProcessLoggerInterface
     */
    protected function getProcessLogger()
    {
        if (null === $this->processLogger) {
            throw new \RuntimeException("processLogger not defined");
        }
        return $this->processLogger;
    }

    /**
     * @return MetaFileInterface
     */
    protected function getMetaFile()
    {
        if (null === $this->metaFile) {
            throw new \RuntimeException("metaFile not defined");
        }
        return $this->metaFile;
    }


    protected function checkRequiredVars(array $requiredVars, InstallVarsInterface $vars)
    {

        $missing = [];
        foreach ($requiredVars as $name) {
            if (false === $vars->has($name)) {
                $missing[] = $name;
            }
        }
        if ($missing) {
            $msg = "requiredVars missing: " . implode(', ', $missing);
            throw new InstallProcessInterruptedException($msg);
        }
    }
}
