[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Helper\RequestDeclarationHelper class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper.md)


RequestDeclarationHelper::getListHeadersByConf
================



RequestDeclarationHelper::getListHeadersByConf — Returns an array of property name => label representing the headers of the list defined in the given request declaration.




Description
================


public static [RequestDeclarationHelper::getListHeadersByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getListHeadersByConf.md)(array $conf, ?array $options = []) : array | false




Returns an array of property name => label representing the headers of the list defined in the given request declaration.
Or returns false if no headers were defined.

Available options are:

- removeNonPrintable: bool = false, whether to remove "non printable" properties.
     The "non printable" properties are the one with an open admin table data type of either:
     - action
     - checkbox




Parameters
================


- conf

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [RequestDeclarationHelper::getListHeadersByConf](https://github.com/lingtalfi/Light_Realist/blob/master/Helper/RequestDeclarationHelper.php#L126-L180)


See Also
================

The [RequestDeclarationHelper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper.md) class.

Previous method: [getRicByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getRicByConf.md)<br>

