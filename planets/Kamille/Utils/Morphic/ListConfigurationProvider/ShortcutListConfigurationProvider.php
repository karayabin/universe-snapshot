<?php


namespace Kamille\Utils\Morphic\ListConfigurationProvider;

use Kamille\Utils\Morphic\Exception\MorphicException;
use Kamille\Utils\Morphic\Helper\MorphicHelper;


/**
 * This configurationProvider uses files
 * to store the configuration of the lists.
 */
class ShortcutListConfigurationProvider extends ListConfigurationProvider
{

    //--------------------------------------------
    //
    //--------------------------------------------
    public function getConfig($module, $identifier, array $context = [])
    {


        $file = $this->getFile($module, $identifier, $context);
        $defaultFile = $this->confDir . "/$module/_default.list.conf.php";
        $conf = [];
        if (file_exists($file)) {

            // make all variables in the context available to the config file
            include $file;


            /**
             * Merge the conf with either the user provided default conf,
             * or the default conf provided by this planet.
             */
            $ric = $conf['ric'];
            $formRoute = (array_key_exists("formRoute", $conf)) ? $conf['formRoute'] : "";

            if (false === file_exists($defaultFile)) {
                $defaultFile = __DIR__ . "/../assets/list/_default.list.conf.php";
            }
            $defaultConf = [];
            include $defaultFile;
            foreach ($defaultConf as $k => $v) {
                if (false === array_key_exists($k, $conf)) {
                    $conf[$k] = $v;
                }
            }

        } else {
            throw new MorphicException("File not found: $file");
        }
        return $conf;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getFile($module, $identifier, array $context = [])
    {
        return $this->confDir . "/$module/$identifier.list.conf.php";
    }
}