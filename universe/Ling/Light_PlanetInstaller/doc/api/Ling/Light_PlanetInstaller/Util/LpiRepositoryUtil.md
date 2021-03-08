[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiRepositoryUtil class
================
2020-12-08 --> 2021-03-05






Introduction
============

The LpiRepositoryUtil class.



Class synopsis
==============


class <span class="pl-k">LpiRepositoryUtil</span>  {

- Properties
    - protected string [$appDir](#property-appDir) ;
    - protected string [$buildDir](#property-buildDir) ;
    - private [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) [$appRepo](#property-appRepo) ;
    - private [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) [$buildRepo](#property-buildRepo) ;
    - private [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) [$globalDirRepo](#property-globalDirRepo) ;
    - private [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) [$webRepo](#property-webRepo) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/__construct.md)() : void
    - public [setAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/setAppDir.md)(string $appDir) : void
    - public [setBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/setBuildDir.md)(string $buildDir) : void
    - public [getFirstMatchingInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getFirstMatchingInfo.md)(string $planetDot, string $versionExpression, ?array $options = []) : array | false
    - public [getAppRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getAppRepository.md)() : [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)
    - public [getBuildRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getBuildRepository.md)() : [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)
    - public [getGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getGlobalDirRepository.md)() : [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)
    - public [getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getWebRepository.md)() : [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)

}




Properties
=============

- <span id="property-appDir"><b>appDir</b></span>

    This property holds the appDir for this instance.
    
    

- <span id="property-buildDir"><b>buildDir</b></span>

    This property holds the buildDir for this instance.
    
    

- <span id="property-appRepo"><b>appRepo</b></span>

    This property holds the appRepo for this instance.
    
    

- <span id="property-buildRepo"><b>buildRepo</b></span>

    This property holds the buildRepo for this instance.
    
    

- <span id="property-globalDirRepo"><b>globalDirRepo</b></span>

    This property holds the globalDirRepo for this instance.
    
    

- <span id="property-webRepo"><b>webRepo</b></span>

    This property holds the webRepo for this instance.
    
    



Methods
==============

- [LpiRepositoryUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/__construct.md) &ndash; Builds the LpiRepositoryUtil instance.
- [LpiRepositoryUtil::setAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/setAppDir.md) &ndash; Sets the appDir.
- [LpiRepositoryUtil::setBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/setBuildDir.md) &ndash; Sets the buildDir.
- [LpiRepositoryUtil::getFirstMatchingInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getFirstMatchingInfo.md) &ndash; Returns an array of info for the first planet that matches the given arguments, or false if nothing matched.
- [LpiRepositoryUtil::getAppRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getAppRepository.md) &ndash; Returns the app repository.
- [LpiRepositoryUtil::getBuildRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getBuildRepository.md) &ndash; Returns the build repository.
- [LpiRepositoryUtil::getGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getGlobalDirRepository.md) &ndash; Returns the global dir repository.
- [LpiRepositoryUtil::getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getWebRepository.md) &ndash; Returns the web repository.





Location
=============
Ling\Light_PlanetInstaller\Util\LpiRepositoryUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\LpiRepositoryUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/LpiRepositoryUtil.php)



SeeAlso
==============
Previous class: [LightPlanetInstallerService](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService.md)<br>Next class: [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)<br>
