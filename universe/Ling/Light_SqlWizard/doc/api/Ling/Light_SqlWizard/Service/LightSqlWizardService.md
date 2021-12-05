[Back to the Ling/Light_SqlWizard api](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard.md)



The LightSqlWizardService class
================
2021-06-28 --> 2021-06-28






Introduction
============

The LightSqlWizardService class.



Class synopsis
==============


class <span class="pl-k">LightSqlWizardService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void
    - public [getMysqlWizard](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getMysqlWizard.md)() : [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)
    - private [error](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_SqlWizard conception notes](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightSqlWizardService::__construct](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/__construct.md) &ndash; Builds the LightSqlWizardService instance.
- [LightSqlWizardService::setContainer](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/setContainer.md) &ndash; Sets the container.
- [LightSqlWizardService::setOptions](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/setOptions.md) &ndash; Sets the options.
- [LightSqlWizardService::getOption](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getOption.md) &ndash; Returns the option value corresponding to the given key.
- [LightSqlWizardService::getMysqlWizard](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/getMysqlWizard.md) &ndash; Returns a configured MysqlWizard instance.
- [LightSqlWizardService::error](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Service/LightSqlWizardService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_SqlWizard\Service\LightSqlWizardService<br>
See the source code of [Ling\Light_SqlWizard\Service\LightSqlWizardService](https://github.com/lingtalfi/Light_SqlWizard/blob/master/Service/LightSqlWizardService.php)



SeeAlso
==============
Previous class: [LightSqlWizardException](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard/Exception/LightSqlWizardException.md)<br>
