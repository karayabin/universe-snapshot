OrmTools
=============
2017-08-30


Some tools helping with construction of orms.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/OrmTools
```

Or just download it and place it where you want otherwise.




Why?
=======
I'm tired of typing the fields of a table to build my self made orm objects manually.



What tools?
================

- CopyPasteUtil
- OrmToolsHelper
    - getPhpDefaultValuesByTables
- ChipGenerator




CopyPasteUtil - Howto
==========

```php
<?php

use Core\Services\A;
use Ling\OrmTools\Util\CopyPasteUtil;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";



A::quickPdoInit(); // initializing QuickPdo, this depends on your application
$util = CopyPasteUtil::create()
    ->setTables([
        'ek_shop_has_product_card',
        'ek_shop_has_product_card_lang',
    ]);
$util->renderColumns(['mode' => 'props']);
$util->renderConstructorDefaultValues();



```

Will display something like this in the browser:


```txt 

ek_shop_has_product_card

private $shop_id;
private $product_card_id;
private $product_id;
private $active;


ek_shop_has_product_card_lang


private $shop_id;
private $product_card_id;
private $lang_id;
private $label;
private $slug;
private $description;
private $meta_title;
private $meta_description;
private $meta_keywords;

Constructor

$this->shop_id = 0;
$this->product_card_id = 0;
$this->product_id = 0;
$this->active = 0;
$this->shop_id = 0;
$this->product_card_id = 0;
$this->lang_id = 0;
$this->label = '';
$this->slug = '';
$this->description = '';
$this->meta_title = '';
$this->meta_description = '';
$this->meta_keywords = '';
```




Chip - Howto
==========

Chip helps you create php object based on one or more tables.

There is a ChipGenerator too.

See the [chip conception note](https://github.com/lingtalfi/OrmTools/blob/master/doc/chip.md).


Using the ChipGenerator looks like this.
First, create the tables you need (they must exist because the generator will inspect them...).
Then use a code like this:


```php

// your framework init here...

$targetDir = "/myphp/class/Test";
$targetNameSpace = "Test";


$builder = ChipGenerator::create()
    ->setTargetDir($targetDir)
    ->setTargetNamespace($targetNameSpace);


$builder->newChip('event', ChipDescription::create()
    ->setTables([
        'ekev_event',
        'ekev_event_lang',
    ])
    ->setIgnoreColumns([
        'id',
        'event_id',
    ])
    ->addLinkColumn('location_id', 'location')
);
```

So, above, I asked the generator to create a Chip using the two tables: ekev_event and ekev_event_lang,
which are represented in the schema below.

[![chip-event.png](http://lingtalfi.com/img/universe/OrmTools/chip-event.png)](http://lingtalfi.com/img/universe/OrmTools/chip-event.png)

Then, I asked him to ignore the id and event_id columns, and finally I asked him to create a one-to-one
relationship with the LocationChip, yet to be created.

And, this is what it produces (in the file /myphp/class/Test/EventChip.php):


```php
<?php


namespace Test;




class EventChip
{

    private $shop_id;
    private $name;
    private $start_date;
    private $end_date;
    /**
    * @var LocationChip
    */
    private $location;
    private $lang_id;
    private $label;



    public function __construct()
    {
        $this->shop_id = 0;
        $this->name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->location = NULL;
        $this->lang_id = 0;
        $this->label = '';

    }


    public static function create()
    {
        return new static();
    }

    
    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shop_id)
    {
        $this->shop_id = $shop_id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
        return $this;
    }

    /**
    * @return LocationChip
    */
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation(LocationChip $location)
    {
        $this->location = $location;
        return $this;
    }

    public function getLangId()
    {
        return $this->lang_id;
    }

    public function setLangId($lang_id)
    {
        $this->lang_id = $lang_id;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }




}
```


So, pretty handy isn't it.

There is one more function you need to know about, to create a one-to-many relationship with another Chip.

So let's look at another example:


```php
<?php 

$builder->newChip('location', ChipDescription::create()
    ->setTables([
        'ekev_location',
    ])
    ->setIgnoreColumns([
        'id',
    ])
    ->setTransformerColumn('country_id', 'country', '')
    ->addChildrenColumn('hotels', 'Hotel')
);

```

Here, I ask the generator to transform the country_id column in the ekev_location table into the country column.
That's because I plan to use my Chip like this:

- setCountry ( 'fra' )

Rather than like this:

- setCountryId ( 65 )


Then, I add a one-to-many relationship with the addChildrenColumn method.

Read the source code of the ChipGenerator and ChipDescription objects to understand the parameters.

The generated class looks like this:


```php
<?php


