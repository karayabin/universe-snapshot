[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The PackLightPluginCommand class
================
2019-03-13 --> 2019-08-14






Introduction
============

The PackLightPluginCommand class.


This command basically copies some special files from the application
to the map directory of the Light plugin, so that the Light plugin planet can then use the
post_install.map = true directive in its dependencies.byml file.

It is assumed that you are calling this command from the light plugin directory (i.e.
the current working directory should be the light plugin directory/planet).


It copies the following, based on a plugin named Light_MyPlugin (for instance):

- $app/config/services/Light_MyPlugin.byml
- $app/config/kit/pages/Light_MyPlugin/
- $app/templates/Light_MyPlugin/
- $app/www/plugins/Light_MyPlugin/




Options
------------

- a: the application dir path



Class synopsis
==============


class <span class="pl-k">PackLightPluginCommand</span> extends [KaosGenericCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand.md) implements [CommandInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Command/CommandInterface.md) {

- Properties
    - private string [$_applicationDir](#property-_applicationDir) ;
    - private string [$_mapDir](#property-_mapDir) ;

- Inherited properties
    - protected [Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) [KaosGenericCommand::$application](#property-application) ;

- Methods
    - public [run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand/run.md)(Ling\CliTools\Input\InputInterface $input, Ling\CliTools\Output\OutputInterface $output) : int
    - protected [copyItem](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand/copyItem.md)(string $relPath, Ling\CliTools\Output\OutputInterface $output, int $indentLevel) : void

- Inherited methods
    - public [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md)() : void
    - public [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md)([Ling\LingTalfi\Kaos\Application\KaosApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Application/KaosApplication.md) $application) : void

}




Properties
=============

- <span id="property-_applicationDir"><b>_applicationDir</b></span>

    This property holds the applicationDir for this instance.
    
    

- <span id="property-_mapDir"><b>_mapDir</b></span>

    This property holds the mapDir for this instance.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the KaosApplication instance.
    
    



Methods
==============

- [PackLightPluginCommand::run](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand/run.md) &ndash; Runs the command.
- [PackLightPluginCommand::copyItem](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackLightPluginCommand/copyItem.md) &ndash; 
- [KaosGenericCommand::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/__construct.md) &ndash; Builds the KaosGenericCommand instance.
- [KaosGenericCommand::setApplication](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/KaosGenericCommand/setApplication.md) &ndash; Sets the application.





Location
=============
Ling\LingTalfi\Kaos\Command\PackLightPluginCommand<br>
See the source code of [Ling\LingTalfi\Kaos\Command\PackLightPluginCommand](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Command/PackLightPluginCommand.php)



SeeAlso
==============
Previous class: [PackAndPushUniToolCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PackAndPushUniToolCommand.md)<br>Next class: [PushCommand](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Command/PushCommand.md)<br>
