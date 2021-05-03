Procedures
================
2019-09-18 -> 2021-03-09


This document lists some procedures I'm interested to automate.

We can also refer to this to manually perform operation (from a developer's standpoint).

 




Create an admin page
==============
2019-09-18 

- Define the route and the controller



- Define the route and the controller
- Define the kit page
- 1. Create the kit page

- 1. Create the realist
- 1. Create the form
- x. Create the route/right
- 1. Create the controller
- x. Create the menu item


### 1. Create the controller




Example: Creating the User admin page
-----------------
2019-09-18 


### Define the route and the controller
2019-09-18 -> 2021-03-09

target: ${app_dir}/config/data/Ling.Light_Kit_Admin/Ling.Light_EasyRoute/lka_routes.byml

The route will be: **lka_route-user_list**, with pattern **/user/list**.
The controller will be **Ling\Light_Kit_Admin\Controller\User\UserListController->render**.
It will require the **Ling.Light_Kit_Admin.admin** right.

### Define the kit page
2019-09-18 

The kit page will be: **Light_Kit_Admin/Ling.Light_Kit/zeroadmin/user/user_list**.


### Create the kit page
2019-09-18 -> 2021-03-09

target: ${app_dir}/config/data/${kit_page}.byml
target (resolved): ${app_dir}/config/data/Ling.Light_Kit_Admin/Ling.Light_Kit/zeroadmin/user/user_list.byml



### Create the realist
2019-09-18 -> 2021-03-09

target: ${app_dir}/config/data/Ling.Light_Kit_Admin/Ling.Light_Realist/lud_permission.byml        (i.e. the file we want to create)
access: manual (i.e. needs automation)


