Light_MailStats, conception notes
================
2021-06-15 -> 2021-06-25


Collecting mail stats.

Our stats are stored in a database by default.


We can collect stats either when the user opens the mail, or when he clicks a link in a mail.



How does it work
--------
2021-06-16 -> 2021-06-18


First, you create **trackers**.

A **tracker** has the following properties:

- **group**
- **name**
- **url** (to redirect to)
- **date_sent** (the time the tracker was sent via an email)

The **group** and **name** are both arbitrary strings that you choose, they let you organize your stats.

For instance, tracker #1 has **group** "campaign1" and name "segment1".

The **url** is where you want to redirect the user once the stats is collected.




You then place the **tracker** in your email, and make sure that the **tracker** hits our [redirect service](#the-redirect-service).

Don't forget to pass the **tracker id** to our redirect service, so that we can collect the stat and redirect the user for you.

The **tracker id** should be passed with the **tid** parameter via GET. 

The **date_sent** property allow us to keep track of user's reactivity to emails.


At this point, our job is done.

Note:

- we don't handle the sending of the email
- we don't handle the viewing of the stats
- we just collect the stats in a database, for you to explore





The redirect service
-------
2021-06-15 -> 2021-06-25


We provide a **redirect service**, which is an [alcp service](https://github.com/lingtalfi/TheBar/blob/master/discussions/alcp-service.md).

When our **redirect service** is hit, we collect the raw information available to us:


- date time (i.e. 2021-06-16 07:37:55)
- host (from $_SERVER)
- user agent (from $_SERVER)
- accept language (from $_SERVER)
- remote address (aka ip) (from $_SERVER)


Note: you might want to adapt this raw information to make it more presentable for the view, but that's out of our scope.


Once the raw information is collected, we redirect the user to whichever url is written in the **tracker**.


If the **tracker id** (tid) is not provided (via GET), our **redirect service** will display a plain error message and return one of the following status code:

- 404. Not Found





Different forms of tracking
--------
2021-06-16



The tracking can be done in different ways:

- a tiny image, invisible for the human eye. When the mail client opens the mail, it opens the image url (which points to our redirect service)
- a regular html link that points to our redirect service



Some mail clients may be aware of the tiny image technique and won't allow it, so it's not 100% reliable, but generally gives good approximation.



The click open naming convention 
---------
2021-06-18 -> 2021-06-25


Trackers are organized by group/name pair.


I'm currently trying this scheme on the name:


- $trackerType-$trackerIdentifier


With:

- $trackerType: one of:
    - click  (html link)
    - open   (invisible image)
- $trackerIdentifier: arbitrary string in [snake case](https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#snakecase)


This is called the **click open naming convention**.




Logging
---------
2021-06-25


Our planet doesn't use a log channel of its own, but it rather uses the generic "error" channel, 
as described in the [error logging convention](https://github.com/lingtalfi/TheBar/blob/master/discussions/error-logging-convention.md) document.

Under the hood, we use the [Ling.Light_Logger planet](https://github.com/lingtalfi/Light_Logger) to handle our log system.








