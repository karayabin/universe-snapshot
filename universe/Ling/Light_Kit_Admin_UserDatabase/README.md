Light_Kit_Admin_UserDatabase
===========
2020-06-25


This is a work in progress until version 1.


An integration of [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) in  [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin). 


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserDatabase
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserDatabase api](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_user_database:
    instance: Ling\Light_Kit_Admin_UserDatabase\Service\LightKitAdminUserDatabaseService
    methods:
        setContainer:
            container: @container()
            
# --------------------------------------
# hooks
# --------------------------------------
$bmenu.methods_collection:
    -
        method: addDirectInjector
        args:
            menuType: admin_main_menu
            injector: @service(kit_admin_user_database)

$chloroform_extension.methods_collection:
    -
        method: registerTableListConfigurationHandler
        args:
            plugin: Light_Kit_Admin_UserDatabase
            handler:
                instance: Ling\Light_Kit_Admin\ChloroformExtension\LightKitAdminTableListConfigurationHandler
                methods:
                    setConfigurationFile:
                        files:
                            - ${app_dir}/config/data/Light_Kit_Admin_UserDatabase/Light_ChloroformExtension/generated/lka_userdata.table_list.byml
#                            - ${app_dir}/config/data/Light_Kit_Admin_UserDatabase/Light_ChloroformExtension/table_list.byml


$controller_hub.methods_collection:
    -
        method: registerHandler
        args:
            plugin: Light_Kit_Admin_UserDatabase
            handler:
                instance: Ling\Light_Kit_Admin_UserDatabase\ControllerHub\LightKitAdminUserDatabaseControllerHubHandler
                methods:
                    setContainer:
                        container: @container()


$crud.methods_collection:
    -
        method: registerHandler
        args:
            pluginId: Light_Kit_Admin_UserDatabase
            handler:
                instance: Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler


$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_Kit_Admin_UserDatabase/Light_EasyRoute/lka_userdatabase_routes.byml


$kit_admin.methods_collection:
    -
        method: registerPlugin
        args:
            pluginName: Light_Kit_Admin_UserDatabase
            plugin:
                instance: Ling\Light_Kit_Admin_UserDatabase\LightKitAdminPlugin\LightKitAdminUserDatabaseLkaPlugin
                methods:
                    setOptionsFile:
                        file: ${app_dir}/config/data/Light_Kit_Admin_UserDatabase/Light_Kit_Admin/lka-options.byml



$micro_permission.methods_collection:
    -
        method: registerMicroPermissionsByFile
        args:
            file: ${app_dir}/config/data/Light_Kit_Admin_UserDatabase/Light_MicroPermission/lka_userdatabase-micro-permissions.byml

$plugin_installer.methods_collection:
    -
        method: registerPlugin
        args:
            plugin: Light_Kit_Admin_UserDatabase
            installer: @service(kit_admin_user_database)

$realform.methods_collection:
    -
        method: registerFormHandler
        args:
            plugin: Light_Kit_Admin_UserDatabase
            handler:
                instance: Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler
                methods:
                    setConfDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin_UserDatabase/Light_Realform


$realist.methods_collection:
    -
        method: registerListRenderer
        args:
            identifier: Light_Kit_Admin_UserDatabase
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer
    -
        method: registerRealistRowsRenderer
        args:
            identifier: Light_Kit_Admin_UserDatabase
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer
    -
        method: registerActionHandler
        args:
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ActionHandler\LightKitAdminRealistActionHandler
    -
        method: registerListActionHandler
        args:
            plugin: Light_Kit_Admin_UserDatabase
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler
    -
        method: registerListGeneralActionHandler
        args:
            plugin: Light_Kit_Admin_UserDatabase
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler


$upload_gems.methods_collection:
    -
        method: register
        args:
            plugin: Light_Kit_Admin_UserDatabase









```



History Log
=============

- 0.1.0 -- 2020-06-25

    - initial commit