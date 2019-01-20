BullSheet
================
2016-02-09



Generate fake data to populate your database.



Features
--------------

- easy to extend
- data is decoupled from the generator, you can create your own data directory easily
- existing public data repository 
- covers a lot of concrete cases 
- can populate a whole database with one populator script (full database demo provided in this document) 
- almost alive (you can adjust the numbers of lines for a table, and it updates accordingly) 
- handy methods for foreign keys, and to handle many to many relationship 
- can use probability weights to influence the selection of rows used to populate a middle table (in the many to many relationship workflow)  
  



You end up with a realistic fake database.


A must have companion when working in dev with a database and php, no bullshit.





The example
-----------------

This example showcases what kind of methods you can use.


```php
<?php



use BullSheet\Generator\LingBullSheetGenerator;

require_once "bigbang.php"; // start the local universe



$b = LingBullSheetGenerator::create()->setDir("/path/to/my/bullsheets-repo");


//------------------------------------------------------------------------------/
// PURE DATA
//------------------------------------------------------------------------------/
a($b->getPureData("first_name"));
a($b->getPureData("top_level_domain"));
a($b->getPureData("last_name"));
a($b->getPureData("actor"));


//------------------------------------------------------------------------------/
// AUTHOR SPECIFIC
//------------------------------------------------------------------------------/
a($b->numbers(5));
a($b->float(5, 2));
a($b->letters(5));
a($b->asciiChars(5));
a($b->wordChars(5));
a($b->alphaNumericChars(5));
a($b->password());


//------------------------------------------------------------------------------/
// LING SPECIFIC
//------------------------------------------------------------------------------/
a($b->actor());
a($b->firstName());
a($b->lastName());
a($b->topLevelDomain());
a($b->pseudo());
a($b->email());

```

The code above generates an output like this:

```
string 'yale' (length=4)
string 'xn--s9brj9c' (length=11)
string 'hermie' (length=6)
string 'Movita' (length=6)
string '35421' (length=5)
string 'nUjmp' (length=5)
string 'jQveV' (length=5)
string '8JNA_' (length=5)
string '1JXoE' (length=5)
string 'm6Qf'y[I)m' (length=10)
string 'Rogelio' (length=7)
string 'damiana' (length=7)
string 'valentine' (length=9)
string 'fresenius' (length=9)
string 'NLaguie_58386' (length=13)
string 'dyanbriant-482660@digibel.be' (length=28)

```





The basic idea
-----------------

The basic idea behind BullSheet is that it takes a random line in a file that you create.

Now, to make things simple we create one directory where we put all the data.
This directory is called the **bullsheets** directory, and there should be only one per host (machine).

Also, by convention, all data is put in a .txt file.
 

