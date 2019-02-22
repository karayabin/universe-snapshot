The PageUtil class
================
2019-02-21 --> 2019-02-22




Introduction
============

The PageUtil class is a tool to create pages of your documentation.
You will need this tool when creating your own [DocBuilder](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/DocBuilder/DocBuilder.md).



Class synopsis
==============


class <span style="color: orange;">PageUtil</span>  {

- Properties
    - protected string [$rootDir](#property-rootDir) ;
    - protected string [$insertsRootDir](#property-insertsRootDir) ;
    - protected [DocTools\Translator\MarkdownTranslatorInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Translator/MarkdownTranslatorInterface.md) [$translator](#property-translator) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setRootDir.md)(string $rootDir) : void
    - public [setInsertsRootDir](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setInsertsRootDir.md)(string $insertsRootDir) : void
    - public [setTranslator](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setTranslator.md)(?[DocTools\Translator\MarkdownTranslatorInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Translator/MarkdownTranslatorInterface.md) $translator) : void
    - public [createPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/createPage.md)(string $file, string $template, array $variables) : void
    - private [renderPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/renderPage.md)(string $template, array $z, [DocTools\TemplateWizard\TemplateWizard](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/TemplateWizard/TemplateWizard.md) $zz) : false | string

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    The root dir is the directory containing all generated files.
    
    

- <span id="property-insertsRootDir"><b>insertsRootDir</b></span>

    This property holds the inserts root directory.
    See [inserts](https://github.com/lingtalfi/DocTools/blob/master/README.md#inserts) for more details.
    
    

- <span id="property-translator"><b>translator</b></span>

    This property holds the markdown translator for this instance.
    If null, no translation will occur.
    
    



Methods
==============

- [PageUtil::__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/__construct.md) &ndash; Builds the PageUtil instance.
- [PageUtil::setRootDir](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setRootDir.md) &ndash; Sets the root dir.
- [PageUtil::setInsertsRootDir](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setInsertsRootDir.md) &ndash; Sets the insertsRootDir.
- [PageUtil::setTranslator](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/setTranslator.md) &ndash; Sets the translator.
- [PageUtil::createPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/createPage.md) &ndash; Creates the page in $file, based on the given $template and $variables.
- [PageUtil::renderPage](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Page/PageUtil/renderPage.md) &ndash; and returns the rendered result.




Location
=============
DocTools\Page\PageUtil