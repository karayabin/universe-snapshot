Light_UserData permissions
==========
2020-02-25



We provide one [permission](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md):

- Light_UserData.user, this permission allows the use of methods which generally update the state of the **Light_UserData** tables in the database.

    Those methods include:
    - list 
    - save
    - removeResourceByUrl
    - update2SvpResource
    
- Light_UserData.admin, this permission allows the user to update all our tables (starting with luda prefix), including altering other user's records.


We don't provide a **permission group**, so you need to attach the **Light_UserData.user** permission to a **permission group** of your choice
before you can use the aforementioned methods.