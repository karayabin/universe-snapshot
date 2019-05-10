<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$columnClass = $z['column_class'] ?? "col-lg-3 col-md-6";
$showTitle = $z['show_title'] ?? true;
$showText = $z['show_text'] ?? true;
$showItems = $z['show_items'] ?? true;
$title = $z['title'] ?? "No title";
$text = $z['text'] ?? "";
$items = $z['items'] ?? [];


?>

<section class="kit-bwl-mizuxe_4c_our_staff <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php if (true === $showTitle || true === $showText): ?>
            <div class="row">
                <div class="col">
                    <div class="info-header mb-5">
                        <?php if (true === $showTitle): ?>
                            <h1 class="text-primary bp-3">
                                <?php echo $title; ?>
                            </h1>
                        <?php endif; ?>
                        <?php if (true === $showText): ?>
                            <p class="lead"><?php echo $text; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach ($items as $item):
                $icons = $item['icons'] ?? [];
                ?>
                <div class="<?php echo htmlspecialchars($columnClass); ?>">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo htmlspecialchars($item['img_url']); ?>"
                                 alt="<?php echo htmlspecialchars($item['img_alt']); ?>"
                                 class="img-fluid rounded-circle w-50 mb-3">
                            <h3><?php echo $item['name']; ?></h3>
                            <h5 class="text-muted"><?php echo $item['role']; ?></h5>
                            <p><?php echo $item['description']; ?></p>


                            <?php if ($icons): ?>
                                <div class="d-flex justify-content-center">
                                    <?php foreach ($icons as $icon): ?>
                                        <div class="p-4">
                                            <a href="<?php echo htmlspecialchars($icon['url']); ?>">
                                                <i class="<?php echo htmlspecialchars($icon['icon']); ?>"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
