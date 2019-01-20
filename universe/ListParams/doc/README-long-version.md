README-long-version
================
2017-08-08




What is mvc?
===============

Although there is plenty of resources explaining the concept of MVC,
there are so many variations that it becomes necessary to expose what we truly mean by MVC.

For us, MVC is this:

- M: the model, exposes the method that the developer can use. It's a stand alone model, which means the developer
    can create standalone scripts using the model, without using controllers.
    This layer contains the business logic (the application logic).
    
- V: the view, responsible for displaying the view data

- C: the controller, its role is to invoke the model's methods and pass their output to the view.
            This layer is thin because it's just a bridge between the model and the view.
            Like synapses in the brain, they connect/disconnect as the developer thinks. 
            

Which role is which?
======================

So now that the MVC context has been laid down, let's explain what we intend to do in terms of responsibilities
when it comes to create and display a list.


The model's role
-----------------

Creating the list is obviously a model task; but what about the list modifiers? (sort by, search, order by, pagination....).
They also belong to the model, because remember: we want our model to be standalone.
Plus, if you think about performances, the earlier you have all the params the better (for instance with a list
based on a mysql query, you can merge the list parameters with the query to produce one optimized request).



The controller's role
----------------------

Whence do you take the params? What are the name of the params?

Those are questions for the controller.

For instance, take the sort criteria. The name of the key will probably be "sort", but if you have multiple
lists on the same page, you need to differentiate them (for instance sort, sort-2, sort-3, ...).

The controller knows everything that it displays: it knows all the lists on the page, and thus it's responsible
for giving the name to the param keys.

Generally, the params comes from the uri, but they could come from the $_POST array or even the $_SESSION array.

That's also something the Controller can take care of.

As we said before, we try to have thin controllers (because it improves code readability and thus eases maintenance),
so this planet will provide one-liner tools that make the controller code very readable (see pseudo code below in the next section).



The view's role
-----------------
The view will obviously display the list, but also the accompanying widgets (sort selectors, search engine, pagination links, ...).
Those widgets can be factorized in objects, since they always do the same thing.




The desired pseudo code
------------------------


One of our goal is that the model decides which params are allowed.

So, our idea finally looks like this.


### at the Model level

M stands for model.

```php
array:rows   M.getItems ( ListParam param )
        q = select * from table_x;
        // for this example, the model only allows sorting on the price column
        sortItems = param->getSortItems();
        if( array_key_exists( "price", sortItems ) ){
            word = (true === sortItems[price]) ? asc : desc;
            q .= "order by price " . word;
        }
        return QuickPdo::fetchAll(q); 
```


### at the Controller level

M stands for model.
S stands for service container, which we assume your application provides.
V stands for view.


```php

param = ListParamFactory::from($_GET)::getListParam()->setSortName(sort); // long version 
param = ListParamFactory::getListParam(); // short version equivalent 
/**
* As you can imagine, the "from" method indicates the pool to get the list params from ($_GET in this case).
* Then, setSortName is called but sort is the default sortName, but this is just to give you an idea of the responsibilities distribution, in 
* case you needed to implement a page with multiple lists on it.
**/



rows = M.getItems ( param )

pagination = new PaginationRenderer( param )
sortBar = new SortBarRenderer( param )

V.render( [
    items: rows,
    pagination: pagination->getArray,
    sortBar: sortBar->getArray,
])
```






Implementation: first round
==========================

So let's duck type the php code for the model: here is my playground code:



