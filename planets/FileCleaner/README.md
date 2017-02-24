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


So in order to apply this example properly, I just ran the **gen.php** file, which gaves me the following list of files
to play with:

```txt
20170224--000000--backup.txt
20170225--000000--backup.txt
20170226--000000--backup.txt
20170227--000000--backup.txt
20170228--000000--backup.txt
20170301--000000--backup.txt
20170302--000000--backup.txt
20170303--000000--backup.txt
20170304--000000--backup.txt
20170305--000000--backup.txt
20170306--000000--backup.txt
20170307--000000--backup.txt
20170308--000000--backup.txt
20170309--000000--backup.txt
20170310--000000--backup.txt
20170311--000000--backup.txt
20170312--000000--backup.txt
20170313--000000--backup.txt
20170314--000000--backup.txt
20170315--000000--backup.txt
20170316--000000--backup.txt
20170317--000000--backup.txt
20170318--000000--backup.txt
20170319--000000--backup.txt
20170320--000000--backup.txt
20170321--000000--backup.txt
20170322--000000--backup.txt
20170323--000000--backup.txt
20170324--000000--backup.txt
20170325--000000--backup.txt
20170326--000000--backup.txt
20170327--000000--backup.txt
20170328--000000--backup.txt
20170329--000000--backup.txt
20170330--000000--backup.txt
20170331--000000--backup.txt
20170401--000000--backup.txt
20170402--000000--backup.txt
20170403--000000--backup.txt
20170404--000000--backup.txt
20170405--000000--backup.txt
20170406--000000--backup.txt
20170407--000000--backup.txt
20170408--000000--backup.txt
20170409--000000--backup.txt
20170410--000000--backup.txt
20170411--000000--backup.txt
20170412--000000--backup.txt
20170413--000000--backup.txt
20170414--000000--backup.txt
```


And now here is what we can yield:


```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('1 per month')
    ->clean();
```
    
Outputs this:    
```txt
array(3) {
  [0] => string(33) "test/20170224--000000--backup.txt"
  [1] => string(33) "test/20170301--000000--backup.txt"
  [2] => string(33) "test/20170401--000000--backup.txt"
}
```    
    
    

```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('2 per month')
    ->clean();
```    

Outputs this:    
```txt
array(6) {
  [0] => string(33) "test/20170224--000000--backup.txt"
  [1] => string(33) "test/20170226--000000--backup.txt"
  [2] => string(33) "test/20170301--000000--backup.txt"
  [3] => string(33) "test/20170316--000000--backup.txt"
  [4] => string(33) "test/20170401--000000--backup.txt"
  [5] => string(33) "test/20170408--000000--backup.txt"
}
```    




```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('1 per week')
    ->clean();

```   

Outputs this:    
```txt
array(8) {
  [0] => string(33) "test/20170224--000000--backup.txt"
  [1] => string(33) "test/20170301--000000--backup.txt"
  [2] => string(33) "test/20170308--000000--backup.txt"
  [3] => string(33) "test/20170315--000000--backup.txt"
  [4] => string(33) "test/20170322--000000--backup.txt"
  [5] => string(33) "test/20170329--000000--backup.txt"
  [6] => string(33) "test/20170401--000000--backup.txt"
  [7] => string(33) "test/20170408--000000--backup.txt"
}
```    





 
```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('20 per year')
    ->clean();
```    

Outputs this:    
```txt
array(20) {
  [0] => string(33) "test/20170224--000000--backup.txt"
  [1] => string(33) "test/20170226--000000--backup.txt"
  [2] => string(33) "test/20170228--000000--backup.txt"
  [3] => string(33) "test/20170302--000000--backup.txt"
  [4] => string(33) "test/20170304--000000--backup.txt"
  [5] => string(33) "test/20170306--000000--backup.txt"
  [6] => string(33) "test/20170308--000000--backup.txt"
  [7] => string(33) "test/20170310--000000--backup.txt"
  [8] => string(33) "test/20170312--000000--backup.txt"
  [9] => string(33) "test/20170314--000000--backup.txt"
  [10] => string(33) "test/20170316--000000--backup.txt"
  [11] => string(33) "test/20170318--000000--backup.txt"
  [12] => string(33) "test/20170320--000000--backup.txt"
  [13] => string(33) "test/20170322--000000--backup.txt"
  [14] => string(33) "test/20170324--000000--backup.txt"
  [15] => string(33) "test/20170326--000000--backup.txt"
  [16] => string(33) "test/20170328--000000--backup.txt"
  [17] => string(33) "test/20170330--000000--backup.txt"
  [18] => string(33) "test/20170401--000000--backup.txt"
  [19] => string(33) "test/20170403--000000--backup.txt"
}
```    


```php
SimpleFileCleaner::create()
    ->setTestMode(true) // remove this line in prod
    ->setDir("test")
    ->keep('every 5 days')
    ->clean();
```    

Outputs this:    
```txt
array(10) {
  [0] => string(33) "test/20170224--000000--backup.txt"
  [1] => string(33) "test/20170301--000000--backup.txt"
  [2] => string(33) "test/20170306--000000--backup.txt"
  [3] => string(33) "test/20170311--000000--backup.txt"
  [4] => string(33) "test/20170316--000000--backup.txt"
  [5] => string(33) "test/20170321--000000--backup.txt"
  [6] => string(33) "test/20170326--000000--backup.txt"
  [7] => string(33) "test/20170331--000000--backup.txt"
  [8] => string(33) "test/20170405--000000--backup.txt"
  [9] => string(33) "test/20170410--000000--backup.txt"
}
```  




Tip2: if you want to dig more into the code, take a look at my **pedagogic.php** file inside the **tools**
directory of this repository.


History Log
------------------
    
- 1.0.0 -- 2017-02-24

    - initial commit



