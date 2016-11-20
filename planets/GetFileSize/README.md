get file size
================================
2016-01-06


Php service to get the size of the file.
  
  

It uses [tim](https://github.com/lingtalfi/Tim) under the hood.




Usage
---------

GetFileSizeService can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).

Map the www folder of this planet to your app's server root directory.

Open the [app]/www/libs/getfilesize/service/getfilesize.php file and adjust the path to the init.php file if necessary.

Now, the service is ready to be requested.

Pass the file name via POST, using the "file" as the parameter.
Here is an example using tim functions:


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://raw.githubusercontent.com/lingtalfi/Tim/master/js/tim-functions/tim-functions.js"></script>
    <title>Html page</title>
</head>

<body>


<script>
    (function ($) {
        $(document).ready(function () {

            
            var url;
            url = "https://upload.wikimedia.org/wikipedia/en/c/c4/Original_Image_before_ASTC_compression.jpg"; // 800 x 600, 163204 bytes 
            url = "https://upload.wikimedia.org/wikipedia/commons/5/5b/Ultraviolet_image_of_the_Cygnus_Loop_Nebula_crop.jpg"; // 6000 x 5208, 12651471 bytes 
            
            

            timPost("/libs/getfilesize/service/getfilesize.php", {file: url}, function (size) {
                console.log("The size is " + size);
            });


        });
    })(jQuery);
</script>

</body>
</html>
```
 
 



Options
-----------

The options to pass to the service (via POST) are:

- file: str, the url of the file you wish to obtain the size from
- ?human: define this parameter (with any value) to obtain the size in human format (with appropriated unit letters) 






Dependencies
------------------

- [lingtalfi/Tim 1.1.0](https://github.com/lingtalfi/Tim)

  
  
  
  
History Log
------------------
    
- 1.1.0 -- 2016-01-06

    - add protocol check (http or https) for security
    
    
- 1.0.0 -- 2016-01-06

    - initial commit
    
      