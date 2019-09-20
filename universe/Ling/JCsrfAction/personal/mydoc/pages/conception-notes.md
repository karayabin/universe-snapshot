Csrf Action, conception notes
================
2019-09-18



So in our web app, I believe any ajax actions should be csrf safe.

This means that every ajax call will send a csrf token, which the server would check upon.

Because there are a tons of ajax calls in a web application, we can create a tool that helps us making those calls.

This is the purpose of this tool.


Nothing is created yet, but I anticipated that a php developer would have the token value in his hand, and
he can inject it in an html element.

That's kind of the starting point: an html element with the token value injected in it.

We will use the [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md) idea to inject the csrf token value to the html element (because it's flexible).

We will reserve the special parameter name "token" to the csrf token, and the php dev can inject any other parameters he wants beside.


So for instance, the php dev can provide this element:

```html

<div 
    data-param-token="zogizoeigjoeigjz"
    data-param-action="the_action_id"
    data-param-first_name="paul"
></div>    
```

And this would create the following parameters array:

- **token**: zogizoeigjoeigjz 
- **action**: the_action_id 
- **first_name**: paul 



We believe that it's a good idea that the server side uses the **action** parameter, because it binds an identifier to an action,
and so the malicious user doesn't have an interface to play with: he either uses the action or doesn't. 

In other words, we believe the **action** parameter should be standard in most web applications.



Now back to our tool.



Here is the prototype I have in mind, it might have changed by the time you read this, but it should give you a good idea
of the intent.

Note: I'm a jquery fan, so I naturally use jquery whenever I use javascript, if necessary.
Note2: I use the "j" prefix in front of variables as a convention to indicate that the value of the variable is a jquery selection.

 
Html: 

```html

<div 
    id="your_html_element"
    data-param-token="zogizoeigjoeigjz"
    data-param-action="the_action_id"
    data-param-first_name="paul"
></div>    
```

Js: 

```js

// note: in this example I assume that the aforementioned div has been written in the html code.

var csrfAction = new CsrfAction({
    url: "/my_ajax_action_handler",
    jElement: $('#your_html_element'),
});


// use case 1: if you need the token alone
var token = csrfAction.getToken(); // returns "zogizoeigjoeigjz"

 
// use case 2 (most probably): call an ajax service
// we use the ajax communication protocol internally to determine whether it's a success or an error
// see more details at: https://github.com/lingtalfi/AjaxCommunicationProtocol

var successHandler = function(serverResponse, jElement, params){}; // params is, as you can guess, the hep (html element parameters)
var errorHandler = function(errMessage, jElement, params){};
csrfAction.post(successHandler, errorHandler);


```




