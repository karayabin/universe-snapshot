Light_TablePrefixInfo, conception notes
================
2020-12-01



The main idea of this plugin is to make available basic information about a table prefix.

In particular: which plugin is behind the table prefix.

So for instance, if you ask us which plugin is behind the table prefix: **lud**, we answer back at you: **Ling/Light_UserDatabase**.



Now obviously, this means that the **Ling/Light_UserDatabase** must tell us that information beforehand, this is done by registering to our service's **registerPrefixInfo** method.



The prefix info
------------
2020-12-01



The prefix info should contain the following data:


- **planetId**: the [planet identifier](https://github.com/karayabin/universe-snapshot#the-planet-identifier) of the plugin providing the prefix








