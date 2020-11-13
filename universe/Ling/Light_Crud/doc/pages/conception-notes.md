Light_Crud conception notes
=====================
2019-11-28 -> 2020-08-28



This service provides basic crud interaction.

Under the hood, we rely on the [Light_Database](https://github.com/lingtalfi/Light_Database/) plugin,
and the [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission) plugin for permission checking.





Micro permission checking
---------
2020-08-28


We follow the [Light_MicroPermission storage recommendation](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#storage-interaction),
except that we don't implement the following **crudTypes**:

- create.own
- read.own
- update.own
- delete.own


That's because we believe this should be done by plugin authors themselves.


