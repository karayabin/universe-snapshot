HtmlTemplate
=================
2016-01-31


A simple template system to work with jquery.



htmltemplate can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


jquery is a dependency.



Features
------------

- lightweight (less than 250 lines of code, including generous comments)
- simple placeholder replacement system
- well organized workflow
- deal with static templates (in the html page) OR dynamic templates (via http requests)
- uses php7




Example
-------------

First create your html template, use the dollar symbol to prefix a variable.


```html 
<div class="person" data-id="$id">
	<div class="row">
		<span class="name">$name</span>
		<span class="value">$value</span>
	</div>
</div>
```


Then call it from your page.

```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/libs/htmltemplate/js/htmltemplate.js"></script>
	<title>Html page</title>
</head>

<body>

<div id="container">

</div>


<script>
	(function ($) {
		$(document).ready(function () {

			htpl.dir = "/libs/htmltemplate/demo/templates"; // usually, you won't need this line, that's just because the demo has non default needs

			// we need to load all our templates first
			htpl.loadTemplates({
				person: "person.htpl"
			}, function () {




				// imagine we get rows from a call to an ajax service
				var personInfo = {
					id: 6,
					name: "marie",
					value: "haberton"
				};


				// inject the rows using default mode (called map mode)
				$('#container').append(htpl.getHtml(personInfo, 'person'));


			});
		});
	})(jQuery);
</script>


</body>
</html>
```



How does it work?
---------------------

There is a template directory which contains all your html templates.
You load them once at the beginning of your page, then you can use them when needed.

To load the templates, we use the loadTemplates method.
To use a template, we use the getHtml method.

Since v3.3.0, the loading can be done statically to reduce a lot of http requests to 0 http requests.



Methods
----------

### loadTemplates

```js
/**
 * 
 * Load the given templates and execute the given callback.
 * 
 * 
 * @param templates - map, the templates to load. 
 *                          It's an array of alias => template relative url
 * @param fnLoaded - callback, the callback to execute once the templates are ready.                          
 * @param staticContainerId - undefined|string, the css id of a (hidden) div containing the static templates.
 *                                  If this string is undefined, htpl will attempt to fetch the templates via http.
 *                                  If this string is defined, htpl will search in the html document (no http requests)               
 */
loadTemplates: function (templates, fnLoaded, staticContainerId);
```


### getHtml

```js
/**
 * Inject data in the given template, using the given method.
 * 
 * @param data - mixed, the data to inject into the template, can be of any type,
 *                      works along with the dataType parameter.
 * @param tpl - string, the alias of the template to use
 * @param dataType - string, represents the method used to inject the data into the template,
 *                          can be one of:
 *                          
 *                              - map (default), assumes that the data is a simple map of properties,
 *                                              which keys are the name of the placeholders (placeholders are used
 *                                              in the template),
 *                                              and which values are the values to replace them with.
 *                                              
 *                              - rows, assumes that the data is an array of map (as described above).
 *                              - list, assumes that the data is an array or array object.
 *                                              Your template can use the $key and $value placeholders to 
 *                                              access each array key and/or value.
 *                                              You can specify the separator (extra arg) between elements.
 *                                              The default separator is an empty string.
 * 
 */
getHtml: function (data, tpl, dataType);
```



### getListIf

Added in 3.1.0.


```js
/**
 * Check if the $key is in the $map, and if so,
 * return the html of a list.
 * The list is created using the template referred by the $listTplAlias alias,
 * and every item of the list uses the template referred by the $itemTplAlias alias.
 *
 * The list separator is $sep.
 * The list template must include the "$list" placeholder.
 *
 * If the $key is NOT in the $map, this method returns an empty string.
 *
 *
 *
 *
 * Note: This is a shorthand method based on personal experience.
 * See the documentation examples to see when it makes sense to use it.
 *
 */
getListIf: function (key, map, listTplAlias, itemTplAlias, sep);
```

#### How to use:

