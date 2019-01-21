SitemapSlicer
=============
2015-10-11



Generate a sitemap index and its related sitemaps using data from your database.


SitemapSlicer is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import SitemapSlicer
```



Features
-------------

- creates the sitemaps files automatically from the db tables rows, according to your business rules
- automatically creates the appropriate index sitemap file   
- supports Google video, image and mobile sitemap extensions
- mapping tables to sitemaps file is easy
- Fetches your data using slices of arbitrary width (might be helpful if you have a lot of data)    



The problem
----------------

You own a dynamic website (where people can post things), and you want to generate a sitemap for your website.



The solution
----------------

The Sitemap Slicer might help you.
Basically, it reads data from your database, turns it into sitemaps, and creates the corresponding sitemap index.<br>


One possible usage of the Sitemap Slicer is to create a script that recreates the whole sitemap of your application,
and you call this script every day at 3:00am for instance (using a cron job).




The big picture
--------------------
![Sitemap slicer overview](https://github.com/lingtalfi/sitemapslicer/blob/master/doc/sitemap-slicer-overview.jpg "Sitemap Slicer overview")


The schema shows how objects interact with each others.
At the top of the schema, we have 3 tables t1, t2 and t3.
Each table contain an arbitrary number of rows that we want to convert into sitemap entries.

Instead of retrieving all the rows in one time, we will use slices (rows slices).
We define an arbitrary sliceWidth number, which is the max number of rows per slice. 
From there, the Sitemap Slicer will figure out how many times it needs to repeat the operation to consume all the rows of our table.

Imagine we had a table with one million entries, we could set the sliceWidth to 200000, to divide the fetching in 5 operations rather 
than a big one.

On the schema, we use a symbolic sliceWidth of 10 for the sake of clarity.


Now that the sliceWidth is defined, we need to map our tables to sitemap files.
In the schema, we map table t1 to a sitemap called sitemap.abc.xml, and tables t2 and t3 to a sitemap file named sitemap.def.xml.
Depending on your organization, you will want to map tables differently.


Once we have configured our objects, we just need to call the Sitemap Slicer's execute method to get our sitemaps and sitemap index
generated.
But the schema shows us what happens under the hood.

In particular, it shows us that the sitemap bound to table t1, named sitemap.abc.xml, could be actually converted to multiple sitemaps:
sitemap.abc.xml, sitemap.abc2.xml, sitemap.abc3.xml, and so on, depending on a setting called max entries per sitemap.
This is done automatically for us and we don't have to worry about it, but it might help to be aware of it.

Also, the schema shows us that any sitemap file is automatically referenced inside the sitemap index file, which is the final product of the 
SitemapSlicer.
 


  
How many entries per sitemap, an example with numbers
-------------------------

You don't need to read this section, unless you are interested by the internal mechanisms of the Sitemap Slicer.

So let's say that we have a sliceWidth of 200000, which means that the Sitemap Slicer will retrieve rows in our database by
slice of 200000 entries at a time.

Let's say that we have 3 tables in our application, called t1, t2 and t3 and from which we want to generate sitemaps.

- t1 contains 12000 entries
- t2 contains 3000 entries
- t3 contains 24000 entries


Independently from the sliceWidth setting, we can also choose the max number of entries per sitemap.
Let's say that maxEntriesPerSitemap is 50000, then after calling the execute method of the Sitemap Slicer, we would end up with 
one big sitemap file containing the entries from all the tables t1, t2 and t3.

- sitemap.xml   (containing 39000 entries: 12000 entries from t1, 3000 entries from t2, 24000 from t3) 



Now imagine we reduce the maxEntriesPerSitemap to 10000, then we would end up with the following files (by default):

- sitemap.xml    (containing 10000 entries from t1)
- sitemap2.xml   (containing 10000 entries: 2000 entries from t1, 3000 from t2 and 5000 from t3)
- sitemap3.xml   (containing 10000 entries from t3)
- sitemap4.xml   (containing 9000 entries from t3)



Actually, this is automatically handled by the Sitemap Slicer, we don't need to worry.

  
  
  
Let's now dive into examples.
You should read at least the first example (if you're interested), which explains things in details.
The other example is just a variation of the first example.
  
  

Example 1: convert one table into one sitemap
-------------------------



```php
<?php


use QuickPdo\QuickPdo;
use SitemapBuilderBox\Objects\Url;
use SitemapSlicer\SitemapIndexSlicer\AuthorSitemapIndexSlicer;
use SitemapSlicer\SitemapSlice\AuthorSitemapSlice;
use SitemapSlicer\TableBindure\AuthorTableBindure;



require_once "bigbang.php"; // this is the famous bigbang oneliner




