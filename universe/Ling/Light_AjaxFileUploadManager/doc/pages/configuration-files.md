Configuration files and items
====================
2019-10-31 -> 2020-01-28



To configure the **Light_AjaxFileUploadManager** service, we use **configuration items** (or items for short).

The **configuration items** are stored in **configuration files**, where a configuration file can hold multiple configuration items.






The configuration file
-------------
2020-01-28


A **configuration file** is a [babyYaml](https://github.com/lingtalfi/BabyYaml) file, since it's a convenient way to hold information.
Third-party plugins can register their configuration files using our service's **addConfigurationItemsByFile** method.


The **configuration file** is basically an array of **id** => **configuration item**.

The **id** of the configuration item is very important: it's used by our service to identify which configuration item to use to handle a given file.
 



The configuration item
-------------
2020-01-28


A configuration item has the following structure:

- csrf_token: optional, bool=true. Whether to check for a csrf token.
    If true, we use the [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession) plugin under the hood.
- action: optional, array=[]. An array of actions to execute on the file (only once it has been validated by the validation rules).
    Usually, at least one of the defined action is used to upload the file to the server.
    Sometimes, other actions are also used to create thumbnails with different sizes of the uploaded file.
    See more info in [action lists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md).  
- validation: optional, array=[]. An array of validation rules. The validation rules are used to discard an file before it's uploaded.
    Validation rules are first tested, and if they all pass, then only **actions** (see the action property above) are executed.
    
    


