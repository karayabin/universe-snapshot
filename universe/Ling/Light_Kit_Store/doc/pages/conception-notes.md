Light_Kit_Store, conception notes
================
2021-05-04



A store where **website creators** can purchase [light kit](https://github.com/lingtalfi/Light_Kit) products.



- [Overview]()
- [The front end]()
- [The back api]()
- [The database schema explained]()




Overview
=========
2021-05-04


In the **light kit** conception, a website is composed of different pages, each of which containing a certain number of widgets.


A **website creator** might create those elements himself/herself, but alternately he/she can download those elements from external places, to save some time.

This planet provides some essential components to create such a **store**, where a buyer can "purchase" those elements made by third-party authors.

In this document, the word purchase also applies to free items. It basically refers to the action of the buyer acquiring an item, which involves the creation
of an invoice (a proof of the acquiring), and gives the buyer the right to rate the product later if he/she so desires.


There are two main parts to the store:

- [the front end](#the-front-end)
- [the back api](#the-back-api)


The items that one can purchase on the **store** are the following:

- website
- page
- widget




The front end
=======
2021-05-04


The **front end** is basically the buyer's gui.

The buyer can access his(/her) account, from where he can download the invoices for his purchases.

The buyer can also rate a product that he purchased.




The back api
===========
2021-05-04

The **back api** is used by a **client website**.

The **client website** is responsible display the available items to potential buyers.

In order to do that, it will connect to the **store** via the **back api**, requesting for instance all the available **website items**, or **widget items**.


The **back api** is basically the api for any **client website**.


It can do the following (amongst other things):

- retrieve information about items from the database 
- handle the payment process (making sure that the payment was successful)
- provide the purchased item as a zip file
- install the zip file on the client website (our planet needs to be installed on the **client website** for that)
- register an item and store it in the database




The item registration process
---------
2021-05-04


Third-party authors register their items to the **store website** via a simple [alcp request](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) (basically, a $_POST request which returns
a alcp response).


The registration process is basically the same regardless of the item type (website, page, widget, others?...), and it goes like this:

- the third-party author sends his/her item as a zip file to the **store website**.
- the **store website** responds either:
  - with a successful response: the item has been registered (although maybe awaiting moderation, that's specified in the alcp response, depending on this plugin configuration)
  - with an explicit error message if something failed


There are some conventions that dictates the structure of the zip file representing the item.

When you extract the zip file, you should end up with only one directory named **item**, which contains the following:

- ?map: a directory to map files to the target application (same as the [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap) concept of the UniverseTool planet)
- info.byml: a [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing meta info about the item (at this point I don't know which info exactly) 
- ... some **specific files**, depending on the item type



The **specific files** are:

- For a website:
  - at this point in time I don't know yet
- For a page:
  - at this point in time I don't know yet
- For a widget:
  - at this point in time I don't know yet





The item installation process
---------
2021-05-04


Depending on which item type is being installed, our planet provide the appropriate method.

The **client website** should therefore download our planet in order to have those methods ready when the buyer purchases the item and wants to install
it on the **client website**.

So basically, as the buyer's payment has been confirmed, the **store** will send a confirmation of the payment to the **client website**, which will then
ask for the zip file representing the item.

Once the zip file is downloaded on the **client website** side, the **client website** uses our method to install the item and make it active on the **client website**.


If something fails during the installation process, the user is redirected either to whichever culprit is responsible
for the error (third-party author, client website, or store). 
In other words, we do our best to ensure a good service for the user (as he might have paid the item), providing him/her with
the solution to solve the problem if this unfortunately happens (which shouldn't).








The database schema explained
======
2021-05-04



I created the user table, with the idea that only a user who bought a product could rate it.

There is only an email field for the moment, the idea being that there might be a link on the product page where people
who want to rate click the link and then enter their email...

I chose that rather than a full user system with more information for now, because it was easier to implement.
Maybe in the future we shall move to a more full-featured user system.



In general the concept of provider/identifier is destined to the plugin provider.

The **provider** column is the actual [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet,
whereas the **identifier** is any string chosen by the provider that identifies the product.

The **identifier** string is then used by the provider plugin to actually install the product in the target application.
It shall be unique inside the provider context.

The **status** has to do with moderation. It's the idea that someday other people than myself may register items to the store.
When that happens, I still want to have my word to say in it. So:

- 0: the item has just been registered in the database, but is not available for the public yet
- 1: the item is active (i.e. I have validated it)
- 2: the item is inactive (i.e. for some reasons, I have disabled it)


Note: I believe that if I deny a proposed item, I would delete the entry directly, and therefore there is no dedicated status code
for "denied by the moderator". I can use status=**2** instead, if I want to temporarily put a hold on an item.







 