// this is the sliceWidth
$n = 150000;
$maxEntriesPerSitemap = 10000;

// this is the pdo connection that I use in this example application
QuickPdo::setConnection(
    "mysql:dbname=sketch;host=127.0.0.1",
    'root',
    'root',
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);


AuthorSitemapIndexSlicer::create()
    ->onWarning(function ($msg) {
        // log to the system (you probably don't want to interrupt the script with an Exception)
        a($msg); // a function comes from the bigbang script
    })
    ->file(__DIR__ . '/sitemap.index.xml')
    ->url(function ($fileName) {
        return 'http://mysite.com/' . basename($fileName);
    })
    ->defaultSliceWidth($n)
    ->maxSitemapEntries($maxEntriesPerSitemap)
    ->addSitemapSlice(AuthorSitemapSlice::create()
            ->sliceWidth($n)
            ->file('idea.sitemap{n}.xml')
            ->addTableBindure(AuthorTableBindure::create()
                    ->setCountCallback(function () {
                        $stmt = <<<MMM
select count(*) as count from mecas where active=1
MMM;
                        if (false !== ($row = QuickPdo::fetch($stmt))) {
                            return $row['count'];
                        }
                        return false; // will trigger an error
                    })
                    ->setRowsCallback(function ($offset, $nbItems) { // gets repeated as long as necessary
                        $stmt = <<<FFF
select * from mecas where active=1 order by id asc limit $offset, $nbItems       
FFF;
                        return QuickPdo::fetchAll($stmt);
                    })
                    ->setConvertToSitemapEntryCallback(function (array $row) {
                        $d = new DateTime($row['publish_date']);

                        return Url::create()
//                            ->setLoc(Router::getDynamicUri(URLSPACE_MECA, $row['the_name'], true))
                            ->setLoc('http://sketch/meca/' . $row['the_name'])
                            ->setLastmod($d->format(\DateTime::ISO8601))
                            ->setChangefreq('monthly');
                    })
            )
    )
    ->execute();
