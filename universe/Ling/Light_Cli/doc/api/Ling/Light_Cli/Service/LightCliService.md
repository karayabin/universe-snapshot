[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The LightCliService class
================
2021-01-07 --> 2021-02-12






Introduction
============

The LightCliService class.



Class synopsis
==============


class <span class="pl-k">LightCliService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface[]](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md) [$cliApps](#property-cliApps) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/setOptions.md)(array $options) : void
    - public [registerCliApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/registerCliApp.md)(string $appId, [Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md) $cliApp) : void
    - public [getCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/getCliApps.md)() : [LightCliApplicationInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md)
    - private [error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_Cli conception notes](https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-cliApps"><b>cliApps</b></span>

    The registered cli apps.
    
    An array of appId => LightCliApplicationInterface.
    
    



Methods
==============

- [LightCliService::__construct](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/__construct.md) &ndash; Builds the LightCliService instance.
- [LightCliService::setContainer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/setContainer.md) &ndash; Sets the container.
- [LightCliService::setOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/setOptions.md) &ndash; Sets the options.
- [LightCliService::registerCliApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/registerCliApp.md) &ndash; Register a light cli app.
- [LightCliService::getCliApps](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/getCliApps.md) &ndash; Returns the cliApps of this instance.
- [LightCliService::error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Service/LightCliService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Cli\Service\LightCliService<br>
See the source code of [Ling\Light_Cli\Service\LightCliService](https://github.com/lingtalfi/Light_Cli/blob/master/Service/LightCliService.php)



SeeAlso
==============
Previous class: [LightCliFormatHelper](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Helper/LightCliFormatHelper.md)<br>Next class: [LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md)<br>
