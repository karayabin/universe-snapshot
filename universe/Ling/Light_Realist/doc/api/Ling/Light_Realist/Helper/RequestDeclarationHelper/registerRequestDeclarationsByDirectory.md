[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Helper\RequestDeclarationHelper class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper.md)


RequestDeclarationHelper::registerRequestDeclarationsByDirectory
================



RequestDeclarationHelper::registerRequestDeclarationsByDirectory — Registers the planet by copying the given dir content to the expected location.




Description
================


public static [RequestDeclarationHelper::registerRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/registerRequestDeclarationsByDirectory.md)(Ling\CliTools\Output\OutputInterface $output, string $appDir, string $planetDotName, string $dir) : void




Registers the planet by copying the given dir content to the expected location.

See more details in the [open registration system of Ling.Light_Realist](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md#the-open-registration-system).

The given dir should contain only babyYaml files representing request declarations.
Sub-directories are allowed, but only files will be copied.




Parameters
================


- output

    

- appDir

    

- planetDotName

    

- dir

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [RequestDeclarationHelper::registerRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/Helper/RequestDeclarationHelper.php#L34-L51)


See Also
================

The [RequestDeclarationHelper](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper.md) class.

Next method: [unregisterRequestDeclarationsByDirectory](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Helper/RequestDeclarationHelper/unregisterRequestDeclarationsByDirectory.md)<br>

