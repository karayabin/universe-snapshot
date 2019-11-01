Ling Standard Object Methods
=================
2019-09-13





Following on the [ling breeze generator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator.md) document,

the "Ling Standard Object Methods" is the concept designing the four methods:

- insertUser ( array $user, bool $ignoreDuplicate = true, bool $returnRic = false )
- getUserById ( int $id, $default = null, bool $throwNotFoundEx = false)
- updateUserById ( int $id, array $user )
- deleteUserById ( int $id )


Now the "User" part and the "ById" part are variables.

The "User" part depends on the underlying table, and the "ById" part will change along with the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md).

For more information about the arguments, refer to the aforementioned "ling breeze generator" document.

Those methods should be generated based on the ric.

In addition to that, the getXXX, updateXXX and deleteXXX methods should also be generated for every unique index of the table.







Note: whether the insert/update method perform a foreign key constraint check is up to the implementor.
So, for instance, a Mysql implementation might have the foreign key constraints checking, whereas a BabyYaml implementation
might not.


