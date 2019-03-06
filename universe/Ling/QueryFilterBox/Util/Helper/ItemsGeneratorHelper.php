<?php


namespace Ling\QueryFilterBox\Util\Helper;


use Ling\ListParams\Controller\InfoFrame;
use Ling\ListParams\Controller\PaginationFrame;
use Ling\ListParams\Controller\SortFrame;
use Ling\ListParams\ListBundle\ListBundle;
use Ling\ListParams\ListBundle\ListBundleInterface;
use Ling\ListParams\Util\ListParamsUtil;
use Ling\QueryFilterBox\ItemsGenerator\ItemsGenerator;

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
            'sortFrame' => null,
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


        $sortFrame = $options['sortFrame'];
        if (null === $sortFrame) {
            $sortFrame = SortFrame::createByOptions([
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
            ]);
        }

        $bundle->setSort($sortFrame);

        return $bundle;
    }
}