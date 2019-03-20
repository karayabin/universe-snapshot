[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The PostInstallDirectiveHandler class
================
2019-03-12 --> 2019-03-19






Introduction
============

The PostInstallDirectiveHandler class.
This class knows how to handle [post install directives](https://github.com/lingtalfi/Uni2/blob/master/README.md#dependenciesbyml).



Class synopsis
==============


class <span class="pl-k">PostInstallDirectiveHandler</span>  {

- Methods
    - public [handleDirective](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/handleDirective.md)(string $directiveName, ?$directiveConf, Ling\CliTools\Output\OutputInterface $output, array $options = []) : void
    - protected [checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md)(string $thingName, ?$thing, string $expectedType, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : bool
    - protected [hasOptions](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/hasOptions.md)(array $requiredOptions, array $currentOptions, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : bool
    - protected [warn](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/warn.md)(string $msg, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : void
    - protected [info](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/info.md)(string $msg, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : void

}






Methods
==============

- [PostInstallDirectiveHandler::handleDirective](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/handleDirective.md) &ndash; Handles a the given post install directive.
- [PostInstallDirectiveHandler::checkType](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/checkType.md) &ndash; Returns whether the given $thing is of the $expectedType type.
- [PostInstallDirectiveHandler::hasOptions](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/hasOptions.md) &ndash; Returns whether all $requiredOptions are passed in the current options array.
- [PostInstallDirectiveHandler::warn](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/warn.md) &ndash; Sends a well formatted warning message to the output.
- [PostInstallDirectiveHandler::info](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler/info.md) &ndash; Sends a well formatted info message to the output.





Location
=============
Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler


SeeAlso
==============
Previous class: [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)<br>Next class: [PostInstallHandlerInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface.md)<br>
