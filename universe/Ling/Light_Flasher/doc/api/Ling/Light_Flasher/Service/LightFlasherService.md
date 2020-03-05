[Back to the Ling/Light_Flasher api](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher.md)



The LightFlasherService class
================
2019-08-07 --> 2019-11-29






Introduction
============

The LightFlasher class.

The idea of a flasher is to store a message in the session, display it on the next page, and remove it from the session
as soon as it has been displayed.


A concrete use case
---------
Them most popular case case where a flasher might be useful is probably the case of a form with redirection.
Imagine a form, and for some reason when the form is successful you want to redirect to the user to the same page.

Why? Because this way you avoid the problem of: "what happens if the user refreshes the page again, will it post the data again".

So, your form, if successful, redirects the user on the same page.
The only problem with this technique is that now: how do you display the congrats message to the user?

That's where a flasher shines.
Basically, just before redirecting, you add a flash (this will add a message in the session).
And after the redirect, you convert any existing flash into a form notification.
That's it, in a nutshell.


Identifiers
-------
Now because there could be multiple flashes uses per page (who knows), this flash system uses an id key.
In other words, each message is bound to an id, and to retrieve the message one must provide the corresponding id.
That's all.



A message is an array
-----------------
An important concept with flash is that a flash is a notification, and so it's an array composed of two elements:

- type
- message

For the type, in this class we use the "wise" notation.
With:

- w: warning
- i: info
- s: success
- e: error

Note: you can use the [WiseTool](https://github.com/lingtalfi/WiseTool) to translate the wise notation to another.



Class synopsis
==============


class <span class="pl-k">LightFlasherService</span>  {

- Properties
    - protected string [$sessionName](#property-sessionName) ;
    - protected array [$flashes](#property-flashes) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/__construct.md)() : void
    - public [addFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/addFlash.md)(string $id, string $message, ?string $wiseType = s) : void
    - public [hasFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/hasFlash.md)(string $id) : bool
    - public [getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/getFlash.md)(string $id, ?bool $removeFlash = true) : array | false
    - private [startPhpSession](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/startPhpSession.md)() : void

}




Properties
=============

- <span id="property-sessionName"><b>sessionName</b></span>

    This property holds the sessionName for this instance.
    
    

- <span id="property-flashes"><b>flashes</b></span>

    This property holds the flashes for this instance.
    It's an array of id => flash notification.
    
    



Methods
==============

- [LightFlasherService::__construct](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/__construct.md) &ndash; Builds the LightFlasher instance.
- [LightFlasherService::addFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/addFlash.md) &ndash; Adds a flash to the flasher.
- [LightFlasherService::hasFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/hasFlash.md) &ndash; Returns whether the given $id is bound to a flash at the moment.
- [LightFlasherService::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/getFlash.md) &ndash; Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.
- [LightFlasherService::startPhpSession](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService/startPhpSession.md) &ndash; Starts the php session if it's not already started.





Location
=============
Ling\Light_Flasher\Service\LightFlasherService<br>
See the source code of [Ling\Light_Flasher\Service\LightFlasherService](https://github.com/lingtalfi/Light_Flasher/blob/master/Service/LightFlasherService.php)



