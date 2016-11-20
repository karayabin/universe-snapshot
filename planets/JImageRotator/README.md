jImageRotator
=================
2016-02-18



simple image rotator for jquery.



jImageRotator can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


![image rotator](http://s19.postimg.org/h4fdmvieb/imagerotator.gif)


Features
------------

- lightweight, less than 100 lines of code
- decoupled css and js (you can use your own css transitions)
- simple to use 




How to?
-------------


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jimagerotator/js/jimagerotator.js"></script>
    <title>Html page</title>
    
    <style>

        .image_rotator {
            position: relative;
            background-color: black;
            width: 400px;
            height: 200px;
        }

        .image_rotator  img {
            position: absolute;
            top: 0;
            z-index: 1;
            opacity: 0;
            transition: all 0.750s ease;
        }

        .image_rotator  .active {
            z-index: 2;
            opacity: 1;
            transition: all 0.4s ease;
        }
    </style>
</head>

<body>


<div class="image_rotator">
    <img src="http://lorempixel.com/400/200/abstract">
    <img src="http://lorempixel.com/400/200/animals">
    <img src="http://lorempixel.com/400/200/business">
</div>


<script>
    (function ($) {
        $(document).ready(function () {
            $('.image_rotator').imageRotator({
                timer: 2200
            });
        });
    })(jQuery);
</script>

</body>
</html>
```




Options
------------
```js
{
    /**
     * @param timer - int, the time to wait before fire the next rotation
     */
    timer: '2200',
    /**
     * @param activeClass - string, the css class of the current active element.
     */
    activeClass: 'active'
}
```





Methods
-------------

- freeze: to pause the rotation of items
- unfreeze: to resume the rotation of items



Conception notes
--------------------

The image rotator plugin counts how many elements (images) you have inside the 
given container (.image_rotator in the example).

If there is more than one element, the **rotation** occurs.

A rotation switches the **active** class from one element to another, and that's it, that's all the plugin does: switching
the active state.

Then with help of css, you build on that fact to achieve the desired effect.
 
 




 
History Log
------------------
    
- 1.1.1 -- 2016-02-20

    - fix unfreeze not working
    - add double checking on an if block to avoid warning
    
- 1.1.0 -- 2016-02-19

    - add freeze/unfreeze methods
    
- 1.0.0 -- 2016-02-18

    - initial commit
    
     

