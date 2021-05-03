[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)



The AppBoilerplateUtil class
================
2019-03-13 --> 2021-03-22






Introduction
============

The AppBoilerplateUtil class.



Class synopsis
==============


class <span class="pl-k">AppBoilerplateUtil</span>  {

- Properties
    - private string [$uniDir](#property-uniDir) ;
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)|null [$output](#property-output) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/__construct.md)() : void
    - public [setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [getBoilerplateDependencies](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/getBoilerplateDependencies.md)() : array
    - public [upgradeBoilerplate](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/upgradeBoilerplate.md)() : void
    - private [newArchive](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/newArchive.md)() : void
    - private [msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/msg.md)(string $message) : void

}




Properties
=============

- <span id="property-uniDir"><b>uniDir</b></span>

    This property holds the uniDir for this instance.
    
    

- <span id="property-output"><b>output</b></span>

    This property holds the output for this instance.
    
    



Methods
==============

- [AppBoilerplateUtil::__construct](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/__construct.md) &ndash; Builds the AppBoilerplateUtil instance.
- [AppBoilerplateUtil::setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/setOutput.md) &ndash; Sets the output.
- [AppBoilerplateUtil::getBoilerplateDependencies](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/getBoilerplateDependencies.md) &ndash; Returns the dependencies packed in the boilerplate.
- [AppBoilerplateUtil::upgradeBoilerplate](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/upgradeBoilerplate.md) &ndash; Upgrades the boilerplate for the Light_AppBoilerplate planet.
- [AppBoilerplateUtil::newArchive](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/newArchive.md) &ndash; Creates a brand new zip archive containing the light app boilerplate.
- [AppBoilerplateUtil::msg](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/AppBoilerplateUtil/msg.md) &ndash; Writes the message to the output.





Location
=============
Ling\LingTalfi\Util\AppBoilerplateUtil<br>
See the source code of [Ling\LingTalfi\Util\AppBoilerplateUtil](https://github.com/lingtalfi/LingTalfi/blob/master/Util/AppBoilerplateUtil.php)



SeeAlso
==============
Previous class: [UpdateAllPlanetsTool](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Tools/UpdateAllPlanetsTool.md)<br>Next class: [CommitUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Util/CommitUtil.md)<br>
