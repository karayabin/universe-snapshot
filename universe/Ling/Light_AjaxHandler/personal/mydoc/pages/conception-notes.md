Light Ajax Handler, conception notes
===================
2019-09-19 -> 2021-04-01


A lot of plugins use ajax requests.


Our service:

- provides a single route to handle any ajax requests you want (so that you don't need to create one route per request)
- provides the [alcp](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) protocol to standardize the ajax communication
- provides some helpers so that it's easy to implement an ajax end point in your app 






Overview
=========
2021-04-01


There are basically two approaches to use our service.


The first approach is to use your controller (i.e. Controller/LightAjaxHandlerController), which is always located at the same url (/ajax-handler by default).

This is done by creating an ajaxHandler class, then registering it via our service.


In the handler, you pass two parameters:

- handler
- action


See more details in the [alcp](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md) document.


The second approach is to use our handler manually (via LightAjaxHandlerService->handleViaCallable).


