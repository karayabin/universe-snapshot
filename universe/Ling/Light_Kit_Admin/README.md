Light_Kit_Admin
===========
2019-10-24 -> 2020-07-07





An admin system with gui for the [Light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Bmenu](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/bmenu.md)
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/conception-notes.md)
    - [Error handling](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/error-handling.md)
    - [Events](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/events.md)
    - [How to debug](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/how-to-debug.md)
    - [Light kit admin js environment](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/light-kit-admin-js-environment.md)
    - [Light kit admin plugins](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/lka-plugins.md)
    - [Pages](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/pages.md)
    - [Permissions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/permissions.md)
    - [Procedures](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/procedures.md)
    - [Service dependencies](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/service-dependencies.md)
    - [User data](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/user-data.md)
    - [User notifications](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/user-notifications.md)
    - [User](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/user.md)



Services
=========


This plugin provides the following services:

- kit_admin (returns a LightKitAdminService instance)
- ?kit_admin_rights (returns a LightKitAdminRightsManager instance)

 



Here is an example of the service configuration:

```yaml
kit_admin:
    instance: Ling\Light_Kit_Admin\Service\LightKitAdminService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                login:
                    # Used by LoginFormController to redirect the user after a successful connection on the login form.
                    on_success_route: lka_route-home
                    # Used by ProtectedPageController to redirect a non valid user.
                    # Used by LogoutController to redirect a valid user after a disconnect.
                    login_route: lka_route-login
                access_denied:
                    access_denied_route: lka_route-forbidden_page
                notifications:
                    # alert|toast
                    default_type: alert
#        setUserRowOwnershipManager:
#            manager:
#                instance: Ling\Light_Kit_Admin\UserRowOwnership\LightKitAdminUserRowOwnershipManager





# --------------------------------------
# hooks
# --------------------------------------
$ajax_handler.methods_collection:
    -
        method: registerHandler
        args:
            id: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\AjaxHandler\LightKitAdminAjaxHandler


$bmenu.methods_collection:
    -
        method: registerHost
        args:
            menu_type: admin_main_menu
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
                        path: lka-plugins

$bullsheet.methods_collection:
    -
        method: registerBullsheeter
        args:
            identifier: Light_Kit_Admin.default
            bullsheeter:
                instance: Ling\Light_Kit_Admin\Bullsheet\LightKitAdminGeneralBullsheeter



$chloroform_extension.methods_collection:
    -
        method: registerTableListConfigurationHandler
        args:
            plugin: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\ChloroformExtension\LightKitAdminTableListConfigurationHandler
                methods:
                    setConfigurationFile:
                        files:
                            - ${app_dir}/config/data/Light_Kit_Admin/Light_ChloroformExtension/generated/lkagen-table_list.byml
                            - ${app_dir}/config/data/Light_Kit_Admin/Light_ChloroformExtension/table_list.byml


$controller_hub.methods_collection:
    -
        method: registerHandler
        args:
            plugin: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\ControllerHub\LightKitAdminControllerHubHandler
                methods:
                    setContainer:
                        container: @container()

$crud.methods_collection:
    -
        method: registerHandler
        args:
            pluginId: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler



$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_Kit_Admin/Light_EasyRoute/lka_routes.byml


$events.methods_collection:
    -
        method: registerListener
        args:
            events:
                - Light.on_exception_caught
            listener:
                instance: @service(kit_admin)
                callable_method: onLightExceptionCaught


$kit.methods_collection:
    -
        method: addPageConfigurationTransformer
        args:
            -
                instance: Ling\Light_Kit_Admin\PageConfigurationTransformer\LightKitAdminPageConfigurationTransformer



$plugin_installer.methods_collection:
    -
        method: registerPlugin
        args:
            plugin: Light_Kit_Admin
            installer: @service(kit_admin)


$realform.methods_collection:
    -
        method: registerFormHandler
        args:
            plugin: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler
                methods:
                    setConfDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin/Light_Realform


$realist.methods_collection:
    -
        method: registerListRenderer
        args:
            identifier: Light_Kit_Admin
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer
    -
        method: registerRealistRowsRenderer
        args:
            identifier: Light_Kit_Admin
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
            plugin: Light_Kit_Admin
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler
    -
        method: registerListGeneralActionHandler
        args:
            plugin: Light_Kit_Admin
            renderer:
                instance: Ling\Light_Kit_Admin\Realist\ListGeneralActionHandler\LightKitAdminListGeneralActionHandler




$user_database.methods_collection:
    -
        method: setRootAvatarUrl
        args:
            avatar_url: /plugins/Light_Kit_Admin/img/avatars/root_avatar.png
    -
        method: setPasswordProtector
        args:
            protector: @service(password_protector)


# --------------------------------------
# vars
# --------------------------------------
$user_database_vars.bullsheeter_avatar_img_dir: ${app_dir}/www/plugins/Light_Kit_Admin/img/avatars2





```












History Log
=============
        
- 0.7.0 -- 2020-07-07

    - checkpoint commit
    
- 0.6.0 -- 2020-06-23

    - checkpoint commit
    
- 0.5.0 -- 2020-06-04

    - checkpoint commit
    
- 0.4.1 -- 2019-12-17

    - fix functional typo in service configuration
    
- 0.4.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system
    
- 0.3.0 -- 2019-12-06

    - checkpoint commit
    
- 0.2.0 -- 2019-11-05

    - checkpoint commit
    
- 0.1.0 -- 2019-10-25

    - initial commit