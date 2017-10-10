<?php


namespace QueryFilterBox\Util\Helper;


use ListParams\Controller\InfoFrame;
use ListParams\Controller\PaginationFrame;
use ListParams\Controller\SortFrame;
use ListParams\ListBundle\ListBundle;
use ListParams\ListBundle\ListBundleInterface;
use ListParams\Util\ListParamsUtil;
use QueryFilterBox\ItemsGenerator\ItemsGenerator;

class ItemsGeneratorHelper
{


    /**
     * @param array $items
     * @param ItemsGenerator $generator
     * @param array $options
     * @return ListBundleInterface
     */
    public static function getBundleByItemsAndGenerator(array $items, ItemsGenerator $generator, array $options = [])
    {

        $options = array_replace([
            'namePage' => 'page',
            'nameSort' => 'sort',
            'nameSortDir' => 'asc',
            'formMethod' => 'get',
            'sortOptionsValue2Labels' => [],
        ], $options);


        $info = $generator->getInfo();


        $bundle = ListBundle::create();
        $bundle->setItems($items);
        $bundle->setInfo(InfoFrame::createByOptions([
            'nipp' => $info['nipp'],
            'nbTotalItems' => $info['nbTotalItems'],
            'page' => $info['page'],
        ]));


        $bundle->setPagination(PaginationFrame::createByOptions([
            'nipp' => $info['nipp'],
            'nbTotalItems' => $info['nbTotalItems'],
            'namePage' => $options['namePage'],
            'pool' => $info['pool'],
//            'linkFormatter' => 0,
        ]));


        $bundle->setSort(SortFrame::createByOptions([
            'nameSort' => $options['nameSort'],
            'nameSortDir' => $options['nameSortDir'],
            'pool' => $info['pool'],
            'value2Label' => $options['sortOptionsValue2Labels'],
            'formMethod' => $options['formMethod'],
            //
            'formTrail' => ListParamsUtil::getFormTrailByPool($info['pool'], [
                $options['nameSort'],
                $options['nameSortDir'],
            ]),
        ]));

        return $bundle;
    }
}