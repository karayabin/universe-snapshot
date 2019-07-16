[Back to the Ling/HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md)



The HtmlPageRenderer class
================
2019-04-24 --> 2019-05-14






Introduction
============

The HtmlPageRenderer class.

A possible implementation of an html page renderer.


The top and bottom concept
-----------

This renderer uses the concept of top and bottom.

The top is the top part of the html page, starting at the doctype declaration, including the html opening tag,
including the complete head tag, and even including the opening body tag.

Then the bottom is the part which contains the closing body tag, and usually the part just before (but that's up to the user),
which generally contains some js scripts and/or js initialization code blocks.

It also includes the closing html tag.

The content of the body is left to the user to render.

To recap, here is the simplified structure of an html page, using the top and bottom concept:


```txt

<!-- BEGIN OF TOP -->
     doctype
     <html>
     <head></head>
     <body>
<!-- END OF TOP -->

<!-- HERE IS THE BODY CONTENT, BUT THAT'S LEFT TO THE USER (YOU) TO RENDER -->


<!-- BEGIN OF BOTTOM -->
     <!-- usually including some js libraries here, and/or rendering some js initialization code blocks -->
     </body>
     </html>
<!-- END OF BOTTOM -->


```



Class synopsis
==============


class <span class="pl-k">HtmlPageRenderer</span>  {

- Properties
    - protected [Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) [$copilot](#property-copilot) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/__construct.md)() : void
    - public [setCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/setCopilot.md)([Ling\HtmlPageTools\Copilot\HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) $copilot) : void
    - public [printTop](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printTop.md)(string $topFile) : void
    - public [printBottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printBottom.md)(string $bottomFile) : void

}




Properties
=============

- <span id="property-copilot"><b>copilot</b></span>

    This property holds the copilot for this instance.
    
    



Methods
==============

- [HtmlPageRenderer::__construct](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/__construct.md) &ndash; Builds the HtmlPageRenderer instance.
- [HtmlPageRenderer::setCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/setCopilot.md) &ndash; Sets the copilot.
- [HtmlPageRenderer::printTop](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printTop.md) &ndash; Prints the content of the top file, which represents the top of the html page.
- [HtmlPageRenderer::printBottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printBottom.md) &ndash; Prints the content of the bottom file, which represents the bottom of the html page.





Location
=============
Ling\HtmlPageTools\Renderer\HtmlPageRenderer


SeeAlso
==============
Previous class: [HtmlPageException](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Exception/HtmlPageException.md)<br>
