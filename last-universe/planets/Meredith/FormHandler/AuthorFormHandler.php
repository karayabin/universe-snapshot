<?php

namespace Meredith\FormHandler;

use Meredith\MainController\MainControllerInterface;


/**
 * LingTalfi 2015-12-31
 */
class AuthorFormHandler extends FormHandler
{

    private $dir;

    private $title;
    private $resetBtnText;
    private $validateBtnText;

    public function __construct()
    {
        parent::__construct();
        $this->title = "Information";
        $this->resetBtnText = "Reset";
        $this->validateBtnText = "Validate";
    }


    public function render(MainControllerInterface $mc)
    {
        ob_start();
        echo $this->renderForm($mc);
//        echo $this->renderValidationCode($mc);
        return ob_get_clean();
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setResetBtnText($resetBtnText)
    {
        $this->resetBtnText = $resetBtnText;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setValidateBtnText($validateBtnText)
    {
        $this->validateBtnText = $validateBtnText;
        return $this;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function renderForm(MainControllerInterface $mc)
    {
        $f = __DIR__ . "/AuthorFormHandler/layout.php";
        ob_start();
        require_once $f;
        $content = ob_get_clean();
        return str_replace([
            '{title}',
            '{reset}',
            '{validate}',
            '{controls}',
        ], [
            $this->title,
            $this->resetBtnText,
            $this->validateBtnText,
            $this->renderControls($mc),
        ], $content);
    }

    protected function renderControls(MainControllerInterface $mc)
    {
        if (null !== $this->dir) {
            $f = $this->dir . "/" . $mc->getFormId() . ".php";
            if (file_exists($f)) {
                ob_start();
                require_once $f;
                return ob_get_clean();
            }
        }
        return '';
    }
}