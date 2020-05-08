DocTools
===========
2019-02-19 -> 2020-04-17



A tool to help creating consistent documentation.

DocTools was created in order to speed up the process of creating a documentation of (php) oop code.


The current documentation uses DocTools.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/DocTools
```

Or just download it and place it where you want otherwise.




QuickNav
===========


- [DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md) (generated with DocTools)
- [What is DocTools](#what-is-doctools)
- [How to use?](#how-to-use)
- [Why documentation is important](#why-documentation-is-important)
- [How does DocTools work, overview](#how-does-doctools-work-overview)
- [The documentation organization scheme](#the-documentation-organization-scheme)
    - [Lizard scheme](#lizard-scheme)
- [The docTool notation](#the-doctool-notation)
- [Tutorials](#tutorials)
- [Dictionary](#dictionary)
    - [Template](#template)
    - [Inserts](#inserts)
    - [GeneratedItems2Url](#generateditems2url)
- [History Log](#history-log)






What is DocTools
===================

DocTools is an ensemble of classes which help creating a consistent documentation.

DocTools provides 4 main components:

- a **parser**, which scans a code base and returns information out of it (like the class names, the method names, the properties, the comments, the doc comment tags, ...)
- a **report page**: an html page which tells you what's missing in your doc (for instance class XX doesn't have a comment, or this property of this class doesn't declare the "@var" tag, ...)
- a **docTool syntax**: which extends the markdown syntax so that we can create documentation more intuitively
- a **documentation generator**: aka [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md) which creates the documentation pages for you, based on a templates/widgets system that you create for your needs 



Here is a screenshot of the report page:

![docTools report page](http://lingtalfi.com/img/universe/DocTools/doctools-report.png)


And another one with the todo detection (since 1.6.0):

![docTools report page with todo](http://lingtalfi.com/img/universe/DocTools/doctools-report-with-todo.png)



How to use?
==============

If you just want to generate a php style documentation for git (markdown) like the [DocTools api here](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md),
then your fastest option is probably to just re-use the [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md) [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md) that I made.

Copy paste the code below, and adapt the options to your project.


```php
<?php 

use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;
use Ling\DocTools\Translator\ParseDownTranslator;


/**
* Invoke the universe, path to the bigbang.php might vary depending on your installation
 */
require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


//--------------------------------------------
// DOC TOOLS: CREATE A DOCUMENTATION FOR A PHP PLANET FOR GIT (MARKDOWN)
//--------------------------------------------

/**
*  Be sure to have write permissions for all your files, because 
 * generating a doc will write a lot of files.
 * 
 * In my local machine, I like to grant write access to every files to the
 * web server (because I write A LOT of files programmatically).
 *
 * This is a huge time saver, I believe.
 * 
 * To do so, change your www-data user in your apache conf:
 * 
 * find the lines where it defines the User and Group, and replace them
 * with your own instead:
 * 
 * User my_user
 * Group my_user_group
 * 
 * Restart apache, and you're done: no permissions error anymore
 * on your local machine for ever :)
 */

$gitRepoUrl = "https://github.com/lingtalfi/DocTools";
$git = $gitRepoUrl . "/blob/master";
$doc = "$git/doc";
$api = $doc . "/api";


$planetDir = "/komin/jin_site_demo/universe/Ling/DocTools";


