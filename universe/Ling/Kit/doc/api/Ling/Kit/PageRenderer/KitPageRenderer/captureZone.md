[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\PageRenderer\KitPageRenderer class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)


KitPageRenderer::captureZone
================



KitPageRenderer::captureZone — The working horse method behind captureZones.




Description
================


protected [KitPageRenderer::captureZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZone.md)(string $zoneName, array $widgets) : void




The working horse method behind captureZones.
It's also used by the printZone method, in the case some widget implementing KitPageRendererAwareInterface
do print a zone which is not yet rendered.




Parameters
================


- zoneName

    

- widgets

    


Return values
================

Returns void.


Exceptions thrown
================

- [KitException](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/Exception/KitException.md).&nbsp;







Source Code
===========
See the source code for method [KitPageRenderer::captureZone](https://github.com/lingtalfi/Kit/blob/master/PageRenderer/KitPageRenderer.php#L355-L466)


See Also
================

The [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md) class.

Previous method: [captureZones](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZones.md)<br>Next method: [getHtmlPageCopilot](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/getHtmlPageCopilot.md)<br>

