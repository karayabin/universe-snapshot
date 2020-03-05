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


The methods are (all static):

- post ( url, data, successHandler, errorHandler )
- error ( errMsg )
- getHepParameters ( jElement )


```js


// regular call to back service
AcpHepHelper.post(url, params, 
    function(response){
        console.log("Success, do something with the response...");
    },
    function(errorMsg, response){
        console.log("An error occurred: " + errorMsg);
});


// throw an error
AcpHepHelper.error("This is a custom error!");


// get hep parameters from a jquery object
var jMyObject = $('#some-object');
var hepParams = AcpHepHelper.getHepParameters(jMyObject);


```





History Log
=============

- 1.2.1 -- 2019-11-19

    - update api add exception handling for bad json notation
    
- 1.2.0 -- 2019-11-19

    - update api to accommodate new hep json notation
    
- 1.1.0 -- 2019-09-25

    - update api now uses only static methods
    
- 1.0.3 -- 2019-09-24

    - fix success/error handlers not handled when undefined
    
- 1.0.2 -- 2019-09-23

    - update README.md
    
- 1.0.1 -- 2019-09-23

    - implemented the universe assets idea
    
- 1.0.0 -- 2019-09-23

    - initial commit