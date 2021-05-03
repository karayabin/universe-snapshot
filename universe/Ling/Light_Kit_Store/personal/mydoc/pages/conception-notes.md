Light_Kit_Store, conception notes
================
2021-04-06


The main idea of this plugin is to provide a store, where "buyers" meet service providers' **light kit** products.


The product types so far are:

- website






Database schema
--------
2021-04-06



I created the user table, with the idea that only a user who bought a product could rate it.

There is only an email field for the moment, the idea being that there might be a link on the product page where people
who want to rate click the link and then enter their email...

I chose that rather than a full user system with more information for now, because it was easier to implement.
Maybe in the future we shall move to a more full-featured user system.



In general the concept of provider/identifier is destined to the plugin provider.

The **provider** column is the actual [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) of the planet,
whereas the **identifier** is any string chosen by the provider that identifies the product.

The **identifier** string is then used by the provider plugin to actually install the product in the target application.



