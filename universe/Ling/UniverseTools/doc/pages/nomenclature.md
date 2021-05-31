Nomenclature
===========
2020-07-09 -> 2021-05-12



Here is some nomenclature we can use:




Planet identifier
----------
2020-07-09

Same definition as the [universe snapshot's definition for planetIdentifier](https://github.com/karayabin/universe-snapshot#the-planet-identifier).




Tight planet name
---------
2020-07-09 -> 2020-11-17


The planet name, with underscores removed.

It's an alias for the [compressed planet name](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name).

So for instance a planet with name **Light_MyPlugin** will have a tight name of: **LightMyPlugin**.


You can use our [PlanetTool::getTightPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getTightPlanetName.md) method to get the tight name.



bang
---------
2021-05-12


To bang something means to inject the minimal universe in it, which contains:

- the [bigbang](https://github.com/karayabin/universe-snapshot#big-bang-the-beginning-of-the-universe) script
- the BumbleBee class (which is used as the autoloader by the bigbang script)


We can bang an application directory, or a universe directory.

If we bang an application directory, it will look like this:

- $appDir/universe/
    - bigbang.php
    - Ling/
        - BumbleBee/ 
            - ... various files...     
    

Or we can bang the universe directory directly (same result, but without the $appDir).
