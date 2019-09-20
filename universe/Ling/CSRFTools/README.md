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
    - [Case #1: protection behind ajax](#case-1-protection-behind-ajax)
    - [Case #2a: form protection, createToken - IsValid](#case-2a-form-protection-createtoken---isvalid)
    - [Case #2b: form protection, isValid - createToken](#case-2b-form-protection-isvalid---createtoken)
- [Quick recap on CSRF](#quick-recap-on-csrf)
    - [The attack example](#the-attack-example)
- [The defense against CSRF](#the-defense-against-csrf)
- [A quick word about concurrent CSRF tokens](#a-quick-word-about-concurrent-csrf-tokens)
- [The CSRF tutorial](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/csrf-tutorial.md)
- [Page security conception notes](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md)




How to
=========

I provide you with the **CSRFProtector** class.

This class basically provides you with two main methods:

- one for creating a random token
- one for validating the token against a value


The simplest use case I can think of is securing an ajax page.

And the perhaps most popular case I can think of is securing a form.


In this document, I will go straight into the examples, so that one can just grab the idea and implement it in no time.

But before you jump into it, I recommend to read the [CSRFProtector class description](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md) which explains in greater details
how the class works and should be used.



Case #1: protection behind ajax
------------


In this case, we have two php scripts:

- A.php
- B.php

**A.php** is the script the main script, it creates the token.
Its code is the following:


```php
<?php


use Ling\CSRFTools\CSRFProtector;



$tokenValue = CSRFProtector::inst()->createToken("my_token");

```

And then there is the **B.php** script, which is called presumably from **A.php** via ajax.
For instance let's imagine that **A.php** transfer the token value via **$_GET['token']**.

Here is what **B.php** would look like:


```php
<?php

use Ling\CSRFTools\CSRFProtector;


$tokenValue = $_GET['token'];


$protector = CSRFProtector::inst();
if (true === $protector->isValid("my_token", $tokenValue, true)) {
    a("execute a secure action");
}

```

And that's it.
The secure action from **B.php** will only be executed if the client who called **B.php** passed the token created with **A.php**.


Now the second case is the form.

With forms, there are mainly two designs:

- createToken/isValid, in this design, the **createToken** method is called **BEFORE** the **isValid** method
- isValid/createToken, in this design, the **createToken** method is called **AFTER** the **isValid** method


Case #2a: form protection, createToken - IsValid
------------


```php
<?php

use Ling\CSRFTools\CSRFProtector;






$token = CSRFProtector::inst()->createToken("my_token");




if (array_key_exists("token", $_POST)) {
    if (CSRFProtector::inst()->isValid("my_token", $_POST['token'])) {
        a("Yes");
    } else {
        a("Nope");
    }
}





?>
<form action="" method="post">
    <input type="text" name="token" value="<?php echo $token; ?>"/>
    <input type="submit" value="Submit"/>
</form>

}
```

Case #2b: form protection, isValid - createToken
------------

Notice that we validate against the new slot this time (the third argument of the **isValid** method).
For more details, see the [CSRFProtector class description](https://github.com/lingtalfi/CSRFTools/blob/master/doc/api/Ling/CSRFTools/CSRFProtector.md).


```php
<?php

use Ling\CSRFTools\CSRFProtector;





if (array_key_exists("token", $_POST)) {
    if (CSRFProtector::inst()->isValid("my_token", $_POST['token'], true)) {
        a("Yes");
    } else {
        a("Nope");
    }
}


$token = CSRFProtector::inst()->createToken("my_token");









?>
<form action="" method="post">
    <input type="text" name="token" value="<?php echo $token; ?>"/>
    <input type="submit" value="Submit"/>
</form>



```

 






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

- 1.5.1 -- 2019-09-20

    - fix CSRFProtector->deletePageUnusedTokens removing tokens of the actual page in some cases (assuming page system on)
    
- 1.5.0 -- 2019-09-20

    - update CSRFProtector->dump method

- 1.4.0 -- 2019-09-20

    - update CSRFProtector can now be used as a regular class (i.e. not only as a singleton)

- 1.3.0 -- 2019-09-20

    - add the idea of symbolic token
    - add CSRFProtector->hasToken method
    
- 1.2.1 -- 2019-09-09

    - fix doc link
    
- 1.2.0 -- 2019-09-09

    - added pages security system
    
- 1.1.1 -- 2019-08-05

    - update documentation
    
- 1.1.0 -- 2019-08-05

    - update nomenclature: tokenName, tokenValue are now used
    - change CSRFProtector->isValid arguments order and names 
    - add CSRFProtector->deleteToken method 
    - clarified documentation 
    
- 1.0.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-04-11

    - initial commit