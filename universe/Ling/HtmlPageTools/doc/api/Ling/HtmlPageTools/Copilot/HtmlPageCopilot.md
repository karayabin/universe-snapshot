[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)



The HtmlPageCopilot class
================
2019-04-24 --> 2021-08-17






Introduction
============

The HtmlPageCopilot class.


HtmlPageCopilot is an object helps creating an html page in a widget environment.
It does so by capturing and serving back everything that's related to an html page except for the body content.
So for instance the assets, the meta title, the meta description, etc...

It's used as a medium object between the widgets and the html page renderer in a widget oriented application.



Class synopsis
==============


class <span class="pl-k">HtmlPageCopilot</span>  {

- Properties
    - protected string [$title](#property-title) ;
    - protected string [$description](#property-description) ;
    - protected array [$metas](#property-metas) ;
    - protected array [$libraries](#property-libraries) ;
    - protected array [$jsCodeBlocks](#property-jsCodeBlocks) ;
    - protected array [$cssCodeBlocks](#property-cssCodeBlocks) ;
    - protected array [$bodyTagClasses](#property-bodyTagClasses) ;
    - protected array [$bodyTagAttributes](#property-bodyTagAttributes) ;
    - protected array [$modals](#property-modals) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/__construct.md)() : void
    - public [setTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setTitle.md)(string $title) : void
    - public [getTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getTitle.md)() : string
    - public [hasTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasTitle.md)() : bool
    - public [setDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setDescription.md)(string $description) : void
    - public [getDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getDescription.md)() : string
    - public [hasDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasDescription.md)() : bool
    - public [addMeta](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addMeta.md)(array $attributes) : void
    - public [getMetas](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getMetas.md)() : array
    - public [hasLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasLibrary.md)(string $name) : bool
    - public [registerLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/registerLibrary.md)(string $name, ?array $js = [], ?array $css = [], ?array $options = []) : void
    - public [getCssUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssUrls.md)() : array
    - public [getJsUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsUrls.md)() : array
    - public [getJsModulesUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsModulesUrls.md)() : array
    - public [addJsCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsCodeBlock.md)(string $codeBlock) : void
    - public [addCssCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssCodeBlock.md)(string $codeBlock) : void
    - public [getJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsCodeBlocks.md)() : array
    - public [hasJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasJsCodeBlocks.md)() : bool
    - public [getCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssCodeBlocks.md)() : array
    - public [hasCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasCssCodeBlocks.md)() : bool
    - public [addBodyTagClass](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addBodyTagClass.md)(string $class) : void
    - public [setBodyTagAttribute](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setBodyTagAttribute.md)(string $name, string $value) : void
    - public [getBodyTagAttributes](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getBodyTagAttributes.md)() : array
    - public [getModals](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getModals.md)() : array
    - public [addModal](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addModal.md)(string $html) : void

}




Properties
=============

- <span id="property-title"><b>title</b></span>

    This property holds the title for this instance.
    This is the title of the html page.
    
    

- <span id="property-description"><b>description</b></span>

    This property holds the description for this instance.
    This is the meta description.
    
    

- <span id="property-metas"><b>metas</b></span>

    This property holds the metas for this instance.
    It's an array of metas.
    Each meta being an array of key/value pairs representing the meta attributes along with their corresponding values.
    
    

- <span id="property-libraries"><b>libraries</b></span>

    This property holds the libraries for this instance.
    
    It's an array of libraryName => assetsItem.
    Each assetsItem is an array of:
    - 0: array of regular js files urls
    - 1: array of css urls
    - 0: array of js modules urls
    
    

- <span id="property-jsCodeBlocks"><b>jsCodeBlocks</b></span>

    This property holds the jsCodeBlocks for this instance.
    It's an array of javascript blocks of code.
    
    Note: a js code block doesn't include the script tag: a js code block is pure javascript.
    
    

- <span id="property-cssCodeBlocks"><b>cssCodeBlocks</b></span>

    This property holds the cssCodeBlocks for this instance.
    It's an array of css blocks of code.
    
    Note: a css code block doesn't include the style tag: a css code block is pure css.
    
    

- <span id="property-bodyTagClasses"><b>bodyTagClasses</b></span>

    This property holds the bodyTagClasses for this instance.
    It's an array of css classes (or space separated css classes).
    
    

- <span id="property-bodyTagAttributes"><b>bodyTagAttributes</b></span>

    This property holds the bodyTagAttributes for this instance.
    It's an array of key/value representing html attributes.
    The "class" attribute should not be part of this array, as it's handled separately using the bodyTagClasses property.
    
    

- <span id="property-modals"><b>modals</b></span>

    This property holds the modals for this instance.
    It's an array of html modals.
    
    



Methods
==============

- [HtmlPageCopilot::__construct](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/__construct.md) &ndash; Builds the HtmlPage instance.
- [HtmlPageCopilot::setTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setTitle.md) &ndash; Sets the title of the html page.
- [HtmlPageCopilot::getTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getTitle.md) &ndash; Returns the title of this instance.
- [HtmlPageCopilot::hasTitle](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasTitle.md) &ndash; Returns whether the title was defined.
- [HtmlPageCopilot::setDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setDescription.md) &ndash; Sets the description.
- [HtmlPageCopilot::getDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getDescription.md) &ndash; Returns the description of this instance.
- [HtmlPageCopilot::hasDescription](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasDescription.md) &ndash; Returns whether the description was defined.
- [HtmlPageCopilot::addMeta](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addMeta.md) &ndash; Adds a meta to this instance.
- [HtmlPageCopilot::getMetas](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getMetas.md) &ndash; Returns the metas of this instance.
- [HtmlPageCopilot::hasLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasLibrary.md) &ndash; Returns whether a library has been registered.
- [HtmlPageCopilot::registerLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/registerLibrary.md) &ndash; Registers an asset library.
- [HtmlPageCopilot::getCssUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssUrls.md) &ndash; Returns all the css urls collected.
- [HtmlPageCopilot::getJsUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsUrls.md) &ndash; Returns all the js urls collected.
- [HtmlPageCopilot::getJsModulesUrls](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsModulesUrls.md) &ndash; Returns all the js modules urls collected.
- [HtmlPageCopilot::addJsCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsCodeBlock.md) &ndash; Adds a js code block to this instance.
- [HtmlPageCopilot::addCssCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssCodeBlock.md) &ndash; Adds a css code block to this instance.
- [HtmlPageCopilot::getJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsCodeBlocks.md) &ndash; Returns the jsCodeBlocks of this instance.
- [HtmlPageCopilot::hasJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasJsCodeBlocks.md) &ndash; Returns whether the instance has js code blocks.
- [HtmlPageCopilot::getCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssCodeBlocks.md) &ndash; Returns the cssCodeBlocks of this instance.
- [HtmlPageCopilot::hasCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasCssCodeBlocks.md) &ndash; Returns whether the instance has css code blocks.
- [HtmlPageCopilot::addBodyTagClass](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addBodyTagClass.md) &ndash; Adds a css class (or space separated css classes) to the body tag.
- [HtmlPageCopilot::setBodyTagAttribute](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setBodyTagAttribute.md) &ndash; Sets a body tag attribute.
- [HtmlPageCopilot::getBodyTagAttributes](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getBodyTagAttributes.md) &ndash; Returns the array of all body tag attributes, including the class attribute (if set).
- [HtmlPageCopilot::getModals](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getModals.md) &ndash; Returns the modals of this instance.
- [HtmlPageCopilot::addModal](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addModal.md) &ndash; Adds a modal to this instance.





Location
=============
Ling\HtmlPageTools\Copilot\HtmlPageCopilot<br>
See the source code of [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/Copilot/HtmlPageCopilot.php)



SeeAlso
==============
Next class: [CssFileGeneratorInterface](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface.md)<br>
