Light_FileWatcher, conception notes
=================
2020-06-23 -> 2020-06-25



The basic idea behind this service is that we watch for file changes for you, and when a file change is detected, we trigger
the callback that you passed to us.



How do I subscribe?
-------------
2020-06-23


The subscription is completely free (joke), and you just need to call the **registerCallable** method of our service,
which takes the path to the file that you want to monitor, and the callable that you want to execute.


 


We use logs
------------
2020-06-23


We believe in logs for a better app.
So, we provide logs via the [Light_Logger](https://github.com/lingtalfi/Light_Logger), using the channel: **file_watcher.debug**.
Those are activated only if the **useDebug** option is true (it's false by default).

Also, we provide the **debugLog** method for plugin authors to add their own messages to our log.





Why was this tool created?
----------
2020-06-23


The idea is to save some time for the light plugin authors.

Especially those whose plugins use some tables in a database.

So, when the schema structure of the plugin changes, the plugin author just dumps the new structure (from mysqlWorkBench for instance)
into the **create file**.

Our plugin detects the change in the **create file** and triggers the author's callback, which might do things such as:

- re-install/synchronize the current database with the new plugin table structure (using [Light_DbSynchronizer](https://github.com/lingtalfi/Light_DbSynchronizer) for instance)
- re-create the api (using [Ling Breeze Generator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) for instance)

  



How this tool works
-----------
2020-06-25


We keep track of a hash of the files that plugin authors give us to monitor.
Then on every page refresh (using the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md)),
we compare the current hash of the file to the one that we stored.

A difference in the hashes indicates a change in a file, and in that case we trigger the callback that the 
plugin author provided to us.

We also provide a log system to help plugin authors debug the app in case of problems, see the "We use logs" section for more details.  




