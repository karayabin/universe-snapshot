[Back to the Ling/Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md)



The JimToolboxItemBaseHandler class
================
2021-07-08 --> 2021-07-27






Introduction
============

The JimToolboxItemBaseHandler class.



Class synopsis
==============


abstract class <span class="pl-k">JimToolboxItemBaseHandler</span> implements [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

- Inherited methods
    - abstract public [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneBody.md)(array $params) : string
    - abstract public [JimToolboxItemHandlerInterface::getPaneTitle](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneTitle.md)() : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [JimToolboxItemBaseHandler::__construct](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/__construct.md) &ndash; Builds the JimToolboxItemBaseHandler instance.
- [JimToolboxItemBaseHandler::setContainer](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemBaseHandler/setContainer.md) &ndash; Sets the light service container interface.
- [JimToolboxItemHandlerInterface::getPaneBody](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneBody.md) &ndash; Returns the pane body.
- [JimToolboxItemHandlerInterface::getPaneTitle](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface/getPaneTitle.md) &ndash; Returns the title or the pane.





Location
=============
Ling\Light_JimToolbox\Item\JimToolboxItemBaseHandler<br>
See the source code of [Ling\Light_JimToolbox\Item\JimToolboxItemBaseHandler](https://github.com/lingtalfi/Light_JimToolbox/blob/master/Item/JimToolboxItemBaseHandler.php)



SeeAlso
==============
Previous class: [LightJimToolboxException](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Exception/LightJimToolboxException.md)<br>Next class: [JimToolboxItemHandlerInterface](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Item/JimToolboxItemHandlerInterface.md)<br>
