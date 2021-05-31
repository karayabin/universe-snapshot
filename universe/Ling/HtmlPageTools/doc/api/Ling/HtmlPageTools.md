Ling/HtmlPageTools
================
2019-04-24 --> 2021-05-31




Table of contents
===========

- [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) &ndash; The HtmlPageCopilot class.
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
- [CssFileGeneratorInterface](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface.md) &ndash; The CssFileGeneratorInterface interface.
    - [CssFileGeneratorInterface::generate](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/CssFileGenerator/CssFileGeneratorInterface/generate.md) &ndash; and returns the url to this css file.
- [HtmlPageException](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Exception/HtmlPageException.md) &ndash; The HtmlPageException class.
- [HtmlPageRenderer](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer.md) &ndash; The HtmlPageRenderer class.
    - [HtmlPageRenderer::__construct](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/__construct.md) &ndash; Builds the HtmlPageRenderer instance.
    - [HtmlPageRenderer::setCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/setCopilot.md) &ndash; Sets the copilot.
    - [HtmlPageRenderer::printTop](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printTop.md) &ndash; Prints the content of the top file, which represents the top of the html page.
    - [HtmlPageRenderer::printBottom](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Renderer/HtmlPageRenderer/printBottom.md) &ndash; Prints the content of the bottom file, which represents the bottom of the html page.




