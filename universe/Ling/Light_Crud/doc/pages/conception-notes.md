Light_Crud conception notes
=====================
2019-11-28



Crud interaction is an important part of an application.

Rather than letting each plugin handles its own database interaction, we provide a centralized interface to do so.

One benefit of this is that it tends to bring consistency in the client application.






Implementation ideas
----------------

Although we will obviously provide a base object that execute the generic requests, I believe it's crucial
that plugins have total control over the way the database state is updated,
and therefore our plugin methods will be implemented with that in mind.

In particular, we will use a context identifier. 

The context identifier should be a string with the following format:

- contextIdentifier: $pluginIdentifier(.$pluginContextIdentifier)?


With:

- $pluginIdentifier: a string representing the plugin to call to handle the request.
                    It could be the plugin name itself if you strive for simplicity,
                    or an obfuscated name if you're more concerned with security (and you don't want to give any
                    info for free to a potential attacker), or anything in between.
- $pluginContextIdentifier: optional. A string that tells the handler plugin how to handle this request in particular.
                    As for now, I'm not 100% sure if/how this will be useful.                    


Our service will basically provide one method to perform all crud operations, something like:


- execute ( string contextIdentifier, string table, string action, array params = [] )


So the handler plugin (identified by the given contextIdentifier) is responsible for executing the request.
It could/should extend our base object to have generic handling for free, and it can inspect the contextIdentifier,
the table, and the action (and even the params if necessary) to decide whether a special treatment should be executed for this 
request in particular.

The action represents the type of interaction to execute, it's one of:

- create
- read      (although we don't plan to use this one)
- update
- delete
- deleteMultiple


For the read type, it often involves complex fetching logic, so we basically won't try to handle it in our plugin,
which acts more at a general level.

Note that we distinguish between delete and deleteMultiple, for pragmatical reasons only.


The params depends on the type, and can be augmented by the plugin author at will.
The minimum expected params are:

- create: the row (key/value pair) to insert in the database  
- update: the [ric strict values](https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-strict-ric), plus the key/value pairs to update
- delete: the ric strict values of the row to delete
- deleteMultiple: an array of ric strict values of the rows to delete





