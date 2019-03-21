[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ToDirCommand class
================
2019-03-12 --> 2019-03-21






Introduction
============

The ToDirCommand class.

This class converts all the symlinks planets/items of the application pointing to local server equivalents
to regular (i.e. non symlinks) directories.


If the planet/item of the application doesn't have a local server equivalent, it will be
ignored (i.e. the directory will not be created).


So for instance if the application contains 3 planets (from the ling galaxy) and 1 item (from the git dependency system):
(the "-->" symbol represents a symlink)
```txt
- /my_app/universe/
----- Ling/
--------- planetA/   -->  /local_server/Ling/planetA/
--------- planetB/
--------- planetC/
- /my_app/universe-dependencies/
----- git/
--------- item10/    -->  /local_server/git/item10/
```


And if the local server contains planetA and item10:

```txt
- /local_server/
----- Ling/planetA/
----- git/item10/
```


Then after executing the todir command, the application will look like this:


```txt
- /my_app/universe/
----- Ling/
--------- planetA/
--------- planetB/
--------- planetC/
- /my_app/universe-dependencies/
----- git/
--------- item10/
```



Class synopsis
==============


class <span class="pl-k">ToDirCommand</span> extends [UniToolGenericCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Inherited properties
    - protected [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [UniToolGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ToDirCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md)() : void
    - public [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md)([Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application) : void

}






Methods
==============

- [ToDirCommand::run](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ToDirCommand/run.md) &ndash; Runs the command.
- [UniToolGenericCommand::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/__construct.md) &ndash; Builds the UniToolGenericCommand instance.
- [UniToolGenericCommand::setApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/UniToolGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Uni2\Command\ToDirCommand


SeeAlso
==============
Previous class: [StoreMapCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/StoreMapCommand.md)<br>Next class: [ToLinkCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/ToLinkCommand.md)<br>
