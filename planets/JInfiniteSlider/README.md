jInfiniteSlider
====================
2016-02-15



Simple jquery infinite (circular) slider.


jInfiniteSlider can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



![jquery infinite slider](http://s19.postimg.org/72050rmjn/jinfinitescoller.gif)




Features
-----------

- lightweight (about 300 lines of code)! 
- handle infinite movement in any direction, with no clip, glitch, blink, ... 
- decoupled html, css and js (you can customize your own css transitions, and use any html, but the items must have identical width though)
- adaptive slid page width (adapts to screen resizing if your slider's width is in percentage rather than fixed)
- simple api (moveLeft, moveRight)
- for modern browsers that support the css3 transform property only
- also handle finite movement if necessary (1.1) 
- in finite movement you can hook callbacks to detect first/last pages (1.1) 





How to use?
---------------



```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jinfiniteslider/js/jinfiniteslider.js"></script>
    <title>Html page</title>
    <style>
        .controls {
            margin: 0 auto;
            text-align: center;
        }

        .slider_container {
            position: relative;
            border: 1px solid gray;
            width: 90%;
            height: 150px;
            margin: 0 auto;
            overflow: hidden;
        }

        .slider {
            position: absolute;
            display: flex;
            transition: transform 2s ease;
        }

        .slider .item {
            width: 200px;
            height: 150px;
            border: 1px solid #eee;
            margin: 0 2px;
            background-size: cover;
        }
    </style>
</head>

<body>


<div class="controls">
    <button id="prev">Prev</button>
    <button id="next">Next</button>
</div>
<div class="slider_container">
    <div class="slider">

    </div>
</div>


<script>
    (function ($) {
        $(document).ready(function () {

            var nbImagesTotal = 10; // max 10 
            var jSlider = $('.slider');
            var jPrev = $('#prev');
            var jNext = $('#next');

            for (var i = 1; i <= nbImagesTotal; i++) {
                jSlider.append('<div class="item" style="background-image: url(/libs/jinfiniteslider/demo/img/image_' + i + '.gif)"></div>');
            }

            var oSlider = new infiniteSlider({
                slider: jSlider
            });


            jPrev.on('click', function () {
                oSlider.moveLeft();
                return false;
            });
            jNext.on('click', function () {
                oSlider.moveRight();
                return false;
            });

        });
    })(jQuery);
</script>

</body>
</html>
```



Or, if your slider must be in relative position, you can just tweak the css, like this:


```css
.slider {
    position: relative;   /** changed */
    transition: transform 2s ease;
    white-space: nowrap; /** changed */
}

.slider .item {
    width: 200px;
    height: 150px;
    border: 1px solid #eee;
    margin: 0 2px;
    background-size: cover;
    display: inline-block;  /** changed */
}
```







Options
------------



```js
{
    /**
     * @param slider: jHandle representing the slider: the element which contains the items.
     *
     * The slider should be positioned inside a so called slider_container element.
     * Note: the slider_container element is not handled by this object.
     *
     */
    slider: null,
    /**
     * @param moveIncrement - callback used to return the length of a left/right move.
     *
     *          int:lengthInPx      function(  )
     *
     *
     * By default (if null), it returns the width of the jSlider's element.
     * This method is used when the user clicks on a left/right slider control button.
     *
     */
    moveIncrement: null,
    /**
     * @param sliderFindItemsCb - callback to find the items.
     *
     *                  void    function ( jHandle:jSlider )
     *
     * It is used to mark original items (used for internal purposes).
     * By default, it selects all top level children of the slider element.
     * 
     */
    sliderFindItemsCb: null,
    /**
     * @param getContainerWidthCb - callback used to access the width of the slider's container element.
     * By default, the slider container is the slider parent.
     *
     * This is used to recalculate the mi (move increment value),
     * in case the user resizes the screen AND the slider container's width is not
     * fixed (use percentage for instance).
     *
     */
    getContainerWidthCb: null,
    /**
     * @param isInfinite - bool, whether or not to use the infinite system.
     * By default this is true; you can set it to false to have a "normal" slider behaviour.
     *
     */
    infinite: true,
    /**
     * @param onFirstLastPage - callback
     *
     * - this work only in finite mode (it doesn't make sense if infinite mode is true)
     * - return false to cancel the slide movement
     * - is called before any movement, and allows you to take action depending on whether
     *          the plugin estimates that you would land on the first or last page.
     *
     *          You can use the getFirstLastPageCb to override the plugin's default estimation mechanism.
     *
     *          This function was added so that one can show/hide the slider's movement control when
     *          necessary.
     *
     *          Note: the concept of page is inherent to this callback.
     *          It's only relevant in finite mode.
     *          Basically, when the slider is started, you are on the first page,
     *          and theoretically you would be on the last page if, after a right slide the last item
     *          wouldn't be visible.
     *
     *
     * - isFirst: bool, estimation of whether or not the slide is on the first page
     * - isLast: bool, estimation of whether or not the slide is on the last page
     * - willLandOnFirst: bool, estimation of whether or not the slide would be on the first page after the move
     * - willLandOnLast: bool, estimation of whether or not the slide would be on the last page after the move
     * - moveLeft: bool (if true, it slides to the left, if false, it slides to the right)
     * 
     * 
     * Personal note:
     *      this system works, but is not very reliable: in particular if the user clicks repeatedly 
     *      very fast on the left control for instance, she would be able to go past the left boundary,
     *      and the same logic applies to the right.
     *      It wouldn't be too hard to implement a more reliable system (keep track of a virtual slider 
     *      position, rather than the real slider pos which depends on the time needed to actually 
     *      complete the slide), but I thought it was necessary...
     *      
     *
     *
     */
    onFirstLastPage: function (isFirst, isLast, willLandOnFirst, willLandOnLast, moveLeft) {
        if (
            (true === isFirst && true === moveLeft) ||
            (true === isLast && false === moveLeft)
        ) {
            return false;
        }
    },
    /**
     * @param getFirstLastPageCb - callback
     * Decide whether or not the user is currently on the first/last page, and whether or not the user
     * will be on the first/last page after the move was performed.
     * 
     * 
     * The arguments are:
     * 
     *      firstItemLeftBoundary: int, the offset of the leftmost item's left boundary in the slider (compared to the viewport) 
     *      lastItemRightBoundary: int, the offset of the rightmost item's right boundary in the slider 
     *      firstItemLeftBoundaryAfter: int, the offset of the leftmost item's left boundary in the slider, if the slide was performed
     *      lastItemRightBoundaryAfter: int, the offset of the rightmost item's right boundary in the slider, if the slide was performed
     * 
     * Returns an array of four elements: [isFirstPage, isLastPage, willLandOnFirstPage, willLandOnLastPage];
     */
    getFirstLastPageCb: function (firstItemLeftBoundary, lastItemRightBoundary, firstItemLeftBoundaryAfter, lastItemRightBoundaryAfter) {
        var firstPage = (firstItemLeftBoundary >= 0);
        var lastPage = (lastItemRightBoundary - getMoveIncrement() <= parseInt(jSlider.parent().offset().left));
        var willLandOnFirst = (firstItemLeftBoundaryAfter >= 0);
        var willLandOnLast = (lastItemRightBoundaryAfter - getMoveIncrement() <= parseInt(jSlider.parent().offset().left));
        return [firstPage, lastPage, willLandOnFirst, willLandOnLast];
    } 
}
```



Conception
--------------

Want to know more about infinite slider? 
Check out the [conception document](https://github.com/lingtalfi/jInfiniteSlider/blob/master/doc/conception.md). 



Related
-----------

- [lys: Infinite scroll plugin](https://github.com/lingtalfi/Lys)
- [jItemSlider: Simple responsive jquery infinite (circular) slider, based on items](https://github.com/lingtalfi/jItemSlider)




History Log
------------------
    
- 1.2.0 -- 2016-02-22

    - add onFirstLastPageBlockMove option
    - add better handling of onFirstLastPage's inner system
    
- 1.1.0 -- 2016-02-22

    - add infinite option
    - add onFirstLastPage and getFirstLastPageCb callbacks
    
- 1.0.0 -- 2016-02-16

    - initial commit
    
    

