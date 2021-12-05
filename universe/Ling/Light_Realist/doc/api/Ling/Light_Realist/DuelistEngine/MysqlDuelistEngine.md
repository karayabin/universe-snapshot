[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The MysqlDuelistEngine class
================
2019-08-12 --> 2021-07-30






Introduction
============

The MysqlDuelistEngine class.



Class synopsis
==============


class <span class="pl-k">MysqlDuelistEngine</span> implements [DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - private bool [$useDebug](#property-useDebug) ;
    - private string|null [$error](#property-error) ;
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/__construct.md)() : void
    - public [setUseDebug](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/setUseDebug.md)(bool $useDebug) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getRowsInfo.md)(string $requestId, array $duelistDeclaration, array $tags) : array | false
    - public [getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getError.md)() : string | null

}




Properties
=============

- <span id="property-useDebug"><b>useDebug</b></span>

    This property holds the useDebug for this instance.
    
    

- <span id="property-error"><b>error</b></span>

    This property holds the error for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [MysqlDuelistEngine::__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/__construct.md) &ndash; Builds the MysqlDuelistEngine instance.
- [MysqlDuelistEngine::setUseDebug](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/setUseDebug.md) &ndash; Sets the useDebug.
- [MysqlDuelistEngine::setContainer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/setContainer.md) &ndash; Sets the light service container interface.
- [MysqlDuelistEngine::getRowsInfo](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getRowsInfo.md) &ndash; Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.
- [MysqlDuelistEngine::getError](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/MysqlDuelistEngine/getError.md) &ndash; Returns the error message if any, or null otherwise.





Location
=============
Ling\Light_Realist\DuelistEngine\MysqlDuelistEngine<br>
See the source code of [Ling\Light_Realist\DuelistEngine\MysqlDuelistEngine](https://github.com/lingtalfi/Light_Realist/blob/master/DuelistEngine/MysqlDuelistEngine.php)



SeeAlso
==============
Previous class: [DuelistEngineInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DuelistEngine/DuelistEngineInterface.md)<br>Next class: [ContainerAwareRealistDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/DynamicInjection/ContainerAwareRealistDynamicInjectionHandler.md)<br>
