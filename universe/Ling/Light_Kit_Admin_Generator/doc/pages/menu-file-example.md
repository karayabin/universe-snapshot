Menu file example
=================
2019-10-25


Below is the current menu file for the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin (still in development as I'm writing those lines).


Location: ${app_dir}/config/data/Light_Kit_Admin/bmenu/main_menu/lka_mainmenu_1.byml


```yaml
-
    id: dashboard
    icon: fas fa-bars
    text: Dashboard
    route: lka_route-home
    children: []
    _right: Light_Kit_Admin.user
-
    id: user
    icon: fas fa-user
    text: User
    route: null
    children:
        -
            id: user-profile
            icon: ""
            text: Profile
            route: lka_route-user_profile
            badge_text: HOT
            badge_class: bg-danger text-white
            children: []
            _right: Light_Kit_Admin.user
        -
            id: user-file_manager
            icon: ""
            text: User File Manager
            route: lka_route-user_file_manager
            children: []
            _right: Light_Kit_Admin.user
        -
            id: user-list
            icon: ""
            text: List
            route: lka_route-user_list
            children: []
            _right: Light_Kit_Admin.admin
        -
            id: user-permissions
            icon: ""
            text: User Permissions
            route: lka_route-user_permissions
            children: []
            _right: Light_Kit_Admin.admin

    _right: Light_Kit_Admin.user

-
    id: permission
    icon: fas fa-user-check
#    icon: fas fa-unlock
    text: Permission
    route: null
    children:
        -
            id: permission-group_list
            icon: ""
            text: Groups
            route: lka_route-permission_groups
            children: []
            _right: Light_Kit_Admin.admin
        -
            id: permission-permissions
            icon: ""
            text: Permissions
            route: lka_route-permission_permissions
            children: []
            _right: Light_Kit_Admin.admin
        -
            id: permission-group_has_permission
            icon: ""
            text: Groups/Permissions
            route: lka_route-group_has_permission
            children: []
            _right: Light_Kit_Admin.admin


```