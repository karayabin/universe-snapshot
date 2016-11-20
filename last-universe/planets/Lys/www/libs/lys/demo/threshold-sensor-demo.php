<!DOCTYPE html>
<html>
<head>

    <title>Html page</title>


    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>

    <script src="/libs/lys/js/lys.js"></script>
    <script src="/libs/lys/plugin/sensor/threshold.js"></script>
    <script src="/libs/lys/plugin/fetcher/lorem.js"></script>
    <script src="/libs/lys/plugin/loader/wallwrapper.js"></script>


    <script src="/libs/jajaxloader/js/jajaxloader.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/jajaxloader.css">
    <!-- using the jajaxloader ventilator built-in skin  -->
    <script src="/libs/jajaxloader/skin/cssload/zenith.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/cssload/zenith.css">




    <style>
        .loader_overlay{
            align-items: flex-end;
            margin-bottom: 10%;
        }
    </style>
</head>

<body>

<div class="wall" id="page">
    <?php for ($i = 0; $i < 10; $i++): ?>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cupiditate debitis deleniti eligendi
            impedit
            libero, molestiae officiis perspiciatis porro praesentium quaerat quia quis rem saepe sed sint
            voluptate!
            Accusantium, quis?<br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam maxime, minima necessitatibus nemo
            repellendus sapiente sed unde vel. Alias atque cum eius esse facere iste nesciunt possimus quidem
            suscipit
            veritatis.
        </p>
    <?php endfor; ?>

</div>


<script>


    (function ($) {
        $(document).ready(function () {

            var jPage = $('#page');
            var lys = new Lys({
                plugins: [
                    new LysSensorThreshold(),
                    new LysFetcherLorem(),
                    new LysLoaderWallWrapper({
                        jWall: jPage,
                        onNeedData: function (jWallContainer) {
                            jWallContainer.ajaxloader();
                        },
                        onDataReady: function (jWallContainer) {
                            jWallContainer.ajaxloader("stop");
                        },
                    }),
                ],
                onDataReady: function (id, data) {
                    jPage.append('<p>' + data + '</p>');
                },
            });
            lys.start();




        });
    })(jQuery);
</script>

</body>
</html> 