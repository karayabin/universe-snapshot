Ajax light communication protocol
================
2020-04-10 -> 2020-08-21




This protocol describes the communication between two actors:

- a client
- a server

The communication operates via ajax.

The goal is that the client can execute any operation on the server.




The client http request must send the following via POST:

- **handler**: `string`, the name of the handler. The handler must be registered to our service beforehand.
- **action**: `string`, the name of the action to execute (by the handler). 



Other params might be added via POST and/or GET. 



The **handler** must be an instance of **AjaxHandlerInterface**.


The server will respond with an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md).