Morphic generator brainstorm
===========================
2018-02-12





Creating a morphic element by hand 
=========================
2018-02-12


This is what I do to create my morphic elements for the Ekom module.


1. BackHooksHelper (class-modules/Ekom/Back/Helper/BackHooksHelper.php)
    - open the file
    - choose the icon
    - add an item
    
```php
$item                
->addItem(Item::create()
     ->setActive(true)
     ->setName("product_group") // $elementName
     ->setLabel("Groupes de produits") // $elementLabel
     ->setIcon("fa fa-th-large")
     ->setLink(N::link("NullosAdmin_Ekom_ProductGroup_List")) // $elementRoute
)
```    


2. back.php (config/routsy/back.php)
    - add the route

```php
$routes["NullosAdmin_Ekom_ProductGroup_List"] = ["/ekom/product_group/list", null, null, "Controller\Ekom\Back\ProductGroup\ProductGroupListController:render"];
// $routes["$elementRoute"] = ["/ekom/$elementName/list", null, null, "Controller\Ekom\Back\ProductGroup\$(camelCase:$elementName)ListController:render"]; 

```     
    

3. The controller (/myphp/leaderfit/leaderfit/class-controllers/Ekom/Back/ProductGroup/ProductGroupListController.php)
    - path of the controller is guessed from $elementName
    - content of the controller:
```php
<?php

namespace Controller\Ekom\Back\ProductGroup;


use Controller\Ekom\Back\Pattern\EkomBackSimpleFormListController;

class ProductGroupListController extends EkomBackSimpleFormListController
{
    public function render()
    {
        return $this->doRenderFormList([
            /**
            * In Ekom: add "for this shop" when there is a shop_id column in the table
             */
            'title' => "Product group for this shop", // Product group is guessed from $elementName, or there is a translation table: $elementName2Label
            'breadcrumb' => "product_group", // $elementName
            'form' => "product_group", // $elementName
            'list' => "product_group", // $elementName
            'ric' => "id", // $ric
            'newItemBtnText' => "Add a new product group", // strtolower( $elementLabel ), in this example french/english are messed up, ignore it
            'newItemBtnRoute' => "NullosAdmin_Ekom_ProductGroup_List", // $elementRoute
        ]);
    }
}
```    


4. breadcrumb (class-modules/Ekom/Back/Config/EkomNullosConfig.php)
    - add a case:
```php
<?php

switch ($pageName) {
    case "product_group": // $elementName
        $item = [
            "label" => "Product group", // $elementLabel
            "route" => "NullosAdmin_Ekom_ProductGroup_List",  // $elementRoute
        ];
    break;
}
```        



5. morphic form

- config/morphic/Ekom/product_group.form.conf.php


    
    
Variables required:
- $elementName: product_group
- $elementLabel: Groupes de produits
- $elementRoute: NullosAdmin_Ekom_ProductGroup_List
- $elementName2Label: map to override default guessing of the generator
- $ric: either a simple string (often id), or an array


    