Light Csrf Simple Conception notes
======================
2019-11-06



This is a a simpler version of the [Light_Csrf](https://github.com/lingtalfi/Light_Csrf) service.


For a refresher on csrf, I would recommend reading the **Light_Csrf** conception notes,
and the [CsrfTools planet](https://github.com/lingtalfi/CSRFTools).



With **Light_Csrf**, the philosophy is to create a new token per action.

On some pages with lot of ajax actions, this can lead to the creation of multiple csrf tokens per page,
which lead to a relative complexity in terms of application management (for the developer).


Now the new approach I'm taking with **Light_CsrfSimple** is that basically only one csrf token is generated per page,
and that same token is re-used for all the actions on that page. 

The main benefit of this approach is that the job of the developer in regards to csrf protection implementation is now
much simpler. 

There is a (I estimate) small security level loss, as now if a malicious user were to find the csrf token, he could use
it not only for one action, but for all the actions on the page. 

This doesn't scare me because:

- first the malicious user still needs to find the csrf token 
- the csrf token is refreshed every time the legit user browse a new page (which should happen a lot)




How does it work?
---------------


The basic synopsis is this.

The service provides are three methods:

- regenerate (): void
- getToken (): string
- isValid (string token, bool oldSlot=false): bool


The **regenerate** method is fired on every non ajax page.
On ajax pages, no csrf token is created.

The **regenerate** method does the following:
- create a new csrf token and store it in the new slot
- move the previous (i.e. created on the previous page) csrf token to the old slot

Note: we need those two states because of how some form works (where the need to validate the token occurs AFTER a page refresh).
For ajax actions, we don't need the old state: we can compare the given token directly to the one stored in the new slot.


The **getToken** method gives access to the csrf token in the new slot 
The **isValid** method is used to check the user provided token against the one stored by the service.
        The comparison is done either against the csrf token in the new slot (by default) or against
        the csrf token in the old slot (if the oldSlot flag is set to true).  




