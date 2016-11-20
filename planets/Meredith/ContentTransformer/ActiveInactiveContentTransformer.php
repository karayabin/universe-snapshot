<?php

namespace Meredith\ContentTransformer;

use Meredith\Tool\MeredithTool;

/**
 * LingTalfi 2015-12-29
 */
class ActiveInactiveContentTransformer implements ContentTransformerInterface
{

    private $activeText;
    private $inactiveText;

    public function __construct()
    {
        $this->activeText = "Active";
        $this->inactiveText = "Active";
    }

    public static function create()
    {
        return new static();
    }


    public function render($targetPos)
    {
        $active = MeredithTool::jsQuoteEscape($this->activeText);
        $inactive = MeredithTool::jsQuoteEscape($this->inactiveText);
        return <<<EEE
        meredithColumnDefsFactory.activeButton( $targetPos, {
                            activeText: "$active",
                            inactiveText: "$inactive"
                        })
EEE;

    }

    public function setActiveText($activeText)
    {
        $this->activeText = $activeText;
        return $this;
    }

    public function setInactiveText($inactiveText)
    {
        $this->inactiveText = $inactiveText;
        return $this;
    }



}