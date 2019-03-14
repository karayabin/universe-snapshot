[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)


PostInstallDirectiveHandler::hasOptions
================



PostInstallDirectiveHandler::hasOptions — Returns whether all $requiredOptions are passed in the current options array.




Description
================


protected [PostInstallDirectiveHandler::hasOptions](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/hasOptions.md)(array $requiredOptions, array $currentOptions, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : bool




Returns whether all $requiredOptions are passed in the current options array.
If not, a warning message will be sent to the output.




Parameters
================


- requiredOptions

    An array of required option names.

- currentOptions

    An array of optionName => optionValue

- indentLevel

    

- output

    


Return values
================

Returns bool.








See Also
================

The [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md) class.

Previous method: [checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md)<br>Next method: [warn](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/warn.md)<br>

