[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Rendering\BaseRealistListItemRenderer class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer.md)


BaseRealistListItemRenderer::getUrlByRoute
================



BaseRealistListItemRenderer::getUrlByRoute — Returns the url corresponding to the given route, using the reverse_router service.




Description
================


protected [BaseRealistListItemRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/getUrlByRoute.md)(string $route, ?array $urlParameters = [], ?bool $useAbsolute = null) : string




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
See the source code for method [BaseRealistListItemRenderer::getUrlByRoute](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/BaseRealistListItemRenderer.php#L340-L347)


See Also
================

The [BaseRealistListItemRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer.md) class.

Previous method: [renderPropertyContent](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/renderPropertyContent.md)<br>Next method: [extractRic](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistListItemRenderer/extractRic.md)<br>

