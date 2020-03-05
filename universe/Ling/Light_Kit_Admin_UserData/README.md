Light_Kit_Admin_UserData
===========
2020-02-28 -> 2020-03-05



This plugin hooks the [Light_UserData](https://github.com/lingtalfi/Light_UserData) plugin into the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) environment.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserData
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- kit_admin_user_data (returns a LightKitAdminUserDataService instance)


Here is an example of the service configuration:

```yaml
kit_admin_user_data:
    instance: Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService
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
            injector: @service(kit_admin_user_data)

$chloroform_extension.methods_collection:
    -
        method: registerTableListConfigurationHandler
        args:
            plugin: Light_Kit_Admin_UserData
            handler:
                instance: Ling\Light_Kit_Admin\ChloroformExtension\LightKitAdminTableListConfigurationHandler
                methods:
                    setConfigurationFile:
                        files:
                            - ${app_dir}/config/data/Light_Kit_Admin_UserData/Light_ChloroformExtension/generated/lka_userdata.table_list.byml
#                            - ${app_dir}/config/data/Light_Kit_Admin_UserData/Light_ChloroformExtension/table_list.byml


$controller_hub.methods_collection:
    -
        method: registerHandler
        args:
            plugin: Light_Kit_Admin_UserData
            handler:
                instance: Ling\Light_Kit_Admin_UserData\ControllerHub\LightKitAdminUserDataControllerHubHandler
                methods:
                    setContainer:
                        container: @container()


$crud.methods_collection:
    -
        method: registerHandler
        args:
            pluginId: Light_Kit_Admin_UserData
            handler:
                instance: Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler


$kit_admin.methods_collection:
    -
        method: registerPlugin
        args:
            pluginName: Light_Kit_Admin_UserData
            plugin:
                instance: Ling\Light_Kit_Admin_UserData\LightKitAdminPlugin\LightKitAdminUserDataLkaPlugin
                methods:
                    setOptionsFile:
                        file: ${app_dir}/config/data/Light_Kit_Admin_UserData/Light_Kit_Admin/lka-options.byml



$micro_permission.methods_collection:
    -
        method: registerMicroPermissionsByFile
        args:
            file: ${app_dir}/config/data/Light_Kit_Admin_UserData/Light_MicroPermission/lka_userdata-micro-permissions.byml

$plugin_installer.methods_collection:
    -
        method: registerPlugin
        args:
            plugin: Light_Kit_Admin_UserData
            installer: @service(kit_admin_user_data)

$realform.methods_collection:
    -
        method: registerFormHandler
        args:
            plugin: Light_Kit_Admin_UserData
            handler:
                instance: Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler
                methods:
                    setConfDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin_UserData/Light_Realform


$realist.methods_collection:
    -
        method: registerListRenderer
        args:
            identifier: Light_Kit_Admin_UserData
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer
    -
        method: registerRealistRowsRenderer
        args:
            identifier: Light_Kit_Admin_UserData
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
            plugin: Light_Kit_Admin_UserData
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler
    -
        method: registerListGeneralActionHandler
        args:
            plugin: Light_Kit_Admin_UserData
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler
```



History Log
=============

- 1.1.0 -- 2020-03-05

    - change kit admin generator config to take into account user row restriction
    
- 1.0.0 -- 2020-02-28

    - initial commit