namespace Test;




class LocationChip
{

    private $label;
    private $address;
    private $city;
    private $postcode;
    private $phone;
    private $extra;
    private $country;
    private $shop_id;
    /**
    * @var HotelChip[]
    */
    private $hotels;



    public function __construct()
    {
        $this->label = '';
        $this->address = '';
        $this->city = '';
        $this->postcode = '';
        $this->phone = '';
        $this->extra = '';
        $this->country = '';
        $this->shop_id = 0;
        $this->hotels = array (
);

    }


    public static function create()
    {
        return new static();
    }

    
    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getExtra()
    {
        return $this->extra;
    }

    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setShopId($shop_id)
    {
        $this->shop_id = $shop_id;
        return $this;
    }

    /**
    * @return HotelChip[]
    */
    public function getHotels()
    {
        return $this->hotels;
    }

    public function addHotel(HotelChip $hotel)
    {
        $this->hotels[] = $hotel;
        return $this;
    }




}
```




That's it.
But remember that creating Chips is just the easy/dumb part of the chip implementation: you also need 
to implement the Processor part, and there is no generator for that yet.

So, may the force be with you.








History Log
------------------
    
- 1.18.0 -- 2018-02-22

    - enhance OrmToolsHelper::getRepresentativeColumn now accepts ref and reference   
    
- 1.17.1 -- 2018-02-16

    - fix OrmToolsHelper::getPrettyColumn not returning the first varchar    
    
- 1.17.0 -- 2018-02-16

    - add OrmToolsHelper::getRic $hasPrimaryKey flag   
    
- 1.16.3 -- 2018-02-16

    - fix OrmToolsHelper::getRic not returning all fields if no primary key   
    
- 1.16.2 -- 2018-02-15

    - fix OrmToolsHelper::getAliases bad handling of infinite loop with forbidden aliases   
    
- 1.16.1 -- 2018-02-15

    - fix OrmToolsHelper::getHasRightTable wrong nesting of exceptions  
    
- 1.16.0 -- 2018-02-15

    - add OrmToolsHelper::getRic method  
    
- 1.15.0 -- 2018-02-15

    - add OrmToolsHelper::getRepresentativeColumn method  
    
- 1.14.1 -- 2018-02-15

    - add OrmToolsHelper::getAliases forbiddenAliases argument  
    
- 1.14.0 -- 2018-02-15

    - add OrmToolsHelper::getAliases method  
    
- 1.13.1 -- 2018-02-15

    - enhance OrmToolsHelper::getPrettyColumn method, now handles complete table name with db prefix  
    
- 1.13.0 -- 2018-02-14

    - add OrmToolsHelper::getPrettyColumn method
    
- 1.12.0 -- 2018-02-14

    - add OrmToolsHelper::getHasTables method
    
- 1.11.0 -- 2018-02-14

    - add OrmToolsHelper::getHasRightTable method
    
- 1.10.0 -- 2017-10-01

    - add OrmToolsHelper::renderGetMethod options argument
    
- 1.9.0 -- 2017-09-04

    - update OrmToolsHelper::renderSetMethod method now has an options argument
    
- 1.8.0 -- 2017-09-04

    - update OrmToolsHelper::renderStatements method now eliminates doublons
    
- 1.7.0 -- 2017-09-01

    - add OrmToolsHelper::getPlural method
    - add OrmToolsHelper::renderSetMethod method
    - add OrmToolsHelper::renderGetMethod method
    
    
- 1.6.0 -- 2017-09-01

    - add OrmToolsHelper::renderClassPropertiesDeclaration method
    - add OrmToolsHelper::renderHint method
    - add OrmToolsHelper::renderConstructorDefaultValues method
    - add OrmToolsHelper::renderStatements method
    
- 1.5.0 -- 2017-09-01

    - add OrmToolsHelper.getPhpDefaultValuesByTables isForeignKey parameter to the callbacks array
    - add OrmToolsHelper.getPhpDefaultValuesByTables default handling for types date and datetime
    
- 1.4.0 -- 2017-08-31

    - add ChipDescription.addColumn to add regular columns
    
- 1.3.0 -- 2017-08-31

    - now ChipDescription.addLinkColumn can also create new columns (not just transform columns)
    
- 1.2.0 -- 2017-08-31

    - Chip now has its own section
    - add ChipProcessor
    
- 1.1.0 -- 2017-08-31

    - add ChipGenerator
    
- 1.0.0 -- 2017-08-30

    - initial commit