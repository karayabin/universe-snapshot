<?php


namespace ModelRenderers\AdminSidebarMenu;


class BootstrapAdminSidebarMenuRenderer extends AdminSidebarMenuRenderer
{

    protected function getBadge(array $item)
    {
        $badge = $item['badge'];
        $type = $badge['type'];
        if('error' === $type){
            $type = 'danger';
        }
        return '<span class="label label-' . $type . ' pull-right">' . $badge['text'] . '</span>';
    }
}