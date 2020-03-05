HtmlPageTools
===========
2019-04-24



Some tools to create an html page in a widget environment.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/HtmlPageTools
```

Or just download it and place it where you want otherwise.






Summary
===========
- [HtmlPageTools api](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/pages/conception-notes.md)






History Log
=============

- 2.1.1 -- 2019-12-12

    - update HtmlPageCopilot->registerLibrary, add comment 

- 2.1.0 -- 2019-09-26

    - add support for modals
    
- 2.0.1 -- 2019-08-30

    - updated documentation

- 2.0.0 -- 2019-08-30

    - added HtmlPageCopilot->registerLibrary as the only mean to add a library
    - removed HtmlPageCopilot->addCssLibrary method
    - removed HtmlPageCopilot->addJsLibrary method
    - renamed HtmlPageCopilot->getCssLibraries to getCssUrls
    - renamed HtmlPageCopilot->getJsLibraries to getJsUrls
    
- 1.6.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.6.0 -- 2019-05-14

    - add HtmlPageCopilot hasCssCodeBlocks method
    
- 1.5.0 -- 2019-05-03

    - add HtmlPageCopilot hasJsCodeBlocks method
    
- 1.4.0 -- 2019-05-02

    - update CssFileGeneratorInterface now has a copilot argument
    
- 1.3.0 -- 2019-05-02

    - add CssFileGeneratorInterface
    
- 1.2.0 -- 2019-04-29

    - add cssCodeBlock concept, and the addCssCodeBlock and getCssCodeBlocks methods
    
- 1.1.0 -- 2019-04-26

    - add hasTitle and hasDescription methods to HtmlPageCopilot
    
- 1.0.0 -- 2019-04-24

    - initial commit