Hybrid list controls
========================
2017-11-17


[![hybrid-list-and-controls.jpg](http://lingtalfi.com/img/universe/HybridList/hybrid-list-and-controls.jpg)](http://lingtalfi.com/img/universe/HybridList/hybrid-list-and-controls.jpg)




Hybrid controls are like listeners attached to an hybrid list.

They react to parameters in the uri and shape the list items accordingly.



So for instance we can add a control that reacts to te "page" parameter in the uri,
and which paginate the list items (to make slices of equal lengths).

Another common control is the "sort" control, which react to a sort parameter and sort the list items
(either by changing the generating sql request, or by filtering the items using php).



In the end, controls allow us to build configured instances of hybrid lists.
In other words, we can store more powerful instances of hybrid lists and RE-USE them.

Thanks to controls, it's also trivial to handle multiple lists with widgets on the same page.
For instance, we could create one hybrid list with one sort control, and set the react name to sort,
and another hybrid list with a second sort control, this time reacting to the name "sort2".




```php
<?php

//--------------------------------------------
// multiple hybrid list instances on the same page, base principle...
//--------------------------------------------
$list1 = HybridList::create()->addControl("sort", ProductSortHybridListControl::create()->setSortName("sort"));
$list2 = HybridList::create()->addControl("sort", ProductSortHybridListControl::create()->setSortName("sort2"));
```




Example of a sort control
================================

```php
<?php


namespace Module\Ekom\HybridList\HybridListControl\Sort;


use HybridList\HybridListControl\HybridListControl;
use HybridList\HybridListInterface;
use HybridList\ListShaper\ListShaper;


/**
 *
 * The returned model is the sort component of a listBundle model
 * https://github.com/lingtalfi/Models/tree/master/ListBundle
 *
 */
class ProductSortHybridListControl extends HybridListControl
{

    private $attrNames;
    private $_alreadyReacted;
    private $_input;
    private $sortName;

    public function __construct()
    {
        parent::__construct();
        $this->attrNames = [];
        $this->_alreadyReacted = false;
        $this->_input = null;
        $this->sortName = 'sort';
    }

    public function prepareHybridList(HybridListInterface $list, array $context)
    {


        //--------------------------------------------
        // SHAPE REQUEST
        //--------------------------------------------
        $list
            ->addListShaper(ListShaper::create()
                ->reactsTo($this->sortName)
                ->setExecuteCallback(function ($input, array &$boxes, array &$info = [], $originalBoxes) use ($context) {

                    $sortFn = null;
                    $this->_input = $input;
                    switch ($input) {
                        case "label_asc":
                            $sortFn = function ($boxA, $boxB) {
                                return $boxA['label_flat'] > $boxB["label_flat"];
                            };
                            break;
                        case "label_desc":
                            $sortFn = function ($boxA, $boxB) {
                                return $boxA['label_flat'] < $boxB["label_flat"];
                            };
                            break;
                        case "price_asc":
                            $sortFn = function ($boxA, $boxB) {
                                return $boxA['priceSaleRaw'] > $boxB["priceSaleRaw"];
                            };
                            break;
                        case "price_desc":
                            $sortFn = function ($boxA, $boxB) {
                                return $boxA['priceSaleRaw'] < $boxB["priceSaleRaw"];
                            };
                            break;
                        case "popularity":
                            $sortFn = function ($boxA, $boxB) {
                                return $boxA['popularity'] < $boxB["popularity"];
                            };
                            break;
                        default:
                            break;
                    }

                    if (null !== $sortFn) {
                        usort($boxes, $sortFn);
                    }


                })
            );
        return $this;
    }

    public function setSortName($sortName)
    {
        $this->sortName = $sortName;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function getModel()
    {

        if (empty($this->model)) {
            $input = $this->_input;
            if (null === $input) {
                $input = 'label_asc'; // default sort
            }
            $this->model = [];
            $sorts = [
                'price_asc' => 'Par prix croissant',
                'price_desc' => 'Par prix décroissant',
                'label_asc' => 'De A à Z',
                'label_desc' => 'De Z à A',
                'popularity' => 'Par popularité',
            ];

            $items = [];
            foreach ($sorts as $value => $label) {
                $selected = ($value === $input);
                $items[] = [
                    "value" => $value,
                    "label" => $label,
                    "selected" => $selected,
                ];
            }
            $this->model = [
                'sortName' => $this->sortName,
                'items' => $items,
            ];

        }
        return $this->model;

    }

}
```




The SqlPaginatorHybridListControl control
========================================
2017-12-01


Use this control to react to the page variable and create your pagination system.


How to
-----------

```php
$userId = 1;
$pool = [
    'sort' => "date_asc",
    'sort' => "amount_asc",
    'page' => "2",
];
$sqlRequest = SqlRequest::create();
$hybridList = HybridList::create()
    ->setListParameters($pool)
    ->setRequestGenerator(SqlRequestGenerator::create()
        ->setSqlRequest($sqlRequest
            ->addField("*")
            ->setTable("ek_order")
            ->addWhere("and user_id=" . (int)$userId)
        )
    );


$hybridList->addControl("sort", OrderSortHybridListControl::create());
$hybridList->addControl("slice", SqlPaginatorHybridListControl::create()->setNumberOfItemsPerPage(1));

$info = $hybridList->execute();
a($info);

```






