Recommended micro permission notation
===============
2019-10-30



Database interaction
---------------


We recommend the following notation:


- microPermission: {pluginName}.tables.{table}.{crudType}


With:

- pluginName: the name of the plugin handling the micro permission for this table
- table: the name of the table
- crudType: the type of the crud interaction amongst:
    - create
    - read
    - update
    - delete
    
     
