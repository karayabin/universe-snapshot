[Back to the Ling/ZephyrTemplateEngine api](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine.md)<br>
[Back to the Ling\ZephyrTemplateEngine\ZephyrTemplateEngine class](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md)


ZephyrTemplateEngine::renderFile
================



ZephyrTemplateEngine::renderFile — Parses the file identified and returns its interpreted content (by injecting the variables in it).




Description
================


public [ZephyrTemplateEngine::renderFile](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/renderFile.md)(string $filePath, ?array $variables = []) : false | string




Parses the file identified and returns its interpreted content (by injecting the variables in it).
If false is returned, the errors are accessible via the getErrors method.




Parameters
================


- filePath

    

- variables

    


Return values
================

Returns false | string.








Source Code
===========
See the source code for method [ZephyrTemplateEngine::renderFile](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/ZephyrTemplateEngine.php#L66-L74)


See Also
================

The [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md) class.

Previous method: [render](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/render.md)<br>Next method: [getErrors](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/getErrors.md)<br>

