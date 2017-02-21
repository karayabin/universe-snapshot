<?php


namespace Updf\TemplateLoader;


use Updf\Util\UpdfUtil;

class TemplateLoader implements TemplateLoaderInterface
{

    private $tplDir;

    /**
     * By default, a template uses the php extension,
     * so that the template can later use php's scripting abilities (foreach, if, ...),
     * although at the TemplateLoader level, we don't INTERPRET the template yet (that's the next step).
     *
     */
    private $tplExtension;

    public function __construct()
    {
        $this->tplDir = __DIR__ . "/../../../pdf";
        $this->tplExtension = 'tpl.php';
    }


    public static function create()
    {
        return new static();
    }


    public function load($templateName, $context = null)
    {
        $tplFile = $this->tplDir . "/" . $templateName . '.' . $this->tplExtension;

        if (file_exists($tplFile)) {
            return file_get_contents($tplFile);
        } elseif (null !== $context) {

            $refClass = new \ReflectionClass($context);
            $tplDir = dirname($refClass->getFileName()) . '/pdf';
            $tplBaseFile = $tplDir . "/" . $templateName;
            $tplFile = $tplBaseFile . ".tpl.php";
            if (file_exists($tplFile)) {
                return file_get_contents($tplFile);
            }
        }
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setTemplateDir($dir)
    {
        $this->tplDir = $dir;
        return $this;
    }


}