[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The VariableDescriptionDocWriterUtil class
================
2019-04-24 --> 2019-05-10






Introduction
============

The VariableDescriptionDocWriterUtil class.

This class will produce a documentation file for the widgets of a directory.
The documentation file has the md extension, and includes screenshots of the widgets.

This class works with the following set of rules:

- first, you need to write all your description files with the **.vars_descr.byml** extension. For instance,
     my_widget.vars_descr.byml. If you don't remember the variables description syntax, please refer to the



Class synopsis
==============


class <span class="pl-k">VariableDescriptionDocWriterUtil</span>  {

- Properties
    - protected string [$variablesDescriptionDir](#property-variablesDescriptionDir) ;
    - protected string [$imgBaseDir](#property-imgBaseDir) ;
    - protected string [$imgBaseUrl](#property-imgBaseUrl) ;
    - protected string [$documentDate](#property-documentDate) ;
    - protected string [$documentTitle](#property-documentTitle) ;
    - protected string [$widgetTpl](#property-widgetTpl) ;
    - protected string [$pageTpl](#property-pageTpl) ;
    - protected string [$widgetsBaseDir](#property-widgetsBaseDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/__construct.md)() : void
    - public [setVariablesDescriptionDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setVariablesDescriptionDir.md)(string $variablesDescriptionDir) : void
    - public [setImgBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseDir.md)(string $imgBaseDir) : void
    - public [setImgBaseUrl](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseUrl.md)(string $imgBaseUrl) : void
    - public [setWidgetsBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setWidgetsBaseDir.md)(string $widgetsBaseDir) : void
    - public [setDocumentDate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentDate.md)(string $documentDate) : void
    - public [setDocumentTitle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentTitle.md)(string $documentTitle) : void
    - public [writeDoc](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/writeDoc.md)(string $file) : bool
    - protected [renderWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderWidget.md)(array $arr) : string
    - protected [renderScreenshotList](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderScreenshotList.md)(string $widgetName) : string
    - protected [renderWidgetVariablesDescriptionList](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderWidgetVariablesDescriptionList.md)(array $vars) : string
    - protected [renderListItem](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderListItem.md)(string $key, array $item, int $indentBase = 1) : string
    - protected [error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-variablesDescriptionDir"><b>variablesDescriptionDir</b></span>

    This property holds the variablesDescriptionDir for this instance.
    The path to the directory containing all widget variables description files.
    
    

- <span id="property-imgBaseDir"><b>imgBaseDir</b></span>

    This property holds the imgBaseDir for this instance.
    The path to the directory containing all widget screenshots.
    
    

- <span id="property-imgBaseUrl"><b>imgBaseUrl</b></span>

    This property holds the imgBaseUrl for this instance.
    The base url to use for the image screenshots.
    
    

- <span id="property-documentDate"><b>documentDate</b></span>

    This property holds the document date in yyyy-mm-dd format.
    
    

- <span id="property-documentTitle"><b>documentTitle</b></span>

    This property holds the title of the document.
    
    

- <span id="property-widgetTpl"><b>widgetTpl</b></span>

    This property holds the path to the widget template used by this instance.
    
    

- <span id="property-pageTpl"><b>pageTpl</b></span>

    This property holds the path to the page template used by this instance.
    
    

- <span id="property-widgetsBaseDir"><b>widgetsBaseDir</b></span>

    This property holds the widgetsBaseDir for this instance.
    The path to the directory containing all [widget directories](https://github.com/lingtalfi/Kit_PicassoWidget#the-picasso-file-structure).
    
    



Methods
==============

- [VariableDescriptionDocWriterUtil::__construct](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/__construct.md) &ndash; Builds the VariableDescriptionDocWriterUtil instance.
- [VariableDescriptionDocWriterUtil::setVariablesDescriptionDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setVariablesDescriptionDir.md) &ndash; Sets the variablesDescriptionDir.
- [VariableDescriptionDocWriterUtil::setImgBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseDir.md) &ndash; Sets the imgBaseDir.
- [VariableDescriptionDocWriterUtil::setImgBaseUrl](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setImgBaseUrl.md) &ndash; Sets the imgBaseUrl.
- [VariableDescriptionDocWriterUtil::setWidgetsBaseDir](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setWidgetsBaseDir.md) &ndash; Sets the widgetsBaseDir.
- [VariableDescriptionDocWriterUtil::setDocumentDate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentDate.md) &ndash; Sets the documentDate.
- [VariableDescriptionDocWriterUtil::setDocumentTitle](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/setDocumentTitle.md) &ndash; Sets the documentTitle.
- [VariableDescriptionDocWriterUtil::writeDoc](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/writeDoc.md) &ndash; Writes the widget documentation to the given file, and returns whether the writing of the file was successful.
- [VariableDescriptionDocWriterUtil::renderWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderWidget.md) &ndash; Returns the widget snippet, based on the given widget variables description array.
- [VariableDescriptionDocWriterUtil::renderScreenshotList](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderScreenshotList.md) &ndash; Returns the screenshot list snippet, based on the given widget name.
- [VariableDescriptionDocWriterUtil::renderWidgetVariablesDescriptionList](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderWidgetVariablesDescriptionList.md) &ndash; Returns the widget variables description list snippet.
- [VariableDescriptionDocWriterUtil::renderListItem](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/renderListItem.md) &ndash; Renders a widget variables description list item recursively.
- [VariableDescriptionDocWriterUtil::error](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil/error.md) &ndash; Throws a formatted error message.


Examples
==========

Example #1: simple example
-----------


I'm using this example to generate [widget doc](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/pages/widget-variables-description.md) for the [Light_Kit_BootstrapWidgetLibrary](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary).


```php

$out = "/komin/jin_site_demo/universe/Ling/Light_Kit_BootstrapWidgetLibrary/personal/mydoc/pages/widget-variables-description.md";
$descrDir = "/komin/jin_site_demo/universe/Ling/Light_Kit_BootstrapWidgetLibrary/assets";
$imgDir = "/komin/lingtalfi.com/app/www/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots";
$widgetsDir = "/komin/jin_site_demo/templates/Light_Kit_BootstrapWidgetLibrary/widgets/picasso";
$o = new VariableDescriptionDocWriterUtil();
$o->setVariablesDescriptionDir($descrDir);
$o->setImgBaseDir($imgDir);
$o->setWidgetsBaseDir($widgetsDir);
$o->setImgBaseUrl("http://lingtalfi.com/img/universe/Light_Kit_BootstrapWidgetLibrary/screenshots");
$o->setDocumentDate("2019-05-01");
$o->setDocumentTitle("Bootstrap Widget Library");
$o->writeDoc($out);
```


Location
=============
Ling\Kit_PicassoWidget\Util\VariableDescriptionDocWriterUtil


SeeAlso
==============
Previous class: [PicassoWidgetException](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Exception/PicassoWidgetException.md)<br>Next class: [VariableDescriptionFileGeneratorUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil.md)<br>
