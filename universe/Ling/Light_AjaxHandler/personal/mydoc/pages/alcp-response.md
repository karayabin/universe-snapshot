Alcp response
==========
2021-04-01


An alcp (ajax light communication protocol) response is an [HttpResponse](https://github.com/lingtalfi/Light/blob/master/Http/HttpResponseInterface.php)
based on an **alcp array**.


The **alcp array** (aka alcp response array) is an array of key/value pairs, which can have one of the following forms:


- success
- print
- error



Note: the **alcp response** is inspired by the [acp protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol),


Success form
----------
2021-04-01


The **alcp array** looks like this:

- type: success
- ... other key/value pairs



This is returned as an **http response** of type **json**.



Print form
----------
2021-04-01


The **alcp array** looks like this:

- type: print
- content: string, the body of the response to print directly to the output (i.e. no json)


This form returns an **http response** which body is the value of the **content** property (of the alcp response array).


Error form
----------
2021-04-01


The **alcp array** looks like this:


- type: error
- error: string, the error message


This is returned as an **http response** of type **json**.
