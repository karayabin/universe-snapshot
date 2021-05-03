Realist 
============
2020-08-24



So our service helps you to display lists.



In order to do so, we do the following steps:


- write the list configuration in a file called the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md)
- call the different methods of our service to display the list, using the **requestId** referencing that configuration



Our service is basically divided in two: 

- a list renderer
- an action handler


The **list renderer** is responsible for rendering the list.

The **action handler** is responsible for handling the ajax actions related to the list.


Both the **list renderer**, and the **action handler** are defined in the **request declaration** (i.e. the list configuration).




One peculiarity with realist is the way we display a list: it's a two steps process:

- first we display the list skeleton
- then the items of the list are fetched via ajax and injected using js
 

The displaying of the skeleton includes the related list widgets, such as the pagination system, and advanced search widget, etc...

The fetching of the list items is just like every other ajax action with realist, except that we provide the action (i.e. you don't need
to provide an action handler for this particular action). This action is always available, and it's [action id](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md) is **realist-request**.



So we have two renderers:

- a list renderer
- a listItem renderer


The "list renderer" is first called to display the skeleton of the list.
The "listItem renderer" is called when you want to display the items of the list. 




The main synopsis
------------
2020-08-24


Ok, so we start by creating a [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md).

From the request declaration file, you obtain the **requestId** (since the requestId is based on a naming convention).

Now with the **requestId**, you can start interacting with our services.
 
First you want to display a list, you'll need a [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-list-renderer) for that.
 
Call our service's **getListRendererByRequestId** method with a **requestId** to get one.



Internally, we use the [Light_Nugget](https://github.com/lingtalfi/Light_Nugget) plugin to fetch the **request declaration** corresponding to the given **requestId**.
The main benefit of using Light_Nugget is that it relies on naming convention, and so plugin authors don't need to register to our service to access the request declaration.


Once you have the **list renderer** instance, you can just call its various "render" methods in the order you want to fit your design:

- render
- renderTitle
- renderListGeneralActions


That's all you need to do.


Internally, the **render** method will make an ajax call to fetch the **list items** via ajax.
It will do so by passing the calling the [realist-request](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-realist-request-action) action of our ajax handler (we use [Light_AjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md) under the hood.

See more about **action id** in the [list-actions.md](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md) document.


That call to inject the **list items** is probably the most common call, and it's using our service's **executeRequestById** method, which usually works well for any type of **list items** you want.

For instance, it can handle things such as list filtering and ordering.


So, to recap, displaying a list is just a matter of creating the **request declaration** (which gives you the **requestId**),
and then call the render method of the list renderer.



There is one more thing you need to handle: [list actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md).

List actions' code is generally executed via ajax as well.

Plugin authors generally create their own handler, using the [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler) system (since this is the one we use).

We provide a **getConfigurationArrayByRequestId** method, should your action require some information stored in the **request declaration**.  

Inside your **action handler**, you can do whatever you want.

Actions can do various things, such as:

- deleting a row which id is passed



Hopefully this gives you a basic overview of what happens with realist.

