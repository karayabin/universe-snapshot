[Back to the Ling/Light_Nugget api](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget.md)<br>
[Back to the Ling\Light_Nugget\Service\LightNuggetService class](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService.md)


LightNuggetService::getNuggetByPath
================



LightNuggetService::getNuggetByPath — Returns the nugget configuration from its path.




Description
================


public [LightNuggetService::getNuggetByPath](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md)(string $path, ?array $options = []) : array




Returns the nugget configuration from its path.

You can use the [Light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md)
by wrapping it into this wrapper:

- ::()::

For instance:
- ::(MyClass->methodABC)::




Available options are:

- varsKey: string=null, The key used to hold the variables (see the conception notes for more info).
     If false, the variable replacement system will not be used.
     If null, the varsKey will default to "_vars".




Parameters
================


- path

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightNuggetService::getNuggetByPath](https://github.com/lingtalfi/Light_Nugget/blob/master/Service/LightNuggetService.php#L84-L93)


See Also
================

The [LightNuggetService](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/setContainer.md)<br>Next method: [getNugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNugget.md)<br>

