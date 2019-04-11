CSRFTools
===========
2019-04-11



Some tools to work around the CSRF security problem.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/CSRFTools
```

Or just download it and place it where you want otherwise.






Summary
===========
- [CSRFTools api](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to](#how-to)
- [Quick recap on CSRF](#quick-recap-on-csrf)
    - [The attack example](#the-attack-example)
- [The defense against CSRF](#the-defense-against-csrf)
- [A quick word about concurrent CSRF tokens](#a-quick-word-about-concurrent-csrf-tokens)




How to
=========

I provide you with the **CSRFProtector** class.

There are actually two different ways to use the CSRFProtector, depending on whether the validation
and the creation of the token occur on the same page or on different pages.


Let's see an example for both cases.



Case #1: the creation of the token and the validation occur on the same page
------------

This is the case with forms.

Here is an example.


```php
<?php


$token = CSRFProtector::inst()->createToken();



if (array_key_exists("token", $_POST)) {
    $formToken = $_POST['token'];
    if (CSRFProtector::inst()->isValid($formToken, null, true)) {
        a("nice");
    } else {
        a("looser");
    }
}



?>
<form action="" method="post">
    <input type="text" name="token" value="<?php echo $token; ?>"/>
    <input type="submit" value="Submit"/>
</form>
```


The important bit to understand is the third argument of the **isValid** method.

This argument is the **validatesOnSamePage** parameter, and its default value is false.

But in the case of a form, both the **isValid** method and the **createToken** method are called
on the same page, so that's why we set this argument to true.


Another important thing to be aware of is to call the **createToken** method **BEFORE** the
**isValid** method. 
However in general that's what you would do naturally, I suppose.


So if you execute this code in a browser, the first time you post the form, you'll get a "nice" message, 
and if you reload the page after that, you'll get the "looser" message.

That's because the token only works once.



Case #2: the creation of the token and the validation occurs on two different pages
------------


This is the case for links that triggers some actions.

Here is an example.

It involves two pages: **page1.php** and **page2.php**.

The creation of the token occurs on page1, while the validation occurs on page2.

The code of page 1 looks like this:


```php
<?php

$token = CSRFProtector::inst()->createToken();

?>
<a href="/page2.php?token=<?php echo $token; ?>">Click me (<?php echo $token; ?>)</a>

```

And the code on page 2 looks like this:

```php
<?php

$token = $_GET['token'];

if (CSRFProtector::inst()->isValid($token)) {
    a("nice");
} else {
    a("looser");
}
```

Notice that this time, we don't specify extra arguments for the **isValid** method (we use the default
value of false for the **validatesOnSamePage** argument).


So if you execute this code in a browser, and open **page 1**, and click on the link, you'll land on **page 2**
with the message "nice". Then if you refresh **page 2** you'll get the "looser" message.




Now you know everything you need to know.

Enjoy :)
 






Quick recap on CSRF
============

CSRF (Cross site request forgery) is an attack exploiting the fact that cookies are sent
with every http request (by design).

The Csrf attack assumes that the victim is logged in, and tries to trick the user into
sending an http request.

It usually does so by sending a link via an email, or by forcing the user to open 
an image (via a malicious email or a malicious website) which executes the attack.


What's vulnerable to Csrf is basically every request (GET or POST) that changes 
the user account's state. Typically, if you have a bank application, a request 
that would transfer found would be a target for a CSRF attack.


The attack example
-----------

The attack is quite simple.
Imagine that you have a blog website with users who can create and delete posts.

To delete a post, the user has to be logged in, and she clicks the "Delete my account" ajax link,
which actually posts a form to this url:

```url
https://my_blog_site.com/delete_account.php
```

If the user clicks the link, the application check that the user is logged in, and if so, accepts the request
for the logged in user (effectively deleting the user account).



If we are the attacker, we just need to know that target, and the type of request (GET or POST).
If the target requires a GET request, then we send an email with this link inside:


```url
https://my_blog_site.com/delete_account.php
```

And of course, we can be trickier than that and hide the link inside an image, or those kinds of things, you get the idea...

If the target requires a POST request, we need to force to visit a website page of ours, which basically would contain
an invisible and autoposted (via javascript) form which action would be the same target url. 

In both cases (GET or POST), the browser will trigger the request on the behalf of the user (because she either
clicked on a link, or visited a web page), and because of http works, cookies will be sent along with the request.


Note that the attacker doesn't know the content of your cookies, he just triggers a request on your behalf
(so basically from the http protocol's perspective, YOU are the one sending the cookies).


Assuming that the victim user is logged in at the moment we perform the attack, the action will be executed
(and the user account would be deleted).

That's one of the reason why websites tend to disconnect users automatically after short periods of time. 


Now there are plenty of videos on youtube, this was just a quick recap.



The defense against CSRF
===============

To defend against CSRF attacks, one of the common technique is to pass a "use now or die" token along with any important request
(i.e. when it will change an user account's state, generally).


So, if I take my previous target url again:

```url
https://my_blog_site.com/delete_account.php
```

A protected version would be this:

```url
https://my_blog_site.com/delete_account.php?token=pzfoupzoufpu4560d
```


The main idea is that the given token only works if used immediately, so that even if the attacker tricks
you into resending the same url, it won't work because the token has become stale.

The implementation trick is basically to regenerate the token on every page, and store the previous token
in the session. So that every time you open a page, you have one (and one only) opportunity to match
the previous token (which then gets erased on the next page call).

And this is basically what the CSRFRequest object of this library does for us.





A quick word about concurrent CSRF tokens
===============

Sometimes you want to generate multiple CSRF tokens on the same page.
Imagine for instance that in the back end of your application, users can click on those ajax links:

- delete item 1
- delete item 2


You would need to create two different tokens for that, unless you refresh the page after each click,
but a true ajax link doesn't have to refresh the whole page.

Therefore, I introduced the concept of identifier in the CSRFProtector class.
It's just an identifier that you set if you know by advance that there will be many CSRF items
in your page. 

It's like a specific name associated with a token.




History Log
=============

- 1.0.0 -- 2019-04-11

    - initial commit