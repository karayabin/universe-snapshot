Conception notes
========
2020-12-08 -> 2021-02-12






The planets and assets/map
=========
2020-12-21

The **assets/map** directory is an unofficial convention used by all planets in the **Ling** galaxy.




The promise is that anything stored into this directory will be mapped to the current application when the planet is
imported into that application.

This trick was used by the [Uni2 installer](https://github.com/lingtalfi/Uni2): [uni](https://github.com/lingtalfi/universe-naive-importer).
It's discussed briefly in the [dependencies section](https://github.com/lingtalfi/Uni2#dependenciesbyml) in the uni documentation, but we think it's a great feature.


We've decided to make it "official" by incorporating into our tools.

You can now import a planet using our **PlanetTool::importPlanetByExternalDir** method, which copies both the source
planet directory and the **assets/map** to the target application.

We've also the **PlanetTool::removePlanet** method, which does the opposite: remove the **assets/map** files, then the
source planet directory.

Note that when we remove **assets/map** files, we only remove files, not directories, as a directory might potentially
be used by other third-party authors.

### assets/map example

So for instance, let's say your planet is named **Ling/ABC** and has the following structure:

- universe/Ling/ABC/:
    - assets/map/:
        - config/abc.byml
        - www/templates/abc.html

Then when you import the **Ling/ABC** planet into the app, the app will look like this:

- app/
    - universe/Ling/ABC/
    - config/abc.byml
    - www/templates/abc.html




Machine universe
===========
2021-02-12

A planet is generally used in the context of an app.

However, some planets require working in the context of the hosting machine (i.e. your computer).

We provide the **machine universe** concept, which is a directory inside which such planets can store
their host sensitive configuration/assets.

The **machine universe** directory is by default **/usr/local/share/universe**.

It can be changed by setting its value in the **/usr/local/share/universe/Ling/UniverseTools/machine-universe-path.txt** file.

This file's location is not customizable.

So again, by default we have **$machineUniversePath** = **/usr/local/share/universe**.


Now that we have a **$machineUniversePath** variable, planets which need host-sensitive conf/assets can store
their things in the **$machineUniversePath/$galaxy/$planet** directory.

Using this convention improves the general organization of universe related files.




Local universe
===========
2021-02-18


The **local universe** is the concept of having a universe version on your machine.

As the main developer of the universe so far, I have a local version. 

In general, universe developers have such a version on their machine.

Amongst other things, the **local universe** can be used as a cache of the web universe by certain tools, saving a few http requests.


The default location of the **local universe** is: 

- /myphp/universe


This default location can be changed by setting its new value in the **/usr/local/share/universe/Ling/UniverseTools/local-universe-path.txt** file.
























