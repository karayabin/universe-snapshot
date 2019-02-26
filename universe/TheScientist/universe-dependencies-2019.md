Universe dependencies
=====================
2019-02-08 --> 2019-02-26



Below is a new proposal for the universe dependencies.

Compared to the old system, it allows to:

- import non universe packages (like git stand alone repositories for instance)
- post actions upon installation (for instance, to be able to use some repository, one needs to move the folder into the app at some specific location...)
- use of the wildcard (*) to indicate that the last version of the dependency should be used.





The **dependencies.byml** file ([babyYaml](https://github.com/lingtalfi/BabyYaml) format) should be placed at the root of each planet using dependencies,
and the syntax prototype looks like this:



```yml
dependencies:
    ling:
        Bat: *
        ArrayToString: 1.4.0
    git:
        - https://github.com/tecnickcom/tcpdf: *


post_install:
    -
        action: move
        source_dir: bla
        target_dir: bla2
```


Note for implementors: the **post_install**'s move action is fictive, it's not part of the system yet.

- dependencies: contains all dependencies for the planet  
    - ling: a galaxy identifier (for planets from the ling galaxy).
        - Bat: *, use the last version of Bat available.
        - ArrayToString: 1.4.0, use the ArrayToString planet in version 1.4.0. 1.4.0 should be a tag in the corresponding github repository (that's how planets should work in the universe,
            although there is no formal documentation about it yet).
            
    - git: a download technique (for non-planet packages hosted on github.com)
        - https://github.com/tecnickcom/tcpdf: *, indicates that the last version of the tcpdf repository (not a planet) should be used.
        

- ... more download techniques might be added in the future

- post_install: contains extra actions to perform once all dependencies have been downloaded.
    This is an array, each entry being an action array.
    The action array has the following keys:
        - action: the name of the action.
        - ... other keys, depending on the action name. So far, there is no action, but I will add some in the future if necessary.




Galaxy identifier / download technique
--------------------

The download technique indicates how to download the package.
In the case of a planet (i.e. if the package to download is a planet), then we call it a galaxy identifier, 
since it's aesthetically more pleasing (i.e. it makes sense to group planets into galaxies in the universe nomenclature).



Planet
--------
A [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) package.




Related tools
=============

- [UniverseTools](https://github.com/lingtalfi/UniverseTools)