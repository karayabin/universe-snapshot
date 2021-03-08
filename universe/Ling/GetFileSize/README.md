GetFileSize
===========
2016-01-06 -> 2021-03-05


Php service to get the size of the file.
  
  

GetFileSize is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.GetFileSize
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/GetFileSize
```



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

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2016-01-06

    - add protocol check (http or https) for security
    
    
- 1.0.0 -- 2016-01-06

    - initial commit
    
      