```php
<?php 


class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";


        $allowedSearchFields = [
            'date',
            'reference',
        ];
        $allowedSortFields = [
            'id',
            'date',
        ];

        //--------------------------------------------
        // QuickPDO: about query embellishment/decoration
        //--------------------------------------------
        $markers = [];
        if ('searchItems' && null !== $params) {
            $searchItems = $params->getSearchItems();

            if ('simple searchItem array') {
                if ($searchItems) {
                    $valid = false;
                    $markerCount = 0;
                    foreach ($searchItems as $field => $searchItem) {
                        if (in_array($field, $allowedSearchFields)) {

                            if (false === $valid) {
                                $q .= " where ";
                                $valid = true;
                            }

                            if (0 !== $markerCount) {
                                $q .= " and ";
                            }
                            $marker = "m" . $markerCount++;
                            if (is_int($searchItem)) {
                                $q .= "$field = " . (int)$searchItem;
                            } else {
                                $q .= "$field like :$marker";
                                $markers[$marker] = '%' . str_replace('%', '\%', $searchItem) . '%';
                            }

                        } else {
                            // ?onSearchFieldNotAllowed
                        }
                    }
                }
            } else {
                throw new \Exception("Oops, this form of searchItem is not recognized yet, you may want to upgrade the code");
            }

        }


        if ('order' && null !== $params) {
            $sortItems = $params->getSortItems();
            $valid = false;
            $c = 0;
            foreach ($sortItems as $field => $isAsc) {
                if (in_array($field, $allowedSortFields)) {
                    if (false === $valid) {
                        $q .= " order by ";
                        $valid = true;
                    }

                    if (0 !== $c++) {
                        $q .= ', ';
                    }

                    $q .= "$field ";
                    if (true === $isAsc) {
                        $q .= 'asc';
                    } else {
                        $q .= 'desc';
                    }
                } else {
                    // ?onSortFieldNotAllowed
                }
            }
        }


        if ('useLimit' && null !== $params) {
            if (null !== ($limit = $params->getLimit())) {
                list($offset, $length) = $limit;
                $q .= " limit $offset, $length";
            }
        }

        a("query");
        a($markers);
        a($q);
        az(QuickPdo::fetchAll($q, $markers));

    }
}

$params = ListParams::create()
    ->setLimit(0, 2)
    ->addSearchItem("reference", "2017")
    ->addSortItem("id", false);

$model = new Model();
$model->getOrderItems($params);

az("kk");
```


As we can see, the model codespace has total control on how it will use the params (ListParams):
it can decide to ignore totally the params, or use some of it.
It also controls which fields are allowed for sort and search.

So, everything is WHERE it should be, let's do some factorizing.
We can abstract the decoration of the query, at least for sql oriented lists, so let's do that.


(few minutes later...)

Okay, now the QueryDecorator class is available, and it basically allows us to do the same code 
as above with less lines of code, like this:


```php
<?php
class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";
        $markers = [];

        QueryDecorator::create()
            ->setAllowedSearchFields([
                'date',
                'reference',
            ])
            ->setAllowedSortFields(['id',
                'date',])
            ->decorate($q, $markers, $params);

        a("query");
        a($markers);
        a($q);
        az(QuickPdo::fetchAll($q, $markers));

    }
}

$params = ListParams::create()
    ->setPage(1)
    ->setNumberOfItemsPerPage(2)
    ->addSearchItem("reference", "2017")
    ->addSortItem("id", false);

$model = new Model();
$model->getOrderItems($params);
```


So now, the Model part (M of MVC) is done, let's move on to the Controller part.



Search modes
===============

Wait! Not so fast, I forgot something.
In the previous code, I made the assertion that the model would use search items.

But on second thought, that might not be always the case.

Let's dive more into the different search modes a model could use: I've found the following modes:


- single search term:
        the user only says the "expression" she wants to find, and the model takes care of the details.
        In this mode, the developer sets a list of fields to search, and everytime the user performs a search all
        fields are searched.
        
        
- multiple search terms:
    The model accepts multiple search items. Different modes exist, depending on the complexity required to set them up:

        - and equal: in the "and equal" mode, the user can make this type of searches:
        ```txt
        search items where name contains "Pier" and age=46
        ```
        - full: in the "full" mode, the user can make any search, including complex or and/or and combination
                with grouping, and the full spectrum of comparison operators (equals, like%, %like, !=, ...)
                 


MMmm, so now the Model can also decide which search mode it will use.


(few minutes later...)

I've updated my ListParams code which now accepts simple search expressions.  





Implementation: second round
==========================

So this code...

```php
$params = ListParams::create()
    ->setPage(1)
    ->setNumberOfItemsPerPage(2)
    ->addSortItem("id", false);
```

...looks nice and is useful for standalone scripts.

However, it's not dynamic.

The user should be able to modify those parameters.

When the list is displayed, we will display accompanying widgets (sortBar, pagination links,
search engine,...), and the user will interact with those widgets.

So, how do we inject user's choices into the ListParams instance?



Since the code comes from the user, we will probably fetch it from the $_POST array, or $_GET array, or from the uri.
In every case I believe it's safe to assert that we can retrieve the parameters from a pool ($_POST, $_GET, ...),
which is nothing more than a map (a simple associative php array).


Another nice things is that there is not a huge number of list modifiers out there (just sort, search and pagination, and
maybe a couple more like a list info, but not an infinity), and so we can afford to give name to their properties.

So, here is the names we need for our implementation so far:

