<?php


/**
 * required vars:
 *
 * - $item
 * - $controller
 *
 *
 */

$avgRating = round($item['avg_rating'], 1);
$totalNbRatings = $item['nb_ratings'];


$nbFullStars = (int)$avgRating;
$hasHalf = ($avgRating - $nbFullStars) > 0;


if (false === isset($showDisplayAllCommentsLink)) {
    $showDisplayAllCommentsLink = true;
}

?>
<div class="dd-container">
    <div class="dd-ratings mb-2">
            <span class="dd-stars">
                    <?php use Ling\Bat\MiniCsvTool;

                    for ($j = 1; $j <= $nbFullStars; $j++): ?>
                        <i class="bi bi-star-fill dd-star"></i>
                    <?php endfor; ?>
                <?php if (true === $hasHalf): ?>
                    <i class="bi bi-star-half dd-star"></i>
                <?php endif; ?>
                <?php for ($j = $nbFullStars + (int)$hasHalf; $j < 5; $j++): ?>
                    <i class="bi bi-star star"></i>
                <?php endfor; ?>

            </span>

        <span class="dd-title ms-2"><?php echo $avgRating; ?> out of 5</span>
    </div>

    <div class="dd-nb-eval mb-3"><?php echo $totalNbRatings; ?>
        global
        ratings
    </div>

    <div class="rating-stats mb-3">

        <?php

        $kvPairs = MiniCsvTool::getCsvPairs($item['ratings']);
        for ($i = 5; $i >= 1; $i--):


            $nbStarForThatSlice = $kvPairs[$i] ?? 0;
            $percentForThatSlice = round((100 * $nbStarForThatSlice) / $totalNbRatings, 0);


            $sUrl = htmlspecialchars($controller->getLink("lks_route-ratings", [
                'rating' => $i,
                'item' => $item['label'],
                'id' => $item['id'],
            ]));

            ?>

            <div class="rating-link dd-line d-flex align-items-center mb-3">
                <a href="<?php echo $sUrl; ?>" class="d-none">Customer reviews for ratings with <?php echo $i; ?>
                    stars</a>
                <div class="text-nowrap me-3"><?php echo $i; ?>&nbsp;star
                </div>

                <div class="d-block w-100 me-3">
                    <div class="progress">
                        <div class="progress-bar star-progress-bar" role="progressbar"
                             aria-valuenow="<?php echo $percentForThatSlice; ?>"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             style="width: <?php echo $percentForThatSlice; ?>%;"></div>
                    </div>
                </div>

                <div><?php echo $percentForThatSlice; ?>%</div>
            </div>
        <?php endfor; ?>

    </div>

    <hr class="dropdown-divider mb-3">


    <?php if (true === $showDisplayAllCommentsLink): ?>
        <div class="text-center p-2">
            <a class="weak-link dd-see-all-comments-link" href="#">See
                all
                comments
                ></a>
        </div>
    <?php endif; ?>

</div>