[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::pfetch
================



LightDatabasePdoWrapper::pfetch — Same as fetch method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Description
================


public [LightDatabasePdoWrapper::pfetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : array | false




Same as fetch method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).




Parameters
================


- query

    

- markers

    

- fetchStyle

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabasePdoWrapper::pfetch](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L258-L266)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [pdelete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pdelete.md)<br>Next method: [pfetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetchAll.md)<br>

