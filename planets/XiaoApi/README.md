XiaoApi
==========
2017-05-20



Create a consistent api based on a crud model.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import XiaoApi
```

Or just download it and place it where you want otherwise.



Why use an api?
=================

Let's say you have a database model, and now you must create your application.
If you don't have an api, you will have to create your own class and methods.

Depending on your organizational requirements, there is a risk that you'll end
up with a scattered code that calls the database whenever it needs to.
 
Instead of doing so, why don't you use an api.

The benefit of using an api such as XiaoApi is that you get all the benefits inherent
to a centralized system, amongst which you have:

- ability to change all the methods behaviour at once 
- easier for the day to day tasks to deal with ONE api rather than multiple classes, sometimes poorly named
 
 
Concretely, having an api can help you with the following things:
 
- implement a cache logic for your read requests
- build a hook system


Features of the XiaoApi
============================

The XiaoApi is above all a centralized, extensible and flexible tool to communicate with your model.
 
- built-in hook system 
- a TableCrudObject providing the base crud methods (create, read, update, delete) for free
- an automate tool for creating all the objects for a given database in no time

 
 
Using the crud methods
========================

If you extend the TableCrudObject, then you can use the basic crud methods for free.
Here is an example of how using them (example using the kamille framework):
 
```php
<?php


use Core\Services\A;
use XiaoApi\Helper\ReadParams\ReadParams;
use XiaoApi\Observer\Listener\CallbackListener;
use Module\Ekom\Api\EkomApi;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//--------------------------------------------
// CRUD API, BASIC EXAMPLE
//--------------------------------------------
A::quickPdoInit();

EkomApi::inst()->getObserver()->addListener([
    "createAfter",
], CallbackListener::create(function ($data) {
    a("listener createAfter", $data);
}));


//--------------------------------------------
// delete
//--------------------------------------------
EkomApi::inst()
    ->backofficeUser()->delete([
        "email" => 'alice@mycompany.com',
    ]);


//--------------------------------------------
// insert
//--------------------------------------------
try {

    EkomApi::inst()
        ->backofficeUser()->create([
            "email" => 'alice@mycompany.com',
            "pass" => 'me',
            "lang_id" => "",
        ]);
} catch (\PDOException $e) {
    a("PDO Exception caught: $e");
}


//--------------------------------------------
// update
//--------------------------------------------
EkomApi::inst()
    ->backofficeUser()->update(["pass" => 'pass'], [
        "email" => 'alice@mycompany.com',
    ]);


//--------------------------------------------
// read
//--------------------------------------------
// using a simple array (my personal favorite)
a(EkomApi::inst()
    ->backofficeUser()->read([
        'fields' => [
            'id',
            'email',
            'pass' => "password",
        ],
        'where' => [
            ['id', ">", "1"],
        ],
        'order' => [
            'email' => 'asc',
        ],
        'nipp' => 2,
        'page' => 1,
    ]));


// using the ReadParams helper
$rp = ReadParams::create();
$rp->page = 6;
a(EkomApi::inst()
    ->backofficeUser()->read($rp));



``` 
 
 
Using more methods
=======================

As time pass by, other methods have been added, based on my personal experience.
 
- readOne ( arr:params = []  ): read one row instead of all the rows
- readColumn ( str:column, arr:where = [] ): read the value of a specific column
- deleteAll ( ) : powerful method that deletes the whole table 
 
The following example shows them in action:
 
 
 
```php

a(EkomApi::inst()->lang()->readOne([
    'fields' => ['id'],
    'where' => [['iso_code', '=', 'fra']],
]));


$fraId = EkomApi::inst()->lang()->readColumn('id', [['iso_code', '=', 'fra']]);

EkomApi::inst()->backofficeUser()->deleteAll();

``` 
 
 
 
 
 
How to use the generators
===========


There are two generators:

- one for generating the api
- one for generating the object


Here is the xiao script for generating both the api and the objects.


```php
<?php


use Core\Services\A;
use XiaoApi\Generator\ApiGenerator\DbApiGenerator;
use XiaoApi\Generator\ObjectGenerator\DbObjectGenerator;



