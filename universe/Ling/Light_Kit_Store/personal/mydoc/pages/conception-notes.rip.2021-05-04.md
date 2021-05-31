Light_Kit_Store, conception notes
================
2021-04-06 -> 2021-05-03


The main idea of this plugin is to provide a store, where "buyers" meet service providers' **light kit** products.


The product types so far are:

- website






Database schema
--------
2021-04-06 -> 2021-05-03



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




Store overview
========
2021-05-03


Here is the basic synopsis that I want to implement in regard to the store.

First, third-party author register their items into the store.

Then, websites, such as lka gui fetch the items from the store and display them (how they want) to the user.


The user selects an item, and wants click some install button to install it.

Some items might be free, some other might not.

If the selected item is a paid one, the user goes to a payment process, which basically is handled by the **store website** (which 
is the website that hosts this plugin and provides the items database).

Upon payment confirmation, the **store website** then starts the **item installation process**.

For a free item, the **item installation process** starts directly when the user clicks the **install** button.



The item registration process
---------
2021-05-03

Third-party authors register their items to the **store website** via a simple [alcp request](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) (basically, a $_POST request which returns
a alcp response).


The registration process is basically the same regardless of the item type (website, page, widget, others?...), and it goes like this:

- the third-party author sends his/her planet as a zip file to the **store website**.
- the **store website** responds either:
    - with a successful response: the item has been registered (although maybe awaiting moderation, that's specified in the alcp response, depending on this plugin configuration)
    - with an explicit error message if something failed


Note that the planet shall be able to install the item, by providing a handler class that implements our **LightKitStoreItemInstallerInterface** interface.





The item installation process
---------
2021-05-03

The main idea with the **item installation process** it to install the item, from the **store website** to the target application (aka host application).

Once the **store website** validates the installation of the item (either after a successful payment for paid items,
or directly for free items), then the **store website** makes the zip file of the item available.

On the **target application** side, we unzip the item, and call the **install item handler** (which implements **LightKitStoreItemInstallerInterface**)
to install the item.

If something fails during this process, the user is redirected either to the third-party plugin author, or to whichever culprit is responsible
for the error. In other words, we ensure a good service for the user (as he might have paid the item), providing him/her with
the solution to solve the problem if this unfortunately happens (which shouldn't).



 











