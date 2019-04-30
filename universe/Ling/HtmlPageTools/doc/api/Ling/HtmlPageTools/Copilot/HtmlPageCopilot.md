[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)



The HtmlPageCopilot class
================
2019-04-24 --> 2019-04-29






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
    - protected array [$libraryNames](#property-libraryNames) ;
    - protected array [$cssLibraries](#property-cssLibraries) ;
    - protected array [$jsLibraries](#property-jsLibraries) ;
    - protected array [$jsCodeBlocks](#property-jsCodeBlocks) ;
    - protected array [$cssCodeBlocks](#property-cssCodeBlocks) ;
    - protected array [$bodyTagClasses](#property-bodyTagClasses) ;
    - protected array [$bodyTagAttributes](#property-bodyTagAttributes) ;

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
    - public [addCssLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssLibrary.md)(string $name, string $href) : void
    - public [getCssLibraries](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssLibraries.md)() : array
    - public [addJsLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsLibrary.md)(string $name, string $src) : void
    - public [getJsLibraries](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsLibraries.md)() : array
    - public [addJsCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsCodeBlock.md)(string $codeBlock) : void
    - public [addCssCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssCodeBlock.md)(string $codeBlock) : void
    - public [getJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsCodeBlocks.md)() : array
    - public [getCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssCodeBlocks.md)() : array
    - public [addBodyTagClass](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addBodyTagClass.md)(string $class) : void
    - public [setBodyTagAttribute](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setBodyTagAttribute.md)(string $name, string $value) : void
    - public [getBodyTagAttributes](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getBodyTagAttributes.md)() : array

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
    
    

- <span id="property-libraryNames"><b>libraryNames</b></span>

    This property holds the libraries for this instance.
    It's an array of the registered libraries names.
    A library is registered whenever the addCssLibrary or the addJsLibrary method is called.
    
    

- <span id="property-cssLibraries"><b>cssLibraries</b></span>

    This property holds the cssLibraries for this instance.
    It's an array of (css libraries) urls.
    
    

- <span id="property-jsLibraries"><b>jsLibraries</b></span>

    This property holds the jsLibraries for this instance.
    It's an array of (js libraries) urls.
    
    

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
- [HtmlPageCopilot::hasLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/hasLibrary.md) &ndash; Returns whether a library has been registered to this instance.
- [HtmlPageCopilot::addCssLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssLibrary.md) &ndash; Adds the $name css library to this instance.
- [HtmlPageCopilot::getCssLibraries](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssLibraries.md) &ndash; Returns the cssLibraries of this instance.
- [HtmlPageCopilot::addJsLibrary](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsLibrary.md) &ndash; Adds the $name js library to this instance.
- [HtmlPageCopilot::getJsLibraries](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsLibraries.md) &ndash; Returns the jsLibraries of this instance.
- [HtmlPageCopilot::addJsCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addJsCodeBlock.md) &ndash; Adds a js code block to this instance.
- [HtmlPageCopilot::addCssCodeBlock](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addCssCodeBlock.md) &ndash; Adds a css code block to this instance.
- [HtmlPageCopilot::getJsCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getJsCodeBlocks.md) &ndash; Returns the jsCodeBlocks of this instance.
- [HtmlPageCopilot::getCssCodeBlocks](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getCssCodeBlocks.md) &ndash; Returns the cssCodeBlocks of this instance.
- [HtmlPageCopilot::addBodyTagClass](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/addBodyTagClass.md) &ndash; Adds a css class (or space separated css classes) to the body tag.
- [HtmlPageCopilot::setBodyTagAttribute](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/setBodyTagAttribute.md) &ndash; Sets a body tag attribute.
- [HtmlPageCopilot::getBodyTagAttributes](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot/getBodyTagAttributes.md) &ndash; Returns the array of all body tag attributes, including the class attribute (if set).





Location
=============
Ling\HtmlPageTools\Copilot\HtmlPageCopilot


SeeAlso
==============
Next class: [HtmlPageException](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Exception/HtmlPageException.md)<br>
