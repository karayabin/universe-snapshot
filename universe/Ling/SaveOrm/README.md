SaveOrm
===============
2017-09-04 -> 2021-03-05



Generate an orm that helps you inserting/updating data in your database.





This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SaveOrm
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SaveOrm
```

Or just download it and place it where you want otherwise.



About the conception
===================


Every call to the **save** method triggers an atomic transaction that either fails or succeeds. 

Please read the documents in the **doc** directory of this repository for more info.


How to use the generator
============================


The generator conf
---------------------

The generator's behaviour is driven by the generator configuration file (aka config file).

The config file is a php file containing a **$conf** array.

Here is an example configuration file, you may find more information in the **doc** directory:


```php
<?php


$conf = [
    /**
     * The base dir defines the directory where all generated objects will reside
     */
    'baseDir' => "/tmp/class/SaveOrm/Test",
    /**
     *
     */
    'baseNamespace' => "SaveOrm\Test",
    /**
     * Which database you want to launch the generator on.
     * - array of database names
     *
     * Note: if empty, nothing will be generated
     */
    'databases' => [
        'kamille',
    ],
    /**
     * Filter the tables that the generator visits.
     * If empty, the generator visits all tables of the given database.
     *
     * - array of database_name => tables
     *      With tables:
     *              - array of allowed tables (all other tables are excluded)
     *                      - the wildcard * can be used.
     *                              For instance, "ekev_*" yields all tables
     *                              starting with the ekev_ prefix.
     *
     *
     */
    'tables' => [
//        'kamille' => [
//            'ekev_*',
//            'ekev_course',
//        ],
    ],
    /**
     * The table prefixes be used for:
     * - creating clean class names (without prefix)
     * - creating clean class methods and properties to be used by the ObjectManager
     *
     */
    'tablePrefixes' => [
        'ecc_',
        'ekev_',
        'ekfs_',
        'ektra_',
        'ek_',
        'pei_',
    ],
    /**
     * used to broadly detect children relationships (see more about children relationship in the documentation)
     * It's an array of keywords that trigger the detection of the middle table in a children relationship.
     */
    'childrenDetectionKeywords' => [
        '_has_',
    ],
    /**
     * The algorithm for children tables detection will
     * sometimes detect non middle tables as middle tables.
     *
     * Put the tables that are not middle tables here to manually "fix/workaround" the algorithm.
     *
     * It's an array of $db.$table
     *
     */
    'childrenDetectionKeywordsExceptions' => [
        'kamille.ek_shop_has_product_card_lang',
        'kamille.ek_shop_has_product_lang',
    ],
    /**
     * array of db.table => ric
     */
    'ric' => [
        'kamille.ek_shop_has_product_card_lang' => ['id'],
    ],
];
```







The generator's action
---------------------------
The generator creates the following structure:

- $baseDir:
    - Conf: (one conf object per table)
        - MyTableConf.php
        - MyTable2Conf.php
    - GeneratedObject: (one conf object per table)
        - MyTableGeneratedObject.php
        - MyTable2GeneratedObject.php
    - Object: (one conf object per table, an Object extends the corresponding GeneratedObject) 
        - MyTableObject.php
        - MyTable2Object.php
    - GeneratedBaseObject.php (this object is the parent of all GeneratedObject) 
    - GeneratedObjectManager.php  
        

Basically, you are only going to use the Object part, like so:

```php
MyTableObject::create()
->setProp1(6)
->setProp2("blabla")
->save();

```

Internally, the MyTableObject extends the MyTableGeneratedObject.

The generator will overwrite GeneratedObject and Conf object every time, but will leave alone 
the Object.

In other words, the Object zone is a safe zone for the developer. 
We can safely add methods in the Object classes.

 

The generator's code
---------------------------
Here is the code required to generate the orm structure.

```php
<?php


use Core\Services\A;
use Ling\SaveOrm\Generator\SaveOrmGenerator;

// initialize your framework (autoloader...)
require_once __DIR__ . "/../../boot.php";
require_once __DIR__ . "/../../init.php";


A::quickPdoInit(); // initialize your db object, depends on the framework you are using, I'm using kamille https://github.com/lingtalfi/kamille



// now using the generator
$gen = SaveOrmGenerator::create();

//$gen->cleanCache(); // do this when your db structure changes

$gen->setConfigFile(__DIR__ . "/../conf/saveorm-generator.conf.php") // use this config file to control the generator's behaviour
    ->generate();

