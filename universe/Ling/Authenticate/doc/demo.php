<?php


use Ling\Authenticate\BadgeStore\FileBadgeStore;
use Ling\Authenticate\Grant\Grantor;
use Ling\Authenticate\SessionUser\SessionUser;
use Ling\Authenticate\UserStore\FileUserStore;
use Ling\Authenticate\Util\UserToSessionConvertor;

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
