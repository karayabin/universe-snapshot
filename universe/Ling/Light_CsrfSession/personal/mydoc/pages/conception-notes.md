Light_CsrfSession conception notes
===================
2019-11-26


Basically, the idea is to create a token per user session (when the user logs in), and destroy it only
when she logs out.




After trying [Light_Csrf](https://github.com/lingtalfi/Light_Csrf) and [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple),
I've come to the conclusion that I want an even simpler solution.


What's the problem with Light_CsrfSimple?

Csrf simple works by creating a token on every page.

That was fine until today, where I had to put a form into an iframe.
The iframe is not detected as an ajax page, and thus it naturally generates a new token value.
That's a problem, because on the page I was working on, both the page and the iframe needed a csrf token check,
and with the iframe, it makes one of the two check to fail, even with a legit user.

I could work this out by using tricks, but I don't like tricks as I'm older now, I like simplicity.
So, I thought I would have only one token for every user csrf transaction until she logs out.

That of course comes with a less secure system, where the attacker now just has to guess one csrf token to break in.
But can he guess that token?

If his technique is to send an email and hope that you click on it, he probably will not.

Now I don't know if it's feasible (and to be honest, I'm too lazy to try it), but if the link in the email
redirects to a page where he can trigger some javascript code and try urls inside a loop, then he could try to brute 
force the csrf token; but again that's only IF it's feasible, which I'm not sure: maybe there are some CORS rules he cannot
pass?

Anyway if he can, what he has is a larger time window than with the CsrfSimple technique.

Therefore I recommend that if you use csrf session (this plugin), you make sure the user session is destroyed when
she doesn't use her account anymore. We can always use cookie cache to help the user reconnect, so that this is not painful for her
to log into her account.


Also, if the brute force was a real risk, we can also assume that once it happens I can always develop a plugin to detect
those kind of attacks, so, I'll take the risk for the improved simplicity that it brings to my apps.




Implementation idea
--------------

The implementation idea is quite simple:

- when the user logs in successfully, we create the csrf session token
- when she logs out, we destroy it
- during the time she's connected, we can use the getToken and isValid(token) methods to implement csrf security, just as with the csrf simple plugin,
        but this is even simpler since we have only one token (i.e. no old/new slot, just one single slot)



Simplicity benefits
------------------

The simplicity benefits yielded by this new plugin compared to the older brother csrf simple are:

- only one slot, so using the isValid method is a no-brainer
- we don't need to check whether the page is ajax or not to regenerate a token


This plugin relies on php session, so I would say the weak point of that is the php session itself.
Here is a [discussion about session risks on stack overflow](https://stackoverflow.com/questions/3224286/what-are-the-risks-of-php-sessions).

Here is my two cents to help [protecting php session](https://github.com/lingtalfi/TheBar/blob/master/discussions/php-session-security.md).



Security recommendation
---------------

Now it seems obvious, but I forgot to mention it, and this also applies to any csrf protection solution:

your app is only protected against csrf if ALL your important actions are protected against csrf.

By important, I mean an action that changes the database of the app basically, or one that calls for a third party service important action.

In other words, don't ever use a simple (csrf vulnerable) http link to trigger an important action, such as:

- <a href="/user/pages?action=create_new">Create a new page</a> 

That would defeat the whole purpose of implementing the csrf protection.

So all your important actions handlers (forms and ajax services or php scripts) should require the csrf token.





