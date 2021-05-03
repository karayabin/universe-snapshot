Recipe: create a new route for a controller
===========
2020-06-04 -> 2021-03-09



Edit **/myapp/config/data/Ling.Light_Kit_Admin/Ling.Light_EasyRoute/lka_routes.byml**.

Make sure the route name starts with the **lka_route-** prefix, to avoid name collision with other plugins' routes.

Then by convention, we use **snake_case** for the rest of the route name (after the prefix).