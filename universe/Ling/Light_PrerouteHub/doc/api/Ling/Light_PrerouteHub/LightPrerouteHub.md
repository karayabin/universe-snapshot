[Back to the Ling/Light_PrerouteHub api](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub.md)



The LightPrerouteHub class
================
2019-07-18 --> 2021-03-15






Introduction
============

The LightPrerouteHub class.



Class synopsis
==============


class <span class="pl-k">LightPrerouteHub</span>  {

- Properties
    - protected [Ling\Light_PrerouteHub\Runner\LightPrerouteHubRunnerInterface[]](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/Runner/LightPrerouteHubRunnerInterface.md) [$runners](#property-runners) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/run.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest, ?Ling\Light\Http\HttpResponseInterface &$httpResponse = null) : void
    - public [setRunners](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/setRunners.md)(array $runners) : void

}




Properties
=============

- <span id="property-runners"><b>runners</b></span>

    This property holds the runners for this instance.
    
    



Methods
==============

- [LightPrerouteHub::__construct](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/__construct.md) &ndash; Builds the LightPrerouteHub instance.
- [LightPrerouteHub::run](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/run.md) &ndash; Runs all the runners attached to this hub.
- [LightPrerouteHub::setRunners](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/LightPrerouteHub/setRunners.md) &ndash; Sets the runners.





Location
=============
Ling\Light_PrerouteHub\LightPrerouteHub<br>
See the source code of [Ling\Light_PrerouteHub\LightPrerouteHub](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/LightPrerouteHub.php)



SeeAlso
==============
Next class: [LightPrerouteHubRunnerInterface](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/Runner/LightPrerouteHubRunnerInterface.md)<br>