Please see the [getListIf demo](https://github.com/lingtalfi/HtmlTemplate/blob/master/www/libs/htmltemplate/demo/create-list-if.html) file. 

Basically, it's useful when you want a template like this,
where the colors and sports section should only be displayed IF thery are provided in a given array of data (map).

```html
<div id="container">
	Hello, my name is Roger.<br>
	<div class="colors">
		My favourite colours are:
		<ul>
			<li>blue</li>
			<li>green</li>
			<li>red</li>
		</ul>
	</div>
	<div class="sports">
		My favourite sports are:
		<ul>
			<li>karate</li>
			<li>judo</li>
			<li>kung-fu</li>
		</ul>
	</div>

</div>
```

Then you divide your content into templates, so that your main template looks like this:



```html
<div id="container">
	Hello, my name is Roger.<br>
	$colors
	$sports
</div>
```


Run the demo to see how it's done.




### map2List

Added in 3.1.0.

Note: if you are concerned with the separation of design and code, you can 
use the equivalent getHtml method with the "list" dataType.


```js
/**
 *
 * Return string.
 *
 * Call the callback on each element of the map,
 * concatenate all output to a string
 * using the given separator between each element,
 * and return the result.
 *
 *
 * @param map - a map
 * @param fn - callback
 *      string       callback ( key, value )
 *
 * @param sep - string=''
 *
 *
 *
 */
map2List: function (map, fn, sep);
```

Example:

```js
// ...

var navLinks = {
    home: "Welcome",
    products: "Products",
    contact: "Contact",
    blog: "Blog",
    about_me: "About me"
};

jMyTpl.find('.nav').html(htpl.utils.map2List(navLinks, function(k, v){
    return '<a data-id="'+ k +'" href="#">'+ v +'</a>';
}));

```




html templates notation
----------------------------

To create a placeholder, prefix it with the dollar ($) symbol.
That's all there is to it, really.



Other examples
-------------------

The examples are available in the [demos](https://github.com/lingtalfi/HtmlTemplate/tree/master/www/libs/htmltemplate/demo).

### rows mode 

Here is how you would use the rows mode:

```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/libs/htmltemplate/js/htmltemplate.js"></script>
	<title>Html page</title>
</head>

<body>

<div id="container">

</div>


<script>
	(function ($) {
		$(document).ready(function () {

			htpl.dir = "/libs/htmltemplate/demo/templates"; // usually, you won't need this line, that's just because the demo has non default needs

			// we need to load all our templates first
			htpl.loadTemplates({
				person: "person.htpl"
			}, function () {




				// imagine we get rows from a call to an ajax service
				var rows = [
					{
						id: 6,
						name: "marie",
						value: "haberton"
					},
					{
						id: 7,
						name: "pierre",
						value: "samuel"
					}
				];


				// inject the rows using rows mode
				$('#container').append(htpl.getHtml(rows, 'person', 'rows'));


			});
		});
	})(jQuery);
</script>


</body>
</html>
```



### mixing modes

Here is how you would mix map mode and rows mode.
Beside the "person template", there is another container template which contains the following:

```html
<div class="container">$persons</div>
```

Then the html code looks like this:

```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/libs/htmltemplate/js/htmltemplate.js"></script>
	<title>Html page</title>
</head>

<body>

<div id="container">

</div>


<script>
	(function ($) {
		$(document).ready(function () {

			htpl.dir = "/libs/htmltemplate/demo/templates"; // usually, you won't need this line, that's just because the demo has non default needs

			// we need to load all our templates first
			htpl.loadTemplates({
				person: "person.htpl",
				container: "container.htpl"
			}, function () {




				// imagine we get rows from a call to an ajax service
				var rows = [
					{
						id: 6,
						name: "marie",
						value: "haberton"
					},
					{
						id: 7,
						name: "pierre",
						value: "samuel"
					}
				];


				// inject the rows using default mode (called map mode)
				$('#container').append(htpl.getHtml({persons: htpl.getHtml(rows, 'person', 'rows')}, 'container'));


			});
		});
	})(jQuery);
</script>


</body>
</html>
```



The static loading example
------------------------------

So you've read that making a lot of http requests is bad.
No worries, since v3.3.0 htpl can also load templates included in your html page (0 http request).
Here is how it's done:

  
    
    

```php
<?php

use HtmlTemplate\HtmlTemplate;
require_once "bigbang.php"; // start the local universe (https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md)
HtmlTemplate::$templateDir = __DIR__ . "/libs/htmltemplate/demo/templates"; 

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/htmltemplate/js/htmltemplate.js"></script>
    <title>Html page</title>
</head>

<body>

<div id="container"></div>
<div id="html_templates" style="display: none"><?php HtmlTemplate::writeTemplates('person.htpl');?></div>

<script>
    (function ($) {
        $(document).ready(function () {

            htpl.dir = "/libs/htmltemplate/demo/templates"; // usually, you won't need this line, that's just because the demo has non default needs

            // we need to load all our templates first
            htpl.loadTemplates({
                person: "person.htpl"
            }, function () {




                // imagine we get rows from a call to an ajax service
                var personInfo = {
                    id: 6,
                    name: "marie",
                    value: "haberton"
                };


                // inject the rows using default mode (called map mode)
                $('#container').append(htpl.getHtml(personInfo, 'person'));


            }, 'html_templates');
        });
    })(jQuery);
</script>
</body>
</html>
```


Related
-----------

- [phptemplate](https://github.com/lingtalfi/PhpTemplate): a simple template system for static code 




History Log
------------------
    
- 3.4.0 -- 2016-03-24

    - HtmlTemplate::writeTemplates now accepts an array as its first argument
    
    
- 3.3.0 -- 2016-02-29

    - add static loading technique
    
    
- 3.2.0 -- 2016-02-27

    - update devError method: now throws exception
    
    
- 3.1.0 -- 2016-02-19

    - add utils.map2List
    - add list dataType to the getHtml method
    - add utils.getListIf
    
    
- 3.0.0 -- 2016-02-02

    - the library is now static, and the object is htpl
    
- 2.0.0 -- 2016-02-01

    - moved loadTemplate to loadTemplates to get rid of async problems
    
- 1.0.0 -- 2016-01-31

    - initial commit
    
    






