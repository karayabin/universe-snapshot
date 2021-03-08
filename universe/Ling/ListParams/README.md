List Params
================
2017-08-07 -> 2021-03-05


A simple tool to help shaping front-end lists in a MVC environment.

This planet is a better version of the [ListModifier planet](https://github.com/lingtalfi/ListModifier), so
you should stop using the ListModifier tools and use the ListParams tools instead.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ListParams
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ListParams
```

Or just download it and place it where you want otherwise.




How to
===========

If you want a proper introduction to this planet, please read the [README-long-version](https://github.com/lingtalfi/ListParams/blob/master/doc/README-long-version.md) document.

Otherwise, here is my quick head-first tutorial.
I will be showing off a concrete example that I used in [ekom](https://github.com/KamilleModules/Ekom) (an e-commerce
module for [kamille](https://github.com/lingtalfi/kamille)), which I'm currently working on today (2017-08-18).


So, we have three parts:

- M: model
- V: View
- C: Controller


Each part has its own code that I will be showing off.

Let's start with the controller.

Note: since code comes from a production application, it will have parts that are not strictly relevant to our discussion.
I believe the reader (you) should be smart enough to make the distinction between what you really need and what I'm showing to you.

Plus, I will emphasize the relevant code, don't worry...



Controller
--------------

Let's start with the raw code:


```php
<?php


namespace Controller\Ekom\Front\Customer;


use Controller\Ekom\Front\CustomerController;
use Kamille\Utils\Claws\ClawsWidget;
use Module\Ekom\Api\EkomApi;


class InvoicesController extends CustomerController
{


    protected function prepareClaws()
    {
        parent::prepareClaws();


        $list = EkomApi::inst()->listBundleLayer()->getUserAccountInvoicesListBundle();

        $this->getClaws()
            ->setWidget("maincontent.invoicesListBundle", ClawsWidget::create()
                ->setTemplate("Ekom/Customer/Invoices/default")
                ->setConf([
                    'listBundle' => $list,
                ])
            );
    }
}
```


### Explanations

There is a lot of irrelevant code here.
In fact, the only thing that matters is that the Controller is thin, and basically does two things: 

- get the listBundle object from the model
- pass the listBundle object to the view


The code to get the listBundle from the model is this line:

```php
$list = EkomApi::inst()->listBundleLayer()->getUserAccountInvoicesListBundle();
```

The code to pass the listBundle to the view is this line:

```php
$this->getClaws()
    ->setWidget("maincontent.invoicesListBundle", ClawsWidget::create()
        ->setTemplate("Ekom/Customer/Invoices/default")
        ->setConf([
            'listBundle' => $list,
        ])
    );
```
Actually, this big line does a little more than just passing the listBundle to the view,
it also configure the whole view, but that's not the point of our discussion.


So now let's investigate what's inside the model: what's inside the gut of a listBundle object...


Model
-----------

If I remove a lot of irrelevant code from my model, I end up with the following code
which is the base code for the model which returns a listBundle (we are inside a model's method):


```php

<?php 

use Ling\ListParams\Controller\PaginationFrame;
use Ling\ListParams\Controller\SortFrame;
use Ling\ListParams\ListBundle\LingListBundle;
use Ling\ListParams\ListParams;
use Module\Ekom\Utils\E;
use Module\ThisApp\Api\ThisAppApi;


class MyExampleModel {

    public function getListBundle( $identifier ){
    
        $items = null;
        $params = null;
        $pagination = null;
        $sort = null;
        
        switch ($identifier) {
            case "customer.account.orders":
        
                $params = ListParams::create()->infuse();
        
                $userId = E::getUserId();
        
                $items = ThisAppApi::inst()->orderLayer()->getUserAccountOrderItems($userId, $params);
        
                $pagination = PaginationFrame::createByParams($params);
                $sortLabels = [];
                $fields = $params->getAllowedSortFields();
                foreach ($fields as $field) {
                    $sortLabels[$field] = __($field);
                }
                $sort = SortFrame::createByLabels($sortLabels, $params);
        
        
                break;
        }
        if (null !== $items) {
            return LingListBundle::createByItems($items, $params, $pagination, $sort);
        }
    }


}
```


### Explanations

The only thing to remember is that you create a listBundle by passing items to it (remember that the list bundle is 
passed to the view), and you configure it with some objects:

- ListParams: fetch the necessary params from the uri
- PaginationFrame: creates a model for a pagination widget
- SortFrame: creates a model for a sort widget


I encourage the reader to read the source code of those objects for a deeper understanding.


In fact, this line sums it all up:


```php
return LingListBundle::createByItems($items, $params, $pagination, $sort);
```


But we have one more question left:  how is the list of items shaped?

Since the list of items is specific to your application, it's your application that configures the items list.

You will be able to use the ListParams instance to know/fetch the user's intent.

In the above example, it starts with this line:

```php
$items = ThisAppApi::inst()->orderLayer()->getUserAccountOrderItems($userId, $params);
``` 

Notice that the ListParams is passed as the second argument of the getUserAccountOrderItems method.
Now if we investigate the content of the getUserAccountOrderItems method, we find something like this:


```php
    public function getUserAccountOrderItems($userId, ListParamsInterface $params = null)
    {

        $userId = (int)$userId;

        $q = "select id, reference, `date`, order_details from ek_order where user_id=$userId";
        $q2 = "select count(*) as count from ek_order where user_id=$userId";


        $markers = [];
        QueryDecorator::create()
            ->setAllowedSearchFields([
                'id',
                'reference',
                'date',
            ])
            ->setAllowedSortFields([
                'id',
                'reference',
                'date',
            ])
            ->decorate($q, $q2, $markers, $params);


        if (null !== $params) {
            $nbTotalItems = QuickPdo::fetch($q2, $markers, \PDO::FETCH_COLUMN);
            $params->setTotalNumberOfItems($nbTotalItems); // provide the nbTotalItems for the view
        }
        $rows = QuickPdo::fetchAll($q, $markers);
        
        // do other things...
        return $rows;
    }
``` 

So, as you can see, the model is really responsible for defining which fields are allowed to be sorted or searched.
And also the model uses the ListParams object to shape the list being returned.




View
-----------

Now the only thing left is to display the list bundle.
Here is my concrete code used in the example:


```php
<?php


use Kamille\Utils\ThemeHelper\KamilleThemeHelper;
use Ling\ListParams\ListBundle\ListBundleInterface;

use Module\ThisApp\Ekom\View\Customer\InvoiceTemplateRenderer;
use Module\ThisApp\Ekom\View\InfoTemplateRenderer;
use Module\ThisApp\Ekom\View\PaginationTemplateRenderer;
use Module\ThisApp\Ekom\View\SortTemplateRenderer;

KamilleThemeHelper::css("customer-all.css");


?>
<div class="widget widget-user-invoices">
    <h1 class="bar-red center thin">MY INVOICES</h1>
</div>
<?php


/**
 * @var $bundle ListBundleInterface
 */
$bundle = $v['listBundle'];
$items = $bundle->getListItems();
$pagination = $bundle->getPaginationFrame();
$sort = $bundle->getSortFrame();
$info = $bundle->getInfoFrame();





$renderer = InvoiceTemplateRenderer::create();
$sortRenderer = SortTemplateRenderer::create();
$paginationRenderer = PaginationTemplateRenderer::create();
$infoRenderer = InfoTemplateRenderer::create();


?>

<div class="widget-product-card-list" id="widget-product-card-list">


    <?php echo $infoRenderer->render($info->getArray()); ?>
    <div class="sort-element">
        <?php echo $sortRenderer->render($sort->getArray()); ?>
    </div>
    <div class="invoice-elements grid">
        <?php
        foreach ($items as $p) {
            $renderer->render($p);
        }
        ?>
    </div>
    <div class="pagination-element">
        <?php echo $paginationRenderer->render($pagination->getArray()); ?>
    </div>
</div>





```


### Explanations

As I said earlier, this code is specific to Kamille (and it's work in progress by the way since it's not translated yet...)
but you get the general idea:

- the different objects/things are accessed via the ListBundle instance
    - the items 
    - the PaginationFrame 
    - the SortFrame 
    - the InfoFrame: contains general info like the number of total items, the current offset, the number of items per page.
                    This object is created automatically by the default ListBundle and so we didn't have to manually
                    create it from the model. 
    
- then for each object that we want to display we use a Renderer (at least in this example, because we want to factorize
        the styling of those elements, but it could be hardcoded in the template also if we were in a rush...)


I will not give you all Renderer's code because it's too long, but I will give you the PaginationRenderer's code used
in the example, which is the simplest, and which gives you a more concrete idea of 
what's inside:



```php
<?php


namespace Module\ThisApp\Ekom\View;



use Kamille\Utils\ThemeHelper\KamilleThemeHelper;


/**
 *
 *
 * HOWTO
 * =========
 *
 *
 * <div class="pagination-element">
 *      <?php echo $paginationRenderer->render($pagination); ?>
 * </div>
 *
 *
 *
 *
 *
 *
 */
class PaginationTemplateRenderer
{

    public static function create()
    {
        return new static();
    }


    public function render(array $model = [])
    {

        KamilleThemeHelper::css("elements/pagination.css");


        ?>
        <div class="page-text">Page</div>
        <ul>
            <?php foreach ($model['items'] as $item):
                $sClass = (true === $item['selected']) ? ' class="active"' : '';
                ?>
                <li<?php echo $sClass; ?>><a href="<?php echo $item['link']; ?>"><?php echo $item['number']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php

    }
}
```

Basically, all renderers follow the same scheme: they have a render method which takes an array as its sole argument.

The code is just about displaying an html template and placing the values of the array inside of it... (boring) 







Related
============
[ListModifier](https://github.com/lingtalfi/ListModifier)




History Log
------------------

- 1.10.7 -- 2021-03-05

    - update README.md, add install alternative

- 1.10.6 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.10.5 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.10.4 -- 2017-10-04

    - fix PaginationFrame::createByOptions incorrect currentPage  
    
- 1.10.3 -- 2017-10-04

    - fix PaginationFrame::createByOptions default options overriding user options 
        
- 1.10.2 -- 2017-10-04

    - fix ListParamsUtil::getFormTrailByPool using value instead of keys (dumb error) 
    
- 1.10.1 -- 2017-10-04

    - fix SortFrame::createByOptions default options overriding user options 
    
- 1.10.0 -- 2017-10-04

    - add InfoFrameInterface 
    - add PaginationFrameInterface 
    - add SortFrameInterface 
    - add PaginationFrame::createByOptions method 
    - add SortFrame::createByOptions method 
    
- 1.9.0 -- 2017-10-04

    - add InfoFrame::createByOptions method 
    
- 1.8.3 -- 2017-09-29

    - fix PaginationFrame.createByParams division by zero 
    
- 1.8.2 -- 2017-09-27

    - fix ListParamsUtil.applyParams sort cmp function not working correctly 
    
- 1.8.1 -- 2017-09-27

    - fix ListParamsUtil.applyParams possible division by zero with nipp  
    
- 1.8.0 -- 2017-09-27

    - add ListParamsUtil.applyParams method  
    
- 1.7.0 -- 2017-09-27

    - add ListParamsInterface.getHash method  
    
- 1.6.0 -- 2017-08-23

    - add ListParamsInterface.setNumberOfItemsPerPage method  
    
- 1.5.0 -- 2017-08-23

    - ListParamsInterface.getNumberOfItemsPerPage now can return null  
    - now QueryDecorator.defaultNipp is used if nipp is null 
    
- 1.4.0 -- 2017-08-23

    - add QueryDecorator.setDefaultSort method 
    
- 1.3.0 -- 2017-08-18

    - add LingListBundle 
    
- 1.2.1 -- 2017-08-09

    - fix ListBundleInterface incorrect InfoFrame path 
    
- 1.2.0 -- 2017-08-09

    - add InfoFrame
    
- 1.1.0 -- 2017-08-09

    - fix QueryDecorator.decorate searchItems is now aware of existing where in the request
    - enhance QueryDecorator.decorate add single searchExpression handling
    
- 1.0.0 -- 2017-08-08

    - initial commit 
