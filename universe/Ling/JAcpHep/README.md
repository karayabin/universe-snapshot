JAcpHep
===========
2019-09-23 -> 2021-05-01



A js tool to help with ajax communication protocol and hep.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.JAcpHep
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JAcpHep
```

Or just download it and place it where you want otherwise.



Note: JAcpHep implements the [universe assets](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md) recommendation.



What is it?
==============
2019-09-23

This tool helps handling [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol)
and [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md).





How to use
==========
2019-09-23 -> 2021-05-01

The methods are (all static):

- post ( url, data, successHandler, errorHandler, options )
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

- 1.2.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.7 -- 2021-05-01

    - add AcpHepHelper.post httpErrorHandler option
  
- 1.2.6 -- 2021-05-01

    - fix AcpHepHelper.post throws error if options not defined
  
- 1.2.5 -- 2021-04-02

    - update AcpHepHelper.post, now accepts options map
  
- 1.2.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

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