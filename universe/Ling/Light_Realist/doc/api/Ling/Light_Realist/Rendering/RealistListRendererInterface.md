[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)



The RealistListRendererInterface class
================
2019-08-12 --> 2019-10-11






Introduction
============

The RealistListRendererInterface interface.
This interface renders a list, including the gravitating widgets.



Class synopsis
==============


abstract class <span class="pl-k">RealistListRendererInterface</span>  {

- Methods
    - abstract public [prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/prepareByRequestDeclaration.md)(string $requestId, array $requestDeclaration, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - abstract public [render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md)() : void
    - abstract public [renderListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/renderListGeneralActions.md)() : void
    - abstract public [setContainerCssId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/setContainerCssId.md)(string $cssId) : mixed

}






Methods
==============

- [RealistListRendererInterface::prepareByRequestDeclaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/prepareByRequestDeclaration.md) &ndash; Prepares the list renderer with the given request declaration.
- [RealistListRendererInterface::render](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/render.md) &ndash; Prints the list.
- [RealistListRendererInterface::renderListGeneralActions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/renderListGeneralActions.md) &ndash; 
- [RealistListRendererInterface::setContainerCssId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistListRendererInterface/setContainerCssId.md) &ndash; Sets the container css id.





Location
=============
Ling\Light_Realist\Rendering\RealistListRendererInterface<br>
See the source code of [Ling\Light_Realist\Rendering\RealistListRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/RealistListRendererInterface.php)



SeeAlso
==============
Previous class: [OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md)<br>Next class: [RealistRowsRendererInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/RealistRowsRendererInterface.md)<br>
