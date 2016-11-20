<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>


	<script src="/libs/lys/js/lys.js"></script>


	<script src="/libs/lys/plugin/sensor/waterball.js"></script>
	<script src="/libs/lys/plugin/fetcher/lorem.js"></script>
	<script src="/libs/lys/plugin/loader/wallwrapper.js"></script>



	<script src="/libs/jajaxloader/js/jajaxloader.js"></script>
	<link rel="stylesheet" href="/libs/jajaxloader/skin/jajaxloader.css">
	<!-- using the jajaxloader ventilator built-in skin  -->
	<script src="/libs/jajaxloader/skin/cssload/ventilator.js"></script>
	<link rel="stylesheet" href="/libs/jajaxloader/skin/cssload/ventilator.css">


	<title>Html page</title>
	<style>


		#page {
			height: 400px;
			overflow-y: scroll;
			background: #ddd;
			position: relative;
		}


	</style>
</head>

<body>

<div class="wall" id="page">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
</div>


<script>


	(function ($) {
		$(document).ready(function () {


			var jPage = $('#page');
			var lys = new Lys({
				plugins: [
					new LysSensorWaterBall({
						jTarget: jPage,
					}),
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