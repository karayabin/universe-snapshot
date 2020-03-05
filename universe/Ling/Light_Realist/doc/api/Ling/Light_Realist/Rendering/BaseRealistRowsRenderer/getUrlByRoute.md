[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Rendering\BaseRealistRowsRenderer class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md)


BaseRealistRowsRenderer::getUrlByRoute
================



BaseRealistRowsRenderer::getUrlByRoute — Returns the url corresponding to the given route, using the reverse_router service.




Description
================


protected [BaseRealistRowsRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/getUrlByRoute.md)(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string




Returns the url corresponding to the given route, using the reverse_router service.

For parameters, it's a proxy to the [LightReverseRouterService](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService.md) (i.e. see their doc for more details).




Parameters
================


- route

    

- urlParameters

    

- useAbsolute

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BaseRealistRowsRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/BaseRealistRowsRenderer.php#L321-L328)


See Also
================

The [BaseRealistRowsRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md) class.

Previous method: [renderColumnContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/renderColumnContent.md)<br>Next method: [extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer/extractRic.md)<br>

