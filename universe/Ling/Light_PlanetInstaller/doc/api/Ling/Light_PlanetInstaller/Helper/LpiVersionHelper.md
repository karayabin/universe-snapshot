[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiVersionHelper class
================
2020-12-08 --> 2021-05-03






Introduction
============

The LpiVersionHelper class.



Class synopsis
==============


class <span class="pl-k">LpiVersionHelper</span>  {

- Methods
    - public static [toMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/toMiniVersionExpression.md)(string $planetDot, string $versionExpr) : string
    - public static [getRealVersionByVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/getRealVersionByVersionExpression.md)(string $planetDotName, string $versionExpr) : string
    - public static [extractMiniVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/extractMiniVersion.md)(string $miniVersionExpr) : array
    - public static [isPolaritySymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPolaritySymbol.md)(string $modifierSymbol) : bool
    - public static [versionMeetsExpectations](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/versionMeetsExpectations.md)(string $realVersion, string $miniVersionExpr, ?string &$highestVersion = null) : bool
    - public static [isGreaterThan](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isGreaterThan.md)(string $v1, string $v2) : bool
    - public static [shouldBeReplaced](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/shouldBeReplaced.md)(string $realVersion, string $versionExpr) : bool
    - public static [compare](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/compare.md)(string $realVersion1, string $realVersion2, ?bool $orEqual = false) : bool
    - public static [getFirstMatchingVersionByRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/getFirstMatchingVersionByRepository.md)(string $planetDot, $versionExpr, [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) $repository) : false | string
    - public static [isPlus](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPlus.md)(string $versionExpr) : bool
    - public static [isMinus](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isMinus.md)(string $versionExpr) : bool
    - public static [removeModifierSymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/removeModifierSymbol.md)(string $versionExpr) : string
    - public static [equalizeVersionNumbers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/equalizeVersionNumbers.md)(string &$realVersion1, string &$realVersion2) : void

}






Methods
==============

- [LpiVersionHelper::toMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/toMiniVersionExpression.md) &ndash; Returns the mini version of the given version expression.
- [LpiVersionHelper::getRealVersionByVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/getRealVersionByVersionExpression.md) &ndash; Returns the real version corresponding to the given planet and versionExpr, or throws an exception in case of problem.
- [LpiVersionHelper::extractMiniVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/extractMiniVersion.md) &ndash; Returns an information array about the given mini version expression.
- [LpiVersionHelper::isPolaritySymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPolaritySymbol.md) &ndash; Returns whether the given modifierSymbol is a polarity symbol.
- [LpiVersionHelper::versionMeetsExpectations](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/versionMeetsExpectations.md) &ndash; Returns whether the given real version meets the expectations of the given mini version expression.
- [LpiVersionHelper::isGreaterThan](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isGreaterThan.md) &ndash; Returns whether real version 1 is greater than or equal to real version 2.
- [LpiVersionHelper::shouldBeReplaced](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/shouldBeReplaced.md) &ndash; Returns whether the real version should be replaced with the challenger version expression.
- [LpiVersionHelper::compare](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/compare.md) &ndash; Returns whether version 1 is strictly greater than version 2.
- [LpiVersionHelper::getFirstMatchingVersionByRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/getFirstMatchingVersionByRepository.md) &ndash; Returns the first real version number of the planet that matches $versionExpr, or false if not possible.
- [LpiVersionHelper::isPlus](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPlus.md) &ndash; Returns whether the given versionExpression ends with the plus symbol.
- [LpiVersionHelper::isMinus](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isMinus.md) &ndash; Returns whether the given versionExpression ends with the minus symbol.
- [LpiVersionHelper::removeModifierSymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/removeModifierSymbol.md) &ndash; Removes the trailing plus symbol from the given version expression and returns the result.
- [LpiVersionHelper::equalizeVersionNumbers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/equalizeVersionNumbers.md) &ndash; Equalizes the two given real version numbers, so that they have the same number of dot separated components.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiVersionHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiVersionHelper.php)



SeeAlso
==============
Previous class: [LpiUniDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper.md)<br>Next class: [LpiWebHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiWebHelper.md)<br>
