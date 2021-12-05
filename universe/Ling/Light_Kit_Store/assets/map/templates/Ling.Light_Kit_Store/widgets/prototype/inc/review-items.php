<?php use Ling\Bat\StringTool;


foreach ($reviewItems as $_item):
    $nbFullStars = (int)$_item['rating'];
    ?>
    <div class="customer-review-item">
        <div class="line1 d-flex align-items-center">
            <i class="bi bi-person-circle me-2"></i>
            <a href="#<?php echo $_item['id']; ?>"
               title="<?php echo $_item['id']; ?>"
               class="strong-link no-change user-name"><?php echo $_item['rating_name']; ?></a>
        </div>
        <div class="line2">
            <?php for ($j = 1; $j <= $nbFullStars; $j++): ?>
                <i class="bi bi-star-fill star"></i>
            <?php endfor; ?>
            <?php for ($j = $nbFullStars; $j < 5; $j++): ?>
                <i class="bi bi-star star"></i>
            <?php endfor; ?>


            <span class="color-alt text-mini fw-bold ms-2">Verified Purchase</span>
        </div>

        <div class="comment-title strong-color fw-bold"><?php echo $_item['rating_title']; ?></div>


        <div class="line3">
            <span class="review-date">Reviewed on <?php echo $_item['datetime']; ?></span>
        </div>
        <div class="line5">
            <p class="rating-comment color-strong">
                <?php
                $more = false;
                echo StringTool::cutAtWordBoundary($_item['rating_comment'], 250, "...", $more);
                ?>

                <?php if (true === $more): ?>
                    <a href="#" class="super-weak-link">See more</a>
                <?php endif; ?>

            </p>
        </div>
    </div>
<?php endforeach; ?>