```



We start by importing our objects and call the 
[bigbang.php](https://github.com/lingtalfi/TheScientist/blob/master/bigbang/bigbang.php)
 script.<br>
The bigbang script is the oneliner that one can use to make 
[BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md)
classes available to one's application.<br>
The oneliner technique is explained in the 
[portable autoloader](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md)
document.

Then I define my sliceWidth, n=150000;
then I define the maxEntriesPerSitemap=10000;



Then I define a pdo connection. 
I use 
[pdo](http://php.net/manual/en/book.pdo.php)
, but you can use any connector you like.

I also use 
[QuickPdo](https://github.com/lingtalfi/QuickPdo),
which is a wrapper for pdo, 
but again, you can use any method that you like;
the only thing that matters is that you are able to query your database.


Then we start using the Sitemap Slicer.
Basically, we create the Sitemap Slicer object (AuthorSitemapIndexSlicer),
then we bind slices to it (AuthorSitemapSlice), and then we call the execute method of the Sitemap Slicer.


Now there is more to say about each method.

### the AuthorSitemapIndexSlicer.onWarning method

You define a callback that is called whenever something wrong happens.<br>
The approach here is that the AuthorSitemapIndexSlicer object catches all exceptions internally,
and makes them available to you via the onWarning method.

That's because in that kind of script which can take a while, we generally don't want that an exception halts the whole process.
In the example above, I use the "a" method (from bigbang script).
That's convenient for quick debugging, but in production you should replace it with a real logging (and not halting) method.


### the AuthorSitemapIndexSlicer.file method

Let you define the location of the generated sitemap index file.


### the AuthorSitemapIndexSlicer.url method

Let you define a callback that converts a sitemap file path to a sitemap url (which are required by the sitemap index).


### the AuthorSitemapIndexSlicer.defaultSliceWidth method

Define the default sliceWidth to use.
Every Sitemap Slice bound to the AuthorSitemapIndexSlicer object can either override this parameter, or inherit the default (by default).


### the AuthorSitemapIndexSlicer.addSitemapSlice method

Adds a Sitemap Slice to your Sitemap Slicer.<br>
One can represent a Sitemap Slice as an object that will be eventually converted to 
a sitemap file.



### the AuthorSitemapSlice.sliceWidth method

Overrides the default sliceWidth for a specific Sitemap Slice.



### the AuthorSitemapSlice.maxEntriesPerSitemap method


Define the max number of entries per sitemap.
This method is specific to the AuthorSitemapSlice class and is not part of the SitemapIndexSlicerInterface.
The interface doesn't define it because it relies on the fact that concrete implementations can use any 
"sitemap entries overflow detection system" they want.

In the case of the AuthorSitemapSlice implementation, the author relies on the number of entries per sitemap to 
test the limit of the sitemap capacity, but another implementor could rely on the file's weight, for instance. 




### the AuthorSitemapSlice.file method

Define the path for the sitemap file.
This method actually accepts a parameter which can be either a string or callback.
It is described with more details in the 
[SitemapSliceInterface](https://github.com/lingtalfi/SitemapSlicer/blob/master/SitemapSlice/SitemapSliceInterface.php)
file.



### the AuthorSitemapSlice.addTableBindure method

Adds a TableBindure object to your Sitemap Slice.

The TableBindure object is the one that does the hard work of converting the rows from your table 
into sitemap entries for your sitemaps.
This will be explained later.

You can bind multiple TableBindures to a Sitemap Slice.

Remember that the Sitemap Slice represents your sitemap file.
Then the TableBindure represents a table that will feed that particular sitemap file.

You can bind one table to one base sitemap, or multiple tables to one base sitemap.

Now, all this discussion leads us naturally to the AuthorTableBindure object.



### the AuthorTableBindure.setCountCallback method

Define a callback that returns the total number of rows of the table that you originally
want to parse.

The Sitemap Slicer will need that number for its slicing mechanism.

Again, in the above example, I use QuickPdo to query the application database, but you can just
use any utility that you like.


### the AuthorTableBindure.setRows method

Define a callback that returns the rows (from the table) to parse.<br>
When you code this method, be very careful: the callback takes two arguments: offset and nbItems,
and you need to parameterize your database query with those parameters, 
otherwise the **SLICES MECHANISM WON'T WORK AS EXPECTED!!**

The offset parameter represents the offset of the first row to return,
and the second parameter represents the maximum number of rows to return.

If you are using mySql for instance, it would match perfectly with the arguments 
of the limit clause.

Your callback returns the rows that you want to work with.
Those have to be consistent with the number of rows that you specified with the
setCountCallback method, which means that if you were ignoring the offset and 
nbItems parameters and execute the callback of the setRowsCallback method, it should return exactly the same number of rows
that the number returned by the callback of the setCountCallback method.

Now, internally, the Sitemap Slicer will parse those rows, and call a callback on each of them.
That callback is the one that you set using the setConvertToSitemapEntryCallback method described in the next section.



### the AuthorTableBindure.setConvertToSitemapEntryCallback method

Define the callback that is used to convert a row (generated by the callback set with the setRowsCallback method)
to a sitemap entry.
It turns out that from the beginning, our Sitemap Slicer is actually the AuthorSitemapIndexSlicer,
which internally uses the 
[Sitemap Builder Box](https://github.com/lingtalfi/SitemapBuilderBox)
system.


This means that we can use the 
[Url](https://github.com/lingtalfi/SitemapBuilderBox/blob/master/Objects/Url.php)
object from SitemapBuilderBox (we could also use the 
[Video](https://github.com/lingtalfi/SitemapBuilderBox/blob/master/Objects/Video.php)
object, or the 
[Mobile](https://github.com/lingtalfi/SitemapBuilderBox/blob/master/Objects/Mobile.php)
object if needed for instance).


You can use any other sitemap management system that you like, the only thing that matters 
is that you convert the row to a sitemap entry that your sitemap system 
is able to handle.



It is very likely that you will have to inject some business logic from your app in this callback.
So, this callback is **REALLY WHERE THE WORK IS DONE**.



### the AuthorSitemapIndexSlicer.execute method


Now that our Sitemap Slicer is configured thanks to all the above methods,
we can call the Sitemap slicer's execute method, which is where our "configuration" is read and 
the code is actually being executed.<br>
Remember that the Sitemap Slicer will not halt until the end.
Use the onWarning method to be notified if something goes wrong.



So that concludes our overview of all the methods used by the different objects involved in our first example.



Example 2: mixing with video sitemap 
-------------------------

The second example is just a variation on the first example.
It uses two slices (two base sitemaps will be generated), and the first sitemap is fed by two tables,
one of them is used to generate video entries (from the 
[Google Video sitemap](https://developers.google.com/webmasters/videosearch/sitemaps) 
extension). 


```php
$n = 10000;
$maxEntriesPerSitemap = 10000;


QuickPdo::setConnection(
    "mysql:dbname=sketch;host=127.0.0.1",
    'root',
    'root',
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);


