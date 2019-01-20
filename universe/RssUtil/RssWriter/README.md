RssWriter
===============
2015-10-23



RssWriter helps writing rss feeds.



Okay.


How does it work?
----------------------

```php
<?php


use RssUtil\RssWriter\Objects\Channel;
use RssUtil\RssWriter\Objects\Item;
use RssUtil\RssWriter\RssFeedWriterUtil;


require_once "bigbang.php";


//header("Content-type: text/xml"); // you don't need that line actually, but I left it here for the pleasure

$o = AuthorRssFeedWriterUtil::create()  // The AuthorRssFeedWriterUtil class automatically CDATAs the title and description on every level (channel, image, item) 
    ->setChannel(Channel::create()
            ->title("Liftoff News")
            ->link('http://liftoff.msfc.nasa.gov/')
            ->description('Liftoff to Space Exploration.')
            ->language('en-us')
            ->pubDate('Tue, 10 Jun 2003 04:00:00 GMT')
            ->lastBuildDate('Tue, 10 Jun 2003 09:41:01 GMT')
            ->docs('http://blogs.law.harvard.edu/tech/rss')
            ->generator('Weblog Editor 2.0')
            ->managingEditor('editor@example.com')
            ->webMaster('webmaster@example.com')
            ->addItem(Item::create()
                ->title('Star City')
                ->link('http://liftoff.msfc.nasa.gov/news/2003/news-starcity.asp')
                ->description('How do Americans get ready to work with Russians aboard the International Space Station? They take a crash course in culture, language and protocol at Russia\'s <a href="http://howe.iki.rssi.ru/GCTC/gctc_e.htm">Star City</a>.')
                ->pubDate('Tue, 03 Jun 2003 09:39:21 GMT')
                ->guid('http://liftoff.msfc.nasa.gov/2003/06/03.html#item573')
            )
            ->addItem(Item::create()
                ->description('Sky watchers in Europe, Asia, and parts of Alaska and Canada will experience a <a href="http://science.nasa.gov/headlines/y2003/30may_solareclipse.htm">partial eclipse of the Sun</a> on Saturday, May 31st.')
                ->pubDate('Fri, 30 May 2003 11:06:42 GMT')
                ->guid('http://liftoff.msfc.nasa.gov/2003/05/30.html#item572')
            )
            ->addItem(Item::create()
                    ->title('The Engine That Does More')
                    ->link('http://liftoff.msfc.nasa.gov/news/2003/news-VASIMR.asp')
                    ->description('Before man travels to Mars, NASA hopes to design new engines that will let us fly through the Solar System more quickly.  The proposed VASIMR engine would do that.')
                    ->pubDate('Tue, 27 May 2003 08:37:32 GMT')
                    ->guid('http://liftoff.msfc.nasa.gov/2003/05/27.html#item571')
            )  
            ->addItem(Item::create()
                    ->title("Astronauts' Dirty Laundry")
                    ->link('http://liftoff.msfc.nasa.gov/news/2003/news-laundry.asp')
                    ->description('Compared to earlier spacecraft, the International Space Station has many luxuries, but laundry facilities are not one of them.  Instead, astronauts have other options.')
                    ->pubDate('Tue, 20 May 2003 08:56:02 GMT')
                    ->guid('http://liftoff.msfc.nasa.gov/2003/05/20.html#item570')
            )        
    );


echo $o->render();
    
```

Learn more about [bigbang autoloader here](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).




Dependencies
------------------

- [lingtalfi/MySimpleXmlElement 1.0.0](https://github.com/lingtalfi/MySimpleXmlElement)

