XiaoApi
============
2017-05-20



So you're creating your new app, and you've just finished to design the mysql schema.
Nice.

But now, how do you interact with the schema?


Basically, our api --and I believe every database based api-- will contain at least methods for:

- creating data
- retrieving data with search criterion
- updating data
- deleting data


We shall be able to dispatch a hook logic for every method too.

There could be other types of methods as well, but this crud logic will be predominant,
and as such that would be nice if we could automate the basic objects.


Automation is not enough though, as some methods need to be more powerful than others (but they still
can use the crud paradigm), for instance a product object will provide a method that will insert data in multiple tables,
not just the product table.

So, if there is any automation, it should be done with extendability in mind.


So, our goal here is basically to design a mechanism that would abstract the database interaction for us.
This mechanism will be flexible and robust enough so that we can extend it at will, create hooks,
such as it becomes the only api we need to interact with the system we've designed.



Errors?
===========
An important question will be: how do we handle errors?
Do we complain when something wrong happens?
Yes, if the developer is the culprit, throw an exception in her face is the philosophy.
Since this api is always manipulated by the developer, we will throw exception all over the place.



The Api first idea
===============
The api is based on the following mechanism:

```txt 
Api->object()->method()
```


For instance:

```txt
row = EkomApi->backofficeUser()->retrieve( someParams? )
```

So, object is the "thing" you want to interact with, and method is the method of this object you want to call.
object is kind of a namespace/organizational tool for the api if you will.




Retrieving an object
===================================

The file structure should be like this:

```txt
- MyApi
----- Object
--------- MyObjectHere
```

Where Object is the only constant.
And so to call the MyObjectHere object, we would do:

```txt
MyApi::inst()->myObjectHere()
```

To make things simple, objects should not have arguments in their constructor
(that makes it easier for the Api to return object instances, if we need
to later, we will find another way to pass arguments to an object instance).





Suggestion
==============
The generators currently generate a base crud system,
with read operation only supporting search by equality feature.

I suggest you implement a plugin system so that you/other developers can extend
the generated method without affecting the core.

Then, we can encapsulate our "à la carte" Generator for ourselves. 




Todo: a cache system
================

When you start having a lot of entries in your database, caching data
might alleviate your cpu's charge.

To implement a cache system with the XiaoApi structure, we need to hook our logic
into the CrudObject code.

Caching is in itself a trivial task, just create a hash of the read request, based on a 
formatted (replace multiple instances of white space with one) version of the 
symbolic request (a request using markers).
 
With the hash unique per request, you can store the cache and retrieve it.

The next question is: WHEN/HOW do you invalidate/delete the cache?

Well, that's your todo...















