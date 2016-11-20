<?php

namespace Meredith\OnModalOpenAfter;

use Meredith\MainController\MainControllerInterface;

/**
 * LingTalfi 2015-12-31
 */
class OnModalOpenAfter implements OnModalOpenAfterInterface
{

    private $dir;

    public static function create()
    {
        return new static();
    }

    public function render(MainControllerInterface $mc)
    {
        if (null !== $this->dir) {
            $f = $this->dir . "/" . $mc->getFormId() . ".js";
            if (file_exists($f)) {
                return file_get_contents($f);
            }
        }
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }

}