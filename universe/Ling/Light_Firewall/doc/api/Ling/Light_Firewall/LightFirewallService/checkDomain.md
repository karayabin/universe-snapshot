[Back to the Ling/Light_Firewall api](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall.md)<br>
[Back to the Ling\Light_Firewall\LightFirewallService class](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md)


LightFirewallService::checkDomain
================



LightFirewallService::checkDomain — Returns whether the http request is inside the given domain.




Description
================


protected [LightFirewallService::checkDomain](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkDomain.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : bool




Returns whether the http request is inside the given domain.




Parameters
================


- module

    

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
See the source code for method [LightFirewallService::checkDomain](https://github.com/lingtalfi/Light_Firewall/blob/master/LightFirewallService.php#L103-L126)


See Also
================

The [LightFirewallService](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService.md) class.

Previous method: [executeModule](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeModule.md)<br>Next method: [checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkCondition.md)<br>