- related to sort
    - nameSort: defines the field to sort the list with.
                    By default: "sort"
    - nameSortDir: defines whether the sort is ascendant or descendant.
                    By default, I suggest the name "asc", which value can be 1 or 0 (1 means true, 0 means false).
- related to pagination
    - namePage: defines the page to display.
                    By default: "page"
    - nameNipp: defines the number of items per page.
                    By default: "nipp" 
- related to search
    - nameSearchExpression: defines the name of the search expression to search for
                    By default: "search" 
    - nameSearchItems: defines the array of search items in the scope of the "and equal" mode only.
                    By default: "search-items", an array of field => expression

    Note: the "full" mode is not implemented yet




I will add two methods to ListParams:

- setPool, to set the pool, which by default will be $_GET
- infuse, which injects the pool values into the ListParams instance, based on the names.
            infuse needs to be called by the Controller if necessary.
            It basically does the job of injecting user variables into the ListParams instance.
            Do not call this from the Model, because it would prevent/dissuade a developer from 
            using the model method as a stand alone tool.
            
            
            
Plus, I will add setter for every name described above.


So, now our Controller can call the infuse method like this:


```php
<?php

class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";
        $markers = [];

        QueryDecorator::create()
            ->setAllowedSearchFields([
                'date',
                'reference',
            ])
            ->setAllowedSortFields(['id',
                'date',])
            ->decorate($q, $markers, $params);

        a("query");
        a($markers);
        a($q);
        az(QuickPdo::fetchAll($q, $markers));

    }
}


$_GET['page'] = 1;
$_GET['nipp'] = 2;
$_GET['search-items'] = ['reference' => "2017"];
$_GET['sort'] = "id";
$_GET['asc'] = "0";

$params = ListParams::create()->infuse();

$model = new Model();
$model->getOrderItems($params);
```

As we can see, the ListParams configuration is now driven by the $_GET params.


The last thing we need to do is tackle the view.




The model and the total number of items
---------------------------------

Wait! I forgot something again: the number of items.

The number of items will be used in widgets like pagination or a list info widget.

But what's specific about the "number of items" is that it depends from the list; 
in other words it comes from the model.


So, let's add a method to the ListParams instance:

- setTotalNumberOfItems: int


This method needs to be called by the model if the model wants the widgets to have
visibility on it (necessary in widgets like pagination and list info as said above).


Also, this impacts our previous code: my technique for retrieving the total number of items as far
as sql is concerned is to use two queries (I know that there is a technique with one query, but some
say it's less performant, I don't know...).

This means we need to change our previous code to this:



```php
<?php

class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";
        $q2 = "select count(*) as count from ek_order";
        $markers = [];

        QueryDecorator::create()
            ->setAllowedSearchFields([
                'date',
                'reference',
            ])
            ->setAllowedSortFields(['id',
                'date',])
            ->decorate($q, $q2, $markers, $params);

        a("query");
        a($markers);
        a($q);
        a($q2);
        a(QuickPdo::fetch($q2, $markers, \PDO::FETCH_COLUMN)); // here we access the total number of items
        az(QuickPdo::fetchAll($q, $markers));

    }
}


$_GET['page'] = 1;
$_GET['nipp'] = 2;
$_GET['search-items'] = ['reference' => "2017"];
$_GET['sort'] = "id";
$_GET['asc'] = "0";

$params = ListParams::create()->infuse();

$model = new Model();
$model->getOrderItems($params);
```



Ok.

Important note: this also means the view initialization code needs to be AFTER the call
to the model method that returns the items list.





Implementation: third round
==========================

Ok, so now let's really dive into the View.
We will start from the Controller, since the Controller initialize the view.

In my previous tries to a perfect mvc implementation, I called "Model" the array
representing any object that we pass to templates.

I like the concept, because arrays are very basic and flexible.
However, I don't like the name "Model" anymore, because it conflicts with the MVC's model,
so it creates confusion.

I found a new word: frame, and hopefully that will do.


So, the idea I'm used to is that a Controller calls the View and passes variables to it.

In the case of a list with widgets, it's a good idea to pass different set of variables,
each set representing a particular widget.

This corresponds to the following pseudo-code that I wrote earlier in this document
(which is Controller code):

```php
V.render( [
    items: rows,
    pagination: pagination->getArray,
    sortBar: sortBar->getArray,
])
```

As you can see, the list has its own set of variables, the pagination has also its own set
of variables, and so does the sortBar widget.