$builder = new LingGitPhpPlanetDocBuilder();
$builder->prepare([
    "gitRepoUrl" => $gitRepoUrl, 
    /**
     * Path to the planet dir that we want to generate the documentation for.
     */
    "planetDir" => $planetDir,
    /**
     * Whether to show the "methods without return" items in the report.
     * I disable them because a lot of methods don't need return (like __construct, setters, ...),
     * and it disturbs me to have a warning for that.
     */
    "reportShowMethodsWithoutReturn" => false,
    /**
     * An array of classes to ignore.
     * You would put any classes used by your planet, but external to your planet.
     * That's because they will be scanned by the Parser and generate errors in the [report](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md).
     * By referencing theme here, they would be scanned, but not generate errors in the report.
     *
     */
    "reportIgnore" => [
        "Ling\DocTools\Translator\ParseDownTranslator",
    ],
    /**
     * Your project start date.
     * I like to write down when I start a project, along with when the project was last updated.
     * The date when the project was last updated can be generated automatically, but the project
     * start date doesn't change.
     */
    "projectStartDate" => "2019-02-21",

    /**
     * [CopyModule](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md).
     * To copy the whole documentation from one place to another, and interpreting [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions)
     * during the transfer.
     * This is usually the last part of the DocTools generation process: it happens after the doc is generated,
     * and copies everything, including your manual documents to the destination directory.
     *
     *
     * I like to write my (manual) docs in a private directory named "personal", where I use the fancy [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) a lot in
     * all my pages (inside the pages directory of the [Lizard scheme](https://github.com/lingtalfi/DocTools/blob/master/README.md#lizard-scheme)).
     *
     * Then I like to copy this structure to the final public destination, which is the doc directory in the git repo
     * (and at the root of my planet on my local machine).
     */
    "copyModuleSrc" => "$planetDir/personal/mydoc",
    "copyModuleDst" => "$planetDir/doc",
    /**
     * I filtered out the doctool-markup-language.md document, because it explains the inline functions,
     * and so interpreting inline functions on this page is a bad idea.
     */
    "copyModuleOptions" => [
        /**
         * If set, will also move the README.md at the root of copyModuleDst (if any) to the given path
         */
        "moveReadMeTo" => $planetDir . "/README.md",
        "filter" => [
            "doctool-markup-language.md",
        ],
    ],
    /**
     * Git production mode
     * -------------
     * The settings below are my final settings when I want to export the doc to github.com.
     * See the "Local test mode" section below to see my settings when I work in local.
     *
     */
    /**
     * The directory where the api will be generated (with this DocBuilder: the planet page, the class pages,
     * and the method pages).
     */
    "generatedClassBaseDir" => "$planetDir/doc/api",
    /**
     * The base directory for the [inserts](https://github.com/lingtalfi/DocTools/blob/master/README.md#inserts).
     */
    "insertsBaseDir" => "$planetDir/doc/inserts",
    /**
     * The base url for the generated documentation api (this maps to the generatedClassBaseDir defined above).
     */
    "generatedClassBaseUrl" => $api,
    /**
     * The extension of the files to generate.
     * If you use html, be sure to define a markdownTranslator (see how in the "Local test mode" section below).
     */
    "mode" => "md", // md|html

    /**
     * Local test mode
     * -------------------
     * When I'm on my local machine, I like to preview the doc before it's uploaded to github.com,
     * so that I can fix everything before sending it to github.
     *
     * Therefore, I change my settings a bit, generating an html documentation that I can browse in a browser (rather
     * than md files).
     * I also create a dedicated virtual host (in this case serverName=jindoc) in my apache configuration,
     * so that I can browse the generated doc from there.
     *
     * Uncomment the lines below to see my settings for local test mode.
     */

    //    "generatedClassBaseDir" => JIN_APP_DIR . "/www-doc/api",
//    "insertsBaseDir" => JIN_APP_DIR . "/www-doc/inserts",
//    "generatedClassBaseUrl" => "http://jindoc/api",
//    "mode" => "html", // md|html
//    "markdownTranslator" => new ParseDownTranslator(), 

    /**
     * This map is used internally by the [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions).
     * This map in particular is the one used for the whole DocTools planet documentation (pages and api).
     */
    "keyWord2UrlMap" => [
        "git" => $git,
        //--------------------------------------------
        // PAGES
        //--------------------------------------------
        "inserts" => $git . '/README.md#inserts',
        "Lizard scheme" => $git . '/README.md#lizard-scheme',
        "generatedItems2Url" => $git . '/README.md#generateditems2url',
        "doctool_language" => $doc . '/pages/doctool-markup-language.md',
        "docTool markup language" => $doc . '/pages/doctool-markup-language.md',
        "docTool markup language page" => $doc . '/pages/doctool-markup-language.md',
        "the docTool markup language" => $doc . '/pages/doctool-markup-language.md',
        "inline tags" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "inline functions" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "keyword inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "class inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "inline function" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "the inline functions page" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "docTool inline functions" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "inline-level tags" => $doc . '/pages/doctool-markup-language.md#inline-functions',
        "block-level tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
        "block-level tags" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
        "\"@implementation\" tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
        "\"@overrides\" tag" => $doc . '/pages/doctool-markup-language.md#block-level-tags',
        "the generated documentation styles page" => $doc . '/pages/generated-documentation-styles.md',
        "generated documentation styles" => $doc . '/pages/generated-documentation-styles.md',
        "LingGitPhpPlanetDocBuilder tutorial" => $doc . '/pages/tutorial-linggitphpplanetdocbuilder.md',
        //--------------------------------------------
        // API
        //--------------------------------------------
        "api" => $api . '/DocTools.md',
        "ClassInfo" => $api . '/DocTools/Info/ClassInfo.md',
        "CommentInfo" => $api . '/DocTools/Info/CommentInfo.md',
        "main text" => $api . '/DocTools/Info/CommentInfo.md#the-doc-comment-structure',
        "comment main text" => $api . '/DocTools/Info/CommentInfo.md#the-doc-comment-structure',
        "commentInfo" => $api . '/DocTools/Info/CommentInfo.md',
        "PropertyInfo" => $api . '/DocTools/Info/PropertyInfo.md',
        "MethodInfo" => $api . '/DocTools/Info/MethodInfo.md',
        "PlanetInfo" => $api . '/DocTools/Info/PlanetInfo.md',
        "LingGitPhpPlanetDocBuilder" => $api . '/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md',
        "copy module" => $api . '/DocTools/CopyModule/CopyModuleInterface.md',
        "CopyModule" => $api . '/DocTools/CopyModule/CopyModuleInterface.md',
        "DocBuilder" => $api . '/DocTools/DocBuilder/DocBuilder.md',
        "ClassParserInterface" => $api . '/DocTools/ClassParser/ClassParserInterface.md',
        "ClassParser" => $api . '/DocTools/ClassParser/ClassParser.md',
        "PlanetParser" => $api . '/DocTools/PlanetParser/PlanetParser.md',
        "DocToolInterpreter" => $api . '/DocTools/Interpreter/DocToolInterpreter.md',
        "PlanetTocListWidget" => $api . '/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md',
        "ParseDownTranslator class page" => $api . '/DocTools/Translator/ParseDownTranslator.md',
        "report" => $api . '/DocTools/Report/ReportInterface.md',
        "ReportInterface" => $api . '/DocTools/Report/ReportInterface.md',
        "parser" => $api . '/DocTools/GenericParser/GenericParserInterface.md',
        "planet parser" => $api . '/DocTools/PlanetParser/PlanetParser.md',
        "class parser" => $api . '/DocTools/ClassParser/ClassParser.md',  
        "GeneratedDocStyleInterface" => $api . '/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md',
        "PageUtil" => $api . '/DocTools/Page/PageUtil.md',      
    ],
    /**
     * An array of external classes to url.
     * This will be used by some widgets to create links to that class when appropriate.
     * For instance, on the [ParseDownTranslator class page](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Translator/ParseDownTranslator.md), the class synopsis shows that the
     * ParseDownTranslator class extends the external Parsedown class.
     *
     * And so because the Parsedown class is referenced in the array below, it can be converted to a link
     * in the class synopsis.
     */
    "externalClass2Url" => [
        "ParseDown\Parsedown" => "https://github.com/erusev/parsedown/blob/master/Parsedown.php",
    ],
]);
/**
 * This will create the generated documentation (aka api in the [Lizard scheme](https://github.com/lingtalfi/DocTools/blob/master/README.md#lizard-scheme)),
 * and since we've defined a [copy module](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModuleInterface.md), it will also copy the whole doc to another location.
 */
