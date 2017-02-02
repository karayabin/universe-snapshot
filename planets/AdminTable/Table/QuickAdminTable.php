<?php

namespace AdminTable\Table;


class QuickAdminTable extends AdminTable
{

    public function setActionLink($id, $label, $func, $useConfirm = true)
    {
        $s = (true === $useConfirm) ? 'confirmlink' : '';
        $this->setSingleActionHandler($id, $func)
            ->setExtraColumn($id, '<a class="action-link postlink ' . $s . '" data-action="' . $id . '" data-ric="{ric}" href="#">' . $label . '</a>')
            ->setTransformer($id, function ($v, $item, $ric) {
                return str_replace('{ric}', $ric, $v);
            });
        return $this;
    }

}