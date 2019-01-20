Populate
==============
2016-02-11



This is a LingBullSheetGenerator feature only (i.e. non standard).


This method helps you to populate a table using a data file.


The scenario is that you have a table named music_genre, and you have a music_genre data file.

Now, you just want to map the data file to the database.

So far, the BullSheet generator doesn't allow us to do that.
However, it might be a handy tool to have under the belt when 
creating a database from scratch.


So here is the method that we add to LingBullSheetGenerator as of 1.1.0.


```php 

void        populate ( str:table, str:domain, callable:populateCb )


void        populateCb ( str:data, LingBullSheetGenerator:g )


```




Note: you better be precise with your domain argument, because you want to target a specific
data file.


The method parses the selected data file, and call the populate callback 
on every line (so that's where you insert the data in the table).




Example
----------

Imagine we have a music_genres table with the following columns:

- id
- the_name
- color
- active



We could use the following script to populate it.


```php
<?php


use BullSheet\Generator\LingBullSheetGenerator;
use QuickPdo\QuickPdo;

require_once "bigbang.php"; // start the local universe


QuickPdo::setConnection(
    "mysql:dbname=mydb;host=127.0.0.1",
    'root',
    'root',
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);



$gen = LingBullSheetGenerator::create()->setDir("/path/to/my/bullsheets");


$gen->populate("clip_genres", "music_genre", function ($genre, LingBullSheetGenerator $g) {
    a(QuickPdo::insert("clip_genres", [
        'the_name' => $genre,
        'color' => $g->colorHexa(),
        'active' => 1,
    ]));
});
```





The cross method
------------------------

Everything is good so far, but we have new problems coming.
The many to many relationship introduces two new problems.


Imagine those three tables

- chanels
- chanels_has_tags
- tags


Our problem is: how do you populate the has table?

Both have something in common, they use the many to many relationship.
There is always a left table, a middle table, and a right table.

The cross technique is basically a cross product between the left and right table, 
which in turn populates the middle table.

More explanations in the cross document.





The timelines method
------------------------

This method helps you to populate a table of events.
Read more in the timelines document.