$builder->buildDoc();

/**
 * This displays the [report](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md).
 */
$builder->showReport();
```


However, DocTools is very flexible and let you create any type of documentation that you like.

If you want to create your documentation, you'll have to understand the inners of 
every (or most of the) DocTools objects. 

A good place to start is this documentation: 

- Reading this page, and reading [classes comments](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md) can give you some insights of how DocTools is wired
- Also, you can investigate the [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md) object promoted by the above example code. 
    This will give you an idea of how a [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/DocBuilder.md) could be implemented, so that you can implement your own.
- Check out the [tutorials section](#tutorials), which might also help you getting started. 











Why documentation is important?
====================

I believe that once you've created a tool, you're only 50% there.
The other 50% is the documentation.

Documentation is important because it:

- prevents your future-self from forgetting how a tool work 
- it helps sharing your tool with others


Now to write a good documentation you don't need DocTools (you need intelligence, silly), 
however DocTools is like a wizard that will tell you what you've missed, and can generate the documentation pages for you.




How does DocTools work, overview
=================================


- phase 1: document your code
- phase 2: create the pages



The basic idea with DocTools is that it extracts the doc comments from your code and creates the documentation pages out of it
(so that you only need to write the documentation once).

And so one of the first step is to document your code: every class, every method, every property.

We can use the [docTool notation](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) for that.

DocTools provides a report page that helps you spotting what's missing in your documentation (i.e. which class, method or property you 
forgot to comment basically).


When your code is 100% commented, then you can start phase 2, which is creating the pages.

You first need to think about what kind of documentation you're trying to achieve: is it a class documentation? a package documentation?, or something else? 

Once you've got your model in mind, you need to implement it as a template.

The template can use the DocTools info objects (in the Info directory of this repository) to access any data from your doc comments easily. 

Then, you need to implement a DocBuilder object (DocTools\DocBuilder\DocBuilder), or at least that's the recommended way, which will create the actual pages of the documentation for you,
based on your template(s). 



To dive into the code, go to the [tutorials section](#tutorials).





The documentation organization scheme
======================

How will your documentation look in the filesystem once finished?

If you don't have any idea, you can use the following scheme, which I will call "lizard scheme". 


Lizard scheme
---------------


```txt
- $docRootDir/
----- api/                  
----- inserts/                  
----- pages/                  
```


With:
- docRootDir: the root directory containing all the documentation files, including auto-generated files and manually created files.
- api: this directory contains all of the auto-generated files (or a copy of them if you prefer to generate files in an other directory and paste them manually here). 
- inserts: this directory contains all of the [inserts](#inserts)
- pages: this directory contains all of your manually created pages



Planning the documentation structure allows us to:

- write internal links on the fly (i.e. we don't need to bake the documentation before we can resolve links) 



The docTool notation
=====================

The docTool notation is a notation built on top of the markdown notation.

It gives us some inline functions that help creating a documentation more intuitively.

See the [docTool notation page](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) for more details.



Tutorials
=============
  
- [How to create a php style documentation ready for git: Walk through the LingGitPhpPlanetDocBuilder class](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/tutorial-linggitphpplanetdocbuilder.md)   
  
  

Dictionary 
============



Template
----------

A template is a skeleton of a documentation page.


For instance, if we want to document a package which contains 10 classes,
rather than creating 10 documentation pages,
we can create 1 template and reuse it to generate the 10 pages (and thus saving a lot of time).

Of course, the content of each class is different, but the base structure remains the same.
 
In a template, we can write variables to express what's different from a class to another.

So our template could look like this for instance:

```php

