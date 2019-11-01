[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::getSqlColumnsByRequestDeclaration
================



LightRealistService::getSqlColumnsByRequestDeclaration — Returns the columns used in the sql query by parsing the given request declaration.




Description
================


public [LightRealistService::getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getSqlColumnsByRequestDeclaration.md)(array $requestDeclaration) : array




Returns the columns used in the sql query by parsing the given request declaration.
Usually, this is just the base_fields array, but with some more dynamic requests,
it might involve a little bit more computation.




Parameters
================


- requestDeclaration

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightRealistService::getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L805-L809)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md)<br>

