[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The RequestDeclarationHelper class
================
2019-08-12 --> 2021-07-30






Introduction
============

The RequestDeclarationHelper class.



Class synopsis
==============


class <span class="pl-k">RequestDeclarationHelper</span>  {

- Methods
    - public static [registerRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/registerRequestDeclarationsByDirectory.md)(Ling\CliTools\Output\OutputInterface $output, string $appDir, string $planetDotName, string $dir) : void
    - public static [unregisterRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/unregisterRequestDeclarationsByDirectory.md)(Ling\CliTools\Output\OutputInterface $output, string $appDir, string $planetDotName, string $dir) : void
    - public static [getRicByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getRicByConf.md)(array $conf) : array
    - public static [getListHeadersByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getListHeadersByConf.md)(array $conf, ?array $options = []) : array | false

}






Methods
==============

- [RequestDeclarationHelper::registerRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/registerRequestDeclarationsByDirectory.md) &ndash; Registers the planet by copying the given dir content to the expected location.
- [RequestDeclarationHelper::unregisterRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/unregisterRequestDeclarationsByDirectory.md) &ndash; Unregisters the planet by removing the given dir content from the expected location.
- [RequestDeclarationHelper::getRicByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getRicByConf.md) &ndash; Returns the ric from the given request declaration.
- [RequestDeclarationHelper::getListHeadersByConf](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/getListHeadersByConf.md) &ndash; Returns an array of property name => label representing the headers of the list defined in the given request declaration.





Location
=============
Ling\Light_Realist\Helper\RequestDeclarationHelper<br>
See the source code of [Ling\Light_Realist\Helper\RequestDeclarationHelper](https://github.com/lingtalfi/Light_Realist/blob/master/Helper/RequestDeclarationHelper.php)



SeeAlso
==============
Previous class: [DuelistHelper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/DuelistHelper.md)<br>Next class: [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)<br>