The <?php echo $z['classShortName']; ?> class
================
<?php echo $z['projectStartDate']; ?> --> <?php echo $z['date'] . PHP_EOL; ?>



Introduction
============

<?php echo $z['classComment']; ?>


Class synopsis
==============


<?php echo $z['classSynopsisWidget']; ?>




<?php if ($z['classHasProperties']): ?>
Properties
=============

<?php echo $z['classPropertiesWidget']; ?>
<?php endif; ?>


Methods
==============

<?php echo $z['classMethodsWidget']; ?>


```



The **$z** variable is how we access the variable information in our template.

The information is available to use after we've parsed the code, using a [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)
or a [PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md).


The [PageUtil](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Page/PageUtil.md) object is responsible for rendering templates.


The [LingGitPhpPlanetDocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/DocBuilder/Git/PhpPlanet/LingGitPhpPlanetDocBuilder.md) object builds a documentation based on templates.


Another way to inject content in a template is to use [inserts](#inserts).



Inserts
----------
 
An insert is a file which is injected dynamically by your [template](#template).


In your template, you can call the **inserts** like this:

```php
<?php if($zz->hasInsert('examples')): ?>
Examples
-----------

<?php foreach($zz->getInserts('examples') as $content): ?>
<?php echo $content; ?>
<?php endforeach; ?>
<?php endif; ?>
```


The **$zz** variable is a special variable representing a [wizard object](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/TemplateWizard/TemplateWizard.md) that has two methods:

- hasInsert
- getInserts


See the [TemplateWizard](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/TemplateWizard/TemplateWizard.md) class for more details about how inserts work.


Now imagine that your package has three classes A, B and C, organized as follow:


- /my/package/Info/A.php
- /my/package/Math/Sinus/B.php
- /my/package/Terminal/Colors/C.php


In the template code above, we're calling inserts with name "examples".

And so, what the PageUtil object will do in the background is check whether those **examples** dir exist here:

- /insert_root/Info/A/examples  
- /insert_root/Math/Sinus/B/examples  
- /insert_root/Terminal/Colors/C/examples


The **insert_root** directory is defined by you in the configuration.

When an **examples** directory is found, all files found in it will be parsed and their content will be injected in the template. 

So for instance if we want to provide examples for class B, we can just add our files here:

- /insert_root/Math/Sinus/B/examples/example1-classic-sinus.php  
- /insert_root/Math/Sinus/B/examples/example2-complex-sinus.php  
- /insert_root/Math/Sinus/B/examples/example3-another-sinus-with-cosinus.php
- ... 
  

So, basically, an insert file let you inject content dynamically in your template.







GeneratedItems2Url
-----------------

**generatedItems2Url** is the name of the most important array in DocTools.

It's an array which contains all classes and methods used by your documentation, and their respective urls.

It's used to convert a class name and/or method name to a link to the appropriate documentation page.


So technically speaking, it contains a map of item => url.

An item can be either a class name or a long method name.
A long method name has the following notation:

- ```<class name> <::> <method name>```


The **generatedItems2Url** array contains mostly the map of items generated with the parsers ([PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md) and or [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)),
but by extension it also contains all items which need to be converted to url at some point (including external classes used by your 
product, and php built-in classes used by your product). 



The **generatedItems2Url** array is used by any objects which need to resolve a class name or a method name to an url.

This includes:

- the [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md) 
- some widgets, like the [PlanetTocListWidget](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Widget/PlanetTocList/PlanetTocListWidget.md) widget for instance 















History Log
=============

    
- 1.13.7 -- 2020-04-17

    - fix CommentHelper class not handling resource parameter type
    
- 1.13.6 -- 2020-03-02

    - fix ClassParser->parse, conflict with default value for variadic parameters
    
- 1.13.5 -- 2020-02-25

    - fix ClassParser->parse, inline tags not resolved for method parameter's descriptive text
    
- 1.13.4 -- 2019-12-16

    - fix MethodHelper->getMethodReturnType not handling the Object[] notation very well
    
- 1.13.3 -- 2019-12-13

    - fix HtmlReport not showing red bar when undefined keywords are found 
    
- 1.13.2 -- 2019-12-13

    - update HtmlReport, now displays a green/red bar to indicate whether the generated documentation is clean 
    
- 1.13.1 -- 2019-11-08

    - fix CommentHelper::$propertyReturnTagTypes not having "self"
    
- 1.13.0 -- 2019-10-25

    - add getters to ReportInterface
    
- 1.12.3 -- 2019-10-22

    - fix CommentHelper::$propertyReturnTagTypes not having "static"
    
- 1.12.1 -- 2019-10-17

    - fix MethodHelper::getMethodSignature adding question mark in front of non optional parameters
    
- 1.12.0 -- 2019-10-08

    - add LingGitPhpPlanetDocBuilder ignoreFilesStartingWith option
    
- 1.11.0 -- 2019-10-01

    - add basic support for trait
    
- 1.10.2 -- 2019-09-05

    - fix CommentHelper::$propertyVarTagTypes not having bool[]
    
- 1.10.2 -- 2019-08-09

    - fix CommentHelper::$propertyVarTagTypes not having callable[]

- 1.10.1 -- 2019-08-07

    - fix ClassParser->expandIncludes not collecting ancestor interfaces properly
    
- 1.10.0 -- 2019-07-23

    - update PhpClassHelper::getClasses2Urls now recognizes php pdoStatement class
    
- 1.9.0 -- 2019-07-22

    - update PhpClassHelper::getClasses2Urls now recognizes php pdo and pdoException classes
        
- 1.8.2 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
        
- 1.8.1 -- 2019-07-18

    - fix LingGitPhpPlanetDocBuilder wrong formatting for class source code link 
    
- 1.8.0 -- 2019-07-18

    - update LingGitPhpPlanetDocBuilder now supports source code links for class and method 
    
- 1.7.0 -- 2019-07-13

    - CommentHelper::$propertyVarTagTypes now has "false" type
    
- 1.6.3 -- 2019-07-11

    - enhance error message of DocToolInterpreter::interpretBlockLevelTags method for unresolved method
    
- 1.6.2 -- 2019-04-18

    - fix ClassParser stripping indentation in doc comments
    
- 1.6.1 -- 2019-04-04

    - fix ClassParser erroneous return type with @implementation/@overrides tags
    - fix AbstractReport::addUnresolvedMethodReference not taking into account reportIgnore correctly 
    
- 1.6.0 -- 2019-03-20

    - update: reports now parses "todo:" expressions in doc comments
    - add spl exceptions detection in PhpClassHelper

- 1.5.2 -- 2019-03-14

    - update ClassParser: now better handling for unresolved throws tags

- 1.5.1 -- 2019-03-13

    - CopyModule: add moveReadMeTo option
    - CommentHelper: add object as a return property

- 1.5.0 -- 2019-03-07

    - Update DocTools to work with new bsr-1 system

- 1.5.0 -- 2019-03-07

    - Update DocTools to work with new bsr-1 system
    - Add support for "@throws" tag

- 1.4.0 -- 2019-02-27

    - add MethodPrevNextWidget and ClassPrevNextWidgets
    
- 1.3.0 -- 2019-02-26

    - fix PlanetDependenciesSectionWidget->render method accordingly with update of \UniverseTools\DependencyTool::getDependencyHomeUrl method
    
- 1.2.0 -- 2019-02-26

    - Add navigation links at the top of the methods and class templates in LingGitPhpPlanetDocBuilder
    
- 1.1.0 -- 2019-02-26

    - Update DocTools\Report\ReportInterface::addUndefinedInlineKeyword, now has a $functionName argument
    
- 1.0.1 -- 2019-02-25

    - Add the @object inline function to the docTool markup language
    
- 1.0.0 -- 2019-02-19

    - initial commit