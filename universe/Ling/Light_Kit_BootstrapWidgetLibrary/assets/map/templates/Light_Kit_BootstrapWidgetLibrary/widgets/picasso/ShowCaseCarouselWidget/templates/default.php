<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$showNavArrows = $z['show_nav_arrows'] ?? true;
$showNavIndicators = $z['show_nav_indicators'] ?? true;
$captionsVisibleSize = $z['captions_visible_size'] ?? "sm";
$items = $z['items'] ?? [];


$carouselId = $z['_carousel_id'];

?>


<section class="kit-bwl-showcase_carousel <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div id="<?php echo $carouselId; ?>" class="carousel slide" data-ride="carousel">

        <?php if (true === $showNavIndicators): ?>
            <ol class="carousel-indicators">
                <?php
                $cpt = 0;
                foreach ($items as $item):
                    $active = $item['active'] ?? false;
                    ?>
                    <li
                        <?php if (true === $active): ?>
                            class="active"
                        <?php endif; ?>
                            data-target="#<?php echo $carouselId; ?>" data-slide-to="<?php echo $cpt++; ?>"></li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>


        <div class="carousel-inner">

            <?php
            $cpt = 1;
            foreach ($items as $item):
                $active = $item['active'] ?? false;
                $sActive = (true === $active) ? 'active' : '';
                $captionAlign = $item['caption_align'] ?? 'center';
                $title = $item['title'] ?? '';
                $titleClass = $item['title_class'] ?? 'display-3';
                $text = $item['text'] ?? '';
                $textClass = $item['text_class'] ?? 'lead';
                $btnText = $item['btn_text'] ?? '';
                $btnUrl = $item['btn_url'] ?? '#';
                $btnClass = $item['btn_class'] ?? 'btn';


                ?>
                <div class="carousel-item carousel-image-<?php echo $cpt++; ?> <?php echo $sActive; ?>">
                    <div class="container">
                        <div class="carousel-caption d-none d-<?php echo htmlspecialchars($captionsVisibleSize); ?>-block text-<?php echo htmlspecialchars($captionAlign); ?> mb-5">
                            <?php if ('' !== $title): ?>
                                <h1 class="<?php echo htmlspecialchars($titleClass); ?>"><?php echo $title; ?></h1>
                            <?php endif; ?>

                            <?php if ('' !== $text): ?>
                                <p class="<?php echo htmlspecialchars($textClass); ?>"><?php echo $text; ?></p>
                            <?php endif; ?>

                            <?php if ('' !== $btnText): ?>
                                <a href="<?php echo htmlspecialchars($btnUrl); ?>"
                                   class="<?php echo htmlspecialchars($btnClass); ?>"><?php echo $btnText; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <?php if (true === $showNavArrows): ?>
            <a href="#<?php echo $carouselId; ?>" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#<?php echo $carouselId; ?>" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        <?php endif; ?>
    </div>
</section>
