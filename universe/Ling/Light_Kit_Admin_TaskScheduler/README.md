Light_Kit_Admin_TaskScheduler
===========
2020-07-31 -> 2020-08-28



A [Light Kit Admin](https://github.com/lingtalfi/Light_Kit_Admin) wrapper for the [Light_TaskScheduler](https://github.com/lingtalfi/Light_TaskScheduler) plugin.




This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_TaskScheduler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/pages/conception-notes.md)
- [Our gui](#our-gui)
- [Services](#services)





Our gui
========
2020-08-14



We provide an admin list/form.


![lka-task-scheduler-admin](https://lingtalfi.com/img/universe/Light_Kit_Admin_TaskScheduler/lka-task-schedule-admin.png)









Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_task_scheduler:
    instance: Ling\Light_Kit_Admin_TaskScheduler\Service\LightKitAdminTaskSchedulerService
    methods:
        setContainer:
            container: @container()




# --------------------------------------
# hooks
# --------------------------------------
$bmenu.methods_collection:
    -
        method: addDefaultItemByFile
        args:
            menu_type: admin_main_menu
            file: ${app_dir}/config/data/Light_Kit_Admin_TaskScheduler/bmenu/generated/kit_admin_task_scheduler.admin_mainmenu_1.byml

$chloroform_extension.methods_collection:
    -
        method: registerTableListConfigurationHandler
        args:
            plugin: Light_Kit_Admin_TaskScheduler
            handler:
                instance: Ling\Light_Kit_Admin\ChloroformExtension\LightKitAdminTableListConfigurationHandler
                methods:
                    setConfigurationFile:
                        files:
                            - ${app_dir}/config/data/Light_Kit_Admin_TaskScheduler/Light_ChloroformExtension/generated/kit_admin_task_scheduler.table_list.byml



$controller_hub.methods_collection:
    -
        method: registerHandler
        args:
            plugin: Light_Kit_Admin_TaskScheduler
            handler:
                instance: Ling\Light_Kit_Admin_TaskScheduler\ControllerHub\Generated\LightKitAdminTaskSchedulerControllerHubHandler
                methods:
                    setContainer:
                        container: @container()


$kit_admin.methods_collection:
    -
        method: registerPlugin
        args:
            pluginName: Light_Kit_Admin_TaskScheduler
            plugin:
                instance: Ling\Light_Kit_Admin_TaskScheduler\LightKitAdminPlugin\Generated\LightKitAdminTaskSchedulerLkaPlugin
                methods:
                    setOptionsFile:
                        file: ${app_dir}/config/data/Light_Kit_Admin_TaskScheduler/Light_Kit_Admin/lka-options.generated.byml

$micro_permission.methods_collection:
    -
        method: registerMicroPermissionsByProfile
        args:
            file: ${app_dir}/config/data/Light_Kit_Admin_TaskScheduler/Light_MicroPermission/kit_admin_task_scheduler.profile.generated.byml


$plugin_installer.methods_collection:
    -
        method: registerPlugin
        args:
            plugin: Light_Kit_Admin_TaskScheduler
            installer: @service(kit_admin_task_scheduler)





```



History Log
=============

- 1.5.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 1.4.0 -- 2020-08-21

    - update api to work with micro-permission3
    
- 1.3.0 -- 2020-08-14

    - update api to adapt new Light_TaskScheduler api
    
- 1.2.0 -- 2020-08-07

    - update service config, now use late registration with realform
    
- 1.1.0 -- 2020-08-07

    - update service config, now use late registration with realist
    
- 1.0.1 -- 2020-07-31

    - forgot to generate the docTools doc
    
- 1.0.0 -- 2020-07-31

    - initial commit