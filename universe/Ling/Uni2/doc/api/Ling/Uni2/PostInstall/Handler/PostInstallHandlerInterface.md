[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The PostInstallHandlerInterface class
================
2019-03-12 --> 2019-03-19






Introduction
============

The PostInstallHandlerInterface interface.

This is a handler class for the post install process.
See the [post install page](https://github.com/lingtalfi/Uni2/blob/master/README.md#dependencies-byml) for more info.

The idea is to delegate all the post install work to this class,
rather than using other post install directives.



Class synopsis
==============


abstract class <span class="pl-k">PostInstallHandlerInterface</span>  {

- Methods
    - abstract public [handle](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface/handle.md)(array $options, array $commonOptions, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : void

}






Methods
==============

- [PostInstallHandlerInterface::handle](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/Handler/PostInstallHandlerInterface/handle.md) &ndash; Handles the post install process of a post install directive.





Location
=============
Ling\Uni2\PostInstall\Handler\PostInstallHandlerInterface


SeeAlso
==============
Previous class: [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)<br>Next class: [DependencyMasterBuilderUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterBuilderUtil.md)<br>
