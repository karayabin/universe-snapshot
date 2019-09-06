AjaxCommunicationProtocol
===========
2019-09-05



A simple communication protocol for ajax actors.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/AjaxCommunicationProtocol
```

Or just download it and place it where you want otherwise.




The ajax communication protocol
======================

There are two actors:

- the client: which sends a request to the server, and process the response
- the server: which process the request sent by client, and returns a response


The request is done via POST.
The response is a json array which structure depends on whether the response is erroneous or successful.


In case of an erroneous response, the json response array has the following structure:

- type: error (fixed string)
- error: string, the error message


In case of a successful response, the json response array has the following structure:

- type: success (fixed string)
- ... (depending on what the client and the server have agreed upon)










History Log
=============

- 1.0.0 -- 2019-09-05

    - initial commit