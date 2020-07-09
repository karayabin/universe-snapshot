Light_Kit_Admin_UserDatabase, conception notes
===========
2020-03-05


This is a light kit admin plugin.

This plugin makes the [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)
accessible via gui in the [light kit admin](https://github.com/lingtalfi/Light_Kit_Admin) environment for the admin.

It basically just creates the pages that allow administration of the light userdatabase plugin.



We don't create any new permissions, we just reuse the one created by kit admin:

- Light_Kit_Admin.user (cannot interact with our pages)
- Light_Kit_Admin.admin (which can do everything with our pages) 

