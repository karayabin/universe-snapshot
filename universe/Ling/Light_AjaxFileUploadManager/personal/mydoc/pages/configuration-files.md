Configuration files
====================
2019-10-31


We reckon that perhaps the best organization for a client plugin is to define both
the [validation rules](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/validation-rules.md) 
and [action lists](https://github.com/lingtalfi/Light_AjaxFileUploadManager/blob/master/doc/pages/action-list.md) 
from a dedicated single file.


Therefore we introduce the concept of **configuration file** which intends to fulfill this purpose.



The configuration item
-------------

Our service now has a **addConfigurationItemsByFile** method.



A **configuration item** is an array which contains the following sections:

- action: an action list array
- validation: a validation rule array

The file holding the configuration items is a [babyYaml](https://github.com/lingtalfi/BabyYaml) file provided by the client plugin.
It contains an **items** section, which contains the configuration items registered by **id**.



