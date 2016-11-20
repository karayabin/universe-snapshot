<?php

namespace Meredith\ContentTransformer;

use Meredith\Tool\MeredithTool;

/**
 * LingTalfi 2015-12-29
 */
class UpdateDeleteMenuContentTransformer implements ContentTransformerInterface
{

    private $useUpdate;
    private $useDelete;
    private $updateText;
    private $deleteText;

    public function __construct()
    {
        $this->useUpdate = true;
        $this->useDelete = true;
        $this->updateText = "Update";
        $this->deleteText = "Delete";
    }

    public static function create()
    {
        return new static();
    }


    public function render($targetPos)
    {
        $update = MeredithTool::jsQuoteEscape($this->updateText);
        $delete = MeredithTool::jsQuoteEscape($this->deleteText);

        $useUpdate = (true === $this->useUpdate) ? 'true' : 'false';
        $useDelete = (true === $this->useDelete) ? 'true' : 'false';
        return <<<EEE
            meredithColumnDefsFactory.actionMenu({
                useUpdate: $useUpdate,
                useDelete: $useDelete,
                updateText: "$update",
                deleteText: "$delete"
            })
EEE;

    }

    public function setDeleteText($deleteText)
    {
        $this->deleteText = $deleteText;
        return $this;
    }

    public function setUpdateText($updateText)
    {
        $this->updateText = $updateText;
        return $this;
    }

    public function setUseDelete($useDelete)
    {
        $this->useDelete = $useDelete;
        return $this;
    }

    public function setUseUpdate($useUpdate)
    {
        $this->useUpdate = $useUpdate;
        return $this;
    }

    
}