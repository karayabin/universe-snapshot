[Back to the Ling/Light_Firewall api](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall.md)<br>
[Back to the Ling\Light_Firewall\LightFirewallService class](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md)


LightFirewallService::executeAction
================



LightFirewallService::executeAction — Executes the given action.




Description
================


protected [LightFirewallService::executeAction](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeAction.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest, ?Ling\Light\Http\HttpResponseInterface &$response = null) : void




Executes the given action.
If the action is an array, it's an array of built-in capabilities.

The available built-in capabilities are:

- redirect_to_route: string. The route to redirect to.
     This capability uses the "reverse_router" service under the hood (i.e. make sure the service is in your container
     before you can use this capability).




Parameters
================


- module

    The module array must contain the action key.
See the @page(conception notes) for more details.

- light

    

- httpRequest

    

- response

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightFirewallService::executeAction](https://github.com/lingtalfi/Light_Firewall/blob/master/LightFirewallService.php#L212-L243)


See Also
================

The [LightFirewallService](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md) class.

Previous method: [checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkCondition.md)<br>

