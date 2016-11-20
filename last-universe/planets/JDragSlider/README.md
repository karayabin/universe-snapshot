jDragSlider
================
2016-03-05



A helper drag function for your sliders.



![jquery drag slider](http://s19.postimg.org/u19r9p1b7/jdragslider.gif)


Features
-------------

- modern browsers
- lightweight (60 lines of code)
- no options, just a function
- two modes: horizontal or vertical
- depends on jquery



If you want to implement a new slider drag from scratch, you can probably just copy paste 
the code (60 lines) anywhere in your js code.

Or you can install this as a standalone object if you want.

jDragSlider can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



What does it do?
--------------------

It's just a function, and when you pass a jHandle (jquery handle) to it, it figures out the handle position
relatively to a given parent, and gives them back to you as a both a value and a percentage, by calling 
a callback of yours.

Your callback is responsible to make things move, the function itself DOES NOT move anything, 
it just provides the numbers to YOUR callback.




How to use
--------------

The following example can be found in the [demo dir](https://github.com/lingtalfi/jdragslider/blob/master/www/libs/jdragslider/demo).

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jdragslider/js/jdragslider.js"></script>
    <title>Html page</title>
    <style>

        .demo {
            margin: 0 auto;
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            margin-top: 50px;
        }

        .slider_horizontal {
            width: 250px;
            height: 25px;
            background: gray;
            position: relative;
            border-radius: 25px;
        }

        .progress {
            background: #621269;
            position: absolute;
            bottom: 0;
            border-radius: 25px;
            height: 100%;
        }

        .handle {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: rgb(255, 0, 255);
            transform: scale(1);
            cursor: pointer;
            position: absolute;
            left: 0;
            top: 0;
            margin-left: -12px;
        }

        .handle:hover {
            transition: transform 0.1s ease-out;
            transform: scale(1.3);
        }

        .handle:active {
            transform: scale(1);
            border: 2px solid #621269;
            box-shadow: #69214f 0 0 10px;
        }

        .slider_vertical {
            height: 250px;
            width: 25px;
            background: gray;
            position: relative;
            border-radius: 25px;
        }

        .slider_vertical .progress {
            height: 0%;
            width: 100%;
        }

        .slider_vertical .handle {
            margin-top: -12px;
            margin-left: 0px;
        }


    </style>
</head>

<body>

<div class="demo">
    <div class="slider_horizontal">
        <div class="progress">
            <div class="handle"></div>
        </div>
    </div>
    <div class="slider_vertical">
        <div class="progress">
            <div class="handle"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var jHorizontalHandle = $('.slider_horizontal .handle');
        var jHorizontalProgress = jHorizontalHandle.closest('.progress');
        var jVerticalHandle = $('.slider_vertical .handle');
        var jVerticalProgress = jVerticalHandle.closest('.progress');


        jHorizontalHandle.on('mousedown', function (e) {
            if (1 === e.which) { // left click
                dragSlider(jHorizontalHandle, '.slider_horizontal', true, function (v, p) {
                    jHorizontalProgress.css('width', p + '%');
                    jHorizontalHandle.css('left', v + 'px');
                });
            }
        });
        jVerticalHandle.on('mousedown', function (e) {
            if (1 === e.which) { // left click
                dragSlider(jVerticalHandle, '.slider_vertical', false, function (v, p) {
                    jVerticalProgress.css('height', p + '%');
                    jVerticalHandle.css('bottom', v + 'px');
                });
            }
        });

    });
</script>
</body>
</html>
```




The arguments
-----------------

```js
void        dragSlider (jHandle, string:closestParentSelector, bool:isHorizontal, fn, ?fnEnd);
```

- jHandle is a jquery element of your choice representing the slider handle.
- the closestParentSelector is a jquery selector indicating how to find the parent from the jHandle.
        The parent is the container element that serves as a reference for the calculations.
        It's important that the parent has exactly the size of the slider (no extra padding).
- isHorizontal: whether your slider is horizontal or vertical        
- fn: callback triggered while the jHandle is moved.
        
        Use it to implement the actual visual drag move.

        The callback will be passed two arguments:
         
            fn ( number:value, number:percent )
            
            The value represents the offset of the mouse, 
            within the **parent** (as defined above)'s boundaries.
            
            The offset grows from 0 to the width or height value of the **parent**,
            depending on the mode (horizontal or vertical).
            
            The percentage is like the offset, but the range of values grows from 0 to 100.
        
- fnEnd: callback triggered when the drag ends.

            I found it useful to implement the behaviour where the user just clicks anywhere on 
            the slider (not just on the handle), and yet you want the slider to be updated as well.
            
            Arguments are the same than the fn callback. 






History Log
------------------
    
- 1.1.0 -- 2016-03-07

    - add optional callback triggered when the drag ends
    
- 1.0.0 -- 2016-03-05

    - initial commit
    
    







