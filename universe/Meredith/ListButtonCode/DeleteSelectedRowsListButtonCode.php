<?php

namespace Meredith\ListButtonCode;

/**
 * LingTalfi 2015-12-28
 *
 * This button depends on
 * bootbox (http://bootboxjs.com/)
 *
 */
class DeleteSelectedRowsListButtonCode extends ListButtonCode
{

    private $confirmText;
    private $confirmBtnText;
    private $cancelBtnText;

    public function __construct()
    {
        parent::__construct();
        $this->text = "Delete";
        $this->confirmText = "Are you sure you want to delete the selected rows (this action is irreversible)?";
        $this->confirmBtnText = "Ok";
        $this->cancelBtnText = "Cancel";
    }

    public function render()
    {
        $text = $this->escape($this->text);
        $confirmText = $this->escape($this->confirmText);
        $confirmBtnText = $this->escape($this->confirmBtnText);
        $cancelBtnText = $this->escape($this->cancelBtnText);

        return <<<EEE
meredithButtonsFactory.deleteSelectedRows({
    text: "$text",
    confirmText: "$confirmText",
    confirmButtonTxt: "$confirmBtnText",
    cancelButtonTxt: "$cancelBtnText"
})
EEE;

    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setCancelBtnText($cancelBtnText)
    {
        $this->cancelBtnText = $cancelBtnText;
        return $this;
    }

    public function setConfirmBtnText($confirmBtnText)
    {
        $this->confirmBtnText = $confirmBtnText;
        return $this;
    }

    public function setConfirmText($confirmText)
    {
        $this->confirmText = $confirmText;
        return $this;
    }


}