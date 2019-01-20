<?php


namespace KamillePacker\Packer;


use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
use KamillePacker\Config\ConfigInterface;

abstract class AbstractPacker
{

    /**
     * @var ConfigInterface
     */
    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    abstract protected function getTargetDir($appDir);

    abstract protected function getReadmeTemplatePath();

    abstract protected function getInstallerTemplatePath();

    abstract protected function getInstallerClassTargetRelativePath($name);

    public static function create(ConfigInterface $config)
    {
        return new static($config);
    }

    public function pack($name)
    {
        $appDir = $this->config->get('appDir');
        $targetDir = $this->getTargetDir($appDir);

        /**
         * updateMode: if true (default), will replace files/app files with the new one.
         * The readme file will be left unchanged anyway.
         */
        $updateMode = $this->config->get('updateMode', true, false);

        //--------------------------------------------
        // TARGET DIR
        //--------------------------------------------
        $itemTargetDir = $targetDir . "/" . $name;
        if (!is_dir($itemTargetDir)) {
            FileSystemTool::mkdir($itemTargetDir, 0777, true);
        }

        //--------------------------------------------
        // README
        //--------------------------------------------
        $readmeTarget = $itemTargetDir . "/README.md";
        if (!file_exists($readmeTarget)) {

            $readmeTpl = $this->getReadmeTemplatePath();
            $vars = [
                "{name}" => lcfirst($name),
                "{Name}" => $name,
                "{date}" => date("Y-m-d"),
            ];
            $c = file_get_contents($readmeTpl);
            $c = str_replace(array_keys($vars), array_values($vars), $c);
            FileSystemTool::mkfile($readmeTarget, $c);
        }


        //--------------------------------------------
        // INSTALLER FILE
        //--------------------------------------------
        $installerClassTarget = $itemTargetDir . "/" . $this->getInstallerClassTargetRelativePath($name);
        if (!file_exists($installerClassTarget)) {

            $installerTpl = $this->getInstallerTemplatePath();
            $vars = [
                "{name}" => lcfirst($name),
                "{Name}" => $name,
                "{date}" => date("Y-m-d"),
            ];
            $c = file_get_contents($installerTpl);
            $c = str_replace(array_keys($vars), array_values($vars), $c);
            FileSystemTool::mkfile($installerClassTarget, $c);
        }

        //--------------------------------------------
        // FILES FORWARD MODE (from item to app)
        //--------------------------------------------
        $filesDir = $itemTargetDir . "/files/app";
        if (is_dir($filesDir)) {
            $appFiles = YorgDirScannerTool::getFiles($filesDir, true, true, false, false);
            foreach ($appFiles as $f) {
                $appFile = $appDir . "/" . $f;
                $itemFile = $filesDir . "/" . $f;
                if (file_exists($appFile)) {
                    copy($appFile, $itemFile);
                }
            }
        }


        //--------------------------------------------
        // SPECIFIC METHODS
        //--------------------------------------------
        $this->specificPack($name, $appDir, $updateMode, $itemTargetDir);
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    protected function specificPack($name, $appDir, $updateMode, $itemTargetDir)
    {

    }
}