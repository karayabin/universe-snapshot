Light_Kit_Admin generator
================
2019-10-24


The light kit admin generator (lka generator) is a generator for the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin.

It extends the [Light_RealGenerator](https://github.com/lingtalfi/Light_RealGenerator/) service, so basically it will generate configuration files for 
the [realist](https://github.com/lingtalfi/Light_Realist) and [realform](https://github.com/lingtalfi/Light_Realform) plugins.

But, what's more, is that it will also generate the configuration for the menus, controllers and kit page configuration 
in Light_Kit_Admin.

Note: at first I also wanted to generate the routes, but then I realized that I preferred to use the [controller hub](https://github.com/lingtalfi/Light_ControllerHub) plugin to have only 
one route (I don't like to create too many routes for performance reasons).   


To configure this generator, we re-use and extend the [Light_RealGenerator configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md),
and we add two more sections: **menu** and **controller**.


See the [configuration example](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md) for more info.


Note: although the menus items are generated, they are not automatically hooked up in your application.

You need to hook them yourself.

**Light_Kit_Admin** uses the [Light_BMenu](https://github.com/lingtalfi/Light_BMenu) plugin for the menus.

Here is a quick [example of menu file with Light_BMenu](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/menu-file-example.md)



To register the menu, we use the **registerHost** method provided by the Light_BMenu service.
 
Here is how it's done in **Light_Kit_Admin.byml** (the light kit admin service configuration file in **/config/services/**) (just the interesting lines are shown):


```yaml
$bmenu.methods_collection:
    -
        method: registerHost
        args:
            menu_type: main_menu
            host:
                instance: Ling\Light_Kit_Admin\BMenu\LightKitAdminBMenuHost
                methods:
                    setContainer:
                        container: @container()
                    setBaseDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin/bmenu
                    setMenuStructureId:
                        id: lka_mainmenu_1
                    setDefaultItemsParentPath:
                        path: plugins
```