/**
 * assuming this script is located at /your/kamille_app/scripts/xiao-generator.php
 * Then, after configuring this script to your likings,
 * I recommend that you create an alias:
 *
 *          alias xiaoo='php -f /your/kamille_app/scripts/xiao-generator.php'
 *
 *
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//--------------------------------------------
// CONFIGURE THIS SECTION TO YOUR LIKINGS
//--------------------------------------------
$apiClassName = "GeneratedEkomApi";
$tablePrefix = "ek_";
$nameSpace = 'Module\\Ekom\\Api';
$targetDir = __DIR__;
$db = "kamille";


//--------------------------------------------
// don't touch below this line,
// This script is using the kamille framework,
// and the XiaoApi planet from the universe framework.
// kamille: https://github.com/lingtalfi/kamille
// universe: https://github.com/karayabin/universe-snapshot
//--------------------------------------------
A::quickPdoInit();

DbApiGenerator::create()
    ->setClassName($apiClassName)
    ->setTablePrefix($tablePrefix)
    ->setNamespace($nameSpace)
    ->setTargetDirectory($targetDir)
    ->generateByDatabase($db);


DbObjectGenerator::create()
    ->setUseDbPrefix(false) 
    ->setTablePrefix($tablePrefix)
    ->setNamespace($nameSpace)
    ->setTargetDirectory($targetDir)
    ->generateByDatabase($db);


echo "ok" . PHP_EOL;
```


What you should do is:

- go to your (kamille) app, and create the **/kamilleapp/scripts/xiao-generator.php** file
- put the above code in it
- then read the script and configure it to your likings
- then create an alias (in your .bash_profile for instance): 
    - alias xiaoo='php -f /kamilleapp/scripts/xiao-generator.php'
- refresh your terminal
- now you can call xiaoo anytime to update your api


This script, when called from a command line, will do the following.

Assuming you are creating a module named Ekom, and so you've created a Ekom/Api directory containing an
EkomApi class.


Your EkomApi class looks like this so far:

```php
<?php


namespace Module\Ekom\Api;

use Kamille\Services\XLog;


class EkomApi extends GeneratedEkomApi
{
    //--------------------------------------------
    //
    //--------------------------------------------
    protected function log($type, $message) // override me
    {
        XLog::log($type, $message);
    }
}
```

It could even be empty if you wished so.
The only problem right now is that your class extends the GeneratedEkomApi class which doesn't exist.

So, you configure your generator:

- apiClassName: GeneratedEkomApi, this will create the GeneratedEkomApi inside the target dir (the same dir containing your EkomApi file)
- tablePrefix: ek_, in this case, all tables of the ekom model are prefixed with ek_, so we give this information to the generator,
                so that it can strip the prefix when generating classNames (otherwise our classNames would start with the ugly EK prefix).
                Note that if you prefer to have an api that use prefixes, just set an empty string or null as the table prefix.
- namespace: the namespace containing your EkomApi class. The same namespace will be used for the GeneratedEkomApi class.
- targetDirectory: where do you want to generate the api and objects. See the generated structure schema below.
- database: the database to generate the api and objects from (one object will be generated for every table, plus the api)


You will end up with the following structure:

```txt
- $targetDirectory/EkomApi.php                  // this file is created by you and is NEVER touched by the generator  
- $targetDirectory/GeneratedEkomApi.php         // this file is created by the generator, your EkomApi should extend it
- $targetDirectory/GeneratedObject/             // all files created in this directory are generated by the generator,
----- GeneratedTable1.php                       // you shouldn't touch them.
----- GeneratedTable2.php                       
----- ...  
- $targetDirectory/Object/                      // the files in this directory are created by the generator ONLY IF THEY DON'T EXIST
----- Table1.php                                // so you can safely edit them, 
----- Table2.php                                // but the first time you call the generator it will create them for you
----- ...                                       // each object in this directory can extend its Generated counterpart (in the GeneratedObject directory)
----- ...                                       // to inherit the base crud methods
```
    
  
  

Using Layers 
=======================

So, if you use the generator, you will probably end up with a structure like this:
 
```txt
- $targetDirectory/GeneratedObject/         // contains your generated objects             
- $targetDirectory/Object/                  // contains your custom objects
```

