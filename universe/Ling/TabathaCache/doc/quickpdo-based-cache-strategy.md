A QuickPdo based cache strategy
===========================
2018-06-08




As your app grows up, and if you choose TabathaCache2 as your base tool for caching,
it can be cumbersome to create delete identifiers.


A simple way of handling those identifiers is to rely on a simple convention:

- the delete identifier for a given cache entry is the name of the table it fetches data from


Using this simple rule, if your db system is built on QuickPdo or a similar tool, you will be able to hook
into all databases call and trigger the $cache->clean() method for db interactions that alter the model (insert, update, 
delete), thus triggering the deletion of all cache entries you attached to those tables.


This might seems an overly naive approach, but on second thought, implementing a cache for your app becomes
a no-brainer, and so might be a good option for you depending on your use case.

So personally I will try this strategy from now on, and see how it goes... 