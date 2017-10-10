TabathaCache
===========
2017-05-22



A cache system based on identifier invalidation.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import TabathaCache
```

Or just download it and place it where you want otherwise.


What it it?
==========

Tabatha cache is a sexy cache system based on identifier invalidation.

Why sexy?

Because you can do a cache retrieving with one statement!

Often, other cache systems force you to make at least an if block (which makes things all the sudden appear
very complex, it gets out of the way of your application logic, it parasites your code), that's not the case
with tabatha cache: just one statement.

Enjoy!




A quick example
=====================

Just to tease your appetite.

If you're new to tabatha cache, please go to the tutorial section below.


```php
//--------------------------------------------
// ANOTHER EXAMPLE FROM THE KAMILLE FRAMEWORK
//--------------------------------------------
$result = A::cache()->get('myCacheId', function () {
     // long operation
     $result = "resultOfLongOperation";
     return $result;
     }, [
         'ek_currency.create',
         'ek_currency.delete',
         'ek_currency.update',
         'ek_shop.*', // will be triggered by anything starting with "ek_shop."
 ]);
// now $result is available no matter what
// other dude create a record in the currency table
A::cache()->clean("ek_currency.create"); // this will remove the myCacheId entry



```




How does it work? 
=====================================

Tabatha is a two level cache system.

The first level implements a regular "store cache"/"retrieve cache" pattern,
while the second level implements a tagging/cleanByTag pattern.

The power of tabatha cache comes from the fact that you configure both levels with just one statement,
which makes it play very nicely with the existing code (almost no overhead). 


Even with the tutorial below, it can be hard to see in what use cases tabatha would be actually useful to your projects.

It might be worth understanding that tabatha was first created to answer a specific type of caching: database caching.
 
The idea that created tabatha was that making a sql request (fetch/fetchAll/count to be more precise) takes too much time, 
and so we need to cache the result of the sql request.

Now imagine you have a table named users, which contains all your users.

And you have a method named getUsers which gives you all the users of the database.

Let's say this method caches the result and returns it to you.

But now we have another problem.

The other problem tabatha solves (that's the second level) is the following:

When you create a new user in the database, you need to clean the cache right?

So, how do you clean the cache? Short answer, use a tag.

In tabatha, a tag is called a delete namespace, but it's basically the same thing (although a delete namespace is more
powerful than a simple tag):

you set a delete namespace when you set up the cache, and then to clean the cache you call that same delete namespace again,
using the "clean" method (from another part of your code).



So, the getUsers method could look like this for instance:


```php
    public function getUsers(){
        $result = ServiceContainer::get("tabatha")->get('MyClass.getUsers', function () {
             return QuickPdo::fetchAll("select * from users");
             }, [
            'users.create', // that's the delete namespace, we will need it to clean the cache
         ]);
    }
```

And then, if you use a system like [QuickPdo](https://github.com/lingtalfi/Quickpdo),
you can hook into it so that every time you make an insert statement it triggers the following code:

```php
ServiceContainer::get("tabatha")->clean("users.create");

```


This system works fine, it rocks!, UNTIL...


until you start to make complex request based on precise ids.

For instance, what imagine you want to request the addresses of a particular user (and imagine that requests
could be much more complex than that):



```php
    public function getUserAddresses($userId){
        $result = ServiceContainer::get("tabatha")->get("MyClass.getUserAddresse.$userId", function () {
             return QuickPdo::fetchAll("select * from user_address where user_id=" . (int) $userId );
             }, [
            'users', // hmm, not so efficient... 
         ]);
    }
```


As you can see, now we have a problem with choosing the delete namespace.

That's because imagine: your application is using this method, so basically, every time you request the method
it will create a cache entry.

But since your method will be called with different users, although the cache entries will be different (level1),
they will all be bound to the same delete namespace (at least in our example): "users".

This means that if you clean the cache with the delete id **"users"**, then all the caches will be deleted.
  
And now prepare yourself to see the real power of tabatha.
 
What if we did this instead?

```php
    public function getUserAddresses($userId){
        $result = ServiceContainer::get("tabatha")->get("MyClass.getUserAddresse.$userId", function () {
             return QuickPdo::fetchAll("select * from user_address where user_id=" . (int) $userId );
             }, [
            "users.$userId", // tadaa? 
         ]);
    }
