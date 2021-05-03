Light_BMenu Conception notes
================
2019-08-08 -> 2021-03-18



**BMenu** is a service that provides menus.


A menu is composed of items.


The menu item structure
---------------
2021-03-16

A menu item is an array with the following structure:


- id: string, the identifier for this menu item (it should be unique amongst its brothers/sisters)
- children: array, an array of **menu item id** => **menu item** (i.e. recursion)
  
- ?icon: string, the css class for the icon
- ?text: string, the text of the menu item
- ?url: string, the url of the menu item (for leave nodes only, not parents)
- ?badge_text: string, the text of the badge (the badge is displayed next to the menu item text)
- ?badge_class: string, the css class to add to the badge
- ...you can add your own entries here...



The menu structure
--------
2021-03-16


The **menu** contains any number of [menu items](#the-menu-item-structure).

It's an array which keys are **menu item ids**, and which values are the **menu item arrays**.

In other words, the **menu item id** is also used as a key to reference the **menu item** entry.

Here is an example of what a menu could look like:


```yaml
lka-dashboard: 
    id: lka-dashboard
    icon: fas fa-bars
    text: Dashboard
    route: lka_route-home
    children: []
    _right: Ling.Light_Kit_Admin.user
    url: /admin

lka-user: 
    id: lka-user
    icon: fas fa-user
    text: User
    route: null
    children: 
        lka_userdatabase-user_profile: 
            id: lka_userdatabase-user_profile
            icon: ""
            text: Profile
            route: lka_userdatabase_route-user_profile
            badge_text: HOT
            badge_class: bg-danger text-white
            children: []
            active: true
            _right: Ling.Light_Kit_Admin.user
            url: /user/profile
        
        kit_admin_train-usermainpage: 
            id: kit_admin_train-usermainpage
            icon: fas fa-asterisk
            text: Train
            route: lch_route-hub
            route_url_params: 
                plugin: Light_Kit_Admin_Train
                controller: Custom/LightKitAdminTrainUserMainPageController
            
            _right: Ling.Light_Kit_Admin.user
            children: []
            url: /hub?plugin=Light_Kit_Admin_Train&controller=Custom/LightKitAdminTrainUserMainPageController
    _right: Ling.Light_Kit_Admin.user

lka-admin: 
    id: lka-admin
    icon: fas fa-user-cog
    text: Admin
    route: null
    _right: Ling.Light_Kit_Admin.admin
    children: 
        kit_admin_user_data-luda: 
            id: kit_admin_user_data-luda
            icon: fas fa-puzzle-piece
            text: User Data
            route: null
            children: 
                - 
                    id: kit_admin_user_data-luda_resource
                    icon: fas fa-asterisk
                    text: Resource
                    route: lch_route-hub
                    route_url_params: 
                        plugin: Ling/Light_Kit_Admin_UserData
                        controller: Generated/LudaResourceController
                    
                    _right: Ling.Light_Kit_Admin.user
                    children: []
                    url: /hub?plugin=Ling/Light_Kit_Admin_UserData&controller=Generated/LudaResourceController
                

```




Registering menus and items
---------
2021-03-16



We use an [open registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md#the-open-registration),
and each menu will be contained in its own [babyYaml](https://github.com/lingtalfi/BabyYaml) file.

All the menus will be located in the following directory:

- **config/open/Ling.Light_BMenu/menus**


So for instance, if you want to create a menu called **my_menu**, you should create it here:

- **config/open/Ling.Light_BMenu/menus/my_menu.byml**



You might be interested to know that our service class provides some methods to help with the registration, should you need them.




Menu modifiers
--------
2021-03-16 -> 2021-03-18



We also provide a **menu modifier system**, to dynamically modify a menu.

To use this **menu modifier system**, register your **menu modifier** directly to our service.


Note: I didn't provide the menu modifier system as an **open registration system**, because I reckon
that a website only has a few menus (like 1, or maybe 2,3,4), and so it was not worth creating an **open registration system** for that few items.



Below is an example of how a third-party plugin can configure its service to add a menu modifier:

```yaml
$bmenu.methods_collection:
    -
        method: addMenuModifier
        args:
            modifier:
                instance: Ling\Light_Kit_Admin\Light_BMenu\MenuModifier\LightKitAdminBMenuModifier
``` 

