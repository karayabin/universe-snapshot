Universe dependencies
=====================
2019-02-08 --> 2019-02-26



Below is a new proposal for the universe dependencies.

Compared to the old system, it allows to:

- import non universe packages (like git stand alone repositories for instance)
- post actions upon installation (for instance, to be able to use some repository, one needs to move the folder into the app at some specific location...)
- always use the last package/planet version available 





The **dependencies.byml** file ([babyYaml](https://github.com/lingtalfi/BabyYaml) format) should be placed at the root of each planet using dependencies,
and the syntax prototype looks like this:



```yml
dependencies:
    ling:
        - Bat
        - ArrayToString
    git:
        - https://github.com/tecnickcom/tcpdf


post_install:
    handler:
        name: My\Class\Name
        options
            option1: blabla
```

And a more formal notation would be this:

```yaml
dependencies:
    $dependencySystem:
        - $packageImportName
post_install:
    $directiveName: $directiveConfiguration
```



Note for implementors: the **post_install**'s move action is fictive, it's not part of the system yet.

- dependencies: contains all dependencies for the planet  
    - ling: a galaxy identifier (for planets from the ling galaxy).
        - Bat: use the last version of Bat available.
        - ArrayToString: use the last version of ArrayToString available
            
    - git: a dependency system (for non-planet packages hosted on github.com)
        - https://github.com/tecnickcom/tcpdf: use the last version of the tcpdf repository (not a planet) should be used.
        

- ... more download techniques might be added in the future

- post_install: contains extra actions to perform once all dependencies have been downloaded.
    This is an array of key/value pairs.
    Each key is the name of the directive to execute, and each value is the directive configuration.
    The directive configuration is either a string or an array, depending on the directive type.
    
    The following directives are available:
    
    - handler: 
        - name: string. The class name of the handler to call. 
        - ?options: array. An array of options to pass to the handler.
            
    Note: the handler directive is a way to delegate the handling of the post install process to a class, rather
    than relying on the post_install syntax of the dependencies.byml file.
    This might be the most used directive.
    
    Other directives might be provided by the implementor of this system.            
             
    




Galaxy identifier / dependency system
--------------------

The dependency system indicates how to download the package.
In the case of a planet (i.e. if the package to download is a planet), then we call it a galaxy identifier, 
since it's aesthetically/semantically more pleasing to the ears (i.e. it makes sense to group planets into galaxies in the universe nomenclature).

However, the galaxy identifier is not really like a namespace for planets, because all planets merge in the same universe.
So each planet name must be unique in relation to the universe, and so two planets in the universe can't have the same name, 
even if they come from different galaxies. 

Note: that's because otherwise we would have to deal with multiple autoloaders, which would probably be more complicated. 



Planet
--------

A [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) package.





Why dependencies don't specify the version number?
------------------------------

You might have notice that there is no version number specified in the dependencies.

That's because there was a problem I didn't want to deal with:

Imagine a planet A has dependencies to planets B in version 1.4.0 and C in version 1.0.0.
Now imagine that planet C has dependencies to planet B in version 2.2.1.

Or graphically put:

```txt
- A:
-----> B: 1.4.0
-----> C: 1.0.0
- C:
-----> B: 2.2.1
```

Now the problem I didn't want to deal with was: so what version of B do you import when you import planet A,
do you import version 1.4.0 or version 2.2.1.

So rather than dealing with this problem, in the universe, my approach is to say that if your planet uses a dependency,
it has to use it until the end. 

So if you are the author of planet A which depends on planet B, and B upgrades to version 2.2.1, then you have two options:

- either you don't like the new B api, and so you break the dependency to the new B api.
    This will involve some extra work for you:        
    - you could fork the old B api and make a new dependency to this old B api 
    - or you could integrate the B code directly in your planet (make the B code a part of your A planet)
        
- or you embrace the change in the B api, updating your A planet codebase to adapt with the new B api, and thus conserving the dependency to the B planet.


So, that might not be the soundest dependency management system possible, but at least with this "naive" approach you don't have complex dependency conflicts:
you either use a dependency forever, or you don't use it at all.

I believe this is a simpler approach to the dependency problem, and that's why I personally like it over more sophisticated (but also more complex) systems.


The version number of planets still has some importance though: it is used in the upgrading planets process, but this part is a job for the @page(uni-tool).

  
















Related tools
=============

- [UniverseTools](https://github.com/lingtalfi/UniverseTools)