Asset Loader
=================
2016-01-30




Load assets (js/css) in your html page.


Asset Loader can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


Features
-----------

Asset Loader has the following features:

- simple and lightweight (less than 200 lines of code)
- no dependencies
- flexible asset organization tool
- handling of css and js files, ensuring that they are loaded once only (based on their url)
- can read a manifest file where you specify all your items (powerful)






Nomenclature
---------------


The asset loader manages items.

An item is an array of assets. It must be registered with a name.

An asset is either a js file or a css file. 


- asset: this is a js or css file.
- item: an item is an array of assets (js, css) labeled with an itemName
- register: this is the first action to do, it's the action of defining what are the items, and what assets are they composed of
- load: once an item is registered, you can load it. To load an item is the action of dynamically injecting the item's assets into the html page
- declare: (advanced) if you have existing assets calls in your html page, you can declare them to the asset loader, so that it doesn't accidentally loads them again

                    
Example 1
----------
   
```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="/libs/assetloader/js/assetloader.js"></script>
    <title>Html page</title>
</head>

<body>


<div id="blue">I've got the blues</div>

<script>
    //------------------------------------------------------------------------------/
    // FIRST REGISTER ALL YOUR LIBRARIES, that's the cost to pay...
    //------------------------------------------------------------------------------/
    assetLoader.registerItems({
        jquery: 'http://code.jquery.com/jquery-2.1.4.min.js',
        fake: [
            '/libs/assetloader/demo/fake/js/fake.js',
            '/libs/assetloader/demo/fake/css/fake.css'
        ]
    });

    //------------------------------------------------------------------------------/
    // NOW YOU CAN DYNAMICALLY INJECT ASSETS IN YOUR PAGE
    //------------------------------------------------------------------------------/
    assetLoader.loadItems(['jquery', 'fake'], function () {
        
        fake.sayHello();
        $(document).ready(function () {
            $('#blue').css('background', 'blue');
        });
    });

</script>

</body>
</html>   
```   
   
   
Example 2
-------------
  
This other cool example, which can be found in the demo, illustrates that assets are loaded once only. 
   
   
```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="/libs/assetloader/js/assetloader.js"></script>
	<title>Html page</title>
</head>

<body>



<script>
	//------------------------------------------------------------------------------/
	// FIRST REGISTER ALL YOUR LIBRARIES, that's the cost to pay...
	//------------------------------------------------------------------------------/
	assetLoader.registerItems({
		p1: ['myplugin.js', 'myplugin2.js'],
		p2: ['myplugin.js', 'myplugin3.js'],
	});

	//------------------------------------------------------------------------------/
	// NOW YOU CAN DYNAMICALLY INJECT ASSETS IN YOUR PAGE
	//------------------------------------------------------------------------------/
	assetLoader.loadItems(['p1', 'p2'], function () {

		/**
		 * (console output: note that myplugin appears only once, although it belongs to both p1 and p2)
		 * inside myplugin
		 * inside myplugin2
		 * inside myplugin3
		 */

		assetLoader.loadItems('p2', function () {

			/**
			 * (No extra console output, because p2 is already loaded)
			 */

		});
	});

</script>

</body>
</html>      
```   
   
   
Methods
-----------
   
All methods are static.
   
   
You have the following js api:


### registerItem


```js
void          registerItem ( str:name, array:assets )
```

Register the item $name with the given $assets.

This is the first step: you cannot use an item without registering it.

An easy way to register all your items at once is to use a manifest (search for manifest in this document for more info). 

                        
### registerItems            
            
```js            
void          registerItems ( map:names2Assets )
```

Register multiple items at once, internally use the registerItem method.

names2Assets is an array of name => assets (array).
                

### setPosition                 
       
```js       
void          setPosition ( str:position=head )
```
Define where the js assets will be injected in the html page.

The css assets will always be injected into the html head.

The value can be either head or bodyEnd.

The default is head.



### getLoadedItems

```js
array         getLoadedItems ()
```
Return the array of currently loaded items names.
                        
Note: only items loaded with the asset loader, via the loadItem method will 
be detected (i.e. if you have manually injected libraries, the asset loader doesn't 
know about them)



### isLoaded              
          
```js          
bool          isLoaded ( str:name )
```
Return whether or not the item is currently loaded.
                
    
                        
### loadItems           

```js
void          loadItems ( str|array:items, ?callable:success )
```
Load items, then execute the success callback if defined.
The items parameter can be either an item name (string), or an array of item names.
The callback is only executed when all the assets of all the given items are loaded.



### declareLoadedItems

```js
void          declareLoadedItems ( str|array:items )
```                        
If you write your assets directly in the html code, then the assetLoader doesn't know about them.

