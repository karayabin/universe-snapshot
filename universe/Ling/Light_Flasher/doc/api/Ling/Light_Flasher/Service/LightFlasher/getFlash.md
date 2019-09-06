[Back to the Ling/Light_Flasher api](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher.md)<br>
[Back to the Ling\Light_Flasher\Service\LightFlasher class](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher.md)


LightFlasher::getFlash
================



LightFlasher::getFlash — Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.




Description
================


public [LightFlasher::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/getFlash.md)(string $id, bool $removeFlash = true) : array | false




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

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightFlasher::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/Service/LightFlasher.php#L142-L154)


See Also
================

The [LightFlasher](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher.md) class.

Previous method: [hasFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/hasFlash.md)<br>Next method: [startPhpSession](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/startPhpSession.md)<br>

