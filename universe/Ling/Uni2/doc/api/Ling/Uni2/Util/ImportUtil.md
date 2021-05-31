[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The ImportUtil class
================
2019-03-12 --> 2021-05-31






Introduction
============

The ImportUtil class.

Helps with the importing operations used in commands such as:
- import
- reimport
- reimport-all



Class synopsis
==============


class <span class="pl-k">ImportUtil</span>  {

- Properties
    - protected [Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md) [$postInstallHandler](#property-postInstallHandler) ;
    - private [Ling\Uni2\LocalServer\LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) [$localServer](#property-localServer) ;
    - private [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) [$application](#property-application) ;
    - private [Ling\Uni2\ErrorSummary\ErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary.md) [$errorSummary](#property-errorSummary) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/__construct.md)() : void
    - public [setErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/setErrorSummary.md)([Ling\Uni2\ErrorSummary\ErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary.md) $errorSummary) : void
    - public [importPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importPlanet.md)(string $longPlanetName, [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : void
    - protected [importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importItem.md)($dependencySystem, $packageImportName, $appItemDir, Ling\CliTools\Output\OutputInterface $output, array $postInstall, ?array $options = []) : void
    - protected [handlePostInstallDirectives](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/handlePostInstallDirectives.md)(array $postInstall, string $galaxy, string $planetName, [Ling\Uni2\Application\UniToolApplication](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Application/UniToolApplication.md) $application, int $indentLevel, Ling\CliTools\Output\OutputInterface $output) : void

}




Properties
=============

- <span id="property-postInstallHandler"><b>postInstallHandler</b></span>

    This property holds the post install directives handler for this instance.
    
    

- <span id="property-localServer"><b>localServer</b></span>

    This property holds the localServer for this instance.
    
    

- <span id="property-application"><b>application</b></span>

    This property holds the application for this instance.
    
    

- <span id="property-errorSummary"><b>errorSummary</b></span>

    This property holds the errorSummary for this instance.
    
    



Methods
==============

- [ImportUtil::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/__construct.md) &ndash; Builds the ImportUtil instance.
- [ImportUtil::setErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/setErrorSummary.md) &ndash; Sets the errorSummary.
- [ImportUtil::importPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importPlanet.md) &ndash; Imports a planet using the algorithm defined in the **importItem** method of this class.
- [ImportUtil::importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/importItem.md) &ndash; Tries to reimport an item into the current application.
- [ImportUtil::handlePostInstallDirectives](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/ImportUtil/handlePostInstallDirectives.md) &ndash; Handles/executes the given post install directives.





Location
=============
Ling\Uni2\Util\ImportUtil<br>
See the source code of [Ling\Uni2\Util\ImportUtil](https://github.com/lingtalfi/Uni2/blob/master/Util/ImportUtil.php)



SeeAlso
==============
Previous class: [DependencyMasterDiffUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterDiffUtil.md)<br>
