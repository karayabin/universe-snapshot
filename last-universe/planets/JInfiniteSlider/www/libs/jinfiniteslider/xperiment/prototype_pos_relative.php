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
            position: relative;
            transition: transform 2s ease;
            white-space: nowrap;
        }

        .slider .item {
            width: 200px;
            height: 150px;
            border: 1px solid #eee;
            margin: 0 2px;
            background-size: cover;
            display: inline-block;
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