The problem with that is that you then use the loadItems method, assetLoader will load any asset that it's not aware of,
and you might end up with a library (or asset) called multiple times.

Depending on the asset, it might be a problem.
 
The declaredLoadedItems method allows us to manually rectify this problem by putting items 
directly in the assetLoader's "memory".

In other words, the assetLoader will consider any item passed to the declareLoadedItems as loaded.

                        
                        
                        
                        
Using a manifest
--------------------

Since 1.1.0, there is a php helper class that we can use to read the items from a simple txt file.

The text file is called a manifest, and looks like this:

```txt
jquery:
http://code.jquery.com/jquery-2.1.4.min.js

fake:
/libs/assetloader/demo/fake/js/fake.js
/libs/assetloader/demo/fake/css/fake.css
```


Basically, you first declare the item name followed by a colon,
and then each subsequent lines (with no blank lines in between) is an asset that composes that item.

Comments are allowed (since 1.4.0); comments are lines that start with the sharp symbol (#).

Using a manifest has some benefits:

- all your assets are centralized in one place
- this make it easier to organize your items
 
 


### Example of asset loader with manifest

```php
<?php
use AssetLoader\Tool\ManifestReaderTool;

require_once "bigbang.php"; // start the local universe

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="/libs/assetloader/js/assetloader.js"></script>
    <title>Html page</title>
</head>

<body>


<div id="blue">I've got the blues</div>

<script>
    //------------------------------------------------------------------------------/
    // FIRST REGISTER ALL YOUR LIBRARIES, that's the cost to pay...
    //------------------------------------------------------------------------------/
    assetLoader.registerItems(<?php echo json_encode(ManifestReaderTool::fetchItems(__DIR__ . "/libs/assetloader/demo/service/libs.txt")); ?>);

    //------------------------------------------------------------------------------/
    // NOW YOU CAN DYNAMICALLY INJECT ASSETS IN YOUR PAGE
    //------------------------------------------------------------------------------/

    assetLoader.loadItems(['jquery', 'fake'], function () {

        fake.sayHello();
        $(document).ready(function () {
            $('#blue').css('background', 'blue');
        });
    });

</script>

</body>
</html>
```



Organizing your assets as you wish
------------------------------------

Since v1.5.0, any asset can only be loaded once (based on its url), and therefore you can organize your items as you wish.

For instance, here is an organization of items per library:

```
jquery:
http://code.jquery.com/jquery-2.1.4.min.js

fake:
/libs/assetloader/demo/fake/js/fake.js
/libs/assetloader/demo/fake/css/fake.css
```


And here is another organization per page


```
page1:
http://code.jquery.com/jquery-2.1.4.min.js
/libs/assetloader/demo/fake/js/fake.js
/libs/assetloader/demo/fake/css/fake.css


page2:
http://code.jquery.com/jquery-2.1.4.min.js
/libs/anyothercode/fakecode.js
/libs/anyothercode/fakecode.css

```



You could organize your items as modules, whatever works for you. 





AssetLoaderRegistry helper
---------------------------


The AssetLoaderRegistry can read your manifest, and write corresponding asset calls in your html head.

Here is how you could use it:


```php
<?php

use AssetLoader\Registry\AssetLoaderRegistry;


AssetLoaderRegistry::readManifest(__DIR__ ."/service/libs.txt"); // first call the manifest

// then define the necessary assets for your page  
AssetLoaderRegistry::useItems([  
    'jquery',
    'commonCss',
    'wozaicCss',
    'lys',
    'lysThreshold',
]);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Html page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php AssetLoaderRegistry::writeAssets(); // now, it's just one line to write the assets, kool? ?>
    
</head>

<body>
Hi, buddy!
</body>
</html>
```
 
 





History Log
------------------
     
    
    
- 1.6.0 -- 2016-03-25

    - declareLoadedItems now also load the item's assets
    
- 1.5.0 -- 2016-03-24

    - Now assets are loaded once only
    
- 1.4.0 -- 2016-02-08

    - ManifestReaderTool now parses comments starting with the sharp symbol
    
- 1.3.2 -- 2016-02-03

    - ManifestReaderTool fix fetchItems method bad item detection again
        
- 1.3.0 -- 2016-02-01

    - assetloader.js: now js items are called synchronously, in the order they are declared (in the manifest or manually) 
    
- 1.2.1 -- 2016-02-01

    - assetloader.js: fix already loaded items skip success function call, again...
    
- 1.2.0 -- 2016-01-30

    - add AssetLoaderRegistry
    - assetloader.js: fix already loaded items skip success function call... 
    - ManifestReaderTool: fix fetchItems method blanks parsing 
    
    
- 1.1.0 -- 2016-01-30

    - add ManifestReaderTool
    
- 1.0.0 -- 2016-01-30

    - initial commit
    
    