<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$items = $z['items'] ?? [];

$sliderId = $z['_slider_id'];

?>

<section class="kit-bwl-slick_testimonial_carousel <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php if ('' !== $title): ?>
            <h2 class="text-center"><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="row text-center">
            <div class="col">
                <div id="<?php echo $sliderId; ?>" class="slider">

                    <?php foreach ($items as $item): ?>
                        <div>
                            <blockquote class="blockquote">
                                <?php if ('' !== $item['text']): ?>
                                    <p class="mb-0">
                                        <?php echo $item['text']; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ('' !== $item['author']): ?>
                                    <footer class="blockquote-footer">
                                        <?php echo $item['author']; ?>
                                    </footer>
                                <?php endif; ?>
                            </blockquote>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>