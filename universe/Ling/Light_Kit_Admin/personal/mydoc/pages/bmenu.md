BMenu
=============
2019-08-09 -> 2021-03-16






In Light_Kit_Admin we use [bmenu](https://github.com/lingtalfi/Light_BMenu) for the main menu on the left, in the sidebar.


The menu's name is: 

- admin_main_menu


It's basically composed of the following section:

- user: things related to the lka user
- admin: things related to the lka admin 




We also have changed the [bmenu item structure](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md#the-menu-item-structure) a bit.

Our menu item has the following structure (only the id and the children keys are mandatory):


- id: string, the identifier for this menu item (it should be unique amongst its brothers/sisters)
- icon: string, the css class for the icon
- text: string, the text of the menu item 
- route: string|null, the route to the menu item (for leave nodes only, not parents).
            If we know the route for an item, we should use that route.
            The Light_Kit_Admin host will convert them to the url (property) automatically.
            For parents, leave it to null.
- route_params: array, the route params array for the route

- url: string, the url of the menu item (for leave nodes only, not parents).
        Not implemented yet (but I like the idea).
        This should be only used if we don't know the route leading to the destination page,
        in which case it's recommended to use the route property instead.
        
- badge_text: string, the text of the badge (the badge is displayed next to the menu item text)
- badge_class: string, the css class to add to the badge

- children: array, an array of **menu id** => menu items (i.e. recursion)
- _right: string|null, the right required to display this menu item. The menu item won't be displayed if the user doesn't have the indicated right






We provide the **LightKitAdminBMenuRegistrationUtil** class to help with the registration of third-party plugin menus in our system.



















