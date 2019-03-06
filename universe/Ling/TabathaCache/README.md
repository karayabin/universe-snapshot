TabathaCache
===========
2017-05-22


A tag-based cache system for your apps.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/TabathaCache
```

Or just download it and place it where you want otherwise.




Older Tabatha Cache
================
TabathaCache is currently in version 2.
If you want to see the old TabathaCache version 1, please browse the README.2018-06-08.md file in this repository.




TabathaCache 2
===================

TabathaCache2 is a tag-based cache system for your apps.

Tag based means you can attach tags to your cached entries,
and then later you can delete those cache entries just by using the tag identifiers.

Being able to add tags to your cache entries doesn't mean you HAVE TO do it.

In the "2 cache strategies" section, I'll discuss two different cache strategies
that one can implement using TabathaCache, one using the tags, and one not using them.


Structure
--------------

TabathaCache will store all it needs (cache entries, and delete id lists) to the filesystem.
A typical filesystem using TabathaCache will look like this (path starting with the dollar symbol are variables):

- $baseDir/:
     - cached_entries/
         - $cacheIdentifier.cache.php
         - ...
     - delete_ids/
         - $deleteId.list.php
         - ...


The "cached_entries" dir is where Tabatha puts all the cached entries..
Every file in this directory contains the serialized version of the cached thing.

Each file inside the "delete_ids" directory contains the list of "cache identifiers" ($cacheIdentifiers) to delete if
the $deleteId is given to the clean method.






Crash course
--------------------
The first method to learn is "get".

The "get" method creates a cache entry if necessary (i.e. if the content
you're asking has not been cached yet), and then returns the cached content.

The get method has two variations, one assigning tags to the cached entry, and one which doesn't.

Let's start with the one which doesn't assign tags, because it's shorter:

### Short form


```php
// assuming $cache is a well configured TabathaCache2 instance
$myCachedContent = $cache->get( "theCacheIdentifier", function(){
     return "some very long string";
});
```


With the code above, the first call will trigger the callback passed as the second argument, cache its output somewhere,
and return its output.

All subsequent calls (to the get method with the same cache identifier) will return the cached content.

To delete the cached entry: since we didn't specify any delete identifier, there is no delete tag bound
to our cache entry. This means we cannot use the clean method to delete our cache entries; we have to
use the cleanByCacheIdentifierPrefix method (or remove the cached entries manually).


### Long form

Same as the short form, but this time with the deleteIds argument defined.


```php
$myCachedContent = $cache->get( "theCacheIdentifier", function(){
     return "some very long string";
}, ["myDeleteId"]);
```

The deleteIds argument can be an array or a string. In this case an array was used.


So this example the "myDeleteId" tag was attached to our cached entry, and so we can use the clean method to delete it.
And of course, we can still use the cleanByCacheIdentifierPrefix method or the manual method also if we want to.




Ok, that's it for this tutorial.
We are halfway to the full understanding of TabathaCache now: we need to understand how to clean the cache now,
but I'll cover this topic in the next section (2 cache strategies).






2 cache strategies
=====================

Perhaps the best part of TabathaCache is that it lets you implement 2 different and complementary cache strategies.
In this section we are going to discuss both of them.

- organic cache strategy
- daily cache strategy



Organic cache strategy
------------------------

The organic cache strategy is when your cached entries are deleted live, at the pace of your app.
Your app feels organic/synced, because the cache entries are deleted as soon as their source is updated.

This cache strategy is done by using the following combination of methods:

- get (specifying the third argument: deleteIds)
- clean ($deleteId)


So for instance in your front app, you would place the get calls where you want,
and in your admin app (i.e. backoffice), you would trigger the corresponding clean calls, so that when the admin
user deletes or alter with a certain object, it deletes the corresponding cached entries used by the front.


There is something we need to know about this strategy: it creates arrays of delete ids in the delete_ids directory
handled by TabathaCache. And an array, as any variables in php, consume some memory.
That's one of the limitation of this strategy: if you have too many deleteIds, it might consume a lot of memory
when you trigger the clean method.
Note that the number of deleteIds (for a given delete identifier) is the number of different cached entries
bound to this particular delete identifier.



I personally use this type of cache to cache the output of an sql fetch query, and I use the table names
as deleteIds, which simplifies a lot of things (the best part being that the triggering of the clean method is done
only in one place: in a hook of the class which provides all sql queries)



This type of cache is best to use with cache entries which doesn't change much (i.e. not every day),
for instance in my app, there is a cms_page table which doesn't change much; maybe we add one or two pages by month.
That's a good candidate for the organic cache strategy.





Daily cache strategy
------------------------

The organic cache strategy works well with cache that don't change often, but what if the cache change often?

For instance, in an e-commerce module, we display the product pages, and the product lists.

Both of them have a cache that change often.

The product pages potentially change often because the query responsible for fetching the product info is joined
to many tables, thus creating potentially a lot of delete identifiers (one per table), and so potentially
changing often.

For the product lists, it's even more often: the sql query for generating a list depends on parameters such as:

- the page number
- the sort field
- the sort order
- the filters (for instance showing only products which have coupons of 20%)

And so the number of parameters grows exponentially; in such conditions the limit of the organic strategy start to appear
as every time the product change we would have to delete an awful lot of files.


Depending on how your app is wired, you might still consider the organic strategy as relevant for your system,
but the daily cache strategy is probably a better option.


The daily cache strategy is the technique of deleting your cached entries once a day (for instance at 03:00am, when
everybody sleeps), so that for a whole day, your app benefits the cache speed.

Of course your business model might/might not allow it, but if this is an option, then good for you.


Note: with a daily cache strategy, since there are too many files, often you will prefer let users create the cache
instead of creating the cache by advance; this means the first user landing on a cacheable page creates the cache
for all other users for the current day.



To implement this strategy, we will use the following combination of methods:

- get (without the deleteIds argument)
- cleanByCacheIdentifierPrefix (once a day at 03:00am...)


Note that we call get without specifying the deleteIds argument.
This creates a cache entries without any tag bound to id. We call that a persistent cache entry, as it will be there
forever until you delete it.

Next, we call the cleanByCacheIdentifierByPrefix method to flush all our caches again and again.

So, with this daily cache strategy the name of the cacheIdentifier will be important.

For instance, we could have name our cache identifeirs like this for lists:

- MyModule.fetchProductList.$pageNumber.$sortField.$sortDirection.$filter1Value.$filter2Value


This way, to delete all caches is a breeze:

```php
$cache->cleanByCacheIdentifierPrefix (  "MyModule.fetchProductList."  )
```


Conclusion
--------------

TabathaCache is a flexible cache system that covers your app by providing two
complementary cache strategies that can work in parallel.





Example
-----------


````php
<?php


use Core\Services\A;
use Ling\TabathaCache\Cache\TabathaCache2;


// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();
//ApplicationParameters::set("theme", "nullosAdmin");


//--------------------------------------------
// TABATHA CACHE 2 PLAYGROUND
//--------------------------------------------
// ORGANIC STRATEGY
//--------------------------------------------
$cache = TabathaCache2::create()
    ->setDir("/tmp/tabatha")
    ->addListener("cacheCreateBefore", function ($cacheIdentifier) {
        a("EVENT: cacheCreateBefore with cacheIdentifier $cacheIdentifier");
    })
    ->addListener("cacheHit", function ($cacheIdentifier) {
        a("EVENT: cacheHit with cacheIdentifier $cacheIdentifier");
    });


$var = $cache->get("var1", function () {
    return "Hello, I'm the var";
}, "group1");

a($var);

$var2 = $cache->get("var2", function () {
    return "Hello, I'm the var2";
}, "group1");

a($var2);


/**
 * Output so far:
 * string(50) "EVENT: cacheCreateBefore with cacheIdentifier var1"
 * string(18) "Hello, I'm the var"
 * string(50) "EVENT: cacheCreateBefore with cacheIdentifier var2"
 * string(19) "Hello, I'm the var2"
 *
 */

// now let's remove cache which has the delete identifier "group1" assigned to them
$cache->clean("group1");


// DAILY STRATEGY
//--------------------------------------------
$products = $cache->get("MyModule.getProducts.0a1.2fe.5gero", function () {
    return [
        [
            "name" => "red table",
            "price" => "9$",
        ],
        [
            "name" => "blue table",
            "price" => "10$",
        ],
    ];
});


$products2 = $cache->get("MyModule.getProducts.iii.dg7.0ze4", function () {
    return [
        [
            "name" => "green table",
            "price" => "7.5$",
        ],
        [
            "name" => "table light",
            "price" => "2.5$",
        ],
    ];
});


$cache->cleanByCacheIdentifierPrefix("MyModule.getProducts.");

/**
 * Output for the daily strategy (first call):
 * string(80) "EVENT: cacheCreateBefore with cacheIdentifier MyModule.getProducts.0a1.2fe.5gero"
 * string(79) "EVENT: cacheCreateBefore with cacheIdentifier MyModule.getProducts.iii.dg7.0ze4"
 *  
 */





````





History Log
------------------    
    
- 2.4.0 -- 2018-06-11

    - add TabathaCache2Interface.cleanByCacheIdentifierPrefix method
    
- 2.3.1 -- 2018-06-09

    - fix TabathaCache2.get method error with boolean deleteIds when array was expected

- 2.3.0 -- 2018-06-08

    - enhance TabathaCache2.get method, now better resist erroneous deleteIds parameter=false
    
- 2.2.0 -- 2018-06-08

    - add TabathaCache2.setIsEnabled method
    
- 2.1.0 -- 2018-06-08

    - enhance TabathaCache2.get method, now also cleans the delete list file after a clean call.
    
- 2.0.0 -- 2018-06-08

    - add TabathaCache2 class
    
- 1.5.0 -- 2017-06-08

    - wildcard system is now implicit
    
- 1.4.1 -- 2017-05-24

    - fix TabathaCacheInterface.clean method, deleteIds are now processed
    
- 1.4.0 -- 2017-05-24

    - add TabathaCacheInterface.setDefaultForceGenerate method
    
- 1.3.0 -- 2017-05-23

    - add TabathaCacheInterface.cleanAll method
    
- 1.2.0 -- 2017-05-23

    - add TabathaCacheInterface.get $forceGenerate option
    
- 1.1.0 -- 2017-05-23

    - add debug hooks
    
- 1.0.0 -- 2017-05-22

    - initial commit