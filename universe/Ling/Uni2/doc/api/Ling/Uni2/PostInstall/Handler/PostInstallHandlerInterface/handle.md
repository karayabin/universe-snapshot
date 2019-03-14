[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\PostInstall\Handler\PostInstallHandlerInterface class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface.md)


PostInstallHandlerInterface::handle
================



PostInstallHandlerInterface::handle — Handles the post install process of a post install directive.




Description
================


abstract public [PostInstallHandlerInterface::handle](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface/handle.md)(array $options, array $commonOptions, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : void




Handles the post install process of a post install directive.




Parameters
================


- options

    An array of options, depending on the directive type.

- commonOptions

    An array of common options. It contains the following entries:

- application: Uni2\Application\UniToolApplication. The application instance.
- planetName: string. The name of the planet being processed.

- indentLevel

    

- output

    


Return values
================

Returns void.








See Also
================

The [PostInstallHandlerInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface.md) class.



