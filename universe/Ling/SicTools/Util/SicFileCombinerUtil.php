<?php


namespace Ling\SicTools\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\SicTools\Exception\SicToolsException;

/**
 * The SicFileCombinerUtil class.
 *
 * The idea of a "combiner" is that the configuration array is broken into multiple files.
 * Typically, this is what happens naturally in an environment with plugins: each plugin brings
 * a part of the configuration; each plugin brings one or more file.
 *
 * Then the role of a "combiner" is to parse all those files and make one united configuration.
 *
 *
 * The extra-value brought by this combiner is that it allows syntax additions.
 *
 * In this particular combiner, the following feature is implemented:
 *
 * - the array merging syntax
 *
 *
 * The target merge/replace syntax
 * ============
 *
 * If plugin A brings file a.byml, and plugin B brings file b.byml,
 * and if A defines a service like this (a.byml):
 *
 *
 * ```yaml
 * service_from_A:
 *      instance: My\Company\Util\ServiceOne
 *      methods:
 *          adopt: []
 *
 * ```
 *
 *
 * Then it is possible for plugin B to add items into the adopt array from b.byml like this:
 *
 * ```yaml
 * $service_from_A.methods.adopt:
 *      - item_one
 *      - item_two
 * ```
 *
 * In the end, the "compiled" a.byml file will look like this:
 *
 * ```yaml
 * service_from_A:
 *      instance: My\Company\Util\ServiceOne
 *      methods:
 *          adopt:
 *              - item_one
 *              - item_two
 *
 * ```
 *
 * Other plugins (like plugin C for instance) could also inject into the same array using the same technique.
 *
 * The syntax is simple: if the key is at the root level and starts with the dollar symbol ($), then it
 * indicates a target merge/replace directive, otherwise, it's just a regular entry.
 *
 * If the target pointed by the target merge/replace is an array, then the merge/replace directive must be an array too
 * (otherwise this is a syntax error) and all items will be merged into the array.
 * If the pointed target is not an array, the value is replaced instead.
 * Bear in mind that all plugins have equal opportunities to replace the same target, and so
 * the common sense of the developer should prevail to decide what is replaced and what's not.
 *
 *
 * If the target doesn't exist, it is created.
 *
 *
 *
 *
 *
 */
class SicFileCombinerUtil
{

    /**
     * Combines the babyYaml files found in the given directory, and returns the resulting array.
     * The target merge/replace syntax described above in this class comments applies.
     *
     * @param string $directory
     * @return array
     * @throws SicToolsException
     */
    public static function combine(string $directory)
    {
        $ret = [];
        if (is_dir($directory)) {
            $files = YorgDirScannerTool::getFilesWithExtension($directory, "byml", false, true, false);
            $mergeReplaceDirectives = [];

            //--------------------------------------------
            // First combine all files as usual, and extract the merge/replace directives
            //--------------------------------------------
            foreach ($files as $file) {
                $fileConf = BabyYamlUtil::readFile($file);
                foreach ($fileConf as $key => $value) {
                    if ('$' === substr($key, 0, 1)) {
                        $mergeReplaceDirectives[substr($key, 1)] = [$value, $file];
                        unset($fileConf[$key]);
                    }
                }
                $ret = ArrayTool::arrayMergeReplaceRecursive([$ret, $fileConf]);
            }


            //--------------------------------------------
            // Now inject the mergeReplace directives
            //--------------------------------------------
            foreach ($mergeReplaceDirectives as $key => $info) {
                list($value, $file) = $info;
                $found = false;
                $targetValue = BDotTool::getDotValue($key, $ret, null, $found);

                if (false === $found) {
                    $targetValue = $value;
                } else {
                    if (is_array($targetValue)) {
                        if (is_array($value)) {
                            $targetValue = array_merge($targetValue, $value);
                        } else {
                            $type = gettype($value);
                            throw new SicToolsException("SicFileCombinerUtil: the injected value must be an array for key $key, $type given, defined in file $file.");
                        }
                    }
                }
                BDotTool::setDotValue($key, $targetValue, $ret);
            }
        }
        return $ret;
    }
}