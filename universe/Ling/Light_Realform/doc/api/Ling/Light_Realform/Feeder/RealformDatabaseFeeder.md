[Back to the Ling/Light_Realform api](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform.md)



The RealformDatabaseFeeder class
================
2019-10-21 --> 2021-06-03






Introduction
============

The RealformDatabaseFeeder class.



Class synopsis
==============


class <span class="pl-k">RealformDatabaseFeeder</span> implements [RealformFeederInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformFeederInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/getDefaultValues.md)(?array $params = []) : array
    - private [error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [RealformDatabaseFeeder::__construct](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/__construct.md) &ndash; Builds the RealformDatabaseFeeder instance.
- [RealformDatabaseFeeder::setContainer](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/setContainer.md) &ndash; Sets the light service container interface.
- [RealformDatabaseFeeder::getDefaultValues](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/getDefaultValues.md) &ndash; Returns the default values of the form.
- [RealformDatabaseFeeder::error](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformDatabaseFeeder/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Realform\Feeder\RealformDatabaseFeeder<br>
See the source code of [Ling\Light_Realform\Feeder\RealformDatabaseFeeder](https://github.com/lingtalfi/Light_Realform/blob/master/Feeder/RealformDatabaseFeeder.php)



SeeAlso
==============
Previous class: [LightRealformException](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Exception/LightRealformException.md)<br>Next class: [RealformFeederInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Feeder/RealformFeederInterface.md)<br>