If you want more details on how it works, and why it works that way, go to the [more verbose README](https://github.com/lingtalfi/BullSheet/blob/master/docs/README_aux.md)
that I first made. 


Follow the tutorial below to have a pragmatic understanding of how it works. 




The tutorial to understand the concepts
-----------------

Alright.
Create the following structure on your local machine.
 
 
``` 
- bullsheets
----- rainbow_color  
--------- data.txt  
```
 
 
Now open bullsheets/rainbow_color/data.txt and put the following content in it:


```
red
orange
yellow
green
blue
indigo
violet
```

Now create a php file (anywhere), and put the following content in it:
 
 
```php 
<?php


use BullSheet\Generator\AuthorBullSheetGenerator;

require_once "bigbang.php"; // start the local universe



$b = AuthorBullSheetGenerator::create()->setDir("/path/to/your/bullsheets");
a($b->getPureData('rainbow_color'));

``` 


The above code will display the name of a rainbow color on your screen.

### Explanations of the code

We first require the [bigbang script, to start the universe](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md) (be able 
to parse any classes of the universe).

Then we tell tot the BullSheet generator where our **bullsheets** repository is.

And eventually we ask it to get a random line from any data file found in the rainbow_color directory.

There is a lot more that we can do, if you feel curious, there are my [conception notes](https://github.com/lingtalfi/BullSheet/blob/master/docs/README_aux.md).





The tutorial to use LingBullSheetGenerator
-----------------

If you understand the basic principle of the tutorial above, then you might understand LingBullSheetGenerator as well.
LingBullSheetGenerator is a BullSheet generator which bullsheets structure looks like this (as the time of writing):



```
- bullsheets
----- ling   
--------- actor
------------- given_name
----------------- data.txt
----------------- src.md
--------- first_name
------------- all
----------------- data.txt
----------------- src.md
--------- free_email_provider_domains
------------- all
----------------- data.txt
----------------- src.md
--------- iso639-1
------------- all
----------------- data.txt
----------------- src.md
--------- iso639-2
------------- all
----------------- data.txt
----------------- src.md
--------- last_name
------------- international
----------------- all
--------------------- data.txt
--------------------- src.md
----------------- female
--------------------- data.txt
--------------------- src.md
----------------- male
--------------------- data.txt
--------------------- src.md
--------- pseudo
------------- american
----------------- data.txt
----------------- src.md
--------- top_level_domain
------------- all
----------------- data.txt
----------------- src.md
```


Download the data from the [ling bullsheets repository](https://github.com/bullsheet/bullsheets-repo/tree/master/bullsheets/ling),
and place the ling dir into your own local **bullsheets** dir.



Now to get, let's say a first name, you just need to target the first_name directory, like this:

```php
<?php


use BullSheet\Generator\LingBullSheetGenerator;

require_once "bigbang.php"; // start the local universe



$b = LingBullSheetGenerator::create()->setDir("/path/to/your/bullsheets");
a($b->getPureData('first_name'));


```

Notice that we didn't specify the ling directory in the above code, that's because the getPureData method of the 
LingBullSheetGenerator prefixes it automatically for us.


Now in case you wonder, here are more examples.

### get a random female last name

Your domain is really a relative path to a directory.
If you look closely to the structure of the ling/last_name directory, you will see that it contains 3 directories.

By default, if you use a domain of last_name, the generator will pick any of the available data files (randomly),
and return a random line for it.

Now you can more specific and say that your domain is last_name/female, you would then get a random female name.
See how it is done in the example below.


```php
<?php


use BullSheet\Generator\LingBullSheetGenerator;

require_once "bigbang.php"; // start the local universe



$b = LingBullSheetGenerator::create()->setDir("/path/to/your/bullsheets");
a($b->getPureData('last_name/female'));


```


Other possibilities are explored in greater details in the [conception notes](https://github.com/lingtalfi/BullSheet/blob/master/docs/README_aux.md).




The classes organisation
-------------------------------

The following diagram represents how methods are distributed amongst the classes, and how classes are related 
to each other.


```

BullSheetGenerator   // pure data layer
+ void          setDir ( str:dir ) 
+ string        getPureData ( str|array:domain=null )  // basically, with this you can access any data in the bullsheets repo 


AuthorBullSheetGenerator extends BullSheetGenerator   // it adds a generated data layer
+ bool          boolean ( int:chanceOfGettingTrue=50 )
+ string        password ( int:length=10 )              // use the asciiChars method under the hood
+ string        numbers ( int:length=3 )
+ string        letters ( int:length=3 )
+ string        alphaNumericChars ( int:length=3 )      // a-z A-Z 0-9
+ string        wordChars ( int:length=3 )              // a-z A-Z 0-9 _  
+ string        asciiChars ( int:length=3 )             // from ascii code 32 (space) to 126 (~)


LingBullSheetGenerator extends AuthorBullSheetGenerator   // add a combined data layer

(combined layer data)
+ string        comment ( int:min=5, :max=10 )
+ string        dummySentence ( int:min=3, :max=5, :lineLength=50 )
+ string        email (bool:useGenerator=false)
+ string        loremSentence ( int:min=5, :max=10 )
+ string        loremWord ( int:min=5, :max=10 )
+ string        pseudo ( bool:useGenerator=true )       // using generator creates a lot more randomness

(generated layer data)
+ string        colorHexa ()
+ string        colorRgb ()
+ string        colorWeb ()
+ string        dateMysql ()
+ string        dateTimeMysql ()

(pure data sugar)
+ string        actor ()
+ string        firstName ()
+ string        lastName ()
+ string        passwordHuman ()
+ string        topLevelDomain ()
+ string        websiteDomain ()

(pure data images)
+ string        imageUrlFromLorem ( int:width=400, :height=200, str:category=null )
+ string        uploadedImage ( str|callable:dstPath, str|callable:dstUrl, str:domain=image )
+ string        uploadedMedia ( str|callable:dstPath, str|callable:dstUrl, str:domain=image, str:tag=[media] )



+ ... and more goodies



```




The populator script, a full database example demo
-----------------------------------------------


A few words on populator.
Populator is the idea of creating a whole fake database with one script.

There is a AuthorPopulator class that I created while working on a project.
I'll give you a concrete example of script using the AuthorPopulator.
Note that the application had specific needs, an event calendar, and some "upload video/image" 
stuff.


Basically, you keep calling the addTable method for each table of the database.
At the end of the script, you call the populate method to actually populate the tables.

You can find documentation about the populator in the AuthorPopulator's comments,
and in the [doc directory of this repository](https://github.com/lingtalfi/BullSheet/tree/master/docs).


So, what we will be populating today is the following database.


![an application example database](http://s19.postimg.org/p5kbj29r7/populator_example_db.png)


And we can populate it with the following script.

```php
<?php

declare(strict_types = 1);

use Bat\FileSystemTool;
use BullSheet\Generator\LingBullSheetGenerator;
use BullSheet\Populator\AuthorPopulator;
use BullSheet\Tool\BankDataGeneratorTool;
use BullSheet\Tool\CleanListBuddyTool;
use BullSheet\Tool\PickRandomLineTool;
use BullSheet\Tool\ProbabilityTool;
use BullSheet\Tool\UrlGeneratorTool;
use InstantLog\InstantLog;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoDbOperationTool;
use YouTubeUtils\YouTubeVideo;

require_once "bigbang.php"; // start the local universe




InstantLog::log("start: " . date("Y-m-d H:i:s"));

//$f = "/path/to/bullsheets-repo/bullsheets/ling/text/sentence/all/data.txt";
//CleanListBuddyTool::outputCleanList($f);
//exit;

//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$sqlDb = "fake_app";
$sqlUser = "root";
$sqlPass = "root";

$appDir = "/tmp/fakeapp";
$appUploadChannelDir = "/tmp/fakeapp/uploaded/channel";
$appUploadChannelLogoDir = "/tmp/fakeapp/uploaded/channel_logo";
$appUploadProgramDir = "/tmp/fakeapp/uploaded/program";
$appUploadTeasersDir = "/tmp/fakeapp/uploaded/program_teaser";
$appUploadMediaDir = "/tmp/fakeapp/uploaded/media";
$appUploadPannelDir = "/tmp/fakeapp/uploaded/panel";


$bullsheetsDir = "/path/to/bullsheets-repo/bullsheets";
$nbUsers = 50;
$nbTags = 1000;
$nbChannels = 200;
$nbPrograms = 500;
$nbMedia = 3000;
$nbPanels = 200;
$nbPlayLists = 600;
$nbSharedEvents = 150;
$nbProgramsAuxImages = $nbPrograms / 2;
$nbProgramsTeasers = $nbPrograms / 2;


$gen = LingBullSheetGenerator::create()->setDir($bullsheetsDir);


$tagTypes = [
    1 => 1, // creators
    2 => 1, // actors
    3 => 1, // emotion
    4 => 1, // genre
    5 => 10, // any
];

$channelTypes = [
    1 => 4, // publique (free)
    2 => 4, // payant (pro)
    3 => 1, // privé  (special)
];


$mediaTypes = [
    1 => 3, // clip
    2 => 4, // program
    3 => 2, // ad
];


function getAppUrl($appPath)
{
    global $appDir;
    return str_replace($appDir, '', $appPath);
}

function getAppImage($dstDir, $identifier, array $imgTypeWeights = null)
{
    global $gen;
    if (null === $imgTypeWeights) {
        $imgTypeWeights = [
            1 => 1, // uploaded
            2 => 1, // url
        ];
    }

    $imgType = ProbabilityTool::resolveWeight($imgTypeWeights);
    if ('1' === $imgType) { // uploaded
        $hash = hash('md5', $identifier);
        $dstPath = $dstDir . "/$hash/[image]";
        $dstUrl = getAppUrl($dstPath);
        $img = $gen->uploadedImage($dstPath, $dstUrl);
    }
    else { // url
        $img = $gen->imageUrlFromLorem();
    }
    return $img;
}

function getAppVideo($dstDir, $identifier, array $videoTypeWeights = null, &$url = null)
{
    global $gen;
    if (null === $videoTypeWeights) {
        $videoTypeWeights = [
            1 => 1, // uploaded
            2 => 1, // url
        ];
    }

    $videoType = ProbabilityTool::resolveWeight($videoTypeWeights);
    if ('1' === $videoType) { // uploaded
        $hash = hash('md5', $identifier);
        $dstPath = $dstDir . "/$hash/[media]";
        $dstUrl = getAppUrl($dstPath);
        $video = $gen->uploadedMedia($dstPath, $dstUrl, "video/demo");
    }
    else { // url
        $video = $gen->getPureData("url/youtube");
    }
    return $video;
}

//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
ini_set('max_execution_time', '0');


QuickPdo::setConnection(
    "mysql:dbname=$sqlDb;host=127.0.0.1",
    $sqlUser,
    $sqlPass,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);


AuthorPopulator::create()
    ->setOnTableBefore(function($table){
        a($table);
    })
    ->setOnExceptionCb(function (\Exception $e) {
        a($e->getMessage());
//        a($e->getTraceAsString());

//        InstantLog::log($e);

    })
    ->addTable("clip_genres", "once", function () use ($gen) {
        $gen->populate("clip_genres", "music_genre", function ($genre, LingBullSheetGenerator $g) {
            QuickPdo::insert("clip_genres", [
                'the_name' => $genre,
                'color' => $g->colorHexa(),
                'active' => 1,
            ]);
        });
    })
    ->addTable("users", $nbUsers, function () use ($gen) {
        QuickPdo::insert("users", [
            "email" => $gen->email(),
            "pass" => $gen->passwordHuman(),
            "rib" => BankDataGeneratorTool::rib(),
            "active" => $gen->boolean(99),
        ]);
    })
    ->addTable("categories", [
        "Rire",
        "Musique",
        "Sport",
        "Economie",
        "Education",
        "People",
        "Actualité",
    ], function ($k, $v) {
        QuickPdo::insert("categories", [
            "the_name" => $v,
            "active" => 1,
        ]);
    })
    ->addTable("owner_config", [
        "new_tag_is_active_when_created" => 1,
        "wozaic_front_nb_items_first_page" => 30,
    ], function ($k, $v) {
        QuickPdo::insert("owner_config", [
            "the_key" => $k,
            "the_value" => $v,
        ]);
    })
    ->addTable("channels_options", [
        "logo",
        "link_facebook",
        "link_twitter",
        "link_linkedin",
        "link_google",
    ], function ($k, $v) {
        QuickPdo::insert("channels_options", [
            "the_name" => $v,
        ]);
    })
    ->addTable("tags", $nbTags, function () use ($gen, $tagTypes) {
        $type = ProbabilityTool::resolveWeight($tagTypes);
        switch ($type) {
            case '1':
                $name = $gen->getPureData("movie_director");
                break;
            case '2':
                $name = $gen->actor();
                break;
            case '3':
                $name = $gen->getPureData("adjective/emotion");
                break;
            case '4':
                $name = $gen->getPureData("movie_genre");
                break;
            case '5':
                $name = $gen->getPureData("word");
                break;
        }

        QuickPdo::insert("tags", [
            "the_name" => $name,
            "the_type" => $type,
            "active" => $gen->boolean(99),
        ]);
    })
    ->addTable("channels", $nbChannels, function () use ($gen, $channelTypes, $appUploadChannelDir) {
        $type = ProbabilityTool::resolveWeight($channelTypes);
        $name = $gen->getPureData("title/all");
        $img = getAppImage($appUploadChannelDir, $name, [
            1 => 4, // uploaded
            2 => 4, // url
        ]);


        QuickPdo::insert("channels", [
            "categories_id" => $gen->getTableKey("categories"),
            "users_id" => $gen->getTableKey("users"),
            "the_name" => $name,
            "active" => $gen->boolean(99),
            "the_type" => $type,
            "slogan" => $gen->getPureData("slogan"),
            "image" => $img,
        ]);
    })
    ->addTable("channels_has_channels_options", "cross:channels;100;channels_options;100", function ($leftRow, $rightRow) use ($appUploadChannelLogoDir) {

        $option = $rightRow['the_name'];
        $name = $leftRow['the_name'];
        switch ($option) {
            case 'logo':
                $value = getAppImage($appUploadChannelLogoDir, $name, [
                    1 => 4, // uploaded
                    2 => 4, // url
                ]);
                break;
            case 'link_facebook':
                $value = UrlGeneratorTool::fakeFacebook($name);
                break;
            case 'link_twitter':
                $value = UrlGeneratorTool::fakeTwitter($name);
                break;
            case 'link_linkedin':
                $value = UrlGeneratorTool::fakeLinkedin($name);
                break;
            case 'link_google':
                $value = UrlGeneratorTool::fakeGooglePlus();
                break;
            default:
                throw new \Exception("Unknown option: $option");
                break;
        }
        QuickPdo::insert("channels_has_channels_options", [
            "channels_id" => $leftRow['id'],
            "channels_options_id" => $rightRow['id'],
            "the_value" => $value,
        ]);
    }, [
        'right' => [
            'the_name' => [
                'logo' => 6,
                'link_facebook' => 4,
                'link_twitter' => 3,
                'link_linkedin' => 1,
                'link_google' => 1,
            ],
        ],
    ])
    ->addTable("channels_has_tags", "cross:channels;90;tags;2", function ($leftRow, $rightRow) {
        QuickPdo::insert("channels_has_tags", [
            "channels_id" => $leftRow['id'],
            "tags_id" => $rightRow['id'],
        ]);
    })
    ->addTable("programs", $nbPrograms, function () use ($gen, $appUploadProgramDir) {
        $name = $gen->getPureData("tv_program/wikipedia");
        $img = getAppImage($appUploadProgramDir, $name, [
            1 => 4, // uploaded
            2 => 4, // url
        ]);


        $extra = "";
        if (mt_rand(1, 10) > 8) {
            $extra = $gen->loremSentence(1, 2);
        }


        QuickPdo::insert("programs", [
            "channels_id" => $gen->getTableKey("channels"),
            "the_name" => $name,
            "color" => $gen->colorHexa(),
            "thumbnail" => $img,
            "short_description" => $gen->getPureData("slogan"),
            "long_description" => substr($gen->loremSentence(3, 8), 0, 512),
            "extra_text" => $extra,
            "lang" => ProbabilityTool::resolveWeight([
                'fra' => 9,
                'eng' => 1,
            ]),
            "publication_year" => substr($gen->dateMysql('-20 years', 'now'), 0, 4),
        ]);
    })
    ->addTable("programs_has_tags", "cross:programs;90;tags;2", function ($leftRow, $rightRow) {
        QuickPdo::insert("programs_has_tags", [
            "programs_id" => $leftRow['id'],
            "tags_id" => $rightRow['id'],
        ]);
    })
    ->addTable("users_rate_programs", "cross:users;20;programs;10", function ($leftRow, $rightRow) use ($gen) {
        QuickPdo::insert("users_rate_programs", [
            "users_id" => $leftRow['id'],
            "programs_id" => $rightRow['id'],
            "rating" => ProbabilityTool::resolveWeight([
                0 => 1,
                1 => 1,
                2 => 1,
                3 => 1,
                4 => 1,
                5 => 4,
                6 => 5,
                7 => 6,
                8 => 6,
                9 => 5,
            ]),
            "the_comment" => $gen->comment(1, 5),
            "active" => ProbabilityTool::resolveWeight([
                0 => 1,
                1 => 99,
            ]),
        ]);
    })
    ->addTable("programs_aux_images", $nbProgramsAuxImages, function () use ($gen, $appUploadProgramDir) {

        $pid = $gen->getTableKey("programs");
        $info = QuickPdo::fetch("select the_name from programs where id=$pid");
        $name = $info['the_name'];

        $img = getAppImage($appUploadProgramDir, $name, [
            1 => 4, // uploaded
            2 => 4, // url
        ]);
        QuickPdo::insert("programs_aux_images", [
            "programs_id" => $pid,
            "url" => $img,
        ]);
    })
    ->addTable("programs_teasers", $nbProgramsTeasers, function () use ($gen, $appUploadTeasersDir) {

        $pid = $gen->getTableKey("programs");
        $info = QuickPdo::fetch("select the_name from programs where id=$pid");
        $name = $info['the_name'];

        $video = getAppVideo($appUploadTeasersDir, $name, [
            1 => 4, // uploaded
            2 => 4, // url
        ]);
        QuickPdo::insert("programs_teasers", [
            "programs_id" => $pid,
            "url" => $video,
        ]);
    })
    ->addTable("medias", $nbMedia, function () use ($gen, $mediaTypes, $appUploadMediaDir, $appDir) {


        $mediaType = ProbabilityTool::resolveWeight($mediaTypes);
        $mediaFormat = ProbabilityTool::resolveWeight([
            0 => 5, // youtube
            1 => 1, // media lib
        ]);


        $channelId = $userId = null;
        $programId = $clipGenreId = null;

        if ("0" === $mediaFormat) { // youtube
            $info = $gen->getPureData("miscellaneous/youtube_info");
            $p = explode('§', $info, 5);
            $url = 'https://www.youtube.com/watch?v=' . $p[0];
            $duration = $p[1];
            $name = $p[2];
            $thumbnail = $p[3];
            $description = $p[4];
        }
        else {
            $description = $gen->loremSentence(1, 3);
            $name = $gen->getPureData("tv_program/wikipedia");
            $thumbnail = getAppImage($appUploadMediaDir, $name, [
                1 => 4, // uploaded
                2 => 4, // url
            ]);
            $url = getAppVideo($appUploadMediaDir, $name, [
                1 => 1, // uploaded
            ]);

            $file = $appDir . $url;
            $cmd = '/opt/local/bin/ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 "' . $file . '"';
            $ret = 0;
            $duration = (int)exec($cmd);
        }


        switch ($mediaType) {
            case '1': // clip
                $clipGenreId = $gen->getTableKey("clip_genres");
                $channelId = $gen->getTableKey("channels");
                break;
            case '2': // program
                $programId = $gen->getTableKey("programs");
                $channelId = $gen->getTableKey("channels");
                break;
            case '3': // add
                $userId = $gen->getTableKey("users");
                break;
            default:
                throw new \Exception ("Should never happen, but I'm getting paranoid right now");
                break;
        }


        if (mt_rand(1, 10) > 8) {
            $description .= "\n" . $gen->loremSentence(1, 2);
        }


        QuickPdo::insert("medias", [
            "channels_id" => $channelId,
            "users_id" => $userId,
            "programs_id" => $programId,
            "clip_genres_id" => $clipGenreId,
            "the_name" => mb_substr($name, 0, 255),
            "the_type" => $mediaType,
            "url" => $url,
            "thumbnail" => $thumbnail,
            "description" => mb_substr($description, 0, 512),
            "duration" => $duration,
        ]);
    })
    ->addTable("medias_has_tags", "cross:medias;90;tags;2", function ($leftRow, $rightRow) {
        QuickPdo::insert("medias_has_tags", [
            "medias_id" => $leftRow['id'],
            "tags_id" => $rightRow['id'],
        ]);
    })
    ->addTable("panels", $nbPanels, function () use ($gen, $appUploadPannelDir) {

        $name = $gen->getPureData("slogan/wordlab");
        $color = $bgColor = $image = '';
        if (1 === mt_rand(0, 1)) {
            $color = $gen->colorWeb();
            $bgColor = $gen->colorWeb();
        }
        else {
            $image = getAppImage($appUploadPannelDir, $name, [
                1 => 4, // uploaded
                2 => 4, // url
            ]);
        }

        QuickPdo::insert("panels", [
            "channels_id" => $gen->getTableKey("channels"),
            "the_name" => $name,
            "the_text" => $gen->dummySentence(3, 5),
            "color" => $color,
            "bg_color" => $bgColor,
            "image" => $image,
        ]);
    })
    ->addTable("playlists", $nbPlayLists, function () use ($gen) {

        QuickPdo::insert("playlists", [
            "channels_id" => $gen->getTableKey("channels"),
            "the_name" => $gen->loremWord(5, 13),
        ]);
    })
    ->addTable("playlists_has_medias", "cross:playlists;100;medias;0.3", function ($leftRow, $rightRow) {
        QuickPdo::insert("playlists_has_medias", [
            "playlists_id" => $leftRow['id'],
            "medias_id" => $rightRow['id'],
            "the_order" => mt_rand(0, 9),
        ]);
    })
    ->addTable("the_events", "timelines:channels;100;-2 days;+2 days;0;5*60", function (array $row, &$time) use ($gen, $mediaTypes, $appUploadMediaDir, $appDir) {


        $mediaId = $playListId = $panelId = null;
        $curTime = $time;

        $type = ProbabilityTool::resolveWeight([
            '1' => 2, // clip
            '2' => 13, // program
            '3' => 2, // ad
            '4' => 2, // playlist
            '5' => 1, // panel
        ]);


        switch ($type) {
            case '1': // clip
            case '2': // program
            case '3': // ad
                $mediaId = $gen->getTableKey("medias", [
                    'the_type' => [
                        $type => 1, // 1: clip
                    ],
                ]);

                $info = QuickPdo::fetch("select duration from medias where id=$mediaId");
                $time += (int)$info['duration'];


                break;
            case '4': // program
                $playListId = $gen->getTableKey("playlists");
                $q = <<<DDD
select sum(m.duration) as duration
from playlists_has_medias h
inner join medias m on m.id=h.medias_id
where h.playlists_id=$playListId
DDD;

                $row = QuickPdo::fetch($q);
                $time += (int)$row['duration'];

                break;
            case '5': // panel
                $panelId = $gen->getTableKey("panels");
                $time += mt_rand(20, 3600 * 3);
                break;
        }

        $recurringId = 0;
        if (mt_rand(0, 100) > 80) {
            $recurringId = mt_rand(0, 10);
        }

        QuickPdo::insert("the_events", [
            "channels_id" => $gen->getTableKey("channels"),
            "medias_id" => $mediaId,
            "playlists_id" => $playListId,
            "panels_id" => $panelId,
            "the_name" => "", // not used, conception error 
            "thumbnail" => "",
            "the_type" => $type,
            "is_overwritable" => (bool)mt_rand(0, 1),
            "recurring_id" => $recurringId,
            "active" => (int)$gen->boolean(98),
            "start_date" => date("Y-m-d H:i:s", $curTime),
        ]);
    })
    ->addTable("shared_events", $nbSharedEvents, function () use ($gen) {

        $min = strtotime('-2 days');
        $max = strtotime('+2 days');

        $start = mt_rand($min, $max);
        $end = $start + mt_rand(20 * 60, 2 * 3600);


        QuickPdo::insert("shared_events", [
            "channels_id" => $gen->getTableKey("channels"),
            "start_date" => date('Y-m-d H:i:s', $start),
            "end_date" => date('Y-m-d H:i:s', $end),
        ]);
    })
    ->addTable("users_own_shared_events", "cross:users;10;shared_events;1", function ($leftRow, $rightRow) {
        QuickPdo::insert("users_own_shared_events", [
            "users_id" => $leftRow['id'],
            "shared_events_id" => $rightRow['id'],
        ]);
    })
    ->populate();

InstantLog::log("end: " . date("Y-m-d H:i:s"));

```


And the [database structure is here](https://github.com/lingtalfi/BullSheet/blob/master/docs/fakeapp.sql).




### Some tips
 
Generally, you add the addTable statements one after the others, test, and adjust your content.
Don't be afraid to refresh your script:
the populator workflow automatically skips table that are already populated as you wished,
and always do the minimum of work needed to implement your needs.

Also, a handy feature if you are in try and err mode, is the ability to force the populator to 
repopulate a table entirely, this is done by adding the ":f" suffix at the end of the table name 
(addTable method's first argument). Check the [documentation](https://github.com/lingtalfi/BullSheet/tree/master/docs) for more info.




Notes:

I measured the time needed for the example script to complete from scratch (although I don't work like that). 
It took 7 minutes and 12 seconds for inserting 129 398 rows, and copying 2.14 Go of media to my fake app's uploaded directory.










Related
---------------

- find more about [BullSheet conception](https://github.com/lingtalfi/BullSheet/blob/master/docs/README_aux.md)
- the official [bullsheets repository](https://github.com/bullsheet/bullsheets-repo) (this is where you find the data for the BullSheetGenerator)




Dependencies
------------------

- [lingtalfi/Bat 1.30](https://github.com/lingtalfi/Bat)
- [lingtalfi/DirScanner 1.3.0](https://github.com/lingtalfi/DirScanner)
- [lingtalfi/QuickPdo 1.16.0](https://github.com/lingtalfi/QuickPdo)







History Log
------------------
    
- 1.3.0 -- 2017-02-03

    - revert to php5 (instead of php7)

- 1.2.0 -- 2017-02-02

    - add AuthorBullSheetGenerator.float method

- 1.1.0 -- 2016-02-14

    - add LingBullSheetGenerator.getTableKey method
    - add LingBullSheetGenerator.dateMysql method
    - add LingBullSheetGenerator.dateTimeMysql method
    - add LingBullSheetGenerator.colorHexa method
    - add LingBullSheetGenerator.loremWord method
    - add LingBullSheetGenerator.loremSentence method
    - add LingBullSheetGenerator.populate method
    - add LingBullSheetGenerator.passwordHuman method
    - add LingBullSheetGenerator.comment method
    - add LingBullSheetGenerator.uploadedMedia method
    - add LingBullSheetGenerator.colorRgb method
    - add LingBullSheetGenerator.colorWeb method
    - add AuthorBullSheetGenerator.hexa method
    - add AuthorBullSheetGenerator.dateTimeBetween method
    - add BankDataGeneratorTool
    - add CleanListBuddyTool
    - add UrlGeneratorTool

        
- 1.0.0 -- 2016-02-10

    - initial commit
    
    
