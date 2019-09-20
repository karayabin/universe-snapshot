Light Breeze generator
==================
2019-09-11




The main idea
--------------

If you have the chance to use an IDE which can generate the basic getters and setters for you,
then maybe you enjoy the time that you've saved using those generators (instead of manually typing the methods).



The breeze generator is playing in the same category of tool.

It's delivered as a light service, so that you store your configuration directly in the corresponding 
service configuration file (rather than creating your own configuration memory system). 


It doesn't try to provide you with a new set of rules, (like I did with the [SaveOrm](https://github.com/lingtalfi/SaveOrm/)),
but rather, it humbly admit that it doesn't what you are going to do with your design,
and will try to help you at the typing level.


This tool is primarily oriented towards generating database related interfaces.



The first thing it helps you generate is the method signatures of a php interface for a given set of tables.

To give you a basic idea, let's imagine we have three tables, all having an id column as the primary key:

- user
- permission  
- group


It will generate those kind of methods signatures (and the associated comments), so that you can inject them in your own php interface(s):

Note: the flavour of the generated method can be configured.


- getUserById( int $id, bool $throwEx=true )
- getPermissionById(int $id, bool $throwEx=true)
- getGroupById(int $id, bool $throwEx=true)

- updateUserById(int $id, array $user)
- updatePermissionById(int $id, array $permission)
- updateGroupById(int $id, array $group)

- insertUser(array $user, bool $ignoreDuplicate=true, bool $returnRic=false)
- insertPermission(array $permission, bool $ignoreDuplicate=true, bool $returnRic=false)
- insertGroup(array $group, bool $ignoreDuplicate=true, bool $returnRic=false)


- deleteUserById ( int $id )
- deletePermissionById ( int $id )
- deleteGroupById ( int $id )


Now if the table has a different primary key (or no primary key at all), the method names should update (the byId part specifically, and the args).

For the getter methods, the throwEx argument set to true will force the method to throw an exception if the row doesn't exist.
If the flag is set to false, then the method returns either the row, or false (if there is no row matching the parameters).

For the insert methods, the ignore duplicate flag set to true will force the method to internally catch any problem that might 
come from duplicated entry. False is returned if the inserted row already exists and ignoreDuplicate=true.
When ignoreDuplicate=false and a row already exists, an exception is thrown.

By default, if the insert operation succeeds, we simply return the last inserted id (mysql method).
However if the returnFlag is set to true, we return the ric array instead.




The generated classes
----------------

So now that the main idea has been established, we will actually generate a little more than just the methods.

We will also generate the classes, so that if the developer wants to, he can also get some classes for free.

Here is what will be generated for the given table user.


- UserObjectInterface:
    - getUserById( int $id, bool $throwEx=true ) 
    - updateUserById(int $id, array $user)
    - insertUser(array $user, bool $ignoreDuplicate=true, bool $returnRic=false)
    - deleteUserById ( int $id )
  
- UserObject implements Interface
    - ... same methods as the interface
    
    
- MyPluginObjectFactory:
    - getUserObject ( ): UserObjectInterface     
  


So that's the basic classes the generator will generate.
Now obviously the point of the factory is to hold multiple classes, and so we would be able to tell the generator
which classes we want to generate.

Since I'm using plugins, my table names have prefix, and so I like the idea of being able to generate tables
based on their prefix.

And so the basic idea is that for instance, I have a plugin called **MyPlugin**, with a table prefix of **my_**,
and so in the generator config, I'll need to do something like this:

```yaml
my_conf: # name will change in the implementation
    plugins:
        my_: 
            name: MyPlugin
            ...?
``` 









