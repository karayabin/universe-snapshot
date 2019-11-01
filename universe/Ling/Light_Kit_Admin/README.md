Light_Kit_Admin
===========
2019-10-24



THIS IS A WORK IN PROGRESS -- COME BACK IN A FEW MONTHS...

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
    - [Light kit admin js environment](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/light-kit-admin-js-environment.md)
    - [Pages](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/pages.md)
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

# not sure if this will be in the final release of Light_Kit_Admin...
kit_admin_rights:
    instance: Ling\Light\Light_Kit_Admin\Rights\LightKitAdminRightsManager
    methods_collection: []
#        -
#            method: registerRights:
#            args:
#                rights: []
#            method: registerRightsAssigner:
#            args:
#                assigner: []


# --------------------------------------
# hooks
# --------------------------------------


$ajax_file_upload_manager.methods_collection:
    -
        method: addActionLists
        args:
            actionLists:
                lka_user_profile:
                    -
                        use_Light_UserData: true
                        path: images/avatar.{extension}
                        imageTransformer: resize(200)
                        isPrivate: false
                        use_2svp: true

    -
        method: addValidationRules
        args:
            validationRules:
                lka_user_profile: []
                    maxFileSize: 2M
                    extensions:
                        - png
                        - jpeg
                        - jpg
                        - gif




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


$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_Kit_Admin/Light_EasyRoute/lka_routes.byml

$initializer.methods_collection:
    -
        method: registerInitializer
        args:
            initializer: @service(kit_admin)
            slot: install
            parent: Light_UserDatabase


$kit.methods_collection:
    -
        method: addPageConfigurationTransformer
        args:
            -
                instance: Ling\Light_Kit_Admin\PageConfigurationTransformer\LightKitAdminPageConfigurationTransformer

$micro_permission.methods_collection:
    -
        method: registerMicroPermissionResolver
        args:
            plugin: Light_Kit_Admin
            resolver:
                instance: Ling\Light_Kit_Admin\MicroPermission\LightKitAdminMicroPermissionResolver
                methods:
                    setFile:
                        file: ${app_dir}/config/data/Light_Kit_Admin/Light_MicroPermission/lka-micro-permissions.byml

$plugin_database_installer.methods_collection:
    -
        method: registerInstaller
        args:
            plugin: Light_Kit_Admin
            installer:
                -
                    - @service(kit_admin)
                    - installDatabase
                -
                    - @service(kit_admin)
                    - uninstallDatabase



$realform.methods_collection:
    -
        method: registerFormHandler
        args:
            plugin: Light_Kit_Admin
            handler:
                instance: Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler
                methods:
                    setConfDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin/Light_Realform/


$realist.methods_collection:
    -
        method: registerListRenderer
        args:
            identifier: Light_Kit_Admin
            renderer:
                instance: Ling\Bootstrap4AdminTable\Renderer\StandardBootstrap4AdminTableRenderer
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
$user_data_vars.install_parent_plugin: Light_Kit_Admin



```












History Log
=============
    
- 0.1.0 -- 2019-10-25

    - initial commit