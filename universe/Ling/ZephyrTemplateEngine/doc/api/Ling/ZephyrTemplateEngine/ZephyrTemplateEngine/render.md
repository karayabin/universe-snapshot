[Back to the Ling/ZephyrTemplateEngine api](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine.md)<br>
[Back to the Ling\ZephyrTemplateEngine\ZephyrTemplateEngine class](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md)


ZephyrTemplateEngine::render
================



ZephyrTemplateEngine::render — Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).




Description
================


public [ZephyrTemplateEngine::render](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/render.md)(string $resourceId, array $variables = []) : false | string




Parses the template identified by $resourceId and returns the interpreted template (the template with the variables injected in it).
If false is returned, the errors are accessible via the getErrors method.




Parameters
================


- resourceId

    

- variables

    


Return values
================

Returns false | string.
False is returned in case something went wrong, in which case errors are accessible via the getErrors method.







See Also
================

The [ZephyrTemplateEngine](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine.md) class.

Previous method: [__construct](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/__construct.md)<br>Next method: [renderFile](https://github.com/lingtalfi/ZephyrTemplateEngine/blob/master/doc/api/Ling/ZephyrTemplateEngine/ZephyrTemplateEngine/renderFile.md)<br>