AuthorSitemapIndexSlicer::create()
    ->onWarning(function ($msg) {
        // log to the system (you probably don't want to interrupt the script with an Exception)
        a($msg);
    })
    ->file(__DIR__ . '/sitemap.index.xml')
    ->url(function ($fileName) {
        return 'http://mysite.com/' . basename($fileName);
    })
    ->defaultSliceWidth($n)
    ->maxSitemapEntries($maxEntriesPerSitemap)
    ->addSitemapSlice(AuthorSitemapSlice::create()
            ->sliceWidth($n)
            ->file('idea.sitemap{n}.xml')
            ->addTableBindure(AuthorTableBindure::create()
                    ->setCountCallback(function () {
                        $stmt = <<<MMM
select count(*) as count from videos where active=1
MMM;
                        if (false !== ($row = QuickPdo::fetch($stmt))) {
                            return $row['count'];
                        }
                        return false; // will trigger an error
                    })
                    ->setRowsCallback(function ($offset, $nbItems) { // gets repeated as long as necessary
                        $stmt = <<<FFF
select * from videos where active=1 order by id asc limit $offset, $nbItems       
FFF;
                        return QuickPdo::fetchAll($stmt);
                    })
                    ->setConvertToSitemapEntryCallback(function (array $row) {
                        $d = new DateTime($row['publish_date']);

                        return Url::create()
//                            ->setLoc(Router::getDynamicUri(URLSPACE_MECA, $row['the_name'], true))
                            ->setLoc('http://sketch/meca/' . $row['the_name'])
                            ->setLastmod($d->format(\DateTime::ISO8601))
                            ->setChangefreq('monthly')
                            ->setVideo(Video::create()
                                    // the getVideoThumbnailByUrl function is open source: https://github.com/lingtalfi/video-ids-and-thumbnails/blob/master/testvideo.php
//                                    ->setThumbnailLoc(getVideoThumbnailByUrl($row['url'], 'medium'))
                                    ->setThumbnailLoc('http://thumbnail.youtube.com/' . $row['the_name'])
                                    ->setTitle($row['the_name'])
                                    ->setDescription($row['description'])
                                    ->setPlayerLoc('http://player/loc/' . $row['url'])
                            );
                    })
            )
            ->addTableBindure(AuthorTableBindure::create()
                    ->setCountCallback(function () {
                        $stmt = <<<MMM
select count(*) as count from mecas where active=1
MMM;
                        if (false !== ($row = QuickPdo::fetch($stmt))) {
                            return $row['count'];
                        }
                        return false; // will trigger an error
                    })
                    ->setRowsCallback(function ($offset, $nbItems) { // gets repeated as long as necessary
                        $stmt = <<<FFF
select * from mecas where active=1 order by id asc limit $offset, $nbItems       
FFF;
                        return QuickPdo::fetchAll($stmt);
                    })
                    ->setConvertToSitemapEntryCallback(function (array $row) {
                        $d = new DateTime($row['publish_date']);

                        return Url::create()
//                            ->setLoc(Router::getDynamicUri(URLSPACE_MECA, $row['the_name'], true))
                            ->setLoc('http://sketch/meca/' . $row['the_name'])
                            ->setLastmod($d->format(\DateTime::ISO8601))
                            ->setChangefreq('monthly');
                    })
            )
    )
    ->addSitemapSlice(AuthorSitemapSlice::create()
            ->sliceWidth($n)
            ->file('other.sitemap{n}.xml')
            ->addTableBindure(AuthorTableBindure::create()
                    ->setCountCallback(function () {
                        $stmt = <<<MMM
select count(*) as count from ideas where active=1
MMM;
                        if (false !== ($row = QuickPdo::fetch($stmt))) {
                            return $row['count'];
                        }
                        return false; // will trigger an error
                    })
                    ->setRowsCallback(function ($offset, $nbItems) { // gets repeated as long as necessary
                        $stmt = <<<FFF
select * from ideas where active=1 order by id asc limit $offset, $nbItems       
FFF;
                        return QuickPdo::fetchAll($stmt);
                    })
                    ->setConvertToSitemapEntryCallback(function (array $row) {
                        $d = new DateTime($row['publish_date']);

                        return Url::create()
//                            ->setLoc(Router::getDynamicUri(URLSPACE_MECA, $row['the_name'], true))
                            ->setLoc('http://sketch/ideas/' . $row['the_name'])
                            ->setLastmod($d->format(\DateTime::ISO8601))
                            ->setChangefreq('monthly');
                    })
            )
    )
    ->execute();


```



Recommendation
-------------------

You also might be interested by the [SitemapBuilder class](https://github.com/lingtalfi/SitemapBuilderBox)




Dependencies
------------------

- [lingtalfi/Bat 1.04](https://github.com/lingtalfi/Bat)
- [lingtalfi/SitemapBuilderBox 1.01 recommended](https://github.com/lingtalfi/SitemapBuilderBox)





 
 
 