Light_MiniTrustChallenger, conception notes
================
2021-06-04


In the context where a client calls a service from a server, this mechanism helps check that the client is trusted by the server.


Disclaimer: this is not a very secure system, so I wouldn't recommend this for critical operations. That's subjective, but be aware of the
flaws of this tool, which are explained later in this document.


How does it work?
------
2021-06-04


The server first establishes a list of trusted clients.

The server also provides some actions that only the trusted clients can do, let's call those **secure actions**.

In order to trigger a **secure action** from the server, the client must provide a challenge (just a string), along with its request.

If the challenge succeeds, the server triggers the **secure action**.


### How does it work really?
2021-06-04


The client and the server both share a **context** and a **secret code**, which are the same on both sides, for instance:

- context: client_website_1
- secretCode: 540zeGIRf


Note: this gives the server the option to **re-use** the same context with multiple clients, if it so desires.

Note2: the context must not contain any dash, because it's a reserved character.


When the client wants to trigger a **secure action**, he must provide the **challenge string**.

The **challenge string** is created as following.


First, we add a dash and the **secret code** to the current timestamp, thus creating a string like:

- 1622797303-540zeGIRf


This string is then hashed using an algorithm (md5 by default), which produces the **encrypted challenge**, which looks like this:

- b684b0ed2695a6f30091f61cc5440863


Then to compute the final challenge string, we write the timestamp, followed by a dash, the **context**, a dash, and the **encrypted challenge** string:

- 1622797303-client_website_1-b684b0ed2695a6f30091f61cc5440863


Server side, the server will check that he obtain the same string with the same timestamp (for the given context), it will also check whether the
timestamp is fresh enough. By default, if the request is older than 5 seconds, it will not be accepted.


Note that this requires that the client and the server have their internal clock synchronized.



The main idea of this technique is that the basic user cannot guess what the secretCode is just by watching the http traffic.




Flaws, how do you hack it?
--------
2021-06-04

The way I see it, to hack it you need to know the code (540zeGIRf in the example above), which probably means you need to hack either
the server, or the client side.






