<?php


namespace RowsGeneratorWidget\Util;


use RowsGeneratorWidget\Widget\RowsGeneratorWidgetInterface;

class RowsGeneratorWidgetUtil
{

    public static function getInfoArray($widgetName, RowsGeneratorWidgetInterface $widget, array $params = [])
    {


        $rows = $widget->getRows($params);


        $nbPages = $widget->getNbPages();
        $nipp = $widget->getNipp();
        $page = (int)$widget->getPage();
        $firstPageItem = ($page - 1) * $nipp + 1;
        $lastPageItem = $firstPageItem + $nipp - 1;
        return [
            'widgetName' => $widgetName,
            'rows' => $rows,
            'nbPages' => $nbPages,
            'nbItems' => $widget->getNbItems(),
            'nipp' => $widget->getNipp(),
            'firstPageItem' => $firstPageItem,
            'lastPageItem' => $lastPageItem,
            'page' => $page,
            'sortValues' => $widget->getSortValues(),
            'searchItems' => $widget->getSearchItems(),
        ];
    }

}