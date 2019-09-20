<?php


namespace Ling\Light_PluginDatabaseInstaller\Service;

use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_PluginDatabaseInstaller\Exception\LightPluginDatabaseInstallerException;
use Ling\Light_PluginDatabaseInstaller\LightPluginDatabaseInstallerInterface;

/**
 * The LightPluginDatabaseInstallerService class.
 */
class LightPluginDatabaseInstallerService
{

    /**
     * This property holds the appDir for this instance.
     * @var string
     */
    protected $appDir;

    /**
     * This property holds the installers for this instance.
     *
     * It's an array of pluginName => LightPluginDatabaseInstallerInterface
     * @var array
     */
    protected $installers;


    /**
     * This property holds the forceInstall for this instance.
     * If true, the isInstalled method will always return false.
     * This might be useful for debugging purposes.
     *
     * @var bool
     */
    protected $forceInstall;


    /**
     * Builds the LightPluginDatabaseInstallerService instance.
     */
    public function __construct()
    {
        $this->appDir = null;
        $this->installers = [];
        $this->forceInstall = false;
    }


    /**
     * Registers the given installer for the given plugin.
     * The installer can be one of:
     *
     * - LightPluginDatabaseInstallerInterface instance
     * - array of [installer callable, uninstaller callable]
     *
     *
     *
     * @param string $pluginName
     * @param $installer
     */
    public function registerInstaller(string $pluginName, $installer)
    {
        $this->installers[$pluginName] = $installer;
    }


    /**
     * Installs the database part of the given plugin.
     *
     * @param string $pluginName
     * @throws \Exception
     */
    public function install(string $pluginName)
    {
        if (array_key_exists($pluginName, $this->installers)) {
            $this->executeByPluginName($pluginName, "install");
            $installFile = $this->getFilePath($pluginName);
            FileSystemTool::mkfile($installFile, '');

        } else {
            throw new LightPluginDatabaseInstallerException("Plugin not registered: $pluginName.");
        }
    }

    /**
     * Returns whether the given plugin's database part is installed.
     *
     *
     * @param string $pluginName
     * @return bool
     */
    public function isInstalled(string $pluginName): bool
    {
        if (true === $this->forceInstall) {
            return false;
        }
        $installFile = $this->getFilePath($pluginName);
        return file_exists($installFile);
    }


    /**
     * Uninstalls the database part of the given plugin.
     * @param string $pluginName
     */
    public function uninstall(string $pluginName)
    {
        if (array_key_exists($pluginName, $this->installers)) {
            $this->executeByPluginName($pluginName, "uninstall");
            $installFile = $this->getFilePath($pluginName);
            FileSystemTool::remove($installFile);

        }
    }

    /**
     * Uninstalls the database parts for all plugins (which database part was previously installed).
     */
    public function uninstallAll()
    {
        $installDir = $this->appDir . "/config/data/Light_PluginDatabaseInstaller";
        $files = YorgDirScannerTool::getFilesWithExtension($installDir, 'installed', false);
        foreach ($files as $file) {
            $pluginName = substr(basename($file), 0, -10);
            $this->executeByPluginName($pluginName, "uninstall");
            FileSystemTool::remove($file);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the forceInstall.
     *
     * @param bool $forceInstall
     */
    public function setForceInstall(bool $forceInstall)
    {
        $this->forceInstall = $forceInstall;
    }

    /**
     * Sets the appDir.
     *
     * @param string $appDir
     */
    public function setAppDir(string $appDir)
    {
        $this->appDir = $appDir;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the path to the **pluginA.installed** file for the given plugin.
     *
     * @param string $pluginName
     * @return string
     */
    protected function getFilePath(string $pluginName): string
    {
        return $this->appDir . "/config/data/Light_PluginDatabaseInstaller/$pluginName.installed";
    }


    /**
     * Executes the given method for the given plugin.
     *
     * @param string $pluginName
     * @param string $method
     */
    protected function executeByPluginName(string $pluginName, string $method)
    {
        $installer = $this->installers[$pluginName];
        if ($installer instanceof LightPluginDatabaseInstallerInterface) {
            $installer->$method();
        } else {
            if ('install' === $method) {
                call_user_func($installer[0]);
            } else {
                call_user_func($installer[1]);
            }
        }
    }
}