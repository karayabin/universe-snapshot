[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\PageRenderer\LightKitPageRenderer class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)


LightKitPageRenderer::renderPage
================



LightKitPageRenderer::renderPage — Renders the given page.




Description
================


public [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md)(string $pageName, ?array $options = []) : string




Renders the given page.

Available options are:

- widgetVariables: array. An array of [widget coordinates](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#widget-coordinates) => widgetConf variables. Use this array to override the "vars" entry of widget(s) configuration.
- widgetConf: array. An array of [widget coordinates](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#widget-coordinates) => widgetConf. Use this array to override one or more widget's configuration.
- pageConf: array=false. The kit page conf. If you already have the config, you can use it directly.

- dynamicVariables: array. An array of variables to use to pass to the confStorage object and/or the transformers objects, if they need it.
- pageConfUpdator: PageConfUpdator = null. If defined, its transform method will be called first, before the transformer objects.


More about [widget coordinates](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#widget-coordinates).




Parameters
================


- pageName

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightKitPageRenderer::renderPage](https://github.com/lingtalfi/Light_Kit/blob/master/PageRenderer/LightKitPageRenderer.php#L179-L278)


See Also
================

The [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md) class.

Previous method: [getControllerVars](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getControllerVars.md)<br>Next method: [getContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/getContainer.md)<br>

