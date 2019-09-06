Realist server conception notes
===============
2019-09-03


In this document I'll imagine a server for realist.

The context of thoughts is the [realist conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md).


The server will basically handle any realist related action, so that we have only one url (i.e. one entry point)
for the realist services (which makes it conceptually easier to deal with).


The different tasks this server can handle are:

- displaying the rows of a realist table
- executing a ric related action


The server is communicating using json.

In case of an error, we always send back the same json array:

- type: error (fixed string)
- error: string, the error message



Displaying the rows of a realist table
---------

We use a renderer set in the realist light service configuration.
The successful returned array structure is defined in the [realist tag transfer protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md).



Action handlers
-----------

We introduce the concept of "action handler".

This will be mainly use for any ajax related action in the scope of realist.

Mainly, this will be used for ric actions, but not only.


Light plugins define their action handler, each action handler is assigned to an id.

In other words, we delegate the actions handling to plugins.

And so, the gui action sends the action id (along with parameters if necessary),
and the plugins respond to it in whatever json manner they want.

Plugins throw exceptions to indicate that something went wrong, and the error message will be caught
by our service and send back to the user as described above.


In order to avoid id conflicts, we recommend that every action id starts with the plugin name followed
by a dash.
 
 
 

   


