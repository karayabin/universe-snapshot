<?php


namespace Ling\ZephyrTemplateEngine;

use Ling\UniversalTemplateEngine\UniversalTemplateEngineInterface;


/**
 *
 * The ZephyrTemplateEngine class.
 *
 */
class ZephyrTemplateEngine implements UniversalTemplateEngineInterface
{


    /**
     * This property holds the errors for this instance.
     * @var array
     */
    private $errors;


    /**
     * This property holds the directory for this instance.
     * @var string
     */
    private $directory;


    /**
     * Builds the ZephyrTemplateEngine instance.
     */
    public function __construct()
    {
        $this->errors = [];
        $this->directory = null;
    }


    /**
     * @implementation
     */
    public function render(string $resourceId, array $variables = [])
    {

        if (null !== $this->directory) {
            $path = $this->directory . "/" . $resourceId;
            return $this->renderFile($path, $variables);
        } else {
            $this->addError("the directory is not set.");
        }
        return false;
    }


    /**
     * Parses the file identified and returns its interpreted content (by injecting the variables in it).
     * If false is returned, the errors are accessible via the getErrors method.
     *
     * @param string $filePath
     * @param array $variables
     * @return false|string
     */
    public function renderFile(string $filePath, array $variables = [])
    {
        if (is_file($filePath)) {
            return $this->interpret($filePath, $variables);
        } else {
            $this->addError("file not found: $filePath.");
        }
        return false;
    }


    /**
     * Returns the errors of this instance.
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets the directory.
     *
     * @param string $directory
     */
    public function setDirectory(string $directory)
    {
        $this->directory = $directory;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Interprets the template which path is given, using the given z variables,
     * and returns the resulting html code.
     *
     * @param string $___path
     * @param array $z
     * @return false|string
     */
    protected function interpret(string $___path, array $z)
    {
        ob_start();
        include $___path;
        return ob_get_clean();
    }

    /**
     * Adds an error to this instance.
     * @param string $msg
     */
    private function addError(string $msg)
    {
        $this->errors[] = "ZephyrTemplateEngine error: " . $msg;
    }
}