[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The LightRealformRoutineTwo class
================
2019-10-21 --> 2021-05-31






Introduction
============

The LightRealformRoutineTwo class.

This routine provides a multiple editing form for a given table and rics.
It updates the database in case of success.


How does it work?
------------

The input of this class is:
- the name of the table to update
- a realformIdentifier representing a single form
- the rics array (via POST) containing the rics of the rows to edit


It basically creates an empty chloroform instance, and then loops through each ric,
and add a modified version of the single form model to that chloroform instance.

In the end it returns the built Chloroform instance.

For each ric, this class will modify the html name by adding the suffix "_$number", with $number starting at 1
and being incremented on each new ric.

This class also handles the post of the form, meaning it decodes back the "_$number" suffix into rows that
it updates in the database.

I'm also adding a "share value with all rows" checkbox  for convenience.

As for permissions, we use the [standard micro-permission notation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction) system by default.



Class synopsis
==============


class <span class="pl-k">LightRealformRoutineTwo</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/__construct.md)() : void
    - public [processForm](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/processForm.md)(string $realformIdentifier, string $table, array $rics, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightRealformRoutineTwo::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/__construct.md) &ndash; Builds the LightRealformRoutineOne instance.
- [LightRealformRoutineTwo::processForm](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/processForm.md) &ndash; and returns a chloroform instance.
- [LightRealformRoutineTwo::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineTwo/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Realform\Routine\LightRealformRoutineTwo<br>
See the source code of [Ling\Light_Realform\Routine\LightRealformRoutineTwo](https://github.com/lingtalfi/Light_Realform/blob/master/Routine/LightRealformRoutineTwo.php)



SeeAlso
==============
Previous class: [LightRealformRoutineOne](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Routine/LightRealformRoutineOne.md)<br>Next class: [LightRealformHandlerAliasHelperService](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformHandlerAliasHelperService.md)<br>