``` 

 
 
 
How to use the SaveOrm orm?
===============================

First, you should have a look at the doc's explanations about relationships (the saveorm.md document inside the doc directory
of this repository).

Then, configure the generator once for all for your app.

Then launch the generator.

Then use the Object classes.

How to use the Object classes is explained below with a few examples.



Inserting/updating 
------------------------------

The insert or update operation will be chosen internally depending on
whether or not the object can do an update (if you've provided enough information
to do so).


When you create an object, the values that you don't set have a default value.

### Insert example


```php
MyTableObject::create()
->setName("maurice")
->save();
```

### Update example


```php
MyTableObject::create()
->setId(6)
->setName("maurice")
->save();
```


Note: the update method only updates the properties that you set with the setXXX methods.

That's because this is most of the time the desired behaviour; imagine for instance a shop object with the following columns and values:
 

- id: 1
- label: mooo
- host: domain.com
- lang_id: 1
- currency_id: 2
- timezone_id: 134

Now, imagine this code:

```php
ShopObject::create()
    ->setId(1)
    ->setLabel("dooo")
    ->save();
```

What you expect is that the label becomes "dooo", but you don't want the other properties to change.
If they did change, they would be set to their default values and you would end up with the following, which is
non-sense:

- id; 1
- label: dooo
- host: (empty string)
- lang_id: 0
- currency_id: 0
- timezone_id: 0







### Mixing insert and update

SaveOrm is smart enough to detect whether an insert or an update should be performed for each object.

When you save an ensemble of related objects (see Relationships section below),
each object is either inserted or updated, depending on the provided data for each object.


```php
MyTableObject::create()
->setId(6)
->setFlower(FlowerObject::createByName("rose")->setColor("red"))
->save();
```

In the above example, when the **save** method is called,
the MyTable object triggers an insert, while the Flower object will trigger an update.


   
   
Relationships
----------------------

Relationships in SaveOrm are special, there are three types of relationships:

- bindings
- siblings
- children

Please read the **saveorm.md** document for more info.


The benefit of relationships in general is that when you save your object,
all objects related to it will be saved too.

Plus, when you save such an ensemble of objects, some data are passed automatically
for you.


### Bindings

Use the createXXX method to define a binding between a guest object to a host object.

```php
ProductObject::create()
->setName("maurice")
->createProductLang(ProductLangObject::create()
    ->setReference("456")
    ->setPrice()
)

->save();
```

In the above example, both the Product and the ProductLang objects are saved.
   
When you save the Product object, the newly created id (or any other identifying field(s)) is inferred
automatically to the ProductLang object (i.e. you don't need to call 
the ProductLangObject.setProductId method manually). 
   
   
   
### Siblings

Use the setXXX method to define an object as a sibling.


```php
ProductObject::create()
->setName("maurice")
->setProductType(ProductTypeObject::create()
    -setName("balloon")
)

->save();
```

In the above example, both the Product and the ProductType objects are saved.
   
When you save the Product object, the newly created ProductType.id (or any other identifying field(s)) is inferred
automatically to the Product object (i.e. you don't need to call 
the Product.setProductTypeId method manually). 
   


   
### Children

Use the addXXX method to add a child to a parent.


```php
ProductObject::create()
->setName("maurice")
->addComment(CommentObject::create()
    -setText("kool"), ProductHasCommentObject::create()
)

