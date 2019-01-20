<?php


use BeeFramework\Component\Html\Crawler\Collection\Collection;
use BeeFramework\Component\Html\Crawler\Tool\CrawlerDevTool;

require_once 'alveolus/bee/boot/autoload.php';


//az();


//az(
//    SyntaxUtil::create()->phraseToXPath(Phrase::create()->addElementSelector(ElementSelector::create()->addAtomicSelector(AtomicSelector::create()
//            ->addCssClass('myClass')
//    )))
//    // "//*[(@class='myClass' or starts-with(@class, 'myClass ') or contains(@class, ' myClass ') or substring(@class, string-length(@class)-7)=' myClass')]"
//);
// http://stackoverflow.com/questions/31073227/xpath-is-it-possible-to-exclude-the-last-element-inside-a-not-function

//------------------------------------------------------------------------------/
// TEST BASE
//------------------------------------------------------------------------------/
$expressions2XPath = [
    //------------------------------------------------------------------------------/
    // BASIC SELECTORS
    //------------------------------------------------------------------------------/
    '*' => '//*',
    '.myClass' => "//*[(@class='myClass' or starts-with(@class, 'myClass ') or contains(@class, ' myClass ') or substring(@class, string-length(@class)-7)=' myClass')]",
    '#myId' => "//*[@id='myId']",
    'p' => "//p",
    'a' => "//a",
    'doo' => "//doo",


    //------------------------------------------------------------------------------/
    // ELEMENT OPERATORS
    //------------------------------------------------------------------------------/
    '.myClass #doo div' => "//*[(@class='myClass' or starts-with(@class, 'myClass ') or contains(@class, ' myClass ') or substring(@class, string-length(@class)-7)=' myClass')]//*[@id='doo']//div",
    'p.myClass span#doo div' => "//p[(@class='myClass' or starts-with(@class, 'myClass ') or contains(@class, ' myClass ') or substring(@class, string-length(@class)-7)=' myClass')]//span[@id='doo']//div",
    'p, div' => "//p|//div",
    'p[class=myClass] > span' => "//p[@class='myClass']/span",
    'p[class=myClass] > span[data-id]' => "//p[@class='myClass']/span[@data-id]",
    'p[class=myClass] > span[data-id=myId]' => "//p[@class='myClass']/span[@data-id='myId']",
    'p[class=myClass] > span[data-id!=myId]' => "//p[@class='myClass']/span[@data-id!='myId']",
    'p[class=myClass] > span[data-id^="milk is"]' => "//p[@class='myClass']/span[starts-with(@data-id, 'milk is')]",
    /**
     * The one below matches the html:
     *      <p class="myClass">
     *          <span class="d1" data-id="milk &quot;isn't good">Hi</span>
     *      </p>
     */
    'p[class=myClass] > span[data-id^="milk \\"isn\'t"]' => "//p[@class='myClass']/span[starts-with(@data-id, concat('milk \"isn', \"'\", 't'))]",
    'p[class=myClass] > span[data-id$=man]' => "//p[@class='myClass']/span[substring(@data-id, string-length(@data-id) - 2)='man']",
    'p[class=myClass] + span[data-id$=man]' => "//p[@class='myClass']/following-sibling::*[1][substring(@data-id, string-length(@data-id) - 2)='man'][name()='span']",
    'p[class=myClass] ~ span[data-id$=man]' => "//p[@class='myClass']/following-sibling::span[substring(@data-id, string-length(@data-id) - 2)='man']",
    'p[class=myClass] + span[data-id*=kiri]' => "//p[@class='myClass']/following-sibling::*[1][name()='span'][contains(@data-id, 'kiri')]",

    //------------------------------------------------------------------------------/
    // INVOLVED
    //------------------------------------------------------------------------------/
    // the two next lines should be equivalent
//    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden])' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[not(@class='forbidden')]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden])' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[not(@class='forbidden')]",


    // ...
//    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there")' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[not(@class='forbidden')][contains(text(), 'hello there')]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there")' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[contains(text(), 'hello there')][not(@class='forbidden')]",
    'div#myId[class=red][data-id][data-mixed="hi"]:containsAll("holy")' => "//div[@id='myId' and @class='red' and @data-id and @data-mixed='hi' and contains(., 'holy')]",
    'div#myId:not([class=forbidden]) div[class=myClass] > span:contains(hi) + ul:not(.forbidden, .alsoForbidden) ~ a[href=ho]' => "//div[@id='myId'][not(@class='forbidden')]//div[@class='myClass']/span[contains(text(), 'hi')]/following-sibling::*[1][name()='ul'][not((@class='forbidden') or (@class='alsoForbidden'))]/following-sibling::a[@href='ho']",

    'div.myClass.red' => "//div[(@class='myClass' or starts-with(@class, 'myClass ') or contains(@class, ' myClass ') or substring(@class, string-length(@class)-7)=' myClass') and (@class='red' or starts-with(@class, 'red ') or contains(@class, ' red ') or substring(@class, string-length(@class)-3)=' red')]",
    'div#myId.red' => "//div[@id='myId' and (@class='red' or starts-with(@class, 'red ') or contains(@class, ' red ') or substring(@class, string-length(@class)-3)=' red')]",
    //------------------------------------------------------------------------------/
    // COLLECTION POSITION FILTER
    //------------------------------------------------------------------------------/
    ':first' => "(//*)[position()=1]",
    'p[class=myClass] > span:last' => "//p[@class='myClass']/span[position()=last()]",
    'p[class=myClass] > span:first' => "//p[@class='myClass']/span[position()=1]",

//    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):last' => "(//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[not(@class='forbidden')])[last()]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):last' => "(//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[not(@class='forbidden')])[position()=last()]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there"):last' => "(//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//span[contains(text(), 'hello there')][not(@class='forbidden')])[position()=last()]",
    'p[class=myClass] + p[data-id*=kiri]:last' => "(//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')])[last()]",

    //------------------------------------------------------------------------------/
    // NOT
    //------------------------------------------------------------------------------/
    ':not([class=forbidden])' => "//*[not(@class='forbidden')]",
    '*:not([class=forbidden])' => "//*[not(@class='forbidden')]",
    'div#myId:not([class=forbidden])' => "//div[@id='myId'][not(@class='forbidden')]",


    'span:contains(hello):not(.ham span)' => "//span[contains(text(), 'hello')][not(./ancestor::*[@class='ham'])]",
    'span:contains(hello):not(.ham > span)' => "//span[contains(text(), 'hello')][not(parent::*[@class='ham'])]",
    'span:contains(hello):not(.ham + span)' => "//span[contains(text(), 'hello')][not(preceding-sibling::*[1][@class='ham'])]",
    'span:contains(hello):not(.ham ~ span)' => "//span[contains(text(), 'hello')][not(preceding-sibling::*[@class='ham'])]",


    'span:contains(hello):not(.ham span + span)' => "//span[contains(text(), 'hello')][not(./preceding-sibling::*[1][name()='span']/ancestor::*[@class='ham'])]",
    'span:contains(hello):not(.ham span + span, [data-id=dom])' => "//span[contains(text(), 'hello')][not((./preceding-sibling::*[1][name()='span']/ancestor::*[@class='ham']) or (@data-id='dom'))]",
    'span:contains(hello):not(.ham span + span.a3)' => "//span[contains(text(), 'hello')][not(name()='span' and @class='a3' and ./preceding-sibling::*[1][name()='span'] and ./ancestor::*[@class='ham'])]",


    //------------------------------------------------------------------------------/
    // FIRST-OF-TYPE, FIRST-CHILD, ...
    //------------------------------------------------------------------------------/
    "span:first-of-type" => "//span[position()=1]",
    "span[foo=bar]:first-of-type" => "//span[position()=1 and @foo='bar']",
//    "span[foo=bar]:first-of-type" => "//span[position()=1][@foo='bar']", // variant of the line above

    'p:not(:last-of-type)' => "//p[not(position()=last())]",
    'p:not([foo=bar]:last-of-type)' => "//p[not(position()=last() and @foo='bar')]",
    'p:not([foo=bar]:first-of-type)' => "//p[not(position()=1 and @foo='bar')]",
    'p:not([foo=bar]:nth-of-type(2))' => "//p[not(position()=2 and @foo='bar')]",

    'p:not(:contains(hello)[foo=bar][moo=doo]:last-of-type)' => "//p[not(position()=last() and @foo='bar' and @moo='doo' and contains(text(), 'hello'))]",
//    'p:not(:contains(hello)[foo=bar][moo=doo]:last-of-type)' => "//p[not(contains(text(), 'hello') and self::node()[@foo='bar'][@moo='doo'] and position()=last())]",


    "span:first-child" => "//*[position()=1 and name()='span']",
    "span[foo=bar]:first-child" => "//*[position()=1 and name()='span' and @foo='bar']",
    "span[foo=bar][doo=moo]:first-child" => "//*[position()=1 and name()='span' and @foo='bar' and @doo='moo']",
    "span:contains(hello)[foo=bar][doo=moo]:first-child" => "//*[position()=1 and name()='span' and @foo='bar' and @doo='moo' and contains(text(), 'hello')]",

    //
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there"):last-child' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//*[position()=last() and name()='span' and contains(text(), 'hello there')][not(@class='forbidden')]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):containsAll("hello there"):last-child' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//*[position()=last() and name()='span' and contains(., 'hello there')][not(@class='forbidden')]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there"):nth-child(3)' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//*[position()=3 and name()='span' and contains(text(), 'hello there')][not(@class='forbidden')]",
    'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there"):nth-last-child(3)' => "//p[@class='myClass']/following-sibling::*[1][name()='p'][contains(@data-id, 'kiri')]//*[position()=last()-2 and name()='span' and contains(text(), 'hello there')][not(@class='forbidden')]",


];


a(count($expressions2XPath));
$file = 'doc2.html';
$x = "//*[@class='myClass']";
$x = "//*[position()=1 and name()='span']";
// 'p[class=myClass] + p[data-id*=kiri] span:not([class=forbidden]):contains("hello there"):last-child'


$x = "//span[contains(text(), 'hello')][not(name()='span' and @class='a3' and ./preceding-sibling::*[1][name()='span'] and ./ancestor::*[@class='ham'])]";
$x = "//span[contains(text(), 'hello')][not(span@class='a3' and ./preceding-sibling::*[1][name()='span'] and ./ancestor::*[@class='ham'])]";
$x = "//span[contains(text(), 'hello')][not(name()='span' and @class='a3')]";


a(CrawlerDevTool::debugCollection(Collection::fromFile($file)->xpath($x)));


az();
