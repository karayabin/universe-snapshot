Ajax services
====================
2017-05-05



By convention in kamille, we use the "/service" uri namespace to enclose all services uris.

A service is basically just a script called via ajax.

Modules' services are accessed via the "/service/$ModuleName" uri, which only consumes one route per module.

Usually, there is a ModuleNameAjaxController handling all the ajax requests for that module.