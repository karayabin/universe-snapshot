<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/jitemslider/js/jitemslider.js"></script>


    <title>itemSlider: infinite with both opening side</title>
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
                openingSide: "both",
                onLeftSlideAfter: function (bv) {
                },
                onRightSlideAfter: function (bv) {
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