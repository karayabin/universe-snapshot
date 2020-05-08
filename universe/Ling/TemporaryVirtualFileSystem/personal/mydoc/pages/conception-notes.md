Temporary virtual file system, conception notes
==============
2020-04-14





This tool helps you implement a temporary virtual file system.


What is it and when would you need one?



In a nutshell, it's a virtual file system that exposes only the following methods:

- get
- add 
- remove 
- update 
- reset 
- commit



The **get**, **add**, **remove** and **update** methods refer to accessing, adding, removing or updating a file and the meta information 
attached to it if any (such as tags, the owner name, whatever...).


The point of being a virtual file system is that you can reset it at any time, which basically destroys all the operations
you've done previously, or you can commit all those operations, which would effectively apply them to your application,
and presumably update your real file system amongst other things (like updating some tables in the database for instance).



  
How does it work
------------------

The **vfs** exposes the following operations:

- get
- has
- add
- remove
- update
- reset
- commit


All of those operations operate in a **context**. A context is just an organizational unit.

Basically, the **vfs** has a **root** directory, and each direct children of that root directory represents a **context**.

With all the operations you must provide the context id, which is the name of the context directory the operation will be stored into.  

So you can have as many contexts as you want, and work with multiple contexts at the same time, as long as you provide the right **context id**.

All the information of the vfs is stored as files in the appropriate context.

So the basic idea is that the **vfs** stores all the operations as they come (for instance add, remove, add, update, add, add, remove, ...).

From there you can either:

- reset: will destroy everything in that context (use this when the user clicks the reset button of the form to be synced with the gui)
- commit: will provides you with the list of operations done by the user, so that your app can commit them to your model and filesystem.


Note: the **vfs** is smart enough to provide you only with the minimum number of operations necessary to represent with 100% fidelity the user actions.

The **commit** operation returns a **commit list** which your app can use as instructions to execute sequentially.

The heuristics about how the different operations interact with each other is described in the **heuristics** section of this document.


The **get**, **has**, **remove** and **update** operations require an identifier for the file. That identifier can be the file **url**, or any other identifier that you like.



The operations are stored like this in the **vfs**:

- id: string, the file identifier
- type: string, the type of operation to execute on the real server (add, remove or update)
- ?path: string, the path to the uploaded file
- ?meta: array, the meta attached to the file


The **path** and **meta** properties are available for the **add** and **update** operations, but not the **delete** operation. 


This information is returned as an array when you call the **get** method.



I use [babyYaml](https://github.com/lingtalfi/BabyYaml) files as the storage, for the readability.


When you call the **add** method, it returns you the operation entry stored in the **vfs**, so that the user can keep interacting with the file (i.e. delete, update). 


When the **commit** method is called, the list of all stored operations is accessible to the commit handler, which is the
class/service responsible for committing the operations to the real environment of the application.





Heuristics
------------

The heuristics of the **vfs** operations is peculiar.
Before we try to understand it, let's expose the fact that although in practise the vfs should be always synced with the real server,
it's theoretically possible to have a vfs which is not in sync with the real server. 
So for instance the real server could have a file that the vfs is not yet aware of.

The heuristics described below take that into account.


- add: 
    - If no entry exists with the same id then the entry is added with type=add.
    
    - If an "add" entry already exists with the same id then the vfs might choose to reject the call, or to update the existing entry, but keeping the type (type="add").
    
    - If an "update" entry already exists with the same id (this shouldn't happen), the vfs rejects the operation. 
    
    - If a "remove" entry already exists with the same id (this shouldn't happen), the vfs rejects the operation. 
    

- update:
    - If no entry exists with the same id then the entry is added with type=update.
    
    - If an "add" entry already exists with the same id then the entry is updated, but it's type remains unchanged (type=add). Any attached binary file is updated as well.
    
    - If an "update" entry already exists with the same id then the entry is updated, and it's type remains unchanged (type=update). Any attached binary file is updated as well.
    
    - If a "remove" entry already exists with the same id (note that it doesn't make much sense gui wise), the remove entry is (removed and) replaced with the new entry of type=update.


- delete:
    - If no entry exists with the same id then the entry is added with type=delete.
    
    - If an "add" entry already exists with the same id then the entry is deleted. And any attached binary file along with it.
     
    - If an "update" entry already exists with the same id then the entry is deleted and replaced with a "remove" entry. And any attached binary file along with it.
    
    - If a "remove" entry already exists with the same id, this operation has no effect.














  
More blabla
------------
  
I created this system for the following occasion.

So I'm creating a widget for a web application where the users can upload their files via ajax (because ajax is cooler than
the boring **input type=file** for the user).

This widget allows not only to upload files, but also to manage them. So for instance the user can remove a file, 
and he can even edit them (add some information to them, such as tags, is_private, change the filename).


The thing with ajax uploads is that they operate in a parallel thread, which means that the file is already sent to the server
before the user submits the form (in which the widget is contained).

But what if the user just quits the page without submitting the form? Or what happens when he clicks the reset button of the form?

The only logical design (to me) with ajax threads, is that the server must not commit the user operations until the user has
submitted the form successfully.

In cases of a simple file upload, this can probably be managed with $_SESSION variables, but since I need to store file management
operations (i.e. add, update, remove, not just add), it feels natural to have a vfs, which is not committed unless the user
submits a successful form, hence ensuring that my app is always consistent with the user actions. 

I suppose that's basic application logic, but until now, I never took the time to think about that problem, so I wanted to explain
it out loud at least once.



About this implementation
----------

The vfs can store/manage information about a file, however only your application knows what this data exactly is.
In this implementation, I just provide the idea of the vfs, and a basic/abstract implementation to help you getting started,
but your app still needs to configure the vfs depending on its needs.

In other words, this implementation is just a skeleton that your app will extend.






