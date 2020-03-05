<?php


namespace Ling\Light_ChloroformExtension\Field\TableList;

use Ling\BabyYaml\BabyYamlUtil;

/**
 * The BaseTableListFieldConfigurationHandler class.
 */
class BaseTableListFieldConfigurationHandler implements TableListFieldConfigurationHandlerInterface
{


    /**
     * This property holds the configurationFiles for this instance.
     * @var array
     */
    protected $configurationFiles;


    /**
     * Builds the LightKitAdminTableListConfigurationHandler instance.
     */
    public function __construct()
    {
        $this->configurationFiles = [];
    }


    /**
     * @implementation
     */
    public function getConfigurationItem(string $identifier): array
    {
        $conf = [];
        foreach ($this->configurationFiles as $confFile) {
            $conf = array_merge($conf, BabyYamlUtil::readFile($confFile));
        }
        return $conf[$identifier];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the configurationFile(s).
     * If multiple configuration files are provided, they will be merged together in the order they are declared
     * (i.e. a file declared after will override its predecessor configuration).
     *
     *
     * @param string|array $configurationFile
     */
    public function setConfigurationFile($configurationFile)
    {
        $configurationFiles = $configurationFile;
        if (false === is_array($configurationFiles)) {
            $configurationFiles = [$configurationFiles];
        }
        $this->configurationFiles = $configurationFiles;
    }
}