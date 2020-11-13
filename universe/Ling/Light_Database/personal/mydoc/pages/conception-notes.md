Light_Database conception notes
==============
2019-12-16 -> 2020-11-06






Hooks
------------

Light_Database provides hooks for every database operation that change the database state:

- insert
- replace
- update
- delete


Those hooks will allow plugin to implement their logic based on such operations.
For instance, if a new user has been registered in an application, we could send an email to the moderator, etc...


Use **Light_Database** only when you interact with your database and this hook system that we provide will be only stronger/more consistent.


Our hooks trigger events, and plugins who want to can listen to those events.

See [our events page](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md) to see the events triggered under the hood.



Service options
--------
2020-06-11


- devMode: bool=false.
    If true, when a **SimplePdoWrapperQueryException** exception is caught, we embellish the exception message with more info (query, markers).
    
    The **SimplePdoWrapperQueryException** exception is basically thrown whenever a pdo method fails (insert, fetchAll, update, delete, etc...), unless your pdo configuration
    tells pdo to not throw exception on errors.
    
- queryLog: bool=false, whether to send all queries to a log.
    We use the [Light_Logger planet](https://github.com/lingtalfi/Light_Logger) under the hood, with a channel of "database".
- queryLogFormatting: string=null. If queryLog is true, defines the [bashtml](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/bashtml.md) format to add to the message.
    Examples:
        - red 
        - white:bgBlack 
   
     