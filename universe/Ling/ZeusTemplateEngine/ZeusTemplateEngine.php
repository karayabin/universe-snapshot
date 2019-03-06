<?php


namespace Ling\ZeusTemplateEngine;

use Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface;


/**
 *
 * In this class, templates are always php files.
 *
 *
 * The resourceId notation is the following:
 * - resourceId: <directoryId> <:> <fileRelativePath>
 *
 * With:
 * - directoryId: a directory identifier set with the setDirectories method
 * - fileRelativePath: the relative path from the directory pointed by directoryId to the template
 *
 * Example:
 * - pages:zeus/home
 *
 * The example above targets the file zeus/home.php under the directory defined as "pages".
 *
 *
 *
 */
class ZeusTemplateEngine implements UniversalTemplateEngineInterface
{

    private $errors;
    /**
     * @var array of name => path
     */
    private $directories;


    public function __construct()
    {
        $this->errors = [];
        $this->directories = [];
    }


    /**
     * Returns the interpreted code corresponding to the given $resourceId and $variables,
     * or false if a problem occurred.
     *
     *
     * @param $resourceId
     * @param array $variables
     * @return false|string
     */
    public function render($resourceId, array $variables = [])
    {
        $p = explode(":", $resourceId, 2);
        if (2 === count($p)) {
            $dir = $p[0];
            $relativePath = $p[1];
            if (array_key_exists($dir, $this->directories)) {
                $dirPath = $this->directories[$dir];
                $path = $dirPath . "/" . $relativePath;
                if (is_file($path)) {
                    return $this->interpret($path, $variables);
                }
                else {
                    $this->addError("file not found: $path (from resourceId: $resourceId");
                }
            }
            else {
                $this->addError("undefined dir symbol $dir for in resourceId: $resourceId");
            }
        }
        else {
            $this->addError("invalid resourceId $resourceId: the colon char (:) was not found");
        }
        return false;
    }


    /**
     * Returns the interpreted code corresponding to the template which $path is given.
     *
     * @param $path
     * @param array $variables
     * @return false|string
     */
    public function renderByPath($path, array $variables = [])
    {
        return $this->interpret($path, $variables);
    }


    public function getErrors()
    {
        return $this->errors;
    }


    public function setDirectories(array $directories)
    {
        $this->directories = $directories;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function interpret($___path, array $z)
    {
        ob_start();
        include $___path;
        return ob_get_clean();
    }

    private function addError($msg)
    {
        $this->errors[] = "ZeusTemplateEngine error: " . $msg;
    }
}