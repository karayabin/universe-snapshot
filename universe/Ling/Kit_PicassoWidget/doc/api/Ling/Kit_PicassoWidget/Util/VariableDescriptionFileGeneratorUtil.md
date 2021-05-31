[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)



The VariableDescriptionFileGeneratorUtil class
================
2019-04-24 --> 2021-05-31






Introduction
============

The VariableDescriptionFileGeneratorUtil class.



Class synopsis
==============


class <span class="pl-k">VariableDescriptionFileGeneratorUtil</span>  {

- Methods
    - public [generate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/generate.md)(string $pageConfFile, string $outputDir) : void
    - protected [renderVars](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderVars.md)(array $vars) : string
    - protected [renderVar](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderVar.md)(string $varName, $value, ?int $indentBase = 1) : string
    - protected [renderExample](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderExample.md)(array $vars) : string

}






Methods
==============

- [VariableDescriptionFileGeneratorUtil::generate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/generate.md) &ndash; Reads a [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array), and writes a base variable description file for all picasso widgets found.
- [VariableDescriptionFileGeneratorUtil::renderVars](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderVars.md) &ndash; corresponding base variables description formatted vars string.
- [VariableDescriptionFileGeneratorUtil::renderVar](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderVar.md) &ndash; Renders a variables description item recursively.
- [VariableDescriptionFileGeneratorUtil::renderExample](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderExample.md) &ndash; variables description example out of it.


Examples
==========

Example #1: A simple example
----------------


I use the following code to generate my variables description files.


```php
$pageConfFile = "/komin/jin_site_demo/config/Ling.Light_Kit/pages/Light_Kit_Demo/looplab/looplab_home.byml";
$outputDir = "/tmp/assets";
$o = new VariableDescriptionFileGeneratorUtil();
$o->generate($pageConfFile, $outputDir);
```





Location
=============
Ling\Kit_PicassoWidget\Util\VariableDescriptionFileGeneratorUtil<br>
See the source code of [Ling\Kit_PicassoWidget\Util\VariableDescriptionFileGeneratorUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/Util/VariableDescriptionFileGeneratorUtil.php)



SeeAlso
==============
Previous class: [VariableDescriptionDocWriterUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionDocWriterUtil.md)<br>Next class: [EasyLightPicassoWidget](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Widget/EasyLightPicassoWidget.md)<br>
