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
 ]);
// now $result is available no matter what
// other dude create a record in the currency table
A::cache()->clean("ek_currency.create"); // this will remove the myCacheId entry



```




How does it work? 
=====================================

There are three things to understand to use tabatha cache:

- the cache identifier
- the delete identifiers
- the triggers


If you execute the example below:

```php
$result = A::cache()->get('myCacheId', function () {
    // long operation
    $result = "resultOfLongOperation";
    return $result;
}, [
    'ek_currency.create',
    'ek_currency.delete',
    'ek_currency.update',
]);
```


tabatha will create the following structure:


```txt
- $cacheDir/
----- myCacheId.txt
----- _private_xxx_/
--------- ek_currency.create.txt
--------- ek_currency.delete.txt
--------- ek_currency.update.txt
```


The cache identifier
------------------------

The **$cacheDir/myCacheId.txt** file contains the content (serialized) of the cache.

When you call the get method, if this file exist, Tabatha will use it, otherwise, Tabatha
will create it.

Notice that the path of that file is named after the cache identifier and the file is located
at the root of the **$cacheDir**.


The delete identifiers
-----------------------

Then, all the files in the **\_private_xxx** directory are special files named **deleting files**.

What's special about them is that you can invoke them to delete one or more cache content.

Basically, a **deleting file** contains a list of **cache identifiers** to delete.

So, if you invoke a **deleting file**, it loops over the list it contains and remove the corresponding
cache content files.

The last thing you need to know is how to trigger a **deleting file**.
That's what you will discover in the next section.


The triggers
-----------------

The trigger is an abstract identifier (a string if you will), that you pass to the **Tabatha.clean** 
method in order to invoke the corresponding **deleting files**.

You can pass either a string or an array of string (to trigger multiple **deleting files** at once).

However, there is one rule to know here

- consider the **deleting file** as a chain of dot separated components (for instance mytable.method)
- then the rule is that to trigger a **deleting file**, you can use either the **deleting file** chain, 
        or any longer chain.


This means that if your **deleting file** chain looks like this:

- ek_currency.create

you can trigger the **deleting file** by using any of the following chains:

- ek_currency.create
- ek_currency.create.a
- ek_currency.create.doo
- ek_currency.create.doo.poo
- ek_currency.create.5.2.4




Conclusion
-------------
So now you know everything you need to know.
With a bit of imagination, you can do pretty kool things with Tabatha cache.


 
















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