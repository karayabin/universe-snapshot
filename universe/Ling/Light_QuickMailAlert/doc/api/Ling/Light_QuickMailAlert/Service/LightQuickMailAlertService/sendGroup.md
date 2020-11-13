[Back to the Ling/Light_QuickMailAlert api](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert.md)<br>
[Back to the Ling\Light_QuickMailAlert\Service\LightQuickMailAlertService class](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService.md)


LightQuickMailAlertService::sendGroup
================



LightQuickMailAlertService::sendGroup — Sends an email according to the settings identified by the groupName, and returns the number of successful emails sent.




Description
================


public [LightQuickMailAlertService::sendGroup](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/sendGroup.md)(string $groupName, ?string $msg = null) : void




Sends an email according to the settings identified by the groupName, and returns the number of successful emails sent.

If the msg variable is set, it will be injected in the template (if the template allows it).




Parameters
================


- groupName

    

- msg

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightQuickMailAlertService::sendGroup](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/Service/LightQuickMailAlertService.php#L101-L124)


See Also
================

The [LightQuickMailAlertService](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/setOptions.md)<br>Next method: [error](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert/Service/LightQuickMailAlertService/error.md)<br>

