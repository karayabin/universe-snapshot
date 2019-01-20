Portable Autoloader
=========================
2015-10-05






This is a technique I use to rapidly develop my own classes.
It's a portable autoloader.


The first goal is that I can get all my classes ready using just the following one liner:


```php
require_once "bigbang.php";

// now I can use all my classes

```


The second goal is that this code is portable.
See, it will work the same on my local machine or on a remote machine.




How is it done?
---------------------

I will explain how I've done it on my machine, then you will adapt the technique to your need.<br>
My setup prepares the autoloader for the [universe](https://github.com/lingtalfi/universe) classes,
which is a set of classes I'm working with at the moment.

So, if you use another set of classes, you need to adapt the code accordingly, but the base technique
remains the same, and can be used to import any set of classes.



Basically, we whole trick is to combine the [include_path directive](http://php.net/manual/en/ini.core.php#ini.include-path)
in your php.ini with an autoloader class, such as the [ButineurAutoloader](https://github.com/lingtalfi/BumbleBee/tree/master/Autoload).



Here is the concrete setup recipe, it has to be done once per machine:


1. Create a loader script, based on the [ButineurAutoloader](https://github.com/lingtalfi/BumbleBee/tree/master/Autoload) example, 
    and which loads the set of classes that you want to use.<br>
    If you want to use the [universe](https://github.com/lingtalfi/universe) classes like I did, you can simply skip this step and use my [bigbang.php](https://github.com/lingtalfi/TheScientist/blob/master/bigbang/bigbang.php) script directly.
        
        
2. Now we need to make sure that when we call this one line from our application:
        

```php
require_once "bigbang.php";

```        

Our loader script will be called.<br>
The trick for that is to use the include_path directive from the php.ini.<br>
So, open your php.ini, and update the include_path value, add the path to the folder containing your script.<br>
Here is an excerpt from my php.ini file:

```
include_path=".:/usr/local/share/universe:/opt/local/share/pear:/opt/local/lib/php"
```


So this means that my autoloader script is located here:

```
/usr/local/share/universe/bigbang.php
```

Actually, I used a symlink (because I wanted a "clean" path in my php.ini) but it doesn't matter how you do it,
as long as the directory in your include_path contains your autoloader script.



### Note about include_path

Also note that I put the **/usr/local/share/universe** before the other directories (**/opt/local/share/pear** and
**/opt/local/lib/php** in my case).
That's because I tend to use the universe classes more often than I use what's in those other directories.
 

One should know that when php is asked to include a file, it processes the directories in the include_path from the left
to the right.
This means that in my example, php will look in the following directories in the given order:

- .
- /usr/local/share/universe
- /opt/local/share/pear
- /opt/local/lib/php

Imagine that my include_path would be like this instead:


```
include_path=".:/opt/local/share/pear:/opt/local/lib/php:/usr/local/share/universe"
```

Then, when php would process the directories in the following order:
- .
- /opt/local/share/pear
- /opt/local/lib/php
- /usr/local/share/universe


In this latter case, I need to worry about conflict name that might occur.

- Does my bigbang.php file exist in /opt/local/share/pear?
- Does my bigbang.php file exist in /opt/local/lib/php?

If so, I might be in trouble.<br> 
So my point here is this: choose your name thoughtfully, and know your include_path.



### Your autoloader script as a booter script

Also, I love to use two debug functions: a and [az](https://github.com/lingtalfi/az-functions), which are basically aliases for the native php var_dump function.
From my experience, they are a huge time saver, and I recommend that you try them as soon as possible, and
I'm pretty sure they will never quit you for php development.

I use them all the time, so I put them in the autoloader script, so that any project that I start with this
one liner comes with the a and az functions out of the box.


Summary
------------

Well, that's already the end of this document, the technique does the job: we are able to start a 
new empty project with all our classes ready with a simple one liner.

I have nothing more to add.









