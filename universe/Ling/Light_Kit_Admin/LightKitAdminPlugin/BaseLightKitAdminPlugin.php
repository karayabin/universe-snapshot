<?php


namespace Ling\Light_Kit_Admin\LightKitAdminPlugin;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The BaseLightKitAdminPlugin class.
 */
class BaseLightKitAdminPlugin implements LightKitAdminPluginInterface
{


    /**
     * This property holds the absolute path to the @page(babyYaml) file containing the kit admin options
     * for this plugin.
     *
     * @var string
     */
    protected $optionsFile;


    /**
     * Builds the BaseLightKitAdminPlugin instance.
     */
    public function __construct()
    {
        $this->optionsFile = null;
    }


    /**
     * @implementation
     */
    public function getPluginOptions(): array
    {
        if (null !== $this->optionsFile) {
            return BabyYamlUtil::readFile($this->optionsFile);
        }
        return [];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setOptionsFile(string $file)
    {
        $this->optionsFile = $file;
    }


}