Now the frame is the object that has this getArray method.
The idea is that the set of variables for the pagination widget will not change much
from a list to another, and thus we factorize it into a frame for re-usability purpose 
(and we will save lines of code when coding the next list).


 
So, let me code the different (default) frames first...


(few minutes later...)

 
So I coded a PaginationFrame object, and I spotted a potential problem I need to explain.



List modifiers params persistence
------------------------------------

At this point, we have defined the whole set of list modifiers, we have three of them:

- pagination (slicing of the result)
- sort (asc or desc, and by which field(s) to sort)
- search


Eventually those modifiers will turn into widgets with which the user can interact.
And so a question arise, or should I say at least three question arise:

- when the user changes the pagination, do the sort and search persist?
- when the user changes the sort, do the page and search persist?
- when the user changes the search, do the page and sort persist?


So we should be able to decide that using the ListParams instance, by adding the following methods:

- hasPersistentPage
- hasPersistentSort
- hasPersistentSearch



By default, I believe data should be persistent, so the default values of 
all the corresponding properties would be true.


An important note: this persistency problem is bound only to a given list, 
which means if we have multiple lists on the same page, each list handles its own persistence
without affecting the other list's persistency.
This observation might be useful for the implementation.


I had already made this observation in the past and it led me to 
implement the [List modifier](https://github.com/lingtalfi/ListModifier),
but unfortunately the conception behind the "list modifier" code isn't as clear as this brand new conception 
of the ListParams planet. That's just progress I guess.


So the Frame author will need a helper to remove non persistent data from a given list's parameters.


(few minutes later...)

The ListParamsUtil was created for that purpose.


```php
ListParamsUtil::removeNonPersistentParams($uriParams, $params, 'page');
```



Translation
----------------

Then we have the big problem of translation.
I believe the best solution is to create an application level __ (double underscore)
function, which handles all translations of the application.

Even at the framework level I would use such mechanism.

The biggest drawback being that your code now has an external dependency, 
and depends on a function that has to be created.

However, having experimented the other way around (where you create a translator service
that you pass, and pass, and pass), it seems to me that in the end, even if your code
doesnt' seem to have external dependencies from an oop structure's perspective,
your code is still dependent from at least one translation mechanism.

And as far as I can tell, having only ONE translation mechanism is better than having
more than one translation mechanisms.

So, if ONE only mechanism is necessary, why not simplify the calls to it.
Typing two underscores is faster than any oop mechanism, since it belongs to the php functions
and you can invoke them directly.

You still can invoke a service behind, the double underscore function being just a proxy to your
application translation logic.

I like to think of translation as a paradigm, and a function that should be encoded 
at the php level, and so the double underscore function emulates this mechanism.

Not everybody will agree with me, but translation is a complex mechanism, and this is the
method I prefer the most so far: simple and to the point.


That being said: the question of WHERE should we use the translation function remains unanswered.




At the beginning of this document, I said that our controller code should look like this:


```php

param = ListParamFactory::from($_GET)::getListParam()->setSortName(sort); // long version 
param = ListParamFactory::getListParam(); // short version equivalent 
/**
* As you can imagine, the "from" method indicates the pool to get the list params from ($_GET in this case).
* Then, setSortName is called but sort is the default sortName, but this is just to give you an idea of the responsibilities distribution, in 
* case you needed to implement a page with multiple lists on it.
**/



rows = M.getItems ( param )

pagination = new PaginationRenderer( param )
sortBar = new SortBarRenderer( param )

V.render( [
    items: rows,
    pagination: pagination->getArray,
    sortBar: sortBar->getArray,
])
```



Well, now I think it should be much thinner, and I see some problems in it.

For instance the sortBar instantiation:

```php
sortBar = new SortBarRenderer( param )
```

Actually, the SortBarRenderer instance has been replaced by the SortListFrame as we've seen earlier
in this document.
SortListFrame comes from this planet: the ListParams planet.

Although I just explained that at some point it's inevitable that one needs to pick up a translation mechanism,
I believe at the planet level this decision should be avoided if possible.
In other words, translation mechanism should be chosen by a code bound to an application or an 
application oriented framework like kamille, but not at the planet level, which is a general "application agnostic" toolbox.  

Still, the SortListFrame needs to be translated: there is a selector that contains the labels of the
allowed sort fields.

So rather, I believe the Controller code should look like this:



```php

list = M.ListFactory::getList("orders")
// room for customization if needed


V.render( [
    list: list
])
```


Many things to say about that code:

- the code is more concise 
- the code is still customizable by the controller, but all the default values have been chosen before hand by the model,
        so that we can leave the code as is (enhancement of re-usability) 
- the ListFactory object basically encapsulates all the translation problem, or more generally the customization
            of all list widgets 
- the ListFactory returns a List object, which we can imagine is an object composed of multiple widgets (more on that later)
- now an object is passed to the template instead of an array 




So, as we can imagine, the List object would have methods like this:

```php
PaginationFrame|false           list->getPagination()
SortFrame|false                 list->getSort()
SearchExpressionFrame|false     list->getSearchExpression()
SearchItemsFrame|false          list->getSearchItems()
```

And the returned Frames would have its dynamic parts translated as you might have guessed.

Note that SortListFrame has been renamed SortFrame.



Before we can implement such code though, we need to abstract things, one at the time.


First, let's inject the translation in the mix. We will use the allowedSortFields as the basis for our translation.


```php
class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";
        $q2 = "select count(*) as count from ek_order";

        $markers = [];
        QueryDecorator::create()
            ->setAllowedSearchFields([
                'date',
                'reference',
            ])
            ->setAllowedSortFields(['id',
                'date',])
            ->decorate($q, $q2, $markers, $params);


        $nbTotalItems = QuickPdo::fetch($q2, $markers, \PDO::FETCH_COLUMN);
        $params->setTotalNumberOfItems($nbTotalItems); // provide the nbTotalItems for the view

        $rows = QuickPdo::fetchAll($q, $markers);
        // hooks decorate rows?
        return $rows;

    }
}


$_GET['page'] = 1;
$_GET['nipp'] = 2;
$_GET['search-items'] = ['reference' => "2017"];
$_GET['sort'] = "id";
$_GET['asc'] = "0";


$params = ListParams::create()->infuse();
$model = new Model();
$model->getOrderItems($params);

$pagination = PaginationFrame::createByParams($params);

$sortLabels = [];
$fields = $params->getAllowedSortFields(); // the ListParams knows the allowed sort fields since the call to the model.getOrderItems method (QueryDecorator)
foreach($fields as $field){
    $sortLabels[$field] = __($field); // So here is the application's translation mechanism exposed for the first time
}
$sort = SortFrame::createByLabels($sortLabels, $params);


//--------------------------------------------
// VIEW PART (imagine)
//--------------------------------------------
a($pagination->getArray());
a($sort->getArray());
```




And then, creating the ListBundle:


```php

class Model
{
    public function getOrderItems(ListParamsInterface $params = null)
    {
        $q = "select id, reference from ek_order";
        $q2 = "select count(*) as count from ek_order";

        $markers = [];
        QueryDecorator::create()
            ->setAllowedSearchFields([
                'date',
                'reference',
            ])
            ->setAllowedSortFields(['id',
                'date',])
            ->decorate($q, $q2, $markers, $params);


        $nbTotalItems = QuickPdo::fetch($q2, $markers, \PDO::FETCH_COLUMN);
        $params->setTotalNumberOfItems($nbTotalItems); // provide the nbTotalItems for the view

        $rows = QuickPdo::fetchAll($q, $markers);
        // hooks decorate rows?
        return $rows;

    }
}


$_GET['page'] = 1;
$_GET['nipp'] = 2;
$_GET['search-items'] = ['reference' => "2017"];
$_GET['sort'] = "id";
$_GET['asc'] = "0";





$params = ListParams::create()->infuse();
$model = new Model();
$items  = $model->getOrderItems($params);
$pagination = PaginationFrame::createByParams($params);
$sortLabels = [];
$fields = $params->getAllowedSortFields();
foreach($fields as $field){
    $sortLabels[$field] = __($field);
}
$sort = SortFrame::createByLabels($sortLabels, $params);
$list = ListBundle::create()
    ->setListParams($params)
    ->setItems($items)
    ->setPagination($pagination)
    ->setSort($sort);



//--------------------------------------------
// VIEW PART (imagine)
//--------------------------------------------
a($list->getListItems());
a($list->getPaginationFrame()->getArray());
a($list->getSortFrame()->getArray());
```



Now the only step left is to create the factory, but you will have to do it for yourself,
because I can't possibly know the details of every list.



Conclusion
=============

So in short, for a ListParam list, the model should be executed first,
because it will create the following info:

- totalNumberOfItems 
- allowedSortFields
- allowedSearchFields

and then the widgets (frames) should be instantiated.
















