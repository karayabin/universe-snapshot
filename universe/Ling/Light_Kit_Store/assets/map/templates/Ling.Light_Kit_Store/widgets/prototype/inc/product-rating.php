<?php

use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;
use Ling\Light_Kit_Store\Controller\StoreBaseController;


$avgRating = round($item['avg_rating'], 1);


/**
 * @var $this LightKitPrototypeWidgetHandler
 */

/**
 * @var $controller StoreBaseController
 */
$controller = $this->getControllerVar("controller");
$urlRating5 = $controller->getLink("lks_route-ratings", [
    'ratings' => 5,
]);


?>


<?php if (null !== $avgRating):


    $totalNbRatings = $item['nb_ratings'];


    $nbFullStars = (int)$avgRating;
    $hasHalf = ($avgRating - $nbFullStars) > 0;


    ?>
    <div class="ratings">
        <div class="stars d-inline-block">
            <?php for ($j = 1; $j <= $nbFullStars; $j++): ?>
                <i class="bi bi-star-fill star"></i>
            <?php endfor; ?>
            <?php if (true === $hasHalf): ?>
                <i class="bi bi-star-half star"></i>
            <?php endif; ?>
            <?php for ($j = $nbFullStars + (int)$hasHalf; $j < 5; $j++): ?>
                <i class="bi bi-star star"></i>
            <?php endfor; ?>


            <div class="dd-dropdown">

                <div class="position-relative">

                    <div class="dropdown-menu dd-menu p-4">
                        <div class="container__arrow container__arrow--tc"></div>
                        <?php require_once __DIR__ . "/rating-summary.php"; ?>
                    </div>
                </div>
            </div>
        </div>


        <a href="#" class="nb-comments"><?php echo $totalNbRatings; ?></a>
    </div>
<?php endif; ?>



