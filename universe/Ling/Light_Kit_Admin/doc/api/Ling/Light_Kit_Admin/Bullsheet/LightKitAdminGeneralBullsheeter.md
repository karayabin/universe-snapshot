[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminGeneralBullsheeter class
================
2019-05-17 --> 2021-05-02






Introduction
============

The LightKitAdminGeneralBullsheeter class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminGeneralBullsheeter</span> implements [LightBullsheeterInterface](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet/Bullsheeter/LightBullsheeterInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array [$_fkCache](#property-_fkCache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [generateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/generateRows.md)(int $nbRows, ?array $options = []) : void
    - protected [generateRow](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/generateRow.md)(string $table) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-_fkCache"><b>_fkCache</b></span>

    This property holds the fkCache for this instance.
    An array of foreign key to possible values. Only used in the context of the generateRow method.
    
    



Methods
==============

- [LightKitAdminGeneralBullsheeter::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/__construct.md) &ndash; Builds the LightKitAdminGeneralBullsheeter instance.
- [LightKitAdminGeneralBullsheeter::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/setContainer.md) &ndash; Sets the light service container interface.
- [LightKitAdminGeneralBullsheeter::generateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/generateRows.md) &ndash; Populates the database with $nbRows random rows in the appropriate table(s).
- [LightKitAdminGeneralBullsheeter::generateRow](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Bullsheet/LightKitAdminGeneralBullsheeter/generateRow.md) &ndash; Generates a random row for the given table.





Location
=============
Ling\Light_Kit_Admin\Bullsheet\LightKitAdminGeneralBullsheeter<br>
See the source code of [Ling\Light_Kit_Admin\Bullsheet\LightKitAdminGeneralBullsheeter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Bullsheet/LightKitAdminGeneralBullsheeter.php)



SeeAlso
==============
Previous class: [LightKitAdminAjaxHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler.md)<br>Next class: [LightKitAdminChloroform](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Chloroform/LightKitAdminChloroform.md)<br>
