Authenticate Strategy
==========================
2017-05-04


In kamille, we like to use the [Authenticate planet](https://github.com/lingtalfi/Authenticate) as our 
privilege handling system.



Here is a convention I suggest, modules authors can adhere to that convention or not.
 
 
Convention
================
 

Context, the 3 profiles
-----------------------
The authenticate system uses mainly 3 profiles:

- root
- admin
- user


The last one, user, is implicit, so there is only 2 created profiles: root and admin, and 1 implicit profile,
which is implicitly given to the session user.

```php
SessionUser::isConnected(); // if the SessionUser is connected, it already means that it's an user of the system she successfully authenticated into
```


As one can guess, root has all powers, no barriers.

Admin is the chosen name for a group with elevated privileges, notion which needs to be considered by every module author.



Naming convention
-----------------------
 
Here is an example of a badgeStore (see Authenticate planet doc for more info) structure BEFORE and AFTER
the installation of the imaginary XY module.


### BEFORE

```php
<?php


$store = [
    'profiles' => [
        "admin" => [
            "groups" => [],
            "badge1",
            "badge2",
        ],
    ],
    'groups' => [
        "group1" => [
            "groups" => [],
            "badge3",
            "badge4",
        ],
    ],
];
```

### AFTER

```php
<?php


$store = [
    'profiles' => [
        "admin" => [
            "groups" => [
                "XY-admin",    
            ],
            "badge1",
            "badge2",
        ],
    ],
    'groups' => [
        "group1" => [
            "groups" => [],
            "badge3",
            "badge4",
        ],
        "XY" => [
            "badge5",
            "badge6",
        ],
        "XY-admin" => [
            "groups" => [],
            "badge7",
            "badge8",
        ],
    ],
];
```



So, as you can see, a module XY brings only two badge groups: XY and XY-admin.

The XY group has the same name as the module, and contains user level badges.
The XY-admin group has the same name as the module, but with the "-admin" suffix, and contains admin level badges.

Finally, the XY-admin group is appended as a group to the admin profile.






How to: implementation
===========

The implementation in kamille is straightforward.

You add your own badges by creating a **profiles.php** file at the root of your module.
The syntax is the syntax described in the **Authenticate\BadgeStore\FileBadgeStore** class' source code comments.


So, for instance, here is what would contain the **profiles.php** file of the XY module (following up on the previously
given example):


```php
<?php

$store = [
    'profiles' => [
        "admin" => [
            "groups" => [
                "XY-admin",    
            ],
        ],
    ],
    'groups' => [
        "XY" => [
            "badge5",
            "badge6",
        ],
        "XY-admin" => [
            "groups" => [],
            "badge7",
            "badge8",
        ],
    ],
];
```


And then, extend the KamilleModule class, which will do the merging boring stuff for you upon installation/uninstallation
of your module.

Important note: the KamilleModule class expects that the you are using a FileBadgeStore with a store path of **app/store/Authenticate/profiles.php**,
which is the default as long as you have the Authenticate module installed.
 




Conclusion
===============

The benefit of this convention is that it doesn't use tons of badges groups.












