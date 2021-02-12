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
     * Available options are:
     * - preLazyVars: array of lazy var items to pass to the @page(SicFileCombinerUtil->combine method).
     *
     *
     *
     * @param string $directory
     * @param array $environmentVariables
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public static function getCombinedConf(string $directory, array $environmentVariables = [], array $options = []): array
    {

        $preLazyVars = $options['preLazyVars'] ?? [];


        $util = new SicFileCombinerUtil();
        $util->setEnvironmentVariables($environmentVariables);
        return $util->combine($directory, [
            'preLazyVars' => $preLazyVars,
            'recursive' => false,
        ]);
    }
}