[Back to the Ling/Kit api](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit.md)<br>
[Back to the Ling\Kit\PageRenderer\KitPageRenderer class](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md)


KitPageRenderer::captureZones
================



KitPageRenderer::captureZones — Captures the zones defined in the configuration and stores them temporarily.




Description
================


protected [KitPageRenderer::captureZones](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZones.md)() : void




Captures the zones defined in the configuration and stores them temporarily.

The goal being:

- to let widgets of the zones configure the Copilot object (so that the layout, which contains the top and bottom, can be displayed properly).
- then inject the captured zones' html into the layout




Parameters
================

This method has no parameters.


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [KitPageRenderer::captureZones](https://github.com/lingtalfi/Kit/blob/master/PageRenderer/KitPageRenderer.php#L336-L342)


See Also
================

The [KitPageRenderer](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer.md) class.

Previous method: [printZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/printZone.md)<br>Next method: [captureZone](https://github.com/lingtalfi/Kit/blob/master/doc/api/Ling/Kit/PageRenderer/KitPageRenderer/captureZone.md)<br>

