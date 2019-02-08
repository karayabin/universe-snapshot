Universe dependencies
=====================
2019-02-08



Below is a new proposal for the universe dependencies.

Compared to the old system, it allows to:

- import non universe packages (like git stand alone repositories for instance)
- post actions upon installation (for instance, to be able to use some repository, one needs to move the folder into the app at some specific location...)
- use of the wildcard (*) to indicate that the last version of the dependency should be used.



The syntax prototype looks like this:

```yml
universe:
    ling:
        Bat: *
        ArrayToString: 1.4.0
git:
    - https://github.com/tecnickcom/tcpdf


post_install:
    -
        action: move
        source_dir: bla
        target_dir: bla2
```


Note for implementors: the **post_install**'s move action is fictive, it's not part of the system yet.

The other parts are ok to implement and self explanatory:

- universe: contains the dependencies for the universe.
    - ling: name of the universe maintainer.
        - Bat: *, use the last version of Bat available.
        - ArrayToString: 1.4.0, use the ArrayToString planet in version 1.4.0. 1.4.0 should be a tag in the corresponding github repository (that's how planets should work in the universe,
            although there is no formal documentation about it yet).
- git: contains dependencies to stand-alone github repositories.
    - https://github.com/tecnickcom/tcpdf, use the tcpdf repository. No version is specified, so the last version should be used.
        If we want to use a specific version (tag), we need to use the triple colon (:::) separator, for instance:
        - https://github.com/tecnickcom/tcpdf:::6.2.25
        - https://github.com/tecnickcom/tcpdf:::6.2.13
        - https://github.com/tecnickcom/tcpdf:::*
        Note: this omission of the tag only works for the git dependency system, the dependencies in the universe dependency
        must always specify the tag (or wildcard).

- ... more dependency systems might be added in the future

- post_install: contains extra actions to perform once all dependencies have been downloaded.
    This is an array, each entry being an action array.
    The action array has the following keys:
        - action: the name of the action.
        - ... other keys, depending on the action name. So far, there is no action, but I will add some in the future if necessary.




The dependencies should be expressed in the form of a [babyYaml](https://github.com/lingtalfi/BabyYaml) file at the root of the planet.
The file name must be: **dependencies.byml**.



Related tools
=============

- [UniverseTools](https://github.com/lingtalfi/UniverseTools)