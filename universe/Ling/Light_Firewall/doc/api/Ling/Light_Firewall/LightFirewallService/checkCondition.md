[Back to the Ling/Light_Firewall api](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall.md)<br>
[Back to the Ling\Light_Firewall\LightFirewallService class](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md)


LightFirewallService::checkCondition
================



LightFirewallService::checkCondition — Returns whether the given condition is met or not.




Description
================


protected [LightFirewallService::checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkCondition.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : bool




Returns whether the given condition is met or not.




Parameters
================


- module

    The module array which must contain the condition key.
See the @page(conception notes) for more details.

If the condition is an array, it's an array of built-in capabilities to use.
The condition is successful only if all declared capabilities return true.
In other words, capabilities are combined using an AND logic operation.
The available capabilities are the following:

- is_logged_in_equals: bool. This condition checks whether the user is logged in using the
     "user_manager" service, and checks that the value set by you (or the app maintainer app) matches
     the login status of the current user.
     Note: if the user_manager service is not set, this whole process will obviously fail.
     See the https://github.com/lingtalfi/Light_UserManager/ plugin for more details about the user_manager service.

- light

    

- httpRequest

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightFirewallService::checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/LightFirewallService.php#L158-L187)


See Also
================

The [LightFirewallService](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md) class.

Previous method: [checkDomain](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkDomain.md)<br>Next method: [executeAction](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeAction.md)<br>

