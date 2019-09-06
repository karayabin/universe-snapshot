Rights
=============
2019-08-08




If you are using the rights system described here: [https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#its-all-about-rights](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/conception.md#its-all-about-rights),
then we recommend that all the rights provided by a plugin should start with the plugin name followed by a dot.


For instance, if a plugin's name is **Light_My_Plugin**, we recommend that all rights originating from that plugin start with **Light_My_Plugin.**, like:

- Light_My_Plugin.*
- Light_My_Plugin.edit
- Light_My_Plugin.admin.create_user


Also, we recommend that every plugin creates at least the asterisk right (i.e. Light_My_Plugin.* in the above example), unless the plugin is totally public
and doesn't need right restriction at all.







