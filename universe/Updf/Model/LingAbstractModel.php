<?php


namespace Updf\Model;


use Updf\Util\UpdfUtil;

abstract class LingAbstractModel extends AbstractModel implements TemplateAwareModelInterface
{


    private $lang;
    private $langDir;
    private $templateName;

    public function __construct()
    {
        $this->lang = 'en';
        $this->langDir = __DIR__ . "/../../../lang";
    }

    abstract protected function getThemeVariables();

    abstract protected function getTemplateVariables();


    public function setTemplate($templateName)
    {
        $this->templateName = $templateName;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function getVariables()
    {
        if (null === $this->vars) {
            $this->vars = [];
        }
        $this->vars = array_merge(
            $this->getThemeVariables(),
            $this->getTextVariables(),
            $this->getTemplateVariables(),
            $this->vars
        );
        array_walk_recursive($this->vars, function (&$v) {
            if (is_string($v)) {
                $v = nl2br($v);
            }
        });
        return parent::getVariables();
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getTextVariables()
    {
        $defs = [];
        $lang = $this->lang;
        $langFile = $this->langDir . "/$lang/updf/" . $this->templateName . '.php';
        if (file_exists($langFile)) {
            include($langFile);
        } else {
            $r = new \ReflectionClass($this);
            $d = dirname($r->getFileName()) . '/lang/' . $lang;
            $file = $d . '/' . $this->templateName . '.php';
            if (file_exists($file)) {
                include $file;
            }
        }


        return $defs;
    }
}