Colis
===========
2016-01-12



Colis is an input form control connected to a library of user items (videos, images, you decide...).
 
 
 
Colis can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


 
 
 
Features of colis
------------
 
- management of a user's personal item's library (select item and upload item)
- auto complete feature to search an item in the library
- drop zone for uploading items to the library
- easy to extend 
- the default implementation (colis ling) handles chunk uploading 

 



Overview 
---------------


Colis is used to choose a media from a user's personal library.
So it's just an basic input control.
However, it comes with some helpers:

- an auto complete engine (helps you select a media from your library)
- a drop zone (to upload a new item directly from the form)
- a preview zone (if you are uploading a new item, this comes handy)


The drop zone and preview zone use server side scripts to achieve their goals.




Overview in images
-----------


### With Bootstrap theme

Two instances of colis on the same page.
By default, the preview zone doesn't show up until a file is uploaded/selected.

![two colis instances on the same page](http://s19.postimg.org/ewjw99k9v/colis_bootstrap_theme_show_on_startup.png)
![two collapsed colis instances](http://s19.postimg.org/4b00x9dyb/colis_bootstrap_theme.png)


### Raw theme 

![support for autocomplete](http://s19.postimg.org/4xyh3etwj/colis_autocomplete.jpg)
![support for chunking](http://s19.postimg.org/gbplsctsz/colis_chunking.jpg)
![import youtube url](http://s19.postimg.org/cgm7psan7/colis_import_youtube_url.jpg)
![upload image](http://s19.postimg.org/ez7wqgwdf/colis_upload_image.jpg)
![upload video](http://s19.postimg.org/65h09d9er/colis_upload_video.jpg)






How to use it?
-------------------


First, install the Colis planet, which means install every [Colis dependencies](https://github.com/lingtalfi/Colis#dependencies),
and map any www folder to the web dir of your app (see link at the top for more detailed instructions).
I strongly recommend that you [download the whole universe at once](https://github.com/karayabin/universe-snapshot), it makes your life easier as far as dependencies resolution
is concerned.


Also, for the specific example below, I used the [DirScanner planet](https://github.com/lingtalfi/DirScanner) 
(so you need to have the DirScanner planet too in order to run the example code as is).

Then, go to your web folder (www in this example), and create an "uploads" dir with writable permissions,
then create a "test.php" file next to it.

The structure should look like this:
  
```  
- your app:
----- www:
---------- test.php
---------- uploads:
---------- libs:
-------------- colis:
------------------ all the colis web files that you find in the planet

```  
  

Then open the "test.php" file and paste the following code.



```php
<?php


use DirScanner\YorgDirScannerTool;
require_once "bigbang.php"; // start the local universe
$uploadDir = __DIR__ . '/uploads';
$uploadedFiles = YorgDirScannerTool::getFiles($uploadDir, true, true);



?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <title>Colis</title>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/plupload/2.1.8/jquery.ui.plupload/css/jquery.ui.plupload.css"
          type="text/css"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/plupload/2.1.8/plupload.full.min.js"></script>
    <!-- other language -->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/2.1.8/i18n/fr.js"></script>-->

    <script src="https://cdn.rawgit.com/lingtalfi/JGoodies/master/jgoodies.js"></script>
    <script src="http://cdn.rawgit.com/twitter/typeahead.js/master/dist/typeahead.jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/lingtalfi/Tim/master/js/tim-functions/tim-functions.js"></script>


    <!-- ---------------------------------------------------------- -->
    <!-- LOCAL -->
    <!-- ---------------------------------------------------------- -->
    <script src="/libs/colis/js/colis.js"></script>
    <script src="/libs/colis/js/colis-ling.js"></script>
    <link rel="stylesheet" href="/libs/colis/css/colis-ling.css">
    <style>
        body {
            font: 13px Verdana;
            background: #eee;
            color: #333;
        }
    </style>
</head>
<body>

<h1>Colis</h1>


<form>
    <input class="colis_selector" type="text">
    <input type="submit" value="Submit"/>
</form>


<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {
            var itemList = <?php echo json_encode($uploadedFiles); ?>;
            $('.colis_selector').colis({
                selector: {
                    items: itemList
                }
            });
        });
    })(jQuery);


</script>


</body>
</html>


```



This code will start colis on the input of the form.
Notice that I've used a bigbang call to start the universe (this is described in more details in [portable autoloader technique](https://github.com/lingtalfi/TheScientist/blob/master/convention.portableAutoloader.eng.md).
This call allows me to use any planet that I have on my local universe, and I believe the reader should take the time to make this setup too.


If you open the "test.php" with your browser at this point, you should be able to play with the basic features of 
the colis form control already.

Drop an image from your desktop to the dropzone, and watch it being uploaded in the "www/uploads" directory
while being appended to the colis.selector list at the same time.

That's it, you've got the basics.

Now before you try to upload a video or paste a youtube url, I suggest that you first 
read the [documentation](https://github.com/lingtalfi/Colis/blob/master/doc/documentation.md),
because those features might not work on your machine (unless you are a lucky person).  











Dependencies
------------------

- [lingtalfi/Bat 1.27](https://github.com/lingtalfi/Bat)
- [lingtalfi/YouTubeUtils 1.1.0](https://github.com/lingtalfi/YouTubeUtils), only if you want to get youtube preview when pasting a youtube url in the selector (input)
- [lingtalfi/Tim 1.5.0](https://github.com/lingtalfi/Tim), only if you use the colis_upload_new service, skip if you don't know what that is
- [lingtalfi/UploaderHandler 1.0.0](https://github.com/lingtalfi/UploaderHandler), only if you use the colis_upload_new service, skip if you don't know what that is



History Log
------------------
    
- 2.2.0 -- 2016-01-18

    - colis-ling: demo services now use Opaque Tim server 
    
- 2.1.0 -- 2016-01-16

    - colis-ling: read default value at startup if any 
    
- 2.0.0 -- 2016-01-14

    - reforged colis-ling services
        
- 1.1.0 -- 2016-01-13

    - colis-ling's dictionnary is now unique to all instances and globally accessible 
    - add examples for bootstrap 
    
- 1.0.0 -- 2016-01-12

    - initial commit
    
    




