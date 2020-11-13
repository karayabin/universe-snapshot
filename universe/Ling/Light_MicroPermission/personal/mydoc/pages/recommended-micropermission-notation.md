Recommended micro permission notation
===============
2019-10-30 -> 2020-09-08



Database interaction
---------------
2019-10-30 -> 2020-08-21


See [storage interaction](#storage-interaction).

     


Storage interaction
---------------
2020-08-21 -> 2020-09-08



We recommend the following notation:


- microPermission: store.{storeId}.{crudType}


With:

- storeId: the identifier of the store. Typically if you store your data in a database, this is the name of the table
- crudType: the type of the crud interaction amongst:
    - create
    - read
    - update
    - delete
    - create.own
    - read.own
    - update.own
    - delete.own
    
    
    
So, you noticed that there are four basic crud types: create, read, update and delete, and four siblings with the **.own**
suffix added to them. 

The difference is this:

- the raw permission (i.e. create, read, ...) is absolute: it has no limitation. It's usually a permission you want to grant
    to the super admin of your app.
    
- the own permission (i.e. create.own, read.own, ...) is limited to what the current user of your application owns.
    It's usually the permission you grant to the regular users of your app.
    The idea is that the user can only alter the entries he/she owns.
    So typically you'll have for instance a user_notification table, and you want to check whether the user has
    the right to delete his own notifications, so that's when you will use the "delete.own" permission (in this case).
    
    
Note: now of course, the own permission is just a string at this stage, and it needs to be implemented by the service/plugin
which actually makes the permission check.             
    
     
