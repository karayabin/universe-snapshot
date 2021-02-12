Localys
============
2017-07-01


A locale helper for your apps.






This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Localys
```

Or just download it and place it where you want otherwise.




How to
=========

```php
<?php

use Ling\Localys\Localyser\Localyser;

// your autoloader here...

$localyzer = Localyser::create()->setDefaultLang('fra');
a($localyzer->get()->getMonth(2)); // février
```


Before you can use the code above, you need to create a Localys instance per lang that you use.

A Localys instance is an object that you create, which must implement the LocalysInterface.

The Localyser object is a finder for Localys instances.

By default, it searches a class under the namespace MyLocalys.
 
So, assuming that you have 
a [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) 
autoloader ready, and assuming your use the lang "eng", then you need to create a class named
**EngLocalys**, that's it.

Do that for all languages that your application uses.

You can find default Localyses here: **/Localys/Localyser/Localyser/_MyLocalysExample**.

Copy paste them into your app, or if it does not exist, create it, and please make a pull request
if you want.


Enjoy!






Philosophy
=================

Rather than creating one object that every country can use, containing all possible
locale data, why not let every country build its own locale object, bit by bit, and 
only the used bits?






History Log
------------------

- 1.9.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.9.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.9.0 -- 2018-06-19

    - add LocalysInterface.getTimeElapsedString method

- 1.8.0 -- 2018-05-29

    - add LocalysFrenchHelper class

- 1.7.0 -- 2018-05-04

    - add LocalysInterface.getLongDateWithTime method
    
- 1.6.0 -- 2017-12-02

    - add LocalysInterface.getLongDateRangeBits method
    
- 1.5.0 -- 2017-09-26

    - add LocalysInterface.getLongerDate method
    
- 1.4.0 -- 2017-09-11

    - add LocalysInterface.getDayNameLong method
    - add LocalysInterface.getDayNameAbbr method
    
- 1.3.0 -- 2017-08-23

    - add LocalysInterface.getGenderAbbreviation method
    
- 1.2.1 -- 2017-07-07

    - fix LocalysInterface.getLongDateRange method
    
- 1.2.0 -- 2017-07-07

    - add LocalysInterface.getLongDateRange method
    
- 1.1.0 -- 2017-07-01

    - add LocalysInterface.getLongDate method
    
- 1.0.0 -- 2017-07-01

    - initial commit