But Objects are classes that supposedly deal only with ONE object.

What if you want that your api returns you a class that deals with multiple tables/objects at once?

Meet the layer concept.

We define a layer as a class that deals with multiple objects.
It's an organizational tool.

There is a getLayer method at the XiaoApi level that you can leverage to implement a structure like this:
 
```txt
- $targetDirectory/GeneratedObject/         // contains your generated objects             
- $targetDirectory/Object/                  // contains your custom objects
- $targetDirectory/Layer/                  // contains your layer objects
```


There is no generator for layers, layers are classes that you create manually, at your own pace,
and the generators will never delete or even touch them.


     
 
  

History Log
------------------
    
- 1.21.1 -- 2018-01-31

    - fix CrudObject hook method complaining about observer not being set 
    
- 1.21.0 -- 2018-01-31

    - add CrudObject::getInst method
    
- 1.20.0 -- 2018-01-08

    - DbObjectGenerator: now auto-incremented fields have a default value set to null
    
- 1.19.0 -- 2017-11-30

    - add TableCrudObject::getDefaults method
    
- 1.18.2 -- 2017-09-06

    - moved QuickPdoStmtHelper.simpleWhereToPdoWhere to QuickPdoStmtTool.simpleWhereToPdoWhere
    
- 1.18.1 -- 2017-08-31

    - fix TableCrudObject.push method returning wrong output with primaryKeys of length 1
    
- 1.18.0 -- 2017-08-31

    - now DbObjectGenerator generates primaryKey for all objects
    - add TableCrudObject.push method
    
- 1.17.1 -- 2017-08-23

    - Fix XiaoApiException file name
    
- 1.17.0 -- 2017-07-27

    - GeneratedExampleObject.update method now filters undesirable values
    
- 1.16.0 -- 2017-07-26

    - GeneratedExampleObject.getCreateData now filters undesirable values out of the box
    
- 1.15.0 -- 2017-07-23

    - change GeneralHelper.tableNameToClassName's internal
    
- 1.14.0 -- 2017-07-23

    - add TableCrudObject.drop method
    
- 1.13.0 -- 2017-07-06

    - add TableCrudObject.create $ifNotExistOnly argument
    
- 1.12.0 -- 2017-06-12

    - the inst method is moved from XiaoApi to the generated api class  
    
- 1.11.0 -- 2017-06-12

    - now generates objects only for tables starting with table prefix  
    
- 1.10.0 -- 2017-06-08

    - change read, readValues and readKeyValues nipp default to null  
    
- 1.9.0 -- 2017-05-24

    - add TableCrudObject.readKeyValues method  
    
- 1.8.0 -- 2017-05-24

    - add TableCrudObject.readValues method  
    
- 1.7.1 -- 2017-05-23

    - fix deleteAll, allow un-prefixed tables to have their auto-increment reset  
    
- 1.7.0 -- 2017-05-23

    - add DbObjectGenerator->setUseDbPrefix method 
    
- 1.6.0 -- 2017-05-22

    - add XiaoApi->getLayer method, implementation of the concept of layers
    
- 1.5.3 -- 2017-05-22

    - fix DbApiGenerator, add a carriage return between methods for better readibility
    
- 1.5.2 -- 2017-05-21

    - fix GeneralHelper::tableNameToClassName, now also replace prefixes in hasManyToMany tables
    
- 1.5.1 -- 2017-05-21

    - fix DbObjectGenerator, now handles tables with only one auto-incremented column
    
- 1.5.0 -- 2017-05-21

    - add CrudObject::$enableHooks static public property
    
- 1.4.0 -- 2017-05-20

    - add $resetAutoIncrement parameter to TableCrudObject.deleteAll method
    
- 1.3.0 -- 2017-05-20

    - add TableCrudObject.deleteAll method
    
- 1.2.0 -- 2017-05-20

    - add TableCrudObject.readColumn method
    
- 1.1.0 -- 2017-05-20

    - add readOne method to TableCrudObject
    
- 1.0.0 -- 2017-05-20

    - initial commit

                    
                    
                    
                    
                
