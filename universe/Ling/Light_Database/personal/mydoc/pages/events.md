Light_Database events
===============
2019-12-16




Light_Database provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_Database.on_$table_$action: triggered from the LightDatabasePdoWrapper->onSuccess method
    when a "database status changing" operation is triggered and executed successfully.
    With:
    - $table: the table name
    - $action: the action name, one of:
        - create (triggered for both the insert and replace methods)
        - update
        - delete
        
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md) instance with
     the following variables:
     - table: string, the table name  
     - action: string, the action triggered, one of:
        - insert  
        - repace  
        - update  
        - delete
     - query: string, the sql query being executed  
     - arguments: array, the original arguments passed to the method called by the user/developer (i.e. one of insert, replace, update, delete)  
     - return: mixed, the return value of the method called by the user/developer   