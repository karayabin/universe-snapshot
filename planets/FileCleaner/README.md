FileCleaner
================
2017-02-24


A helper class to clean a directory based on conditions.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Motivation
==============

This class was created to help me rotating time based backup files.
I had time based files, for instance like this:

```txt
20170224--000000--backup.txt
20170225--000000--backup.txt
20170226--000000--backup.txt
20170227--000000--backup.txt
20170228--000000--backup.txt
20170301--000000--backup.txt
```

I was creating one backup per day, but then I thought to myself: I'm going to run out of space  
very soon if I don't clean that directory.

So I wanted a system that would allow me to keep only 1 backup every week for instance, 
or maybe 2 per weeks.

But since I like re-usability, I created a flexible class that can basically clean a directory
based on any condition, not only time based information.

So if you dig into the code, I'm sure you will appreciate the effort I put into this.



Usage
===========

Tip: To generate a bunch of time based files, take a look at my **gen.php** script in the tools directory
of this repository.


```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('1 per month')
    ->clean();
```    

```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('2 per month')
    ->clean();
```    

```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('1 per week')
    ->clean();

```   
 
```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('20 per year')
    ->clean();
```    


```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('every 5 days')
    ->clean();
```    


Tip2: if you want to dig more into the code, take a look at my **pedagogic.php** file inside the **tools**
directory of this repository.


History Log
------------------
    
- 1.0.0 -- 2017-02-24

    - initial commit



