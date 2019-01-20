BullSheet
================
2016-02-09



Generate fake data to populate your database.




The idea behind bullsheet is to generate random data based on files (custom files that you can create on the fly).

The motivation is to populate a database with random data.



Disclaimer: 

- this planet does not include the data files, data files are located in the [bullsheets repository](https://github.com/bullsheet/bullsheets-repo)
- it uses php7 (and will not work in lower versions)
 
 
 
 
BullSheet can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


How to use?
---------------

Once setup, here is how you use a bullsheet generator.


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



In order to implement this particular code above, you need to install the ling bullsheets repository on your 
local machine (that's because the first name, top level domain, last name and actor data are in separated txt files 
that you need to first have on your local machine).

The steps for this procedure are described in more details in the install 
the "Using the Ling Bullsheets Generator" section below.




Concepts
----------------

BullSheet has 4 types of streams from which you can take the data:

- pure stream: things that comes from files, like first name, country, actress, but also images (added in 1.1.0)
- generated stream: things generated with only php, like generated numbers, booleans, letters.
- combined stream: combines data from the three types altogether, for instance an email is 
                        usually the combination of a pseudo, the arobase symbol, an internet provider, the dot symbol and an internet domain.

- relational stream: which is the db aware stream: it pulls random data from your database  (added in 1.1.0)


To see more about the relational stream, see my [relational stream conception notes](https://github.com/lingtalfi/BullSheet/blob/master/docs/relational_stream.md).



### Pure streams details: how it works


The core mechanism of pure streams is the action of selecting a random line in a file.

This is a good news, because that means you can create any file, and take advantage of the BullSheet generator 
method right away. So if you want to create a generator that only return one of the seven colors of the rainbow,
just put this in a file:

```
red
orange
yellow
green
blue
indigo
violet
```

and, well, if you are interested in, just go to the tutorial section below, because I want to talk about theory now.



Files are prepared in advance, one element by line, to the discretion of the user (see where to find bullsheets section below).


Now sometimes you have a lot of data, and you want to be more specific about the data you want; for instance you would like to 
select only female first names, instead of just any first names, or maybe you want only german first names 
instead of international first names.

So how does BullSheet deal with that?

Well, first understand that the **pure stream** only reads files that you (or someone else) has prepared.

So in the end it's all about data organization.

For simplicity, all your bullsheet data (called bullsheets from now on), are 
located in a single arbitrary directory on your machine.


There are many ways to organize data; in theory, one per developer.
Although in practice we don't really care, I had to deal with that when coding the BullSheet class.

Therefore BullSheet introduces the concept of domain.

A domain is just another name for a directory.

A domain contains, directly or indirectly, some **data files**.

A **data file** is any file which extension is .txt.


So if you are like me, given the "first name" example, I would tend to have this bullsheet structure:

```
- bullsheets/
----- first_name/
--------- all.txt
```

But if you are like Paul, you could have this kind of structure:

```
- bullsheets/
----- first_name/
--------- female/ 
------------- data.txt
--------- male/ 
------------- data.txt
```


Or if you are like Virginie, you could end up with this structure:


```
- bullsheets/
----- first_name/ 
--------- i18n/
------------- fra/
----------------- female/
--------------------- b.txt
----------------- male/
--------------------- b.txt
------------- ger/
----------------- female/
--------------------- b.txt
----------------- male/
--------------------- b.txt
------------- ...
--------- years/
------------- 1907/
----------------- female/
--------------------- b.txt
----------------- male/
--------------------- b.txt
------------- ...
--------- ...
----- ... 
```

Or if you are like Mauricette, you could end up with this structure:

```
- bullsheets/
----- first_name/ 
--------- i18n/
------------- fra/
----------------- 1907/
--------------------- female/
------------------------- b.txt
--------------------- male/
------------------------- b.txt
----------------- 1908/
--------------------- female/
------------------------- b.txt
--------------------- male/
------------------------- b.txt
------------- ger/
----------------- 1907/
--------------------- female/
------------------------- b.txt
--------------------- male/
------------------------- b.txt
----------------- 1908/
--------------------- female/
------------------------- b.txt
--------------------- male/
------------------------- b.txt
------------- ...
--------- ...
----- ... 
```
 

Or if you are like ... just kidding, I suppose you've got the idea.

Now when you want to extract some random data, you can use the BullSheet's getPureData low level method;
it takes a domain path, or an array of domain paths as argument, and returns a random line.

Here are some example of calls, assuming we use Mauricette's structure above.

```php
// signature 


b->getPureData ( first_name )       // select a first name from any file in the first_name directory 
b->getPureData ( first_name/i18n )       // select a first name from any file in the first_name/i18n directory 
b->getPureData ( first_name/i18n/female )       // select a first name from any file in the first_name/i18n/female directory 
b->getPureData ( first_name/i18n/*/1907 )       // select a first name from a 1907 directory, any language, any gender 
b->getPureData ( [first_name/i18n/fra/*/male, first_name/i18n/ger/1908 ]  )     // select a male french first name name (any date) or a german first name from 1908 (any gender) 

```


In the examples above, I used the wildcard.
BullSheet can resolve wildcards, because it gives more flexibility and power to the user. 




Now if you wonder how internally BullSheet works, bear with me (I know, that's not exactly a fun read).

First, BullSheet creates a hash out of your domain argument, and see if it's already in memory.

If it's not, then BullSheet resolves the wildcards if any and creates a list of files.

Eventually, BullSheet creates the hash for further calls, and binds it to a list of files.

Therefore, when you call BullSheet multiple times, it can reuse the list of files directly.

Remember that BullSheet is originally designed to be used inside a foreach loop, so that's why it tries to optimize data access. 

So now BullSheet can access a list of files for any given domain argument, and it picks one of them (file) randomly.
The last step is to pick one random line from that file and return it to the user.
   
BullSheet tries to adapt the method used to pick up a random line, depending on the environment (do you have unix methods?),
and the number of lines in your file. 

If you are still curious about how the BullSheetGenerator handles images, see my [pure_data_image conception notes](https://github.com/lingtalfi/BullSheet/blob/master/docs/pure_data_image.md). 

Okay, sorry for the bullshit. 

Let's move on.












Where to find bullsheets?
---------------------------

There is one place called the [bullsheets-repo](https://github.com/bullsheet/bullsheets-repo).
You can add your own bullsheets there (pull requests are welcome), and use the existing ones.



How to share your own bullsheets?
------------------------------------

Create a file containing data, and find an appropriate name for it (I suggest to choose singular form rather than plural 
    form if you have the choice).

Then, remove any empty line in that file, including the last one.

The following conventions were used by me, please use them too:


- create two files:
 
``` 
----- data.txt, and put your data in it
----- src.md, add meta info about that you like here. I generally put the number of lines, and the url 
                where I found the list. There is no special formatting.
``` 


- Then, create a pull request to the [BullSheet repository](https://github.com/bullsheet/bullsheets-repo) (recommended
because that's an obvious place to search for bullsheets),
or you can always create your own bullsheet repository if you prefer to.





BullSheet Hello tutorial
----------------------

In this tutorial, we will create add a method that returns one of the seven colors of the rainbow.
Obviously, you can apply the same principle with a lot more choices (BullSheet actually is quite fast even with big files),
but to understand things, we the 7 colors of the rainbow is a good start.

So let's dive in.


1\. Create a directory name bullsheets in your local machine.
 
I will create mine at /path/to/my/bullsheets.
 
This is our local bullsheets repository.
 
It will contain all our bullsheets.

The 7 colors of the rainbow is just one bullsheet.

So, since we will have a lot of directories there, we better be well organized.

2\. Now create the rainbow_color directory inside your bullsheets directory.

Mine will be here: **/path/to/my/bullsheets/rainbow_color**

Note: as a convention, I always use the singular form of an object. 
It kind of makes sense, but you can do as you want.


3\. We now technically just need to create a .txt file and put the colors in it, one per line.

However, I recommend to create two files (just a good habit to have if you are going to create many bullsheets):

- data.txt, the data, one per line
- src.md, some meta info about the data (the link where you find the data, the number of lines, etc...)

Open the data.txt and put the following content inside:

```
red
orange
yellow
green
blue
indigo
violet
```

Notice that there is no empty line at the end (i.e. each line has a word on it).

Then open the src.md file and put the following contents in it:

```
7 lines
```

As I said before, this is just a good habit (I believe), but you don't do it, it will still work.

4\. Now, open a php file and put the following content in it (assuming you know what a planet is):


```php 
<?php


use BullSheet\Generator\AuthorBullSheetGenerator;

require_once "bigbang.php"; // start the local universe



$b = AuthorBullSheetGenerator::create()->setDir("/Volumes/Macintosh HD 2/it/php/projects/bullsheets-repo/bullsheets");
a($b->getPureData('rainbow_color'));

```

The key here is that we use the magic method getPureData.

This method picks a .txt file (in this tutorial we only have one, but we could have many), 
and returns one random line from it.

Now you can refresh your screen like crazy and sees the color names being displayed...




Using the Ling Bullsheets Generator
----------------------------------------

In the first code example, at the very top of this document, I used the LingBullSheetGenerator class with some 
bullsheets data.

Understand that in order to generate so called pure stream data, you need to import the bullsheets on your computer first.
  
They are not included in this planet because it could grow out of control, and I wanted to 
keep the size of my repository small.

You can find the [ling bullsheets here](https://github.com/bullsheet/bullsheets-repo/tree/master/bullsheets/ling).
 
In order to do that, just download the zip, create a **bullsheets** directory on your local machine, 
and unzip the tarball to your local **bullsheets** directory.

Once you have done that, you basically just need to call the getPureData method, passing the 
relative path (starting from your **bullsheets** directory) to a folder as an argument.

Now if you use the LingBullSheetGenerator, there is one extra step: you need to import the directory called ling.

The ling directory is a namespace that is automatically prefixed (by the LingBullSheetGenerator) to the 
paths (domains) that you pass to the getPureData method.

This means that if your path is rainbow_color, the LingBullSheetGenerator will actually look for a directory called 
ling/rainbow_color inside your bullsheets directory.

This is some kind of namespace if you will, but the LingBullSheetGenerator types it automatically for you.


  









Personal note
-----------------

Omg, it's all about bullsheets!


 







History Log
------------------
    
- 1.0.0 -- 2016-02-10

    - initial commit
    
    
