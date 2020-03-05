Efficiency tips
==============
2020-02-24



Here are some efficiency tips that I believe a light developer should be aware of.



Generating DB classes
---------

If you want to generate an API based on the database schema, consider using the [breeze generator](https://github.com/lingtalfi/Light_BreezeGenerator).


```php
// In your service conf, assign luda to /myapp/config/data/Light_UserData/Light_BreezeGenerator/luda.byml
az($container->get("breeze_generator")->generate("luda"));
``` 




Light_Kit_Admin
---------

If you are developing in the **Light_Kit_Admin** environment, make sure to read the [lka debug tips](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/how-to-debug.md).


### The auto-admin


If you are developing a plugin for Light_Kit_Admin, you can generate the admin related things: menus, controllers, configuration files including kit pages, lists, forms, and more,
just by using the [Light_Kit_Admin_Generator_](https://github.com/lingtalfi/Light_Kit_Admin_Generator#usage-example).

A concrete example of a configuration file for a **Light_Kit_Admin** plugin is the one in **Light_Kit_Admin_UserData** (which is the first **Light_Kit_Admin** plugin made). 



 