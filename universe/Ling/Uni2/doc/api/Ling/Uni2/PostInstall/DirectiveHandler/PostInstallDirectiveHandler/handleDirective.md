[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)


PostInstallDirectiveHandler::handleDirective
================



PostInstallDirectiveHandler::handleDirective — Handles a the given post install directive.




Description
================


public [PostInstallDirectiveHandler::handleDirective](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/handleDirective.md)(string $directiveName, ?$directiveConf, Ling\CliTools\Output\OutputInterface $output, array $options = []) : void




Handles a the given post install directive.


The following directives have been implemented:

```txt
- handler: array. Delegates the handling to another class.
----- name: string. The class name of the handler to call.
----- ?options: array. An array of options to pass to the handler.
- composer: array of composer commands without the composer prefix. For instance:
----- require filp/whoops
- map: string|null. Will map a directory found inside the installed planet to the application root directory.
         By default: if null, the map value will be: "assets/map".
         This means that all files found inside the "assets/map" directory at the root of the installed planet
         will be copied to (and overwriting existing files with the same names) the application root directory.


```




Parameters
================


- directiveName

    The directive type/name.

- directiveConf

    The post install directive configuration.
It can be a string or an array and depends on the type.
See the @page(post install directives page) for more info.

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


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PostInstallDirectiveHandler::handleDirective](https://github.com/lingtalfi/Uni2/blob/master/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.php#L66-L158)


See Also
================

The [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md) class.

Next method: [checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md)<br>

