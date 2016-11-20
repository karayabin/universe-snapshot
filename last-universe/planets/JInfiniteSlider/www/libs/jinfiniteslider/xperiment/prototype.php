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
            /*width: 90%;*/
            width: 10%;
            height: 150px;
            margin: 0 auto;
            /*overflow: hidden;*/
        }

        .slider {
            position: absolute;
            display: flex;
            transition: transform 1s ease;
        }

        .slider .item {
            /*width: 200px;*/
            /*height: 150px;*/
            width: 100px;
            height: 75px;
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
    <button id="test">Test</button>
    <button id="test2">Test2</button>
</div>
<div class="slider_container">
    <div class="slider">

    </div>
</div>


<script>
    (function ($) {
        $(document).ready(function () {

            var nbImagesTotal = 3; // max 10 
            var jSlider = $('.slider');
            var jPrev = $('#prev');
            var jNext = $('#next');
            var jTest = $('#test');
            var jTest2 = $('#test2');

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


            //------------------------------------------------------------------------------/
            // PERSONAL STUFF (used while building the object)
            //------------------------------------------------------------------------------/
            var lOff = 0;
            var clones = jSlider.find('>').clone();
            jTest.on('click', function () {
                var cl = clones.clone();
                jSlider.prepend(cl);
                lOff -= cl.outerWidth(true) * 2;
                jSlider.css({
                    left: lOff + "px"
                });
                return false;
            });

            jTest2.on('click', function () {
                var cl = clones.clone();
                jSlider.append(cl);
                return false;
            });


        });
    })(jQuery);
</script>

</body>
</html>