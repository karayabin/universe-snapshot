[Back to the Ling/Kit_PicassoWidget api](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget.md)<br>
[Back to the Ling\Kit_PicassoWidget\Util\VariableDescriptionFileGeneratorUtil class](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil.md)


VariableDescriptionFileGeneratorUtil::generate
================



VariableDescriptionFileGeneratorUtil::generate — Reads a [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array), and writes a base variable description file for all picasso widgets found.




Description
================


public [VariableDescriptionFileGeneratorUtil::generate](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/generate.md)(string $pageConfFile, string $outputDir) : void




Reads a [page configuration array](https://github.com/lingtalfi/Kit#the-kit-configuration-array), and writes a base variable description file for all picasso widgets found.
All files created will have the following name format:

- $widgetClassName.var_descr.prototype.byml

Note: only widgets with the type "picasso" will be parsed.




Parameters
================


- pageConfFile

    Path to the page configuration file in babyYaml format.

- outputDir

    


Return values
================

Returns void.








See Also
================

The [VariableDescriptionFileGeneratorUtil](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil.md) class.

Next method: [renderVars](https://github.com/lingtalfi/Kit_PicassoWidget/blob/master/doc/api/Ling/Kit_PicassoWidget/Util/VariableDescriptionFileGeneratorUtil/renderVars.md)<br>

