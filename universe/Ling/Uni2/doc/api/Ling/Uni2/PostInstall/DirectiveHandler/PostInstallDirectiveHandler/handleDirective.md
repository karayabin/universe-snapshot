[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)


PostInstallDirectiveHandler::handleDirective
================



PostInstallDirectiveHandler::handleDirective — Handles a the given post install directive.




Description
================


public [PostInstallDirectiveHandler::handleDirective](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/handleDirective.md)(string $directiveName, ?$directiveConf, Ling\CliTools\Output\OutputInterface $output, array $options = []) : void




Handles a the given post install directive.




Parameters
================


- directiveName

    The directive type/name.

- directiveConf

    The post install directive configuration.
It can be a string or an array and depends on the type.
See the @(post install directive configuration page) for more info.

- output

    The output to writes to.

- options

    An array of options.
Available options are:
- indentLevel: int = 0. The base indent level for all the output messages.
All the output messages will be indented in relation with this base level.
- application: Uni2\Application\UniToolApplication. The application instance.
- planetName: string. The name of the planet being processed.


Return values
================

Returns void.








See Also
================

The [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md) class.

Next method: [checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md)<br>

