[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::getSqlColumnsByRequestDeclaration
================



LightRealistService::getSqlColumnsByRequestDeclaration — Returns the columns used in the sql query by parsing the given request declaration.




Description
================


public [LightRealistService::getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/getSqlColumnsByRequestDeclaration.md)(array $requestDeclaration) : array




Returns the columns used in the sql query by parsing the given request declaration.
It's an array of alias => column_expression, usually based on the base_fields property.
See the [duelist](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md) page for more info.




Parameters
================


- requestDeclaration

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightRealistService::getSqlColumnsByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L819-L825)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md)<br>

