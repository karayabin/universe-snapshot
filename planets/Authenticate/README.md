Authenticate
======================
2017-04-10


A system to handle permissions in your application.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Authenticate
```

Or just download it and place it where you want otherwise.





About
==========
This planet is an improved variation of the [Privilege planet](https://github.com/lingtalfi/Privilege).

It works with badges: it's all about badges.

Having the permission to do something is equivalent to ask the question: do you have that badge?


There are five main objects involved:

- BadgeStore: knows the list of badges per profile
- Grantor: tells whether or not the SessionUser has a given badge
- SessionUser: represents the current user. It's called a session user because data are stored in the php sessions.
- User: represents an UserStore user. Each user has at least an id, a name, a password and a profile.
        It can also holds extraneous information
- UserStore: contains all the Users


So, the synopsis is that we receive the connexion credentials from a form,
we then use the UserStore to see if a User matches the credentials.
If so, we use that User to create the SessionUser (which survives the page refresh thanks to the session mechanism).

In parallel, we've already configured a Grantor instance with a BadgeStore bound to it,
and therefore we can use the **has** method of the Grantor object, which tells us whether or not
the SessionUser owns a given badge.





Tutorial
==========

In the doc directory of this repository, you will find three files:

- demo.php
- store/profiles.php
- store/users.php


The demo contains the main code, which leverages the Grantor object. 
One should adapt the demo code to one's application.

The demo code contains the following:

```php
<?php


use Authenticate\BadgeStore\FileBadgeStore;
use Authenticate\Grant\Grantor;
use Authenticate\SessionUser\SessionUser;
use Authenticate\UserStore\FileUserStore;
use Authenticate\Util\UserToSessionConvertor;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//--------------------------------------------
// CONFIG
//--------------------------------------------
$d = __DIR__ . "/store";
$f = $d . "/users.php";
$userStore = FileUserStore::create()->setFile($f);


//--------------------------------------------
// SCRIPT
//--------------------------------------------
if ("form submitted") {
    $_POST = [
        "username" => "me",
        "pass" => "me",
    ];
    if (false !== ($user = $userStore->getUserByCredentials($_POST['username'], $_POST['pass']))) {


        $props = UserToSessionConvertor::toSession($user);
        SessionUser::connect($props);


        // prepare the badgeStore instance
        $f = $d . "/profiles.php";
        $badgeStore = FileBadgeStore::create()
            ->setFile($f);


        // prepare the grantor instance
        $grantor = Grantor::create()->setBadgeStore($badgeStore);


        /**
         * Now we can safely use the grantor (which is the goal of this snippet)
         */
        a($grantor->has("badge4")); // true


    } else {
        echo "invalid credentials";
    }
}

```



The demo code leverages a userStore using a file to store the users.

This technique might fit an admin website, with very few well known users.

The userStore leverages the **store/users.php** file, which contains the following code:


```php
<?php

$users = [
    'id_of_me_user' => [
        'name' => 'me',
        'pass' => 'me',
        'profile' => 'root',
    ],
];
```


Then we have the profileStore. Again the demo code uses a profileStore which uses a file as its storage.

The storage file is **store/profiles.php** and contains the following:

```php
<?php


$store = [
    'profiles' => [
        "root" => [
            "groups" => [
                "group3",
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
        "group2" => [
            "groups" => [],
            "badge5",
            "badge6",
        ],
        "group3" => [
            "groups" => [
                "group1",
            ],
            "badge7",
            "badge8",
        ],
    ],
];
```


Hopefully this was helpful.






History Log
------------------
   
- 1.6.0 -- 2017-11-08

    - add SessionUser::getAll method
    
- 1.5.0 -- 2017-05-15

    - SessionUser::$key is now public
    
- 1.4.1 -- 2017-05-07

    - fix Grantor.rootName to grant root all powers
    
- 1.4.0 -- 2017-05-06

    - add BadgeStore.hasBadge method
    
- 1.3.0 -- 2017-05-05

    - add UserStoreInterface.getUsers method
    
- 1.2.0 -- 2017-05-04

    - add ProfileMergeTool
    
- 1.1.0 -- 2017-05-04

    - add Grantor.rootName to grant root all powers
    
- 1.0.0 -- 2017-04-10

    - initial commit
    