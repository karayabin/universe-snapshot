The LingGitPhpPlanetDocBuilder tutorial
==============================
2019-02-22



Summary
=========
- [Intro](#intro)
- [The core of a DocBuilder](#the-core-of-a-docbuilder)
- [Building the pages](#building-the-pages)



Intro
=======

In this tutorial we will explore how the LingGitPhpPlanetDocBuilder [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/DocBuilder/DocBuilder.md) was built.


This **DocBuilder** creates a documentation for a planet in the style of the [php.net](http://php.net/) documentation for classes,
and ready to export on github.com.


A planet is just a package in the [universe](https://github.com/karayabin/universe-snapshot).



It creates the following documentation pages:

- one documentation page for the planet itself
- one documentation page for each class of the planet
- one documentation page for each method of each class of the planet




So in this tutorial I will try to teach you the approach to create a doc builder in general,
and I'll use the LingGitPhpPlanetDocBuilder as an example.



The core of a DocBuilder
===========


So, before we create a doc builder, we need to decide what our documentation will look like.

So for instance before I created the LingGitPhpPlanetDocBuilder, 
I decided that I liked the php.net style of documenting their classes.

For instance, look at the [Reflection land page](http://php.net/manual/en/book.reflection.php). 
I want that style for my planet page.

Then look at the [ReflectionClass page](http://php.net/manual/en/class.reflectionclass.php). 
I want that style for my class pages.


Then look at the [ReflectionClass::__construct method page](http://php.net/manual/en/reflectionclass.construct.php). 
I want that style for my method pages.


So now that we know what we want let's implement it.

But how?

What I'm interested in from php.net is not the whole page, but rather some specific widgets (widget=an html visual component). 

So for instance, in the Reflection land page, I see a tocList widget:

![The tocList widget](http://lingtalfi.com/img/universe/DocTools/toclist-widget.png)


Then for the class page, I'll need a "class synopsis widget". 


![The class synopsis widget](http://lingtalfi.com/img/universe/DocTools/class-synopsis-widget.png)


I also need a "class properties widget".


![The class properties widget](http://lingtalfi.com/img/universe/DocTools/class-properties-widget.png)


And I also need a "class methods widget".


![The class methods widget](http://lingtalfi.com/img/universe/DocTools/class-methods-widget.png)



I probably also will need a class constants widget, but since I rarely use constants in my classes, 
I was a bit lazy and didn't implement it yet.

But the idea is still on and at some point in the future it will probably convert into an implementation.


So, the point is: we can describe each of the above pages in terms of widgets.



Ok, but how do you feed the widgets?
For instance, you know that you want a "toc list widget", which lists every class in your planet,
but how to you get the actual list of all planets.

You know that you want a "class synopsis widget" which will display the signature and a list of all properties and methods
of a given class, but how do you get this signature and all the properties and methods of a class?


Well, that's when the concept of [parser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/GenericParser/GenericParserInterface.md) comes in.

A parser will parse a planet or a class, and gives you all the information you need to feed your widgets.

I'll spare you the implementation details of a parser, but there are basically two parsers: 
a [planet parser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser.md) and a [class parser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md).


For the doc builder we are trying to build here, the planet parser will be more appropriate.


So our first line of code for this DocBuilder could be this:


```php
$parser = new PlanetParser();
```

That's a great start, however the PlanetParser instance needs to be configured with other objects first.

I didn't tell you everything about a parser.

A parser not only will give information about an element, but it will also report any documentation related problem
that occurs. 


So we need to give a [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) to our planet parser.

We will choose the [HtmlReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/HtmlReport.md), because it can be displayed as html, and so it would be a graphical help
while building our doc.



So our code so far could look like this:

```php
$report = new HtmlReport();
$parser = new PlanetParser();
$parser->setReport($report);
```


Note: I will not explain the whole code line by line because it would be too long, but I'll try to give you the
main concepts, and hopefully you're skilled/curious enough to understand how it works from that.



One other thing, the DocTools ecosystem uses the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) by default,
so that you can write your documentation more easily. 


The docTool markup language should be transparent, so that when you want to access the content of a comment,
the docTool notation is already resolved.

Because of this design decision, a parser also does interpret the docTool markup language for you in the background.

Note: you can use another markup language if you want, but the docTool markup language is the default.

In order for the parser to interpret the docTool markup language, we use the [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter.md) object.


So our parser will look like this:


```php
$report = new HtmlReport();
$interpreter = new DocToolInterpreter();

$parser = new PlanetParser();
$parser->setNotationInterpreter($interpreter);
$parser->setReport($report);

```

That's better.
However, there is still a problem, because the DocToolInterpreter also needs to be configured.

As we've just said, the doc tool interpreter will resolve the docTool markup language.

But more specifically it means that it will need to resolve [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions). 

There are two types of inline functions:

- the "@class" and "@method" inline functions reference generated classes and methods
- the other functions reference custom words that we create on the fly


And guess what, code is logic, not magic (good one).

And so the resolving "trick" used by the DocToolInterpreter is nothing more than storing an array of key/value pairs,
and when you ask for a key, it gives you the corresponding value if it has it.

In other words, we need to provide all references to the doc tool interpreter before hands.

For the "@class" and "@method" inline functions, rather than manually writing every class reference, we can use
this loop that you will see in the LingGitPhpPlanetDocBuilder class:


  
```php
//--------------------------------------------
// GeneratedItems2Url
//--------------------------------------------
/**
 * Preparing the className2Url and methodName2Url, we prepare them once for all,
 * and then pass them to whatever objects need them.
 */
$classNames = PlanetTool::getClassNames($this->planetDir);
$generatedItems2Url = [];
foreach ($classNames as $className) {
    $generatedItems2Url[$className] = $generatedDocStyle->getClassUrl($planetName, $generatedClassBaseUrl, $className);
    $r = new \ReflectionClass($className);
    foreach ($r->getMethods() as $method) {
        if ($method->getDeclaringClass()->getName() === $className) {
            $methodName = $className . "::" . $method->getName();
            $generatedItems2Url[$methodName] = $generatedDocStyle->getMethodUrl($planetName, $generatedClassBaseUrl, $className, $method->getName());
        }
    }
}
$generatedItems2Url = array_merge($generatedItems2Url, PhpClassHelper::getClasses2Urls(), $externalCustomClass2Url);
```


So, the **$generatedItems2Url** variable is an important concept: it contains the urls for every classes and methods
(potentially) generated by a planet parser. It's so important that I wrote a section on it in the main page: the [generatedItems2Url](https://github.com/lingtalfi/DocTools/blob/master/README.md#generateditems2url) section.


Note: in the above code, the following line:
```php
$classNames = PlanetTool::getClassNames($this->planetDir);
```

get all the class names of the planet.


This line:

```php
$generatedItems2Url[$className] = $generatedDocStyle->getClassUrl($planetName, $generatedClassBaseUrl, $className);
```

makes use of the generatedDocStyle variable, which holds a [GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md).
 
Basically, the getClassUrl method returns a class url based on your organizational preferences.

This is explained in more details in [the generated documentation styles page](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/generated-documentation-styles.md). 


Then the line:

```php
$generatedItems2Url = array_merge($generatedItems2Url, PhpClassHelper::getClasses2Urls(), $externalCustomClass2Url);
```


basically merges the generated items 2 url array with some built-in php classes that your own classes might extend
(like \Exception for instance) or encounters/use in some ways.

It also merges with some classes external to your planets that your code might use (**$externalCustomClass2Url**,
which is provided by you).


So that big loop takes care of the "@class" and "@method" inline functions. 

And for the other inline functions, which are based on keyword replacement, we simply use
a custom map (**keyWord2UrlMap**).




So finally our code looks like this:


```php
//--------------------------------------------
// GeneratedItems2Url
//--------------------------------------------
/**
 * Preparing the className2Url and methodName2Url, we prepare them once for all,
 * and then pass them to whatever objects need them.
 */
$classNames = PlanetTool::getClassNames($this->planetDir);
$generatedItems2Url = [];
foreach ($classNames as $className) {
    $generatedItems2Url[$className] = $generatedDocStyle->getClassUrl($planetName, $generatedClassBaseUrl, $className);
    $r = new \ReflectionClass($className);
    foreach ($r->getMethods() as $method) {
        if ($method->getDeclaringClass()->getName() === $className) {
            $methodName = $className . "::" . $method->getName();
            $generatedItems2Url[$methodName] = $generatedDocStyle->getMethodUrl($planetName, $generatedClassBaseUrl, $className, $method->getName());
        }
    }
}
$generatedItems2Url = array_merge($generatedItems2Url, PhpClassHelper::getClasses2Urls(), $externalCustomClass2Url);




//--------------------------------------------
//
//--------------------------------------------
$report = new HtmlReport();
$interpreter = new DocToolInterpreter();

$interpreter->setGeneratedItemsToUrl($generatedItems2Url);
$interpreter->setKeyword2UrlMap($keyWord2UrlMap);


$parser = new PlanetParser();
$parser->setNotationInterpreter($interpreter);
$parser->setReport($report);


$planetInfo = $parser->parse($this->planetDir);
```


Notice that at the end I called the **parse** method of the parser, which gives us
the planetInfo that we can use to feed our widgets.



So this is the core of the LingGitPhpPlanetDocBuilder object.


Next, we need to build our pages with the widgets.




Building the pages
===================

Building the pages is done inside the **buildDoc** method.

As you can see from the following code, we first generate the pages, then use
the [copy module](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/CopyModule/CopyModuleInterface.md) to copy the documentation and interpret the [inline functions](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions)
globally.


```php
    /**
     * @implementation
     */
    public function buildDoc()
    {

        //--------------------------------------------
        // CREATE GENERATED DOC
        //--------------------------------------------
        $planetInfo = $this->_planetInfo;
        $this->buildPlanetPage();
        foreach ($planetInfo->getClasses() as $classInfo) {
            $this->buildClassPage($classInfo);

            foreach ($classInfo->getOwnMethods() as $methodInfo) {
                $this->buildMethodPage($classInfo, $methodInfo);
            }
        }


        //--------------------------------------------
        // COPY DOC
        //--------------------------------------------
        if (null !== $this->copyModuleSrc) {
            $o = new CopyModule();
            $o->copy($this->copyModuleSrc, $this->copyModuleDst, $this->_interpreter, $this->report, $this->copyModuleOptions);
        }
    }
```



So if we take the example of the **buildPlanetPage** method (and all other buildXXX methods are based on the same scheme),
we see that we use a template system, where we pass our widgets along with other variables to a template.


```php
    /**
     * Builds the planet page.
     *
     * @throws \DocTools\Exception\DocToolsException
     */
    private function buildPlanetPage()
    {

        $planetInfo = $this->_planetInfo;
        $tocList = new PlanetTocListWidget();
        $tocList->setOptions([
            "report" => $this->report,
            "generated_items_2_url" => $this->_generatedItems2Url,
            "display_class_description" => true, // default: true
            "class_description_mode" => "mixed", // default: mixed
            "class_description_format" => "The {short} class", // default: The {short} class
            "display_methods" => true, // default: true
            "methods_filter" => ["public"], // default: public
            "display_method_description" => true, // default: true
            "method_description_mode" => "mixed", // default: mixed
            "method_description_format" => 'The {method} method', // default: The {method} method
        ]);
        $tocList->setPlanetInfo($planetInfo);

        $depSection = new PlanetDependenciesSectionWidget();
        $depSection->setPlanetInfo($planetInfo);

        $planetName = $planetInfo->getName();


        $tplPlanet = __DIR__ . "/templates/tpl-planet.md.php";
        $pageUtil = new PageUtil();
        $pageUtil->setTranslator($this->_markdownTranslator);
        $pageUtil->setRootDir($this->generatedClassBaseDir);
        $pageUtil->setInsertsRootDir($this->insertsBaseDir);
        $planetPage = $this->_generatedDocStyle->getPlanetPageRelativePath($planetName);
        $pageUtil->createPage($planetPage, $tplPlanet, [
            "planetName" => $planetInfo->getName(),
            "tocList" => $tocList,
            "dependenciesSection" => $depSection,
            "projectStartDate" => $this->projectStartDate,
        ]);

    }
```


So, in the above code, we have two widgets:

- $tocList = new PlanetTocListWidget();
- $depSection = new PlanetDependenciesSectionWidget();


Our template is: 

- $tplPlanet = __DIR__ . "/templates/tpl-planet.md.php";



And we use the [PageUtil](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil.md) object to create the page based on that template.


The template contains the following:


```php
<?php echo $z['planetName'] . PHP_EOL; ?>
================
<?php echo $z['projectStartDate']; ?> --> <?php echo $z['date'] . PHP_EOL; ?>



Table of contents
===========

<?php echo $z['tocList']; ?>


<?php echo $z['dependenciesSection']; ?>



```


As you can see, it uses the $z variable to access all variables available to that template.

Note: this is the same strategy used by the [ZeusTemplateEngine](https://github.com/lingtalfi/ZeusTemplateEngine).


Note2: we can directly print the widgets as if they were strings, because the PageUtil renders the widgets
internally for us before they reach the template. 


















 


So, this is the end of this tutorial.

Hopefully that might help you a bit and give you the keys on how to build your own docs.


For more details, please refer to the [api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md).












 















 








 


