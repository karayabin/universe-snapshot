<?php

namespace Meredith\FormRenderer;

use Meredith\FormRenderer\ControlsRenderer\ControlsRendererInterface;
use Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
class AuthorFormRenderer implements FormRendererInterface
{

    private $dir;

    private $title;
    private $resetBtnText;
    private $validateBtnText;
    private $controlsRenderer;

    public function __construct()
    {
        $this->title = "Information";
        $this->resetBtnText = "Reset";
        $this->validateBtnText = "Validate";
    }

    public static function create()
    {
        return new static();
    }

    public function render(MainControllerInterface $mc)
    {
        $f = __DIR__ . "/AuthorFormRenderer/layout.php";
        ob_start();
        require_once $f;
        $content = ob_get_clean();
        return str_replace([
            '{formId}',
            '{title}',
            '{reset}',
            '{validate}',
            '{controls}',
        ], [
            $mc->getFormId(),
            $this->title,
            $this->resetBtnText,
            $this->validateBtnText,
            $this->renderControls($mc),
        ], $content);
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

    public function setControlsRenderer(ControlsRendererInterface $controlsRenderer)
    {
        $this->controlsRenderer = $controlsRenderer;
        return $this;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function renderControls(MainControllerInterface $mc)
    {
        if ($this->controlsRenderer instanceof ControlsRendererInterface) {
            ob_start();
            echo $this->controlsRenderer->render();
            return ob_get_clean();
        }

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