Light_Realform, conception notes
==============
2020-09-04 -> 2021-03-29


The goal of the **Light_Realform** service is to help us create any **html form**.


The audience is mainly people who write controllers for the light framework.


Summary
--------
* [Form handling system A](#form-handling-system-a)
* [The configuration file](#the-configuration-file)
    * [A configuration file example](#a-configuration-file-example)
* [The success handler interface](#the-success-handler-interface)
* [The executeRealform method](#the-executerealform-method)
* [The updateRic concept](#the-updateric-concept)
* [The feeder](#the-feeder)
* [Reloading the page](#reloading-the-page)
* [Permission checking](#permission-checking)





In our implementation, we have a **configuration file** in [babyYaml](https://github.com/lingtalfi/BabyYaml) format
where we define various parts of the form handling process, such as which form controls to display, which validation rules to use, and optionally what to do with the posted data once the form
is successfully posted, etc...

We don't handle the rendering part for now, we left that to our users instead.


The main idea behind using a **configuration file** is to minimize the time spent on coding: it's much faster to configure a specialized form tool
rather than coding a complete form system from scratch in php.

Our **configuration file** is composed of directives, which are explained later in this document.

As you already know, the **html form** is a central piece in every web application.


Our service gravitates around the [Chloroform planet](https://github.com/lingtalfi/Chloroform), which we found flexible enough for our needs.


There are many ways To handle an **html form**. Our service uses a system which we internally call the "form handling system A".

You access it via the **executeRealform** method of our service.

Note that for now we only have one system, we might add new ones as we encounter new concrete cases that this system doesn't solve.


Form handling system A
-----------------
2020-09-04 -> 2020-09-07

This system involves the following ingredients:


- the **form** and **form controls** declaration  
- optionally, a **success handler**, which, if defined, will be executed on the submitted data 
- a **feeder**, see our [updateRic](#the-updateric-concept) section below for more details  
- an algorithm which handles the form logic 


The algorithm we use for this system looks basically like this:

- we detect whether the form is posted in update or insert mode (see the [updateRic](#the-updateric-concept) concept for more details)
- depending on the mode, we make sure the user has the permission to execute the form, see more in the [permission checking](#permission-checking) section

- then, if the form is posted:
    - if the form is valid (i.e if all validation rules pass): 
        - we call the **success handler**, if defined
        - then by default we set a flash message and reload the page once more. See the [reloading the page](#reloading-the-page) concept below in this document for more details.
            Note: the flash messages can be customized via the **success_messages** directive of the [configuration file](#the-configuration-file).
    - elseif the form is NOT valid, we display the form with the values set by the user 
- elseif the form is NOT posted, then display the form with its default values provided by the **feeder**


Note: in a previous version of this algorithm, we had a "recompile" phase just before calling the **success handler**. 
The idea of the recompile phase was to prepare the data before calling the **success handler**.
For instance, a datetime control could be implemented as the combination a date control, an hour control, a minute control and a second control.
Then the idea was that during the recompiling phase, the different controls were re-assembled into one, which is what the **success handler** would expect.
However, in this version, we believe this is a bad idea, as it adds complexity to the php side of things. 
We rather encourage authors to do their "recompiling" processing in javascript. 
As a consequence, our algorithm is simpler, easier to understand and implement.


At the core of our system, we use the [Chloroform planet](https://github.com/lingtalfi/Chloroform), since it's very flexible for rendering: once you've got your **chloroform array** you can render it however you want.



The configuration file
-------------
2020-09-07 -> 2021-03-29


To access the configuration file, we use the [Light_Nugget planet](https://github.com/lingtalfi/Light_Nugget), with a relative path of "Light_Realform/form".


Our directives are the following:


- ?title: string, the title of the form. Our service doesn't do anything with it, but this might be useful to your renderer.
- ric: false|array=false, the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md). It's used in the [updateRic](#the-updateric-concept) concept.
    Set it to false if you don't want to use this system.
    
- success_messages: array, use this to customize the success messages shown to the user when the form was successfully posted.
    Note: if you don't use this directive, we still provide default values don't worry.
    - update: string, the message to display when the form in update mode was successful. This message accepts the following tags:
        - {sRic}: the string version of the **updateRic** used (in the form k=v, k2=v2, ...).
    - create: string, the message to display when the form in create mode (i.e. not update mode) was successful           
    
- security: array, defines whether the current user is allowed to do anything with the form (read, update, create).
    We use the [baked in security system of Light_Nugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#a-baked-in-security-system-for-nugget-users).
    If the form is in **update** mode, our service will automatically add the **storage_id** and **updateRic** variables in the params passed to the handler (if defined, see the baked in security system
    of Light_Nugget for more details).
    
    We've created a **DatabaseUpdateEntryChecker** class for you just in case you need it.
    If you use it, the following extra params will be required:
    - sql: string, the **fetch** query to perform to check whether the user is granted the **update** permission for this row.
        The permission is granted if the query returns at least one row.
        
        In this query, the {tags} are used to encapsulate the columns of the (update) ric.
        The following special tags are also available:
        - {$userId}: the current user id 
        
        Example of query with an update ric containing only one id column:
        - select id from lun_user_notification where {id} and lud_user_id={$userId}
        
    
    
 
- ?feeder: string|false|null
    If false or not set, no feeder is used.
    If string, then it's the name of the class to use as your feeder.
    If null, we provide a default feeder which can basically fetch a storage entry from your storage. You must define the **storage_id** directive in order
    for our default feeder to work properly.
    See the [feeder](#the-feeder) section for more details.

- storage_id: string. The identifier for the storage of your application.
    This is used to check whether the user is granted the permission to use the form.
    This is also passed as a parameter of the feeder's getDefaultValue method. See the [feeder](#the-feeder) section for more details.
    
    If you use our default feeder, it's assumed that you are using a database as your storage, 
    and the **storage_id** is the table name, optionally prefixed with the database name (mainly in case your application uses multiple databases).    
 



    
- chloroform: array, this basically creates and configures the chloroform instance.
    - id: string, the id of the chloroform.
    - fields: array of **fieldId** => "field items", each item being an array. 
        
        The **fieldId** is described in the [field id section of the chloroform documentation](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-field-id).
        However, depending on your success handler, it might be required that your fieldId corresponds exactly to the name of the column
        to update in the database (i.e. if your success handler assumes so). Check out your success handler implementation for more details.
        
        Note that our default **ToDatabaseSuccessHandler** has such an expectation.
    
        Each field item is an array which is basically passed to the control instance defined by the type property, except for the **validators**
        property, which is not passed to the control instance, but used by our service instead.
        
        Here are the main field item properties, but depending on the control you use, you might use a different set of properties.
        For instance, the **checkbox** type accepts an extra "items" property (see the chloroform documentation for more info).
        
        - label: string, the label for this field.
        - type: string, the control type for this field. For the following list of names, just put the first letter in uppercase, 
            and then add the Field suffix to get the corresponding chloroform field that will be created.
            
            - string: will create a **StringField** instance.
            - color: will create a **ColorField** instance.
            - date: will create a **DateField** instance.
            
            The available types following those rules are:
            - ajaxFileBox
            - color
            - date
            - datetime
            - file
            - hidden
            - number
            - string
            - text
            - time
            - checkbox
            - radio
            - select
            - password
            - decorative
            - csrf: will return a **CSRFField** instance.
            
            In addition to that, we also handle the control from the [Light_ChloroformExtension planet](https://github.com/lingtalfi/Light_ChloroformExtension):
            
            - table_list: will return a **TableListField** instance.
            
        - validators: array, define the validators to add to the control instance. It's an array of **validatorId** => **validatorConf**.
            The same naming rules as for the **type** property apply here for the **validatorId** as well,
            so the **fileMimeType** validatorId will turn into a **FileMimeTypeValidator** validator for instance.
            
            The **validatorConf** is an array containing the properties to set on the validator.
            
            The available **validator ids**, along with their available **validatorConf** properties are:
            - csrf:
                - csrfProtector
            - fileMimeType:
                - allowedMimeTypes
            - minMaxChar:
                - min
                - max
            - minMaxDate:
                - min
                - max            
            - minMaxFileSize:
                - min
                - max            
            - minMaxItem:
                - min
                - max            
            - minMaxNumber:
                - min
                - max            
            - passwordConfirm:
                - otherFieldId
            - password:
                - nbAlpha
                - nbAlphaLower
                - nbAlphaUpper
                - nbDigits
                - nbSpecial
            - requiredDate
            - required
            
        - multiplier: array, defines a multiplier for this field. For more info about the multiplier, see the [form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md).
        If you set this, don't forget to also set the multiplier property at the configuration level (i.e. both are required for the multiplier trick to work properly).
        
        Note: our default objects (i.e. feeder: RealformDatabaseFeeder, successHandler: ToDatabaseSuccessHandler) handle the multiplier trick already.
         
        The properties are:
        - ?enabled: bool=true, set this to **false** to quickly disable the multiplier. It's enabled by default as soon as you define the multiplier property.
        - pivot: string, the name of the pivot column (see the form multiplier trick document for more details)
        - ?on_update_fetch_sql: string, the sql query to use, when in update mode, to fetch the default values based on the given [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md).
            By default, our service provides this request automatically for you, based on the value of the **pivot** and **table** properties (the table property comes from the **storage_id** directive of the configuration file), however with the **on_update_fetch_sql** property
            you can override that default query, should you have more specific business rules.  
            You can use {tags} corresponding to the ric columns to access the ric values.
            For instance:
            - select permission_id from lud_permission_group_has_permission where permission_group_id={permission_group_id}
         As for now, the **field identifier** is used as the column name in your table (if you are using a database). This might change as concrete cases show up.
         
         @dev: Search for the abc.1 string in the code to remove that.       
                
            
                        
            
- ?success_handler: array. Defines how to access and configure the **success handler**.
    - len: string, the [light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md), which must return an instance of our **RealformSuccessHandlerInterface**.
        If defined, it has precedence over the class property.
    - class: string, the class to instantiate. It must be an instance of our **RealformSuccessHandlerInterface**.
        If your instance implements **LightServiceContainerAwareInterface**, it will be passed the container automatically.
        The special value "defaultDbHandler" is also accepted (instead of the full class), and resolves to our **ToDatabaseSuccessHandler** class.
        
    - params: array of parameters, which are passed to the **execute** method of the **success handler instance** (**RealformSuccessHandlerInterface**).
        Our service also injects other parameters, see the [success handler section](#the-success-handler-interface) for more details.
       
                
        
        
    

### A configuration file example
2020-09-07


````yaml
title: User notification form
ric:
    - id
feeder: null
storage_id: lun_user_notification

success_messages:
    create: The user notification has been successfully stored in the database
    update: The user notification has been successfully updated in the database, with ric {sRic}


security:
    any:
        permission: Ling.Light_Kit_Admin.admin


chloroform:
    id: realgen-lun_user_notification
    fields:
        lud_user_id: 
            label: Lud user id
            type: table_list
            validators: 
                required: []
            tableListIdentifier: Light_Kit_Admin_UserNotifications:generated/kit_admin_user_notifications.table_list
        
        feeder: 
            label: Feeder
            hint: The name of the plugin who provides the notification message.
            type: string
            validators: 
                required: []
            
        
        type: 
            label: Type
            hint: The notification message identifier for this feeder (i.e. must be unique per feeder).
            type: string
            validators: 
                required: []
            
        
        message: 
            label: Message
            type: string
            validators: 
                required: []
            
        
        status: 
            label: Status
            type: select
            items:
                0: normal
                1: deleted
            hint: The notification has two status: normal (0) and deleted (1).
            validators: 
                required: []
            
        
        date_creation: 
            label: Date creation
            type: datetime
            validators: 
                requiredDatetime: []
            
        
        date_deletion: 
            label: Date deletion
            type: datetime
            nullable: true
            validators: []
            
        
    
    row_restriction: 
        - read
        - update
    

success_handler:
    class: defaultDbHandler
    

````




The success handler interface
------------
2020-09-07 -> 2020-10-01

Our **RealformSuccessHandlerInterface** interface has two methods:

- execute ( array validPostedData, array $params = [] )

It is assumed that if the **execute** method throws an exception, the exception message shall be displayed to the user as a **form notification** (see the [chloroform planet](https://github.com/lingtalfi/Chloroform) documentation for more info about **form notifications**).

Otherwise, it means that the execution went well, and that a successful form notification shall be displayed, or the user shall be redirected, depending on how you handle your form.
You can actually configure what to do in case of a successful handling (i.e. the **execute** method was successful) via the **executeRealform** of our service.

The **params** variable passed as an argument of the **execute** method is the array you define in your [configuration file](#the-configuration-file) via the **success_handler.params** directive.

We also add the following properties:
- updateRic: array|false, the update ric. If the form is not in **update mode**, the value is false.
- storageId: string|null, the value that you defined in the configuration file (**storage_id**), or null if not defined in your configuration.
- ?multiplier: array. Use it only if you want to apply the [multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md) on this form. It contains the following:
    - item_id: the field identifier on which the multiplier was defined
    - pivot: same as the multiplier.pivot property from the configuration file
    - ?on_update_fetch_sql: same as the multiplier.on_update_fetch_sql property from the configuration file
    
    
    

The executeRealform method
-------------
2020-09-07

This is probably the most important method of our service you need to know about.


- executeRealform ( string nuggetId ): RealformResult

This method creates the **chloroform** instance according to the nugget which id is passed, and applies the [Form handling system A](#form-handling-system-a) algorithm on it.
Then, it returns a **RealformResult** instance, so that you, the controller author, can take further actions.


Note that it's expected from you that you process the **RealformResult** instance correctly, as explained below, in order to have a proper handling of the form.
If you just ignore the rules below, your form might not work properly.

So, the **RealformResult** is a simple informative object with the following methods:


- isSuccessful: bool, whether the form is successful. which is only true when all the following are true:
    - all the form validation rules (if any) passed
    - if you've defined a **success handler** (via our **success_handler** property), its **execute** method was successful (i.e. no exception thrown)
- getRedirectionUrl: false|string, the url to redirect to, or false otherwise. Note that this property will only be set if the form is successful (i.e. isSuccessful returns true). 
- getChloroform: Chloroform, the chloroform instance that you will usually use for rendering purposes.
- getValidPostedData: array. The valid posted data. This will only be available if the form is successful (i.e. isSuccessful returns true).




It is expected from you that:
- if the **getRedirectionUrl** method returns an url (i.e. not false), then you should create the appropriate **HttpRedirectResponse** and return it to the Light core instance.
    
    
So, in other words the expected synopsis for using our **executeRealform** method is something likes this (in pseudo code):


```python
realformResult = executeRealform ( nuggetId )
redirectUrl = realformResult.getRedirectionUrl()
if false !== redirectUrl:
    response = new HttpRedirectResponse
    response.setUrl ( redirectUrl )
else:
    if true === realformResult.isSuccessful:
        // do something with the posted data

    myRenderer.renderChloroform ( realformResult.getChloroform() )

```


Note: that's the basic handling of a realform, but of course, in some cases, you might want to override the redirection phase to do your own things...

    





The updateRic concept
-----------
2020-09-07



When dealing with forms, we've observed that there are two main types of things you can do with the submitted data:

- you update an entry in your storage (typically a row in a table of your database) 
- you do something else (including inserting a new entry in your storage, or sending the posted data via mail...)


The **update** case is a bit different because it requires that we know which entry to update.

Since this is such a common form operation, we decided to implement this concept of **updateRic**.



We say that the form is in **update mode** when the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md)  
that you defined in the [configuration](#the-configuration-file) is found in the $_GET array. 


Note: if you set the **ric** directive to **false** in your configuration, it disables it completely, in which case none of the below is applied.

If you defined the ric, then our **getForm** method will detect whether the ric fields are passed via GET.
If that's the case, then we internally create an **updateRic** variable, which is an array which keys are the ric "columns" you defined in your configuration,
and the values the one passed via GET.

This **updateRic** is actually useful in two areas:

- to feed the form default values. This applies only when the form is not posted, because once it's posted, the posted data will always be the one displayed.
    So, instead of having empty default values, with the **updateRic** the feeder can actually fetch a specific entry in your storage and feed them in the form.
    
- when executing a **success handler** which updates a specific entry of your application storage, then the **updateRic** is required for an obvious reason: we need
    to identify which entry to update.
        
 

If the **updateRic** is defined, it will be passed to the **success handler** via the **options** argument of the **execute** method of the **success handler**, as the "updateRic" variable.

 





The multiplier array
----------
2020-11-13

Unless otherwise specified, the multiplier property is the array defined in the [form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md#the-form-multiplier-array),
it consists of the following entries:

- pivot
- item_id



The feeder
----------
2020-09-07 -> 2020-11-13


The role of the **feeder** is to provide the default values of the form, that is the values when the form is not yet posted by the user.

Depending on whether the form is used in update mode (see the [updateRic](#the-updateric-concept) concept for more details) or not, 
the feeder might try to fetch a record in your storage, or not.


The **feeder** must implement our **RealformFeederInterface**, which exposes the following methods:

- getDefaultValues ( array params = [] )


The params are:

- storage_id: string, the storage identifier
- ?updateRic: array=null, the ric of the entry to update (this is only useful when the form is in update mode).
- ?multiplier: array, [the multiplier array](#the-multiplier-array)



Reloading the page
------------
2020-09-07


Once the form is successfully executed, and after the **success handler** (if you defined one) is successfully executed too,
then we still need to decide what to do.


By default, we decided that we should reload the page. The reasons are:

- if the user refreshes (i.e. f5) the page again, we don't want to re-submit the form
- the form might have changed some elements in the gui (for instance the user avatar, if you're on a profile edit form), and so you might want the changes
    to be apparent immediately



In order to implement this mechanism though, we do the following:

- add a **t** variable in the url params, to make the browser think it's a new page (so that it doesn't reload the submitted data along when you refresh the page).
    Note that this means the **t** variable is reserved by our service for this purpose. You've been warned (or we could provide you with a way of setting the **t** variable name, but for now we just didn't).
- if the form was in update mode, we also want to update the ric values  passed via GET, if they have changed, otherwise the feeder would provide the wrong values.






Permission checking
------------
2020-09-08 -> 2020-09-15


We use the following algorithm to secure our form handling process:


- first we use the [storage interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#storage-interaction) system like this:
    - in every case we check that the user has the **store.$storeId.read** micro-permission
    - if the form is in **insert mode**, we check that the user has the **store.$storeId.create** micro-permission
    - if the form is in **update mode**, we check that the user has the **store.$storeId.update** micro-permission
- then we also process the **security** directive of the **configuration file**, if set. See the [Light_Nugget baked in security system](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#a-baked-in-security-system-for-nugget-users) for more details.
    






