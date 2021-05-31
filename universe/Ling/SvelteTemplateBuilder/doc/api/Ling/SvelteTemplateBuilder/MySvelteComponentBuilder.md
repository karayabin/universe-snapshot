[Back to the Ling/SvelteTemplateBuilder api](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder.md)



The MySvelteComponentBuilder class
================
2020-05-08 --> 2021-05-31






Introduction
============

The MySvelteComponentBuilder class.
Executes the steps described in https://github.com/lingtalfi/my-svelte-component.
Except that it instead of cloning the files, it creates them from scratch.



Class synopsis
==============


class <span class="pl-k">MySvelteComponentBuilder</span>  {

- Properties
    - protected string [$baseDir](#property-baseDir) ;
    - protected string [$componentName](#property-componentName) ;
    - protected string [$dirName](#property-dirName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/__construct.md)() : void
    - public [setBaseDir](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setBaseDir.md)(string $baseDir) : void
    - public [setComponentName](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setComponentName.md)(string $componentName) : void
    - public [setDirName](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setDirName.md)(string $dirName) : void
    - public [build](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/build.md)() : void

}




Properties
=============

- <span id="property-baseDir"><b>baseDir</b></span>

    This directory containing our svelte component directory.
    
    

- <span id="property-componentName"><b>componentName</b></span>

    This property holds the componentName for this instance.
    
    

- <span id="property-dirName"><b>dirName</b></span>

    This property holds the dirName for this instance.
    
    



Methods
==============

- [MySvelteComponentBuilder::__construct](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/__construct.md) &ndash; Builds the MySvelteComponentBuilder instance.
- [MySvelteComponentBuilder::setBaseDir](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setBaseDir.md) &ndash; Sets the baseDir.
- [MySvelteComponentBuilder::setComponentName](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setComponentName.md) &ndash; Sets the componentName (the ClassName if you will).
- [MySvelteComponentBuilder::setDirName](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/setDirName.md) &ndash; Sets the dirName.
- [MySvelteComponentBuilder::build](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/doc/api/Ling/SvelteTemplateBuilder/MySvelteComponentBuilder/build.md) &ndash; Creates the component directory.





Location
=============
Ling\SvelteTemplateBuilder\MySvelteComponentBuilder<br>
See the source code of [Ling\SvelteTemplateBuilder\MySvelteComponentBuilder](https://github.com/lingtalfi/SvelteTemplateBuilder/blob/master/MySvelteComponentBuilder.php)



