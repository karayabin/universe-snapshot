SelectChain
================
2016-01-16


A simple javascript object to handle a select chain.



SelectChain can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


Why?
--------

You have a form with a country select and a region select.
When the user selects a country, it should feed the region select's options.

The purpose of the selectChain object is to help you implement this kind of behaviour.



How?
---------

Install the planet (package) and play with the demos located in the "front" directory.
This planet actually contains only web assets, so you just need to map the www folder to your application's web folder
and you're all set.



You will find examples with two selects (country and region), and examples with three selects (country, region and city).


Here is how the content of the two_nodes_example.php demo file:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/selectchain/js/selectchain.js"></script>
    <title>Html page</title>
</head>

<body>
<form method="post" action="">
    <select id="country" name="country">
        <option value="france">france</option>
        <option value="italy">italy</option>
        <option value="japan">japan</option>
    </select>
    <select id="region" name="region"></select>

</form>


<script>
    (function ($) {
        $(document).ready(function () {
            var oChain = new window.selectChain();
            oChain.addNode($('#country'), '/libs/selectchain/service/country-demo.php');
            oChain.addNode($('#region'));
            oChain.start();
        });
    })(jQuery);
</script>


</body>
</html>
```


Basically, in javascript, you start by instantiating the selectChain object.
Then, you add some nodes to that object.

A node basically represents a select with information attached to it, like the url of the service used to return the options 
for the next node.

You don't need to set the url argument of the addNode method.



selectChain options
----------------------

The selectChain options are the following:

```js
{
    /**
     * Set this to true to activate tim communication with the server
     */
    useTim: false,
    /**
     * Set this to true to trigger the first node on start
     */
    triggerOnStart: false,
    /**
     * The value of this parameter will be sent as a key to the server upon a request.
     * The "type" parameter indicates to the server which select has been triggered. 
     */
    typeKeyName: 'type',
    /**
     * The value of this parameter will be sent as a key to the server upon a request.
     * The "value" parameter indicates to the server the value of the selected item
     * when the select was triggered.
     */            
    valueKeyName: 'value'
}    
```




Dependencies
------------------

- [lingtalfi/Tim 1.2.0](https://github.com/lingtalfi/Tim), only if you use a tim server


History Log
------------------
    
- 1.0.0 -- 2016-01-16

    - initial commit
    
    




