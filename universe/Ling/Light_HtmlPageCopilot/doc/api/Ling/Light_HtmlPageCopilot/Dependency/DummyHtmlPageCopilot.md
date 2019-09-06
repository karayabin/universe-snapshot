[Back to the Ling/Light_HtmlPageCopilot api](https://github.com/lingtalfi/Light_HtmlPageCopilot/blob/master/doc/api/Ling/Light_HtmlPageCopilot.md)



The DummyHtmlPageCopilot class
================
2019-08-30 --> 2019-08-30






Introduction
============

The DummyHtmlPageCopilot class.

Note: this class is actually an empty shell.
I just used it so my that my universe dependency tools know that there is a relationship
between this planet and the HtmlPageCopilot (those tools basically write the dependencies.byml for me).



Class synopsis
==============


class <span class="pl-k">DummyHtmlPageCopilot</span> extends [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md)  {

- Inherited properties
    - protected string [HtmlPageCopilot::$title](#property-title) ;
    - protected string [HtmlPageCopilot::$description](#property-description) ;
    - protected array [HtmlPageCopilot::$metas](#property-metas) ;
    - protected array [HtmlPageCopilot::$libraryNames](#property-libraryNames) ;
    - protected array [HtmlPageCopilot::$cssLibraries](#property-cssLibraries) ;
    - protected array [HtmlPageCopilot::$jsLibraries](#property-jsLibraries) ;
    - protected array [HtmlPageCopilot::$jsCodeBlocks](#property-jsCodeBlocks) ;
    - protected array [HtmlPageCopilot::$cssCodeBlocks](#property-cssCodeBlocks) ;
    - protected array [HtmlPageCopilot::$bodyTagClasses](#property-bodyTagClasses) ;
    - protected array [HtmlPageCopilot::$bodyTagAttributes](#property-bodyTagAttributes) ;

- Inherited methods
    - public HtmlPageCopilot::__construct() : void
    - public HtmlPageCopilot::setTitle(string $title) : void
    - public HtmlPageCopilot::getTitle() : string
    - public HtmlPageCopilot::hasTitle() : bool
    - public HtmlPageCopilot::setDescription(string $description) : void
    - public HtmlPageCopilot::getDescription() : string
    - public HtmlPageCopilot::hasDescription() : bool
    - public HtmlPageCopilot::addMeta(array $attributes) : void
    - public HtmlPageCopilot::getMetas() : array
    - public HtmlPageCopilot::hasLibrary(string $name) : bool
    - public HtmlPageCopilot::addCssLibrary(string $name, string $href) : void
    - public HtmlPageCopilot::getCssLibraries() : array
    - public HtmlPageCopilot::addJsLibrary(string $name, string $src) : void
    - public HtmlPageCopilot::getJsLibraries() : array
    - public HtmlPageCopilot::addJsCodeBlock(string $codeBlock) : void
    - public HtmlPageCopilot::addCssCodeBlock(string $codeBlock) : void
    - public HtmlPageCopilot::getJsCodeBlocks() : array
    - public HtmlPageCopilot::hasJsCodeBlocks() : bool
    - public HtmlPageCopilot::getCssCodeBlocks() : array
    - public HtmlPageCopilot::hasCssCodeBlocks() : bool
    - public HtmlPageCopilot::addBodyTagClass(string $class) : void
    - public HtmlPageCopilot::setBodyTagAttribute(string $name, string $value) : void
    - public HtmlPageCopilot::getBodyTagAttributes() : array

}






Methods
==============

- HtmlPageCopilot::__construct &ndash; Builds the HtmlPage instance.
- HtmlPageCopilot::setTitle &ndash; Sets the title of the html page.
- HtmlPageCopilot::getTitle &ndash; Returns the title of this instance.
- HtmlPageCopilot::hasTitle &ndash; Returns whether the title was defined.
- HtmlPageCopilot::setDescription &ndash; Sets the description.
- HtmlPageCopilot::getDescription &ndash; Returns the description of this instance.
- HtmlPageCopilot::hasDescription &ndash; Returns whether the description was defined.
- HtmlPageCopilot::addMeta &ndash; Adds a meta to this instance.
- HtmlPageCopilot::getMetas &ndash; Returns the metas of this instance.
- HtmlPageCopilot::hasLibrary &ndash; Returns whether a library has been registered to this instance.
- HtmlPageCopilot::addCssLibrary &ndash; Adds the $name css library to this instance.
- HtmlPageCopilot::getCssLibraries &ndash; Returns the cssLibraries of this instance.
- HtmlPageCopilot::addJsLibrary &ndash; Adds the $name js library to this instance.
- HtmlPageCopilot::getJsLibraries &ndash; Returns the jsLibraries of this instance.
- HtmlPageCopilot::addJsCodeBlock &ndash; Adds a js code block to this instance.
- HtmlPageCopilot::addCssCodeBlock &ndash; Adds a css code block to this instance.
- HtmlPageCopilot::getJsCodeBlocks &ndash; Returns the jsCodeBlocks of this instance.
- HtmlPageCopilot::hasJsCodeBlocks &ndash; Returns whether the instance has js code blocks.
- HtmlPageCopilot::getCssCodeBlocks &ndash; Returns the cssCodeBlocks of this instance.
- HtmlPageCopilot::hasCssCodeBlocks &ndash; Returns whether the instance has css code blocks.
- HtmlPageCopilot::addBodyTagClass &ndash; Adds a css class (or space separated css classes) to the body tag.
- HtmlPageCopilot::setBodyTagAttribute &ndash; Sets a body tag attribute.
- HtmlPageCopilot::getBodyTagAttributes &ndash; Returns the array of all body tag attributes, including the class attribute (if set).





Location
=============
Ling\Light_HtmlPageCopilot\Dependency\DummyHtmlPageCopilot<br>
See the source code of [Ling\Light_HtmlPageCopilot\Dependency\DummyHtmlPageCopilot](https://github.com/lingtalfi/Light_HtmlPageCopilot/blob/master/Dependency/DummyHtmlPageCopilot.php)



