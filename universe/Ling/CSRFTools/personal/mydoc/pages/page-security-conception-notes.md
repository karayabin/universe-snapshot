Page security conception notes
========================
2019-09-09



So this morning I was about to use my CSRF protector tool to protect an ajax request in the application I'm currently working on,
but I couldn't stop the voice in my head saying: "The current CSRF Protector is not safe yet...".

And so, I had to think about the whole CSRF process again.


So what's the problem with the current CSRF protector?


Let's redo a simple synopsis where the user connects to a form.
Let's say that the form is protected against CSRF attacks, using the CSRF protector.

So what happens is:

- the user loads the php page
- the CSRF protector generates a token for the form, and stores it in the php session (that's part of the problem as we will see later)
- the form is displayed, with the the token value hidden in it
- the user posts the form
- the php script validates the form, using the CSRF protector, which compares the given token with the one stored in the session
- since both token values match, the form is validated (and the php script resumes with processing the form...)  


In this case, because the page is static we can delete the token after use, or if the action attribute of the form points to the 
same page that displays the form, then the token will be recreated automatically (i.e. we don't even need to delete it). It's a one shot token.
And so I consider this safe enough, because now, when the user clicks the attacker's link, the token is gone anyway,
so the form validation will always fail.  


But with ajax based services, this is different.
In a interactive gui, the user generally doesn't refresh the page, yet different ajax requests to the same service are performed.

A good example of that is an admin table which data comes from an ajax service.
The gui will request the rows of the table from an ajax service, and so as the user filters the rows, sorts them, heads to another page, ...,
more ajax requests are performed, but the php page is still not reloaded.

So with system we end up with only one token shared for multiple ajax requests.
The problem is that if we were to delete the token in the ajax script (providing the rows), then subsequent ajax requests wouldn't work anymore.

And if we don't delete the token, then the attacker has a potential window opening: if he knows that a token exists, he can brute-force the token (hoping
that the user is still connected).

Although that's a small window, I couldn't live with it this morning.

So I designed a new system, which would reduce this problem drastically.

I call this the "page" security.


What's page security?
----------------------

It's a per page security.
I noticed that in my case, any token that I generate is done by the php script, in other words, it's generated statically.

Which means I can associate the generate tokens to a page: the current page being visited by the user.

I can do this because I know in advance which tokens are generated for a given page.

Also, I noticed that an user can't be on two pages at the same time.

Note: actually, he can, simply by opening two tabs in his browser. So, the technique below is a choice to make:
either you use the "page" security and the user will have failing csrf services (I might do that), or you 
don't use the "page" security and the user can browse your pages normally.


And so the "page" security idea is quite simple: whenever the user browses a page, at the very end of the script,
we call a clean routine which will basically remove all tokens that aren't the ones used on the current page.

And so now, for the attacker it gets much harder: first he must guess which page was visited last, then he must hope
that the user is still connected with that page open, and brute force that page during this time (and as soon as the user
browses another page, this window disappears for the attacker).


So again, the main problem that I see with this technique is that it takes out some from the usability of the application:
the user might experience issues if she opens multiple tabs in her browser, and each tab contains a csrf service.
So it's a personal decision: security over usability or the other way around.

   










