PersistentRowCollection
============================
2017-05-10



A base object for a crud system.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PersistentRowCollection
```

Or just download it and place it where you want otherwise.



What is it?
==============

When you implement a crud system, you have multiple things to implement.


- the CREATE operation, which allows you to insert a row in your persistent row collection (which often is a database but
        could be other things like a php file)
- the READ operation, which allows you to retrieve rows from your collection
- the UPDATE operation, which allows you to update a given row in your collection
- the DELETE operation, which allows you to remove a given row from your collection


But you might want to take your implementation a step further, and do the following extra operation:

- return a form model when your system needs one (for instance when the user wants to insert a row in your collection via a gui) 


So, the PersistentRowCollection represent a collection of rows, with abstraction of the storage (which might be a database or a file or anything else).
        
It's basically designed so that when you implement a crud system in your application, it is in the middle of your system,
being requested by the different actors of your system, and centralizing the crud operations in one place, which makes it easier
to maintain.



How to
=========

You first design your crud system how you want it.
Then, give flesh to the PersistenRowCollection and use it as the central piece of your system for every crud operations.

See the PersistentRowCollectionInterface methods for more information.






Related
===========

- A [form model](https://github.com/lingtalfi/FormModel) is returned by the getForm method.



History Log
    
- 1.0.0 -- 2017-05-10

    - initial commit