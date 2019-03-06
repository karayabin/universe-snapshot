<?php


namespace Ling\Jin\Configuration;


use Ling\BabyYaml\Reader\Exception\ParseErrorException;
use Ling\Bat\BDotTool;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * @info The ConfigurationVariableFileParser class is a utility class providing tools to parse and interpret configuration
 * variable files in a jin application.
 *
 */
class ConfigurationVariableFileParser
{
    /**
     * @info This property holds the profile of the application (dev, prod, ...)
     * The default value is prod.
     */
    private $profile;

    /**
     * @info This property holds a ConfigurationFileParser instance
     * @type ConfigurationFileParser|null
     */
    private $configurationFileParser;

    /**
     * @info This property holds the errors that might occur during the parsing.
     * It's an array of english error strings.
     * @type array
     */
    private $errors;


    /**
     * @info Constructs the ConfigurationVariableFileParser instance with a default profile value.
     */
    public function __construct()
    {
        $this->profile = "prod";
        $this->errors = [];
    }


    /**
     * @info Sets the application profile.
     * @param $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @info Returns the errors collected by this instance.
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @info Sets the configuration file parser.
     * @param $parser
     */
    public function setConfigurationFileParser(ConfigurationFileParser $parser)
    {
        $this->configurationFileParser = $parser;
    }


