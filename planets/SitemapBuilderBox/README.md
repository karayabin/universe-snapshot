Sitemap Builder Box
=========================
2015-10-09




Utilities to create basic sitemaps.


Features
--------------

- Creation of xml sitemaps 
- Creation of text sitemaps 
- Creation of sitemap index 
- Integration of Google Video extension 
- Utility to submit the sitemap to search engines 
- Can gzencode 





How to use
---------------

The general approach with Sitemap Builder Box is to create the sitemap (or sitemap index) object first,
then use a builder tool to convert the sitemap to an actual sitemap file.



### SitemapBuilder, the handy user interface



#### The basic xml sitemap

Probably, the easiest way to create a sitemap is to use the SitemapBuilder class.

The following code creates a sitemap with 3 urls, then uses the SitemapBuilder to create the actual sitemap file in xml format.


```php

use SitemapBuilderBox\Objects\Sitemap;
use SitemapBuilderBox\Objects\Url;
use SitemapBuilderBox\SitemapBuilder;

require_once "bigbang.php";

$xmlFile = 'sitemap.xml';


$sitemap = Sitemap::create()
    ->addUrl(Url::create()->setLoc('http://www.example.com/'))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii')->setChangefreq('monthly')->setLastmod(date('c')))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''));


SitemapBuilder::create()->createSitemapFile($sitemap, $xmlFile, 'xml');
```

Note: to learn more about the bigbang one liner, please visit the 
[portable autoloader page](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).


#### The basic xml sitemap with gz compression

To use gz compression, simply add the .gz extension to your sitemap file name.<br>
By default, the SitemapBuilder will recognize the .gz extension and apply gz compression to your sitemap.


```php
$xmlFile = 'sitemap.xml.gz'; // that's all it takes to generate the gz version of your sitemap


$sitemap = Sitemap::create()
    ->addUrl(Url::create()->setLoc('http://www.example.com/'))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii')->setChangefreq('monthly')->setLastmod(date('c')))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''));


SitemapBuilder::create()->createSitemapFile($sitemap, $xmlFile, 'xml');
```


#### The text sitemap 


If you want to generate a text sitemap, use the third argument (called the format argument) of the createSitemapFile method.<br>
It can take two values: xml (by default) or text.


```php
$xmlFile = 'sitemap.txt';


$sitemap = Sitemap::create()
    ->addUrl(Url::create()->setLoc('http://www.example.com/'))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii')->setChangefreq('monthly')->setLastmod(date('c')))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''));


SitemapBuilder::create()->createSitemapFile($sitemap, $xmlFile, 'txt');

```
gz compression technique as described in the previous section can also be applied to txt format sitemaps.



#### Various sitemaps, just for fun

In the following example, the SitemapBuilder creates various sitemaps in a row, all based on the same sitemap object.


```php
$textFile = 'sitemap.txt';
$textGzFile = 'sitemap.txt.gz';
$xmlFile = 'sitemap.xml';
$xmlGzFile = 'sitemap.xml.gz';
$xmlGzFileCustomExt = 'sitemap.xml.mygz';


$sitemap = Sitemap::create()
    ->addUrl(Url::create()->setLoc('http://www.example.com/'))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii')->setChangefreq('monthly')->setLastmod(date('c')))
    ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''));


SitemapBuilder::create()
    // compression=auto modes, gz extension will trigger gz compression automatically
    ->createSitemapFile($sitemap, $textFile, 'text')
    ->createSitemapFile($sitemap, $textGzFile, 'text')
    ->createSitemapFile($sitemap, $xmlGzFile, 'xml')
    ->createSitemapFile($sitemap, $xmlFile, 'xml')
    // compression=gz, forces gz compression no matter which file extension
    ->createSitemapFile($sitemap, $xmlGzFileCustomExt, 'xml', 'gz');
```





### Create a sitemap index 

SitemapBuilder is good for creating quick sitemaps.
But if you want to create a sitemap index, or if you want to extend the sitemap protocol,
you need to use the XmlSitemapBuilder (which is used by SitemapBuilder under the hood).

The following example creates a sitemap index

```php
$indexFile = 'sitemap-index.xml';
$o = new XmlSitemapBuilder();
$o->createSitemapIndexFile(
    SitemapIndex::create()
        ->addSitemap(SitemapIndexSitemap::create()->setLoc('http://www.example.com/sitemap1.xml.gz')->setLastmod('2004-10-01T18:23:17+00:00'))
        ->addSitemap(SitemapIndexSitemap::create()->setLoc('http://www.example.com/sitemap2.xml.gz')->setLastmod('2005-01-01'))
    , $indexFile);
```


The following example adds two custom headers to the xml sitemap file


```php
$xmlFile = 'sitemap.custom.xml';
$o = new XmlSitemapBuilder();
$o
    // add custom headers to the xml file, if you want
    ->setUrlSetAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance')
    ->setUrlSetAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd')
    // creating the sitemap
    ->createSitemapFile(
        Sitemap::create()
            ->addUrl(Url::create()->setLoc('http://www.example.com/'))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii'))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''))
        , $xmlFile);

```


### Using Google video extension

The following example uses Google video extension.
All possible properties are shown, for the sake of the demonstration.