->save();
```

In the above example, the Product, Comment and ProductHasComment objects are saved.
   
When you save the Product object, the newly created Product.id (or any other identifying field(s)) 
AND the newly created Comment.id (or any other identifying field(s))
are automatically inferred to the ProductHasComment object (i.e. you don't need to call 
the ProductHasComment.setProductId and ProductHasComment.setCommentId methods manually). 
   


CreateByXXX methods
---------------------

The generator creates createByXXX methods for every unique index it finds.

For instance if your user table has an unique index on the **email** field,
you could create the User object using the following code:


```php
UserObject::createByEmail("email@gmail.com");
```        

The returned object is suitable for an update.


Note: it also works with indexes composed of multiple keys:


```php
UserObject::createByEmailShopId("email@gmail.com", 1);
```        



More info about the save method
=================================

There is more.
Learn about the createUpdate method and the save mechanism in more depth
by reading the [save document](https://github.com/lingtalfi/SaveOrm/blob/master/doc/save.md), and other documents in the doc directory.





Known limitations
=====================

If you use multiple prefixes, chances that at some point you will have method name conflicts.

For instance, ek_user and ecc_user should perhaps lead to different methods, for instance:

- setEkUser
- setEccUser


But SaveOrm doesn't differentiate between those and provide a single method:

- setUser

This is because if SaveOrm tried to deal with prefixes, it should also rename all properties and
the end result could be confusing to the SaveOrm user.

Therefore, if this problem happens to you, the recommended workaround is to create the necessary method
in the userland class.

So for instance if you see the problem in your Ek/GeneratedUserObject class,
then you can fix it in the corresponding Ek/UserObject class, by creating a new method, like this for instance:


```php 
public function setEccUser(EccUserObject $user){
    $this->eccUser = $user;
    return $this;
}
```

Also, you will need to create the eccUser property.  











Related
================

- [OrmTools](https://github.com/lingtalfi/OrmTools)





History Log
------------------    

- 1.18.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.18.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.18.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.18.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.18.1 -- 2017-11-22

    - fix ObjectManager not handling the implementation of createUpdateByArray correctly 
    
- 1.18.0 -- 2017-11-22

    - update Object.createUpdateByArray method
    - update ObjectManager.getInstanceInfo now is public static
    - improved ObjectManager.getMostRelevantIdentifiers algorithm, now detects the values set on the object by default
    
- 1.17.1 -- 2017-10-12

    - fix ObjectManager.save not returning all the values representing the object with insert
    
- 1.17.0 -- 2017-10-12

    - update ObjectManager.save, now return all the values representing the object
    
- 1.16.0 -- 2017-10-12

    - add ObjectManager debugSql mode
    - fix ObjectManager.save complaining when nullable fk is null
    - add ObjectManager prm identifier type
    - fix createUpdate not working properly (complaining about unresolved keys that it should have resolved automatically)
    
- 1.15.2 -- 2017-10-09

    - fix Object._resolveUpdate overriding user defined values
    
- 1.15.1 -- 2017-10-06

    - fix Object.feedByArray method now return self
    
- 1.15.0 -- 2017-10-06

    - add Object.feedByArray method
    
- 1.14.1 -- 2017-10-06

    - fix Object.createByArray method, now is static
    
- 1.14.0 -- 2017-10-06

    - add Object.createByArray method
    
- 1.13.1 -- 2017-10-01

    - fix save system, now uses lazy resolveUpdate: now every children's whereSuccess is checked
    
- 1.13.0 -- 2017-09-10

    - ObjectManager.save's saveResults referenced variable now contains one array per table
    - add Object.createUpdate identifierType argument
    
- 1.12.5 -- 2017-09-10

    - fix ObjectManager.getMostRelevantIdentifiers private method, return ai as an array
    
- 1.12.4 -- 2017-09-09

    - fix ObjectManager, save method now return a row per addXXX for children relationship
    
- 1.12.3 -- 2017-09-09

    - fix SaveOrmGenerator's add method now use createUpdate as the default method for middle table
    
- 1.12.2 -- 2017-09-09

    - fix SaveOrmGenerator's bindings doublons
    
- 1.12.1 -- 2017-09-06

    - fix ObjectManager's handling of createUpdate (now can insert)
    
- 1.12.0 -- 2017-09-05

    - add Object::createUpdate method
    
- 1.11.1 -- 2017-09-05

    - fixed SaveOrmGenerator generating only createByXXX methods for unique indexes problem
    
- 1.11.0 -- 2017-09-05

    - revisited save method with two modes: insert/update
    
- 1.10.0 -- 2017-09-05

    - update ObjectManager.save method algorithm for determining whether to insert/update, now uses uniqueIndexes 
    
- 1.9.0 -- 2017-09-04

    - update ObjectManager now injecting into guests (bindings) only for non changed properties 
    
- 1.8.0 -- 2017-09-04

    - fix SaveOrmGenerator not generating bindings key in conf    
    - GeneratedBaseObject.save method now has an optional savedResults referenced argument    
    
- 1.7.0 -- 2017-09-04

    - createByXXX generated methods now have their last argument: $fail defaulting to the new option: false    
    
- 1.6.0 -- 2017-09-04

    - add GeneratedBaseObject.getSaveResults method    
    - change GeneratedBaseObject.save method returns the same as the ObjectManager.save method    
    
- 1.5.0 -- 2017-09-04

    - now save method handle update only for the set properties  
    
- 1.4.0 -- 2017-09-04

    - add third argument to SaveOrmGeneratorHelper.getObjectRelativePath method (usedPrefix)  
    - add alias support  
    
- 1.3.0 -- 2017-09-04

    - change SaveOrmGenerator for finding bindings (now cannot be a middle table, but a left/right table is ok) 
    
- 1.2.0 -- 2017-09-04

    - createByXXX generated methods now accept a third argument: $fail=true 
    
- 1.1.0 -- 2017-09-04

    - the second argument of the addXXX auto-generated method is now optional 
    
- 1.0.1 -- 2017-09-04

    - fix SaveOrmGenerator algorithm for finding children
    
- 1.0.0 -- 2017-09-04

    - initial commit