    /**
     * @info Collects the configuration variables found in the files located under the $dirPath,
     * resolves them recursively, and returns the resolved array.
     *
     *
     * @param $dirPath
     * @return array
     */
    public function collectConfigurationVariables($dirPath)
    {
        $conf = [];
        $this->collectConfigurationVariablesByDir($dirPath, $conf);
        $this->resolveConf($conf);
        return $conf;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Feeds the given $conf array with the configuration variables found in the files located inside
     * the $dirPath. The files are first processed, then the dirs (if any).
     * This is a recursive process (i.e. the method will be re-triggered for every sub-directory).
     *
     * When a file is processed, its variables are set in the $conf as an array and the key is the name of the file (without the extension).
     * When a dir is processed, its name is also added as a key into the current array.
     * So much so that the directory structure is mapped into the array.
     *
     * Example:
     * ---------
     *
     * The following structure
     *
     * ```txt
     * - config/
     * ----- variables/
     * --------- app.yml
     *              varA: a
     *              varB: b
     * --------- one.yml
     *              varXX: xx
     * --------- komin/
     * ------------- berceau.yml
     *                  fruit: apple
     * ```
     *
     *
     * Will give the following configuration (written in pseudo yml style):
     *
     * ```yml
     * app:
     *     varA: a
     *     varB: b
     * one:
     *     varXX: xx
     * komin:
     *     berceau:
     *         fruit: apple
     *
     * ```
     *
     *
     *
     *
     *
     * @param $dirPath
     * @param array $conf
     */
    protected function collectConfigurationVariablesByDir($dirPath, array &$conf)
    {
        //--------------------------------------------
        // COLLECT THE BASE FILES
        //--------------------------------------------
        // First get the filenames to parse
        $files = YorgDirScannerTool::getFilesWithExtension($dirPath, "yml", false, false, true);


        // get rid of variation which profile is not the appProfile
        // also get rid of the variation profile suffix for profile that matches
        $baseFiles = [];
        $suffix = '-' . $this->profile . ".yml";
        $len = strlen($suffix);

        foreach ($files as $file) {
            if (false === strpos($file, '-')) {
                if (!in_array($file, $baseFiles, true)) {
                    $baseFiles[] = $file;
                }
            } else {
                if ($suffix === substr($file, -$len)) {
                    $baseFile = explode('-', $file)[0] . ".yml";
                    if (!in_array($baseFile, $baseFiles, true)) {
                        $baseFiles[] = $baseFile;
                    }
                }
            }
        }

        //--------------------------------------------
        // MERGE THEM INTO AN ARRAY
        //--------------------------------------------
        foreach ($baseFiles as $file) {
            $rootKey = substr($file, 0, -4);
            $path = $dirPath . "/" . $file;
            try {
                $conf[$rootKey] = $this->configurationFileParser->parseFileRaw($path);
            } catch (ParseErrorException $e) {
                $this->addError("Configuration syntax error: " . $e->getMessage());
            }

        }


        //--------------------------------------------
        // NOW TREAT DIRS
        //--------------------------------------------
        $dirs = YorgDirScannerTool::getDirs($dirPath, false, true);
        foreach ($dirs as $dir) {
            $dirConf = [];
            $absDir = $dirPath . "/" . $dir;
            $this->collectConfigurationVariablesByDir($absDir, $dirConf);
            $conf[$dir] = $dirConf;
        }


    }


    /**
     * @info Resolves the given $conf array using the variable replacement mechanism described below.
     *
     *
     * The resolution mechanism is a simple mechanism.
     * The resolution mechanism is not recursive yet (it might become recursive if need for recursion appears):
     * it's a simple copy paste once mechanism.
     *
     * The resolution mechanism parses every string and looks for a variable notation: ${var}.
     * When such a pattern is found, this method resolves its value.
     *
     * Note that the variable name is the name of a key in the (same) conf array, dot notation is allowed.
     *
     * If the found value is not scalar, an error will be created (i.e. non scalar references are not allowed yet)
     * and the value will be the empty string.
     *
     * If the found value is scalar, it is put in place of the variable notation.
     * If the value is not found, an error will be created and the value will be the empty string.
     *
     *
     *
     * Example
     * -------------
     *
     * Consider the following unresolved array:
     *
     * ```txt
     *
     * my_favorite_first_name: alice
     * first_names:
     *     - michel
     *     - benoît
     *     - ${my_favorite_first_name}
     *
     * ```
     *
     * This will be resolved to:
     *
     *
     * ```txt
     * my_favorite_first_name: alice
     * first_names:
     *     - michel
     *     - benoît
     *     - alice
     * ```
     *
     *
     *
     *
     *
     * @param array $conf
     */
    protected function resolveConf(array &$conf)
    {
        $keyPaths = [];
        $this->resolveConfRecursive($conf, $conf, $keyPaths);
    }


    /**
     * @info Implements the body of the resolveConf method.
     *
     * @seeMethod: resolveConf
     * @param array $conf
     * @param array $originalConf
     * @param array $keyPaths
     */
    protected function resolveConfRecursive(array &$conf, array $originalConf, array &$keyPaths)
    {

        // whether or not to use recursion
//        $useRecursion = true;
        $useRecursion = false;



        array_walk($conf, function (&$v, $k) use ($originalConf, &$keyPaths, $useRecursion) {

            if (is_array($v)) {
                $keyPaths[] = $k;
                $this->resolveConfRecursive($v, $originalConf, $keyPaths);
                array_pop($keyPaths);
            } elseif (is_string($v)) {

                $varName = null;
                $retVarType = null;
                $errorCode = 0;


                if (false === $useRecursion) {
                    $v = $this->resolveValueSimple($v, $originalConf, $varName, $retVarType, $errorCode);
                } else {
                    $recursiveValues = [];
                    $v = $this->resolveValueRecursive($v, $originalConf, $varName, $retVarType, $errorCode, $recursiveValues);
                }


                if (0 === $errorCode) {
                    // fixing var type (which was reduced to a string by preg_replace_callback, see resolveValueSimple)
                    if (null !== $retVarType) {
                        settype($v, $retVarType);
                    }
                } else {
                    $error = null;
                    switch ($errorCode) {
                        case "1":
                            $error = "Configuration error: variable \$" . "{" . $varName . "} found in {keyPath}.$k must be scalar.";
                            break;
                        case "2":
                            $error = "Configuration error: variable \$" . "{" . $varName . "} found in {keyPath}.$k does not resolve. Have you checked that $varName is actually an existing value?";
                            break;
                        case "3":
                            $error = "Configuration error: circular reference found (infinite loop). Script stopped with \$" . "{" . $varName . "} found in {keyPath}.$k. The following trace has been captured: " . implode(", ", $recursiveValues);
                            break;
                        default:
                            break;
                    }
                    if ($error) {
                        $erroneousFile = "\"config/variables/\" > " . implode(".", $keyPaths);
                        $error = str_replace('{keyPath}', $erroneousFile, $error);
                        $this->addError($error);
                    }
                }


            }
        });
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Searches for the variable notation pattern in the given $value, and tries to resolve it once against the
     * $originalConf array.
     *
     *
     * @param $value
     * @param $originalConf
     * @param $varKey , the (found) variable name (if the pattern match)
     * @param $varType : the php type of the resolved value.
     *                  This mechanism helps us fight against the preg_replace_callback function which returns a string no matter what.
     *                  Another possibility would have been to pass $value as a reference.
     * @param int $errorCode , indicates the error type in case something went wrong:
     *                  - 1: the resolved value is not scalar (it should be scalar by definition)
     *                  - 2: the resolved value was not found (key mismatch)
     * @return mixed
     */
    private function resolveValueSimple($value, $originalConf, &$varKey, &$varType, &$errorCode = 0)
    {
        return preg_replace_callback('!\$\{([^}]*)\}!', function ($val) use ($originalConf, &$errorCode, &$varKey, &$varType) {

            $ret = "";
            $key = $val[1];
            $varKey = $key;

            $found = false;
            $value = BDotTool::getDotValue($key, $originalConf, "", $found);
            $varType = gettype($value);


            $error = null;
            if (true === $found) {
                if (is_scalar($value)) {
                    $ret = $value;
                } else {
                    $errorCode = 1;
                }
            } else {
                $errorCode = 2;
            }
            return $ret;
        }, $value);
    }


    /**
     * @info Searches for the variable notation pattern in the given $value, and tries to resolve it recursively
     * against the $originalConf array.
     *
     * @sameAs resolveValueSimple
     * @param int $errorCode , indicates the error type in case something went wrong:
     *                  - 1: the resolved value is not scalar (it should be scalar by definition)
     *                  - 2: the resolved value was not found (key mismatch)
     *                  - 3: circular reference detected (infinite loop)
     * @return mixed
     */
    private function resolveValueRecursive($value, $originalConf, &$varKey, &$varType, &$errorCode = 0, &$recursiveValues = [])
    {
        $counter = 0;
        $recursiveValues = [];
        while (preg_match('!\$\{([^}]*)\}!', $value)) {

            $varName = null;
            $retVarType = null;
            $errorCode = 0;


            $value = $this->resolveValueSimple($value, $originalConf, $varKey, $varType, $errorCode);

            if (0 !== $errorCode) {
                break;
            }

            $recursiveValues[] = $value;
            $counter++;

            if ($counter > 50) { // this is ridiculously high, no configuration should have this depth... (I suppose)
                $errorCode = 3;
                break;
            }
        }
        return $value;
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Adds an error message.
     * @param $msg
     */
    private function addError($msg)
    {
        $this->errors[] = '(Jin\Configuration\ConfigurationVariableFileParser):' . $msg;
    }
}