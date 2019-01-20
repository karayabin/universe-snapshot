Save
======
2017-08-31 -> 2017-09-05


This follows up and supersedes the **save-2017-08-31.md** document.




It's all about convenience for the client developer (us).


Motivation
==============

Why change the save system? what was wrong with the old system?


With the new system presented below, given a table with a primary key AND unique indexes,
it is easy to lead the SaveOrm to trigger either an update using the primary key to update unique indexes, or, 
an update using unique indexes to update primary key.
 
Imagine the following table with both a primary key and one unique index:

- user
    - id: pk 
    - email: uk 
    - gender: 1 
 

Then, the new system allows us to do both requests easily without ambiguity:
 
```php
update user set email='aaa' where id=6
update user set id=7 where email='aaa'
```






The save method behaviour: how to use SaveOrm
===========================

When we associate multiple objects together and then call the save method, to fully understand how save work
means understanding two things:

- how relationships are prioritized 
- how saving one object work


Relationships priorities
--------------------

Here is what the ObjectManager (the object that actually save all objects) prioritize relationships compared
to the originalObject:


- save siblings first (as their "results" are injected into the originalObject)
- save originalObject (the "result" of the original object is now available)
- save bindings after the originalObject (as the original object's result is only now available)
- save children after the originalObject (as the original object's result is only now available)
 


Saving one object
--------------------

An important question that occurs inside the ObjectManager when it comes to saving an object
is whether it should try to insert into the database, or update an existing record in the database.


What would you do with the following code: insert or update?

```php
ProductCardLangObject::create()
    ->setSlug("the_card_slug")
    ->setLang($lang)
    ->setLabel("the card label")
    ->save($savedResults);
```


The section below explains how SaveOrm handles this problem.

What's important to understand, and that is not said elsewhere except for the source code,
is that the ObjectManager uses 2 different modes:

- insert mode
- update mode


In insert mode, the saving is an insert operation.
In update mode, we first try to fetch whether or not the record exist, and if it does it's an update operation,
or if it fails we try the insert operation.

In both cases, a failing insert throws an exception: there is no quiet mode, or ignore failure mode,
as SaveOrm considers that allowing such a mode would lead to undesirable behaviour
(this might change in the future).
 
 
### How do we trigger those modes?

By default, when we create an object, it's always in insert mode.


The following object is in insert mode:

```php
ProductCardLangObject::create()
    ->setSlug("the_card_slug")
    ->setLang($lang)
    ->setLabel("the card label")
    ->save();
```


The **ONLY WAY** to trigger update mode is to call a createByXXX method.

The following object is in update mode: 

```php
ProductCardLangObject::createBySlugLangId("the_card_slug", $lang->getId())
    ->setLabel("the card label")
    ->save();
```


It's worth knowing that the createByXXX methods are based on the following set of properties:

- primary key
- unique indexes
- ric (row identifying fields, defined manually by the client developer)



### What does it means in practice?

In practice, let's examine the following code:

```php
ProductCardLangObject::create()
    ->setSlug("the_card_slug")
    ->setLang($lang)
    ->setLabel("the card label")
    ->save();
```

This code is in insert mode.
It will fail "only" if a duplicate error occurs, which means if the unique index (slug in this case)
already exists in the database (in which case an exception is thrown).

Now, what if we use the update code?

```php
ProductCardLangObject::createBySlugLangId("the_card_slug", $lang->getId())
    ->setLabel("the card label")
    ->save();
```

The above code is in update mode.
It will try to fetch the record with slug="the_card_slug" and lang_id=$lang->getId().
If such a record exist, the update operation will occur, using the slug and lang_id
in its where clause.

If the record doesn't exist, it falls back to the insert mode, exactly like in the first code example,
which means it either succeeds, or fails (duplicate error) and throws an exception.

 
 
 
But, sometimes value is missing, meet the createUpdate method
===================================

Our approach so far is not too bad and allows us to handle a few cases.

However, it doesn't handle the case where you want to be in update mode,
but one value is missing, and the value you need could be inferred.

Let's have a look at this example code below,
and focus on the $productIdNotYetAvailable variable.

```php
ProductObject::createByReference('product_ref')
    ->setPrice(200)
    ->createProductLang(ProductLangObject::createByProductIdLangId($productIdNotYetAvailable, $lang->getId())
        ->setLabel("the product label")
    )
    ->save();
```


What I want to explain in this code is that there is a ProductObject, with a binding
to the ProductLangObject.

What we want is to be able to refresh the page without our code throwing exception.

For that, we want our two objects to be in update mode (hence the use of the createByXXX methods on both objects).

So, when we save the ProductObject, it will save the original object first (relationship priorities), and then the binding (the
ProductLangObject). 

However, we don't have access to the product id until the save method is called, and therefore our 
$productIdNotYetAvailable variable is undefined.

Too sad, we were so close to have our code nice and functional.

But since this problem might be recurrent, SaveOrm has a workaround for this: the createUpdate method.

The createUpdate method is like the create method, but triggers the update mode.
By the time the SaveOrm ask our ProductLangObject to resolve, it has already injected the product id to it.

Here is the workaround:


```php
ProductObject::createByReference('product_ref')
    ->setPrice(200)
    ->createProductLang(ProductLangObject::createUpdate()
        ->setLangId($lang->getId())
        ->setLabel("the product label")
    )
    ->save();
```

So again, the createUpdate method triggers the ProductLangObject into update mode,
plus, since the ProductLang is a guest binding, it will receive the ProductObject.id value automatically
(i.e. ProductLang->setProductId is called with the appropriate value).



identifierType: control the most relevant identifiers
------------------

By default, when you use the createUpdate method, it will use what's called "the most relevant identifiers" to:

- try fetching an existing record (to decide whether to perform an update or an insert)



"The most relevant identifiers" (mri) is an array of columns uniquely identifying any record in a table.
To find the right mri, SaveOrm use this algorithm:

- if the table has an auto-incremented field, mri is the auto-incremented field
- else if the table has a primary key, mri is the primary key
- else if the table has unique indexes, mri is the first unique index
- else mri is the set of all columns


Most of the time, this algorithm works fine, but you might find some edge cases where you need
to define another mri.

That's where the identifierType argument of the createUpdate method comes in.
The identifierType, if defined, overrides the mri default algorithm.





The return of the save method
================================
2017-10-12


Since 1.17.0, the save method always return all the values representing the updated object (at least that's the intent). 


 










 






Conclusion
=============
 
So, that's it.
Hopefully this approach makes sense and you can get accustomed to it.
 