```php
$xmlFile = 'sitemap-with-video.xml';
$o = new XmlSitemapBuilder();
$o
    ->registerPlugin(new GoogleVideoXmlSitemapBuilderPlugin())
    ->createSitemapFile(
        Sitemap::create()
            // https://developers.google.com/webmasters/videosearch/sitemaps
            ->addUrl(Url::create()
                ->setLoc("http://www.example.com/videos/some_video_landing_page.html")->setVideo(Video::create()
                        ->setThumbnailLoc("http://www.example.com/thumbs/123.jpg")
                        ->setTitle("Grilling steaks for summer")
                        ->setDescription("Alkis shows you how to get perfectly done steaks every time")
                        ->setContentLoc("http://www.example.com/video123.flv")
                        ->setPlayerLoc("http://www.example.com/videoplayer.swf?video=123", ['allow_embed' => 'yes', 'autoplay' => 'ap=1'])
                        ->setDuration(600)
                        ->setExpirationDate('2009-11-05T19:20:30+08:00')
                        ->setRating("4.2")
                        ->setViewCount(12345)
                        ->setPublicationDate("2007-11-05T19:20:30+08:00")
                        ->setFamilyFriendly("yes")
                        ->setRestriction("IE GB US CA", ['relationship' => 'allow'])
                        ->setGalleryLoc("http://cooking.example.com", ['title' => 'Cooking Videos'])
                        ->setPrice("1.99", ['currency' => 'EUR'])
                        ->setRequiresSubscription("yes")
                        ->setUploader("GrillyMcGrillerson", ['info' => 'http://www.example.com/users/grillymcgrillerson'])
                        ->setLive("no")
                ))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii'))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''))
        , $xmlFile);
```


### Using Google image extension

```php
$xmlFile = 'sitemap-with-image.xml';
$o = new XmlSitemapBuilder();
$o
//    ->registerPlugin(new GoogleVideoXmlSitemapBuilderPlugin()) // uncomment this line if you need image and videos
    ->registerPlugin(new GoogleImageXmlSitemapBuilderPlugin())
    ->createSitemapFile(
        Sitemap::create()
            // https://support.google.com/webmasters/answer/178636?hl=en
            ->addUrl(Url::create()
                    ->setLoc("http://example.com/sample.html")
                    ->addImage(Image::create()->setLoc("http://example.com/image.jpg"))
                    ->addImage(Image::create()->setLoc("http://example.com/photo.jpg"))
                    // the image below uses all image properties
                    ->addImage(Image::create()
                            ->setLoc("http://example.com/puppy.jpg")
                            ->setCaption("Dalmatian puppy playing fetch")
                            ->setGeoLocation("Limerick, Ireland")
                            ->setTitle("Dalmatian puppy playing fetch")
                            ->setLicence("https://opensource.org/licenses/MIT")
                    )
            )
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii'))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''))
        , $xmlFile);
```                



### Using Google mobile extension

```php
$xmlFile = 'sitemap-with-mobile.xml';
$o = new XmlSitemapBuilder();
$o
//    ->registerPlugin(new GoogleVideoXmlSitemapBuilderPlugin()) // uncomment this line if you video extension
//    ->registerPlugin(new GoogleImageXmlSitemapBuilderPlugin()) // uncomment this line if you image extension
    ->registerPlugin(new GoogleMobileXmlSitemapBuilderPlugin())
    ->createSitemapFile(
        Sitemap::create()
            // https://support.google.com/webmasters/answer/6082207?hl=en
            ->addUrl(Url::create()
                    ->setLoc("http://mobile.example.com/article100.html")
                    ->setMobile(Mobile::create())
            )
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?item=12&desc=vacation_hawaii'))
            ->addUrl(Url::create()->setLoc('http://www.example.com/catalog?entities=>&é<"\''))
        , $xmlFile);
```                







### How to ping the search engines to submit your sitemap programmatically?

The SitemapBuilderBox provides an utility called SitemapSubmitUtil.
You can use the SitemapSubmitUtil to submit your sitemaps to search engines.<br>
By default, it will ping google and bing, but you can easily add your own search engines if you want, see the comments in the following example.



```php
$sitemapUrl = "http://example.com/sitemap.xml";

$o = new SitemapSubmitUtil();
// uncomment the line below if you want to add your own search engine urls
//    $o->searchEngineSymbolicUrls[] = 'http://my_custom_search_engine.php?sitemap={url}'; // the {url} will be replaced by the sitemapUrl 
$o->submit($sitemapUrl, function ($code, $msg) {
    if (200 !== $code) {
        // log the error
    }

    // debug
    a($code);
    a($msg);
    echo "<hr>";

});

```

Note: this example was created to be displayed through a browser.<br>
The "a" function comes from the 
[bigbang.php](https://github.com/lingtalfi/TheScientist/blob/master/bigbang/bigbang.php)
script.







Sources
--------------

- http://www.sitemaps.org/protocol.html
- https://developers.google.com/webmasters/videosearch/sitemaps




Recommendation
-------------------

You also might be interested by the [SitemapSlicer class](https://github.com/lingtalfi/SitemapSlicer)




Dependencies
------------------

- [lingtalfi/Bat 1.04](https://github.com/lingtalfi/Bat)


