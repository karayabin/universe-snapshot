[Back to the Ling/Deploy api](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy.md)



The DiffCommand class
================
2019-04-03 --> 2019-04-04






Introduction
============

The DiffCommand class.

This command displays the differences to have the site files mirrored on the remote.

The differences are composed of 3 sections:

- add: the files present in the site, not on the remote
- remove: the files present in the remote, not on the site
- replace: the files present in both the site and the remote, but they have a difference (i.e. their hash_id differs)


The diff command uses the [CreateMapCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/CreateMapCommand.md) under the hood.
The maps are recreated on the fly every time.

Symlinks are not followed.

Each map is created using its own configuration: the map on the site is created using the **map-conf** section of the site's conf,
whereas the remote map is created using the **map-conf** section of the remote's conf.

As a way to have more control from the site (rather than the remote), the diff command also reuses the
ignore** key of the **map-conf** section of the site's conf.





Flags
------------
- -f: files. If this flag is set, the diff command will write the diff to 3 files instead of displaying it
to the screen. The 3 files are:
- $app/.deploy/diff-add.txt
- $app/.deploy/diff-remove.txt
- $app/.deploy/diff-replace.txt



Class synopsis
==============


class <span class="pl-k">DiffCommand</span> extends [DeployGenericCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - protected string [$sentenceCreateDiff](#property-sentenceCreateDiff) ;
    - protected bool [$reverse](#property-reverse) ;

- Inherited properties
    - protected [Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) [DeployGenericCommand::$application](#property-application) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int

- Inherited methods
    - public [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md)([Ling\Deploy\Application\DeployApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Application/DeployApplication.md) $application) : void

}




Properties
=============

- <span id="property-sentenceCreateDiff"><b>sentenceCreateDiff</b></span>

    This property holds the sentenceCreateDiff for this instance.
    An informative sentence to display on the console.
    
    

- <span id="property-reverse"><b>reverse</b></span>

    This property holds the reverse for this instance.
    If false (by default), the diff is a map to transform the remote into the local application.
    If true, the diff is a map to transform the local application into the remote application.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the DeployApplication instance.
    
    



Methods
==============

- [DiffCommand::__construct](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/__construct.md) &ndash; Builds the DeployGenericCommand instance.
- [DiffCommand::run](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffCommand/run.md) &ndash; Runs the command.
- [DeployGenericCommand::setApplication](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DeployGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\Deploy\Command\DiffCommand


SeeAlso
==============
Previous class: [DiffBackCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DiffBackCommand.md)<br>Next class: [DropDatabaseCommand](https://github.com/lingtalfi/Deploy/blob/master/doc/api/Ling/Deploy/Command/DropDatabaseCommand.md)<br>
