[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::pupdate
================



LightDatabasePdoWrapper::pupdate — Same as update method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Description
================


public [LightDatabasePdoWrapper::pupdate](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pupdate.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool




Same as update method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Parameters
================


- table

    

- fields

    

- whereConds

    

- markers

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::pupdate](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L217-L225)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [preplace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/preplace.md)<br>Next method: [pdelete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pdelete.md)<br>

