Application Registry
=========================
2017-05-22





Modules can use the application registry to pass themselves (or to other modules) variables.


A concrete case where this is needed is for instance a module that provides an item page.
On an item page, it's likely that we will need the item id, and the item id will probably will be inferred by the url at first,
then a dedicated Controller will extract the item id from the url, and at this point it will want to share it with all the 
widgets on this item page.

Now, the module could create its own sharing system, or it could use the kamille ApplicationRegistry, 
as to re-use the simple but efficient registry functionality.









