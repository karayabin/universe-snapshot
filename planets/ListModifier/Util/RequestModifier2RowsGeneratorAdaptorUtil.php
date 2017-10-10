<?php


namespace ListModifier\Util;


use ListModifier\Circle\ListModifierCircle;
use RowsGenerator\RowsGeneratorInterface;

class RequestModifier2RowsGeneratorAdaptorUtil
{


    public static function decorate(RowsGeneratorInterface $gen, ListModifierCircle $circle)
    {
        $modifier = $circle->getRequestModifier();
        $searchItems = $modifier->getSearchItems();
        $sortItems = $modifier->getSortItems();


        $gen->setSortValues($sortItems);
    }

}