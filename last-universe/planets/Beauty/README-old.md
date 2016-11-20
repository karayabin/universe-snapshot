Beauty
============
2015-10-27


![Beauty look](http://s19.postimg.org/455mlu89v/beauty.png)


An implementation of the beauty part of the [beauty'n'beast unit testing pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).



The **Beauty** part of the beauty'n'beast pattern focuses on the gui.
In this implementation, the gui is coded with js and php, and therefore it requires a webserver to operate.
 
 

How does it work?
---------------------
 
For general insights about how it works please consult the [beauty'n'beast pattern](https://github.com/lingtalfi/Dreamer/blob/master/UnitTesting/BeautyNBeast/pattern.beautyNBeast.eng.md).
You can also see my [brainstorm](https://github.com/lingtalfi/Beauty/blob/master/brainstorm/brainstorm.beauty.eng.md) for this particular implementation.
Beauty is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md), and you first step should be to make the planet code available
to your php workspace (just follow the instructions in the planet document if you don't know how to do that).


However, there is also a web directory (www in this repo) in the Beauty planet.
That's the next step.

In order to make the demo work, you have to map the www directory of the Beauty planet to your application's web root directory.
 
Therefore, you should end up with a tree similar to the following:
 
 
    - [www]/ (your web root directory, can be named differently of course)
    ----- libs/ 
    --------- beauty/ 
    ------------- demo/ 
    ----------------- demo.php
    ------------- js/ 
    ----------------- beauty.js
    ------------- server/ 
    ----------------- fetch-template.php
    ------------- tests/ 
    ----------------- ...various fake test files
    ------------- tpl/ 
    ----------------- default/
    --------------------- skeleton.html
    --------------------- style.css


The libs directory is a recommendation from the [Wass0](https://github.com/lingtalfi/ConventionGuy/blob/master/convention/wass0/convention.wass0.eng.md) convention.<br>
The demo.php file contains a fully working example of the beauty gui in action.<br>
The beauty.js script is where the Gui is coded. It requires [jquery](https://jquery.com/).<br>
The fetch-template.php file is used by the demo to fetch the template of the gui.<br>
The tpl/ directory contains the templates available for the beauty gui.<br>
There is currently only one template called default (the default/ directory).<br>
This means that you can customize the look'n'feel of the beauty gui rather simply.<br>



So to use the beauty gui, open the /libs/beauty/demo/demo.php file in your browser, using a webserver (I'm not sure if it works with the file:// protocol'). 
Then use the gui to launch the tests that you want.


The demo.php file explained
--------------------------------

Here are a few things that I want to say if I open the demo.php file and read it from top to bottom:

The [bigbang autoloader](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md) is used at the top.


The demo.php is divided in two big parts:
    - collect tests
    - displaying the html page
    
Be aware that the demo is just a demo, and there is more than one way to make the beauty gui stand up on its feet.
So Feel free to explore.
    
Collecting the tests is about organizing your tests in groups.
There are not particular rules for that, but in this implementation a directory represents a group, basically,
and the files represents the test pages that the beauty gui can execute.
The goal of this section is to create the testPageUrls array, which basically looks like this:
    
    - myApp/
    ----- php/    
    --------- test.cart.bst.php    
    --------- addingNewUser.bst.php    
    ----- js/    
    --------- ajax.rotateAdvertising.bst.html    
        
In the above example, we have 3 tests (test cart, adding new user and ajax rotate advertising),
and the directory names are just here to organize our tests.
There is no rule at all, do what you want, change the file extension, change the directory names etc...
    
But you must end up with a php array that maps your structure.
The demo.php script uses the AuthorTestFinder helper for that purpose.

### AuthorTestFinder

There are four methods to configure this helper:

- addDirContainer: add a directory container (see below for more explanations)
- addDir: add a directory 
- setExtensions: set the file extensions to search for
- setFileToUrl: define how do you convert a file (from the filesystem) to an url (test page url)
 
The nuance between addDirContainer and addDir is that with addDir you directly specify the directory that you want
to search inside of, one by one, whereas the addDirContainer method is a shorthand method which adds 
all the direct children of a given directory at once.


By default, if you don't use the setExtensions method, all the files found will be considered as tests.
You can be more selective by using the setExtensions method.


The setFileToUrl method is used to indicate to the beauty gui the urls by which it should access the test pages.
That is, the beauty gui doesn't care how your files are organized, it just want to know which urls are available.
Each url being a test page where you actually code your tests using whatever method you want (you can use 
[PhpBeast](https://github.com/lingtalfi/PhpBeast/blob/master/brainstorm/brainstorm.phpBeast.eng.md) for instance for php tests). 

    


If you have tons of test, you will appreciate the fact that you can define which tests should be opened when you refresh the web page.
This is done using the beauty gui api, the openGroups method.
There is an example of this use in the demo.php file, the $openGroups variable in php is an array defining which groups 
should be opened when the web page is refreshed.




### Displaying the html page

This part is quite straight forward, you could leave it as is.

Note that the beauty gui relies on jquery.
Version [2.1.4](http://code.jquery.com/jquery-2.1.4.min.js) was used for the development of this planet.


I don't recommend to change the path to the beauty.js script, because it uses its relative position
to fetch the templates that it needs to display properly.
But as always, if you know what you are doing, then it's fine...




Random notes about some of the tests
---------------------

2015-10-28


In the tests directory (www/libs/beauty/tests) of this planet, you might find good examples 
of how to write your tests.

There is an example of testing a bash program, one testing a javascript program,
and the other test php code.

As far as I know, only javascript has the capability to update an already rendered html page.
Therefore it makes sense to use the retry later string only if the generated html page uses javascript.


By default, when a task take some time to execute (see www/libs/beauty/tests/myApp/kazam/sleep.bst.php),
the browser hangs up until the task is done, and then only the beauty gui starts interpreting the rendered html page.










    
    

History Log
------------------
    
- 1.0.1 -- 2015-10-28

    - bug fix: iframe parse rather than refresh for retry later  
    
- 1.0.0 -- 2015-10-27

    - initial commit