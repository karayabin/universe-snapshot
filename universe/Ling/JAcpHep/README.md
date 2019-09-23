JAcpHep
===========
2019-09-23



A js tool to help with ajax communication protocol and hep.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JAcpHep
```

Or just download it and place it where you want otherwise.



Note: JAcpHep implements the [universe assets](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md) recommendation.



What is it?
==============


This tool helps handling [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol)
and [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md).





How to use
==========


The methods are:

- post ( url, data, successHandler, errorHandler )
- error ( errMsg )
- getHepParameters ( jElement )


```js

// first instantiate the tool
var acpHelper= new AcpHepHelper();

// regular call to back service
acpHelper.post(url, params, 
    function(response){
        console.log("Success, do something with the response...");
    },
    function(errorMsg, response){
        console.log("An error occurred: " + errorMsg);
});


// throw an error
acpHelper.error("This is a custom error!");


// get hep parameters from a jquery object
var jMyObject = $('#some-object');
var hepParams = acpHelper.getHepParameters(jMyObject);


```





History Log
=============

- 1.0.2 -- 2019-09-23

    - update README.md
    
- 1.0.1 -- 2019-09-23

    - implemented the universe assets idea
    
- 1.0.0 -- 2019-09-23

    - initial commit