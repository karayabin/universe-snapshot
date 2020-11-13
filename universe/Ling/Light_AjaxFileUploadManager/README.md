Light_AjaxFileUploadManager
===========
2019-08-01 -> 2020-11-04



**WARNING: This plugin is deprecated in favor of** [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler). 


A centralized ajax file upload manager for your [Light](https://github.com/lingtalfi/Light) application.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_AjaxFileUploadManager
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_AjaxFileUploadManager api](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/api/Ling/Light_AjaxFileUploadManager.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
    - [How does it work?](#how-does-it-work)
- Pages
    - [Action lists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md)
    - [Validation rules](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/validation-rules.md)
    - [Events](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/events.md)
    - [Configuration files and items](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md)
    - [Ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md)





Services
=========


This plugin provides the following services:

- ajax_file_upload_manager


The **ajax_file_upload_manager** service is the centralized manager for all the ajax upload files of your Light applications. 



Here is an example of service configuration file:

```yaml
ajax_file_upload_manager:
    instance: Ling\Light_AjaxFileUploadManager\Service\LightAjaxFileUploadManagerService
    methods:
        setApplicationDir:
            dir: ${app_dir}
        setContainer:
            container: @container()
    methods_collection: []



# --------------------------------------
# hooks
# --------------------------------------
$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_AjaxFileUploadManager/Light_EasyRoute/afup_routes.byml


```


How does it work?
--------------

This plugin defines the [ajax file upload protocol](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/ajax-file-upload-protocol.md),
and provides tools for implementing it.

The backend implementation is covered entirely by this plugin.

For the js client implementation, we recommend using the [js file uploader](https://github.com/lingtalfi/JFileUploader) client,
as this plugin has helper methods that facilitate the implementation of the gui side with the **js file uploader**.


Please refer to the protocol and the auxiliary documents referenced in the summary to get started.

Basically what you want to do is create a [configuration item](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/configuration-files.md#the-configuration-item) for each ajax upload field that you want, and that's it.








History Log
=============

    
- 1.8.1 -- 2020-11-06

    - update api to adapt Bat 1.279
    
- 1.8.0 -- 2020-06-04

    - deprecated in favor of ajax handler
    
- 1.7.0 -- 2020-02-21

    - reorganized LightAjaxFileUploadManagerService to handle items more efficiently
    - fix csrf_token security leak in item
    - implemented fileEditor protocol extension
    
- 1.6.3 -- 2020-01-10

    - fix FileUploadController->uploader showing debug message
    
- 1.6.2 -- 2020-01-10

    - fix LightAjaxFileUploadManagerService->validatePhpFileItem not recognizing file extension with different case
    
- 1.6.1 -- 2019-11-27

    - fix functional typo csrf_simple instead of csrf_session
    
- 1.6.0 -- 2019-11-27

    - use of csrf_session service replaces csrf_simple

- 1.5.0 -- 2019-11-25

    - now ships with embedded JFileUploader dependency
    
- 1.4.0 -- 2019-11-11

    - update FileUploadController->uploader, now dispatches Light_AjaxFileUploadManager.on_controller_exception_caught event
    
- 1.3.0 -- 2019-11-07

    - switch from Light_Csrf to Light_CsrfSimple
    
- 1.2.0 -- 2019-10-31

    - add LightAjaxFileUploadManagerService->addConfigurationItemsByFile
    
- 1.1.0 -- 2019-10-21

    - added 2svp action list

- 1.3.0 -- 2019-10-17

    - added Light_UserData system
    
- 1.2.1 -- 2019-09-20

    - updated LightAjaxFileUploadManagerService, changed default token name to ajax_file_upload_manager_service
    - fix doc link
    
- 1.2.0 -- 2019-08-21

    - now using Light_EasyRoute service to register the routes

    - fix LightAjaxFileUploadManagerRenderingUtil->printField file input name conflicting with ajax generated input
    
- 1.1.0 -- 2019-08-07

    - the "db_update" action list now supports the $userId token
    
- 1.0.0 -- 2019-08-06

    - initial commit