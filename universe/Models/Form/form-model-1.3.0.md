Form model
===============
2017-11-24


A form model.
Version 1.3.0




Overview
============


```txt
- form: (form related properties)
    - name: string, the name of the form.
                It might be used by the view to concatenate
                for/id identifiers for instance.
                 
    - method: string
    - action: string
    - enctype: string
    - id: string|null, the css id, or null if not set
    - class: string|null, the css class, or null if not set 
    - attributes: read only array containing the following:
                - method
                - action
                - ?enctype
                - ?id
                - ?class 
    - attributeString: the string version of the attributes array
    - notifications: array of notification.
                    Each notification is a notification model as defined here (https://github.com/lingtalfi/Models/blob/master/Notification/NotificationsModel.php).
                    Or see the "Add notification messages to the form" section below for more details.
     
- controls:  (controls related properties)
    - $controlName: 
        - class: string, the name of the php class. This can be used by the view to "guess" the type of control to display.
                        Only the short name of the class is used (i.e. not the whole path, just 
                        the last bit of the path, like SokoInputControl for instance).
        
        - label: null|string, null if not set. It's recommended that we always set the label, 
                even if the view decides to not display it. 
                            
        - name: the html name property to display 
        - value: the value of the control, it can be null, a string, or
                an array (in case of multiple checkboxes for instance)
        - errors: an array of error messages bound to the control
        - properties: an array of user defined properties if you need them
        - ...plus, potential other properties depending on the type and your needs
```




Control specific properties
================================

Let's now see the specific control properties:


### Input control specific properties

```txt
- placeholder: null|string, null if not set
- type: string (text|textarea|hidden|password|...your own types)
```


### Choice control specific properties

```txt
- type: string (list|listGroup|listWithNames) 
- choices: array, the structure depends on the type property.
     - list: an array of $value to $label 
     - listGroup: an array of $groupLabel to lists (each list being an array of $value => $label) 
     - listWithNames: an array of [$name, $value, $label] 
```


### File control specific properties

```txt
- type: string (ajax|static|...own of your own), default=static
            if ajax, this means the control will use an ajax technique to upload the file
            if static, this means the control will use the regular php upload file system.
- accept: null|string, null if not set. Same as html accept attribute otherwise
```


