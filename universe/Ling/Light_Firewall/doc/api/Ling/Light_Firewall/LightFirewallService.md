[Back to the Ling/Light_Firewall api](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall.md)



The LightFirewallService class
================
2019-07-18 --> 2021-05-31






Introduction
============

The LightFirewallService class.
See the [conception notes](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/pages/conception-notes.md) for more details.



Class synopsis
==============


class <span class="pl-k">LightFirewallService</span> implements [LightPrerouteHubRunnerInterface](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/Runner/LightPrerouteHubRunnerInterface.md) {

- Properties
    - protected array [$modules](#property-modules) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/__construct.md)() : void
    - public [setModules](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/setModules.md)(array $modules) : void
    - public [run](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/run.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest, ?Ling\Light\Http\HttpResponseInterface &$httpResponse = null) : void
    - protected [executeModule](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeModule.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest, ?Ling\Light\Http\HttpResponseInterface &$response = null) : void
    - protected [checkDomain](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkDomain.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected [checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkCondition.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected [executeAction](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeAction.md)(array $module, Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest, ?Ling\Light\Http\HttpResponseInterface &$response = null) : void

}




Properties
=============

- <span id="property-modules"><b>modules</b></span>

    This property holds the modules for this instance.
    See the class description for more details.
    
    



Methods
==============

- [LightFirewallService::__construct](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/__construct.md) &ndash; Builds the LightFirewallService instance.
- [LightFirewallService::setModules](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/setModules.md) &ndash; Sets the modules.
- [LightFirewallService::run](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/run.md) &ndash; Tells the runner to run.
- [LightFirewallService::executeModule](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeModule.md) &ndash; Execute the given module.
- [LightFirewallService::checkDomain](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkDomain.md) &ndash; Returns whether the http request is inside the given domain.
- [LightFirewallService::checkCondition](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/checkCondition.md) &ndash; Returns whether the given condition is met or not.
- [LightFirewallService::executeAction](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/LightFirewallService/executeAction.md) &ndash; Executes the given action.





Location
=============
Ling\Light_Firewall\LightFirewallService<br>
See the source code of [Ling\Light_Firewall\LightFirewallService](https://github.com/lingtalfi/Light_Firewall/blob/master/LightFirewallService.php)



SeeAlso
==============
Previous class: [LightFirewallException](https://github.com/lingtalfi/Light_Firewall/blob/master/doc/api/Ling/Light_Firewall/Exception/LightFirewallException.md)<br>
