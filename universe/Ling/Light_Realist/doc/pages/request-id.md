Request id
============
2019-09-24


The request id is how we identify a given request declaration in the Realist realm.


Theoretically, the **request id** is just an identifier.

Plugins can register a **requestIdHandlerInterface**, which goal is to provide the request declaration array from the request id.

Alternately, the **realist service** provides a fallback mechanism which rely on the convention explained below.

Now in practice, the **requestIdHandlerInterface** hasn't been implemented yet, because I rely only on the realist fallback mechanism,
as it has been sufficient for my needs so far.



The realist fallback mechanism
------------

So what's the convention?

The **request id** is a string with the following format:

- request id: {pluginName}:{resourceId}(:{requestDeclarationId})?


Some examples:

- Light_Kit_Admin:lud_user
- Light_Kit_Admin:lud_user:default
- Light_Kit_Admin:lud_user:main_2


The {requestDeclarationId} part defaults to the string "**default**" if omitted.

With this default mechanism, it is expected that (for the above examples) the following files exists:

- $app_dir/config/data/{pluginName}/Light_Realist/{resourceId}.byml
- $app_dir/config/data/Light_Kit_Admin/Light_Realist/lud_user.byml


And this file must contain the {requestDeclarationId} key, which value is the request declaration array.





