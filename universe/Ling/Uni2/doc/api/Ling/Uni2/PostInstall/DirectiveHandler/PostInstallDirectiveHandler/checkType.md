[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)


PostInstallDirectiveHandler::checkType
================



PostInstallDirectiveHandler::checkType — Returns whether the given $thing is of the $expectedType type.




Description
================


protected [PostInstallDirectiveHandler::checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md)(string $thingName, $thing, string $expectedType, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : bool




Returns whether the given $thing is of the $expectedType type.
If not, a warning message will be sent to the output.




Parameters
================


- thingName

    The name of the thing (for the warning message in case of failure).

- thing

    The thing which type is to be tested.

- expectedType

    The expected type.

- indentLevel

    

- output

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [PostInstallDirectiveHandler::checkType](https://github.com/lingtalfi/Uni2/blob/master/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.php#L184-L193)


See Also
================

The [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md) class.

Previous method: [handleDirective](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/handleDirective.md)<br>Next method: [hasOptions](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/hasOptions.md)<br>

