[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::pinsert
================



LightDatabasePdoWrapper::pinsert — Same as insert method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Description
================


public [LightDatabasePdoWrapper::pinsert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pinsert.md)($table, ?array $fields = [], ?array $options = []) : false | string




Same as insert method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Parameters
================


- table

    

- fields

    

- options

    


Return values
================

Returns false | string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::pinsert](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L176-L184)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)<br>Next method: [preplace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/preplace.md)<br>

