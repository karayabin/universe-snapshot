[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md)


LightKitAdminListActionHandler::getInRicsTags
================



LightKitAdminListActionHandler::getInRicsTags — Returns an array containing one [in_rics tag](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#in_rics) per item in the given rics array.




Description
================


protected [LightKitAdminListActionHandler::getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getInRicsTags.md)(array $rics, array $configuration) : array




Returns an array containing one [in_rics tag](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist-conception-notes.md#in_rics) per item in the given rics array.
If one of the rics provided by the user doesn't match the ric defined in the configuration,
and exception is thrown.




Parameters
================


- rics

    

- configuration

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitAdminListActionHandler::getInRicsTags](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ListActionHandler/LightKitAdminListActionHandler.php#L720-L755)


See Also
================

The [LightKitAdminListActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler.md) class.

Previous method: [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/error.md)<br>Next method: [getWhereByRics](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ListActionHandler/LightKitAdminListActionHandler/getWhereByRics.md)<br>

