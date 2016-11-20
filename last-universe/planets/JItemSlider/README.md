jItemSlider
====================
2016-02-24



Simple responsive jquery infinite (circular) slider, based on items.


jItemSlider can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



See the animated gif demo here: http://s19.postimg.org/ittzbflcx/jitemslider.gif





Features
-----------

- lightweight
- handle infinite or finite movement 
- decoupled html, css and js (you control the slide transition with your own css)
- item based system (always aligned)
- simple api (moveLeft, moveRight)
- for modern browsers that support the css3 transform property only 





How to use?
---------------


There are three examples in the demo directory:

- [responsive slider with finite items](https://github.com/lingtalfi/jItemSlider/blob/master/www/libs/jitemslider/demo/finite.php)
- [responsive slider with infinite items opening to the right](https://github.com/lingtalfi/jItemSlider/blob/master/www/libs/jitemslider/demo/infinite_slider_open_right.php)
- [responsive slider with infinite items opening both sides](https://github.com/lingtalfi/jItemSlider/blob/master/www/libs/jitemslider/demo/infinite_slider_open_both.php)


The code below shows the second example, the infinite slider which opens to the right, and is visually represented in 
the gif at the top of this document.


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jitemslider/js/jitemslider.js"></script>


    <title>itemSlider: infinite with right opening side</title>
    <style>

        body {
            margin: 0;
            padding: 0;
        }

        .specials {
            margin-top: 50px;
            text-align: center;
        }

        .slider {
            margin: 0;
            margin-top: 50px;
            padding: 0 4%;
            position: relative;
            overflow: hidden;
        }

        .slider .handle {
            position: absolute;
            bottom: 0;
            top: 0;
            z-index: 2;
            width: 4%;
            cursor: pointer;
            color: #fff;
            text-align: center;
            background: rgba(20, 20, 20, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 65px;
        }

        .slider .handle.prev {
            left: 0px;
            opacity: 0;
        }

        .slider.active .handle.prev {
            transition: opacity 1s ease;
            opacity: 1;
        }

        .slider .handle.next {
            right: 0px;
        }

        .slider .slider_mask {
            overflow-x: visible;
        }

        .slider .slider_mask .slider_content {
            white-space: nowrap;
            display: flex;
            transition: transform 2s ease;
            position: relative;
        }

        .slider .slider_mask .slider_content .item {
            /*
            * here you decide how many items you display per page.
            * Make sure that nbItemsPerPage x (width + margin-right) = 100 (%)
            */
            width: 24.6%;
            margin-right: 0.4%;
            flex-shrink: 0;
            position: relative;
            vertical-align: top;
            white-space: normal;
            z-index: 1;
        }

        @media screen and (max-width: 700px) {
            .slider .slider_mask .slider_content .item {
                width: 33.1%;
                margin-right: 0.2%;
            }
        }

        .slider .slider_mask .slider_content .item.invisible {
            visibility: hidden;
        }

        .slider .slider_mask .slider_content .item .artwork {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            padding: 28.125% 0;
            width: 100%;
        }
    </style>
</head>

<body>


<div class="slider">
    <span class="handle prev"><span> < </span></span>
    <div class="slider_mask">
        <div class="slider_content">

        </div>
    </div>
    <span class="handle next"><span> > </span></span>
</div>
<div class="specials">
    <button id="get_first_main_item">get first main item</button>
</div>

<script>
    (function ($) {
        $(document).ready(function () {


            var cats = [
                'abstract',
                'animals',
                'business',
                'cats',
                'city',
                'food',
                'nightlife',
                'fashion',
                'people',
                'nature',
                'sports',
                'technics',
                'transport'
            ];


            var nbImagesTotal = 10;
            var jParentSlider = $('.slider');
            var jSlider = $('.slider_mask');
            var jPrev = $('.handle.prev');
            var jNext = $('.handle.next');

            var items = [];
            for (var i = 0; i < nbImagesTotal; i++) {
                items.push(cats[i % 13]);
            }


            var oSlider = new itemSlider({
                slider: jSlider,
                items: items,
                alignMargin: "half",
                infinite: true,
                animationLockTime: 2000,
                openingSide: "right",
                onLeftSlideAfter: function (bv) {
                },
                onRightSlideAfter: function (bv) {
                    jParentSlider.addClass('active');
                },
                renderItemCb: function (data) {
                    return '<div class="item"><div class="artwork" style="background-image: url(http://lorempixel.com/400/200/' + data + ')"></div></div>';
                },
                nbItemsPerPage: function () {
                    if ($(window).width() < 700) {
                        return 3;
                    }
                    return 4;
                }
            });





            jPrev.on('click', function () {
                oSlider.moveLeft();
                return false;
            });
            jNext.on('click', function () {
                oSlider.moveRight();
                return false;
            });
            $("#get_first_main_item").on('click', function () {
                console.log(oSlider.getFirstMainItem());
                return false;
            });


        });
    })(jQuery);
</script>

</body>
</html>
```



Note: this behaviour was inspired by the netflix slider as of 2016-02-24.





Initialize from existing items
----------------------------------

Sometimes, the items are already there.
In this case, you simply need to tell itemSlider how to pull out information out of those items, using the 
itemsDetect callback (v1.3.0).

See how it's done below:



```php
<?php


$cats = [
    'abstract',
    'animals',
    'business',
    'cats',
    'city',
    'food',
    'nightlife',
    'fashion',
    'people',
    'nature',
    'sports',
    'technics',
    'transport'
];




?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jitemslider/js/jitemslider.js"></script>


    <title>itemSlider: finite with already existing items</title>
    <style>

        body {
            margin: 0;
            padding: 0;
        }

        .specials {
            margin-top: 50px;
            text-align: center;
        }

        .slider {
            margin: 0;
            margin-top: 50px;
            padding: 0 4%;
            position: relative;
            overflow: hidden;
        }

        .slider .handle {
            position: absolute;
            bottom: 0;
            top: 0;
            z-index: 2;
            width: 4%;
            cursor: pointer;
            color: #fff;
            text-align: center;
            background: rgba(20, 20, 20, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 65px;
        }

        .slider .handle.prev {
            left: 0px;
            opacity: 0;
        }

        .slider.active .handle.prev {
            transition: opacity 1s ease;
            opacity: 1;
        }

        .slider .handle.next {
            right: 0px;
        }

        .slider .slider_mask {
            overflow-x: visible;
        }

        .slider .slider_mask .slider_content {
            white-space: nowrap;
            display: flex;
            transition: transform 2s ease;
            position: relative;
        }

        .slider .slider_mask .slider_content .item {
            /*
            * here you decide how many items you display per page.
            * Make sure that nbItemsPerPage x (width + margin-right) = 100 (%)
            */
            width: 24.6%;
            margin-right: 0.4%;
            flex-shrink: 0;
            position: relative;
            vertical-align: top;
            white-space: normal;
            z-index: 1;
        }

        @media screen and (max-width: 700px) {
            .slider .slider_mask .slider_content .item {
                width: 33.1%;
                margin-right: 0.2%;
            }
        }

        .slider .slider_mask .slider_content .item.invisible {
            visibility: hidden;
        }

        .slider .slider_mask .slider_content .item .artwork {
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            padding: 28.125% 0;
            width: 100%;
        }
    </style>
</head>

<body>


<div class="slider">
    <span class="handle prev"><span> < </span></span>
    <div class="slider_mask">
        <div class="slider_content">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="item">
                    <div class="artwork"
                         style="background-image: url(http://lorempixel.com/400/200/<?php echo $cats[$i % 10]; ?>)"></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <span class="handle next"><span> > </span></span>
</div>
<div class="specials">
    <button id="get_first_main_item">get first main item</button>
</div>

<script>
    (function ($) {
        $(document).ready(function () {


            var jParentSlider = $('.slider');
            var jSlider = $('.slider_mask');
            var jPrev = $('.handle.prev');
            var jNext = $('.handle.next');


            var oSlider = new itemSlider({
                slider: jSlider,
                itemsDetect: function (jItem) {
                    return {
                        url: jItem.find('> div').css('backgroundImage').slice(5, -2)
                    };
                },
                alignMargin: "half",
                infinite: false,
                animationLockTime: 2000,
                openingSide: "right",
                onLeftSlideAfter: function (bv) {
                },
                onRightSlideAfter: function (bv) {
                    jParentSlider.addClass('active');
                },
                renderItemCb: function (data) {
                    return '<div class="item"><div class="artwork" style="background-image: url(' + data.url + ')"></div></div>';
                },
                nbItemsPerPage: function () {
                    if ($(window).width() < 700) {
                        return 3;
                    }
                    return 4;
                }
            });


            var bv = oSlider.getBoundaryValue();
            // if this is not the last page, display the right handle
            if (bv < 2) {
                jNext.addClass('active');
            }
            
            
            jPrev.on('click', function () {
                oSlider.moveLeft();
                return false;
            });
            jNext.on('click', function () {
                oSlider.moveRight();
                return false;
            });
            $("#get_first_main_item").on('click', function () {
                console.log(oSlider.getFirstMainItem());
                return false;
            });


        });
    })(jQuery);
</script>

</body>
</html>
```










Methods
----------

```js
/**
 * Moves the slider to the left;
 * unless you are in finite mode and there is no more items to show on the left.
 */
moveLeft = function ()


/**
 * Moves the slider to the right;
 * unless you are in finite mode and there is no more items to show on the right.
 */
moveRight = function ()

/**
 * get the first main item's jquery handle.
 * The first main item is the first fully visible item in the slider.
 * See conception notes for more details.
 */
getFirstMainItem = function ()


/**
 * Get the current boundary value (see options.onLeftSlideAfter for more details on boundary value).
 * This allows you to show/hide the left/right handle when the plugin instantiates.
 */
getBoundaryValue = function()            
```


            
Options
------------



```js
{
    //------------------------------------------------------------------------------/
    // COMMON OPTIONS
    //------------------------------------------------------------------------------/
    /**
     * @param slider - jquery handle representing the slider mask.
     * 
     * The slider mask should contain the slider content, which contains the items.
     * 
     * <sliderMask>
     *     <sliderContent>
     *         <item/>
     *         <item/>
     *         ...
     *     </sliderContent>
     * </sliderMask>
     * 
     */
    slider: null,
    /**
     * @param items - array containing the items info
     * All items should be generated right from the beginning (i.e. no ajax call or dynamic feeding).
     */
    items: [],
    /**
     * @param itemsDetect - callback
     * If you want to start with already drawn items, define this callback to convert
     * those static items into items data.
     *
     * The callback has the following signature:
     *
     *          map:itemInfo        function ( jHandle:jItem )
     *
     */
    itemsDetect: null,    
    /**
     * @param renderItemCb - callback that renders an item given the item info 
     *              
     *              str:itemHtml      function ( map:item )    
     * 
     */
    renderItemCb: function (item) {

    },
    /**
     * @param nbItemsPerPage - callback, to sync the plugin with your css responsive design
     * 
     *              int:nbItemsPerPage     function( )
     *              
     * It returns the number of visible item on a page at any moment.
     */
    nbItemsPerPage: function () {
    },
    /**
     * @param alignMargin - string=none,
     * 
     * How to handle the margin between the left boundary of the slider mask and the left boundary of the
     * first main item.
     *
     * none (default): no margin: both boundaries are perfectly aligned
     * full: full margin. the first item starts at a distance of a full margin
     * half: half margin. the first item starts at a distance of half the (item) margin
     *
     */
    alignMargin: "none",
    /**
     * @param animationLockTime, int=2000
     * 
     * When the user clicks a left/right button, how many milliseconds to wait before those
     * buttons become functional again.
     * This is to avoid a user clicking repeatedly on the button.
     * Ideally you want to set this to the animation time (in your css).
     */
    animationLockTime: 2000,
    /**
     *
     * @param onLeftSlideAfter - callback executed after a left move
     * 
     * 
     * The boundaryValue argument.
     * 
     * A flag to detect whether or not we are on the first page or last page in finite mode.
     *
     * boundaryValue value is set to 0 in infinite mode, and is irrelevant.
     * boundaryValue value is set to 0, 1, 2 or 3 in finite mode, and is relevant.
     *
     * 0: not on first page, not on last page
     * 1: first page
     * 2: last page
     * 3: first page AND last page
     *
     *
     *
     * @conception first page, last page flags
     */
    onLeftSlideAfter: function (boundaryValue) {
    },
    onRightSlideAfter: function (boundaryValue) {
    },
    //------------------------------------------------------------------------------/
    // INFINITE RELATED OPTIONS
    //------------------------------------------------------------------------------/
    /**
     * @param infinite, bool=true
     * Whether to be in infinite mode or finite mode.
     * 
     * In finite mode, one can not slide past a boundary item (left most or rightmost).
     */
    infinite: true,
    /**
     * @param openingSide - string=both,
     * 
     * Only work in infinite mode
     * both|right
     * left is not implemented yet
     * 
     * Whatever your option is, you can start the slide by clicking the left or right handle.
     * The only difference is that in "right" mode, the plugin adds the class "invisible" to 
     * the previous extra item (the item just before the first item, see conception notes for more details),
     * which allows you to style it as visibility:hidden in your css, which in turn gives the illusion
     * that there is no element on the left when the plugin starts.
     * 
     * See the infinite_slider_open_right example in the documentation demos.
     */
    openingSide: 'both',
    /**
     * @param css - map
     * css classes used by this plugin
     */
    css: {
        item: "item",
        prev: "prev",
        next: "next",
        extra: "extra",
        main: "main",
        invisible: "invisible"
    }    
}
```



 
  
 
 



Related
-----------

- [jquery infinite slider](https://github.com/lingtalfi/jInfiniteSlider)
- [lys: Infinite scroll plugin](https://github.com/lingtalfi/Lys)




History Log
------------------
    
- 1.3.0 -- 2016-02-27

    - add option.itemsDetect
    - fix finite mode first item not aligned with responsive bug
    - add finite-with-static demo
    
    
- 1.2.0 -- 2016-02-25

    - reshape the code
    - fix options.css undefined bug
    
        
- 1.1.0 -- 2016-02-25

    - add options.css
    
- 1.0.0 -- 2016-02-24

    - initial commit
    
    

