[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The TableListService class
================
2019-11-18 --> 2021-05-31






Introduction
============

The TableListService.



Class synopsis
==============


class <span class="pl-k">TableListService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$nugget](#property-nugget) ;
    - private bool [$securityChecked](#property-securityChecked) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md)() : void
    - public [setNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setNugget.md)(array $nugget) : void
    - public [getNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNugget.md)() : array
    - public [getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md)() : int
    - public [getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)(?string $searchExpression = null) : array
    - public [getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getValueToLabels.md)($value) : string
    - public [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - private [getQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getQueryInfo.md)(string $mode, ?array $options = []) : array
    - private [checkSecurity](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/checkSecurity.md)() : void
    - private [error](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-nugget"><b>nugget</b></span>

    This property holds the nugget for this instance.
    
    

- <span id="property-securityChecked"><b>securityChecked</b></span>

    This property holds the securityChecked for this instance.
    
    



Methods
==============

- [TableListService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/__construct.md) &ndash; Builds the TableListService instance.
- [TableListService::setNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setNugget.md) &ndash; Sets the nugget.
- [TableListService::getNugget](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNugget.md) &ndash; Returns the nugget of this instance.
- [TableListService::getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated with the defined pluginId.
- [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md) &ndash; Returns an array of rows based on the defined nugget.
- [TableListService::getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getValueToLabels.md) &ndash; Returns the formatted value => label(s) for the given value(s).
- [TableListService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md) &ndash; Sets the container.
- [TableListService::getQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getQueryInfo.md) &ndash; Returns the query info based on the given mode.
- [TableListService::checkSecurity](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/checkSecurity.md) &ndash; Checks that the user is allowed to execute the actions for this nugget, and throws an exception if that's not the case.
- [TableListService::error](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_ChloroformExtension\Field\TableList\TableListService<br>
See the source code of [Ling\Light_ChloroformExtension\Field\TableList\TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php)



SeeAlso
==============
Previous class: [LightChloroformExtensionException](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Exception/LightChloroformExtensionException.md)<br>Next class: [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)<br>
