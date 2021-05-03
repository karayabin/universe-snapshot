Recipe: create a controller
===========
2020-06-04


Copy/paste/adapt **/myapp/universe/Ling/Light_Kit_Admin/Controller/DashboardController.php**.




To render a layout using kit (recommended technique):

- Use **renderPage** will just render the layout
- Use **renderAdminPage** will render the layout, and check that the user has the **Ling.Light_Kit_Admin.user** permission.




The page argument
---------
2020-06-04


The **page** argument is representing the relative path to the page configuration file,
from the **/myapp/config/** dir.

So for instance:

```Light_Kit_Admin/Ling.Light_Kit/zeroadmin/zeroadmin_login``` will be configured from 

**/myapp/config/data/Ling.Light_Kit_Admin/Ling.Light_Kit/zeroadmin/zeroadmin_login.byml**







