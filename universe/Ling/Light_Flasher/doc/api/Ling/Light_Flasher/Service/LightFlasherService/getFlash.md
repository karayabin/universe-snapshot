[Back to the Ling/Light_Flasher api](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher.md)<br>
[Back to the Ling\Light_Flasher\Service\LightFlasherService class](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService.md)


LightFlasherService::getFlash
================



LightFlasherService::getFlash — Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.




Description
================


public [LightFlasherService::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/getFlash.md)(string $id, ?bool $removeFlash = true) : array | false




Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.

If the flash exists, it will also be removed from the session, unless the $removeFlash flag is set to false.



A concrete use case of when the removeFlash flag needs to be false (developer anecdote)
---------------
I was creating this admin backend, and the user didn't have the right to access a page, so I created a flash
telling her which specific right she was missing, and then redirected her to that forbidden page.
From there, the flash was available, and so I could tell her exactly which right she was missing.
However, I didn't want that if she refreshed the page, the message would be lost, so I used a persistent flash
message in this case.




Parameters
================


- id

    

- removeFlash

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightFlasherService::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/Service/LightFlasherService.php#L143-L155)


See Also
================

The [LightFlasherService](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService.md) class.

Previous method: [hasFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/hasFlash.md)<br>Next method: [startPhpSession](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/startPhpSession.md)<br>

