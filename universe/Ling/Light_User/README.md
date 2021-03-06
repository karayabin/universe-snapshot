Light_User
===========
2019-05-10 -> 2021-03-05



An user to use in your [Light](https://github.com/lingtalfi/Light) applications.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_User
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_User
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_User api](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception-notes.md)
    - [Conception](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md)
    - [Permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)
- [Related](#related)



Related
=========
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager/), a system for managing users in a Light application 
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase), an user database for the Light framework 



History Log
=============

- 1.7.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.7.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.7.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.7.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.7.0 -- 2020-06-08

    - update LightWebsiteUser concept, the email and the identifier are two different concepts now
    
- 1.6.6 -- 2020-06-04

    - routine commit (check everything is up to date) 

- 1.6.5 -- 2020-03-26

    - rename WebsiteLightUser -> LightWebsiteUser 
    
- 1.6.4 -- 2020-02-25

    - update WebsiteLightUser, add precision to class comment
    
- 1.6.3 -- 2019-12-17

    - update permission conception notes document, add precision about naming convention
    
- 1.6.2 -- 2019-09-18

    - remove WebsiteLightUser->profiles property
    
- 1.6.1 -- 2019-09-11

    - added documentation notes
    
- 1.6.0 -- 2019-09-11

    - added root profile concept
    - fix WebsiteLightUser->hasRight careless implementation
    
- 1.5.1 -- 2019-09-11

    - added permission careless implementation
    
- 1.5.0 -- 2019-09-11

    - added permission concept
    
- 1.4.0 -- 2019-08-07

    - update WebsiteLightUser->updateInfo method
    
- 1.3.0 -- 2019-08-07

    - update WebsiteLightUser, now has an id property
    
- 1.2.0 -- 2019-08-06

    - update WebsiteLightUser, now has an extra property, and a proper (i.e. not email) identifier
    
- 1.1.2 -- 2019-07-19

    - update documentation, add related section
    
- 1.1.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.1.0 -- 2019-07-13

    - add WebsiteLightUser
    - add RefreshableLightUserInterface
    
- 1.0.0 -- 2019-05-10

    - initial commit