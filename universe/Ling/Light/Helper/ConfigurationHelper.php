<?php


namespace Ling\Light\Helper;


use Ling\SicTools\Util\SicFileCombinerUtil;

/**
 * The ConfigurationHelper class.
 */
class ConfigurationHelper
{


    /**
     *
     * Returns the merged configuration of all @page(BabyYaml) configuration files found in the given directory.
     * The merging uses the rules of the @page(arrayMergeReplaceRecursive) algorithm.
     *
     *
     *
     * @param string $directory
     * @param array $environmentVariables
     * @return array
     * @throws \Exception
     */
    public static function getCombinedConf(string $directory, array $environmentVariables = []): array
    {
        $util = new SicFileCombinerUtil();
        $util->setEnvironmentVariables($environmentVariables);
        return $util->combine($directory);
    }
}