```

Now, the delete namespace depends on the $userId.

Clever, right?

So if we trigger the clean method with a delete id of "users", nothing would happen, because there is ONE SIMPLE RULE
for cleaning: 

**THE DELETE ID MUST BE EQUAL TO THE DELETE NAMESPACE, OR CONTAINED IN IT**.
(See the tutorial to understand this rule better).

And "users" is not contained in "users.$userId" so it won't clean the cache.
However, if we use the delete id "users.$userId", it will trigger the cache.


By tweaking your system (I use QuickPdo) to trigger a cache cleaning based on the primary keys (for instance),
tabatha gives a cache system which works at the surgical precision of the row level of a database.

In other words, you delete only the cache for the rows that you want.
 
 
That's why tabatha was created in the first place.



 
 






Tabatha cache tutorial
========================
2017-06-08



Let's first create an instance of Tabatha Cache,
and configure the path to the cache dir, where all cache will reside.


```php
$cache = TaCache::create();
$cache->setDir(ApplicationParameters::get("app_dir") . "/cache/tabatha");
```



EXAMPLE1: CREATING AND RE-USING THE CACHE
======================


Now copy paste this and refresh your browser (or terminal, what have you)
  

```php
a($cache->get("mycacheId", function () {
  return "content of the cache, could be an array or anything that php can serialize";
}, [
  "deleteNamespace",
]));
```


The above example creates the following:


- $cacheDir/mycacheid.txt, (level1) this file contains the serialized cache content (what's returned by the creator function) 
- $cacheDir/$private/deleteNamespace.txt, (level2) contains an array which contains the subscribers for the 
                "deleteNamespace" delete namespace, and this array contain only one subscriber for now, which is mycacheid 



Refresh your browser (...) two times, the first time, the cache will be created,
the second time, the cache will be hit and the content will come from there.

From now on every time you refresh your browser the cache will take over...
 
 
...until you delete it, which is what we are going to see in the next example.



EXAMPLE2: CLEANING THE CACHE
===========================


Let's take back the snippet from example 1.
Notice the last argument: an array containing the "deleteNamespace" keyword.

As its name indicates, the "deleteNamespace" is called a delete namespace.

To clean the cache, we must call a delete identifier which is equal or below (contained in) this delete namespace.
Follow me on the next paragraph where I give you a concrete example...
 

```php
a($cache->get("mycacheId", function () {
    return "content of the cache, could be an array or anything that php can serialize";
}, [
    "deleteNamespace",
]));
``` 



...hey

So what do I mean by equal or below the delete namespace?

Well, in tabatha, a components are separated by the dot symbol (.).

So in our example the delete namespace is "deleteNamespace", which means that if my delete id is equal to "deleteNamespace",
or starts with "deleteNamespace." (notice the dot), then it will trigger the cleaning of the cache. 

Let's do it!

```php
$cache->clean("deleteNamespace.4.6");
```


See, deleteNamespace.4.6 is contained in the deleteNamespace namespace,
and therefore the mycacheId will be deleted, so, next time you refresh the browser,
the cache will be recreated.

Under the hood, what happens is that tabatha looks for the files corresponding to
all possible namespaces, from the bottom up like this:


- $cacheDir/$private/deleteNamespace.4.6.txt
- $cacheDir/$private/deleteNamespace.4.txt
- $cacheDir/$private/deleteNamespace.txt

And since our previous example created the file "$cacheDir/$private/deleteNamespace.txt",
tabatha will read it.
It will find an array which represents the list of subscribers for that delete namespace.

And so the array, from our previous example contains only one subscriber:

- mycacheId

Therefore, tabatha will delete the corresponding cache file:

- $cacheDir/mycacheId.txt

You don't need to remember all those details, in fact, I just put them for my personal
convenience because I tend to forget everything I do, and sometimes I need concrete details,

but just remember the most important thing: 

**TO CLEAN A CACHE, THE DELETE ID MUST BE EQUAL TO THE DELETE NAMESPACE, OR CONTAINED IN THE 
DELETE NAMESPACE.**

If you understand that, then you master the tabatha cache.

Cleaning the cache might seem counter-intuitive at first, so I'm giving you more examples in the
next paragraph, so that you really understand how it works.
 
 

MORE CLEANING
=================

Cleaning is really the most obscure area of tabatha, so let's put some light on the topic.


A namespace (in tabatha) is a dot separated word.

The following are all namespaces:


- deleteNamespace
- music
- music.jazz
- music.jazz.theSongOfTheYear
- table_customer
- table_customer.delete
- table_customer.create
- table_customer.update
- table_customer.update.4
- table_customer.update.4.6


So, all those examples above are candidates for being delete namespaces.

The funny thing is that they also could be delete ids (identifiers), but let's not rush too soon.

When you create a cache, you assign it any number of delete namespaces you want.

In our first example, I only assigned one delete namespace named "deleteNamespace" to not throw too much information at you.

However, if I want, I can assign the whole list of delete namespaces above, like this: 


```php
a($cache->get("mycacheId", function () {
    return "content of the cache, could be an array or anything that php can serialize";
}, [
    "deleteNamespace",
    "music",
    "music.jazz",
    "music.jazz.theSongOfTheYear",
    "table_customer",
    "table_customer.delete",
    "table_customer.create",
    "table_customer.update",
    "table_customer.update.4",
    "table_customer.update.4.6",
]));
``` 

The more delete namespaces you have, the more ways you have to clean your cache, but let's get back to our simple example:



```php
a($cache->get("mycacheId", function () {
    return "content of the cache, could be an array or anything that php can serialize";
}, [
    "deleteNamespace",
]));
``` 

To clean it, we can do any of the following:


```php
$cache->clean("deleteNamespace");
```
```php
$cache->clean("deleteNamespace.subnamespace");
```
```php
$cache->clean("deleteNamespace.pou");
```

```php
$cache->clean("deleteNamespace.pou.doo");
```
```php
$cache->clean("deleteNamespace.4.6");
```


Here are more examples in the form of a table



delete namespace            | delete id                     | will clean it?
-------------------------- | ------------------------------ | ----------------
deleteNamespace             | deleteNamespace               | yes
deleteNamespace             | deleteNamespace.4               | yes
deleteNamespace             | deleteNamespace.4.6               | yes
deleteNamespace.4             | deleteNamespace               | no (that's counter intuitive, but that's how it works, get used to it!)
deleteNamespace.4             | deleteNamespace.4               | yes
deleteNamespace.4             | deleteNamespace.4.6               | yes
deleteNamespace.4             | deleteNamespace.boobs               | no
deleteNamespace.4.6             | deleteNamespace.boobs               | no
deleteNamespace.4.6             | deleteNamespace.4               | no
deleteNamespace.4.6             | deleteNamespace.4.really               | no
deleteNamespace.4.6             | deleteNamespace.4.6               | yes
deleteNamespace.4.6             | deleteNamespace.4.6.boobs               | yes



So, NOW, I believe you understand.


**THE DELETE ID MUST BE EQUAL TO THE DELETE NAMESPACE, OR CONTAINED IN IT**,
that's the only rule to remember to use the cache cleaning system.























History Log
------------------    
    
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