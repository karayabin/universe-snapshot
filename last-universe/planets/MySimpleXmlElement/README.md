MySimpleXmlElement
=====================
2015-10-24




What is it?
---------------

Yet another implementation of php's [SimpleXmlElement](http://php.net/manual/en/class.simplexmlelement.php) class.



Why ?
----------

I didn't like the api for two main reasons:

- struggling with CDATA
- handling errors


MySimpleXmlElement is much more simpler (and probably way less powerful too) and fits my needs.
We can simply flag a content as CDATA and it "works" as expected.

For errors handling, basically, there is no error, so there is no special handling.



How does it work?
--------------

The big picture: there are two objects: 
 
 
- the MySimpleXmlElement, which has 5 properties
    - name  
    - value (null for self closing elements)  
    - elements (recursion)  
    - attributes  
    - useCDATA (the flag that I missed with \SimpleXmlElement)  

- the MySimpleXmlBuilder, which renders a root MySimpleXmlElement. It handles the xml declaration for you.




Example
------------

In this example, I'm emulating an imaginary rss feed manually with the MySimpleXmlElement class.


```php
<?php

use MySimpleXmlElement\MySimpleXmlBuilder;
use MySimpleXmlElement\MySimpleXmlElement;



require_once "bigbang.php";


echo MySimpleXmlBuilder::create()->render(
    MySimpleXmlElement::create('rss')
        ->setAttributes(['version' => '2.0'])
        ->addElement(
            MySimpleXmlElement::create('channel')
                ->createChildReturn('title', 'Liftoff News', true) // true here means use CDATA
                ->createChildReturn('link', 'http://liftoff.msfc.nasa.gov/') 
                ->createChildReturn('description', 'Liftoff to Space Exploration.', true)
                ->createChildReturn('language', 'en-us')
                ->addElement(
                    MySimpleXmlElement::create('item')
                        ->createChildReturn('title', 'Star City', true)
                        ->createChildReturn('link', 'http://liftoff.msfc.nasa.gov/news/2003/news-starcity.asp')
                        ->createChildReturn('description', 'How do Americans get ready to work with Russians aboard the International Space Station? They take a crash course in culture, language and protocol at Russia\'s <a href="http://howe.iki.rssi.ru/GCTC/gctc_e.htm">Star City</a>.', true)
                        ->createChildReturn('guid', 'http://liftoff.msfc.nasa.gov/2003/06/03.html#item573')
                        ->createChildReturn('pubDate', 'Tue, 03 Jun 2003 09:39:21 GMT')
                )
                ->addElement(
                    MySimpleXmlElement::create('item')
                        ->createChildReturn('description', 'Sky watchers in Europe, Asia, and parts of Alaska and Canada will experience a <a href="http://science.nasa.gov/headlines/y2003/30may_solareclipse.htm">partial eclipse of the Sun</a> on Saturday, May 31st.', true)
                        ->createChildReturn('guid', 'http://liftoff.msfc.nasa.gov/2003/05/30.html#item572')
                        ->createChildReturn('pubDate', 'Fri, 30 May 2003 11:06:42 GMT')
                )
                
        )
);

```

Find more explanations on the [bigbang autoloader here](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).



### Geek Notes

#### addElement, createChild and createChildReturn 

addElement and createChild do basically the same thing, but createChild does actually a lot more.
Not only createChild adds an element to its parent, but it also can set the element name, value and CDATA flag 
in one line.

createChild and createChildReturn are two variations of the same method.
createChild returns the child, while createChildReturn returns the parent.

Having those 3 methods at our fingertips gives us some appreciable flexibility when writing code.


#### self closing element (empty element) vs start tag -- end tag

To create a self closing element, make its value the empty string.





History Log
------------------
    
    
    
- v1.1.0 -- 2015-10-25

    - An empty string value represents an empty element (self closing tag) 
    - Fix self closing tag bug
    
    
- v1.0.0 -- 2015-10-24

    - initial commit


    



