<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$column_class = $z['column_class'] ?? "col-md-4";
$boxes = $z['boxes'] ?? [];


?>

<section class="kit-bwl-glozzom_pricing_table <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php foreach ($boxes as $box):
                $title = $box['title'] ?? "";
                $price = $box['price'] ?? "";
                $description = $box['description'] ?? "";
                $features = $box['features'] ?? [];
                $btn_text = $box['btn_text'] ?? "";
                $btn_class = $box['btn_class'] ?? "";
                $btn_url = $box['btn_url'] ?? "";
                $footer_text = $box['footer_text'] ?? "";

                ?>
                <div class="<?php echo htmlspecialchars($column_class); ?>">


                    <div class="card text-center">

                        <?php if ($title): ?>
                            <div class="card-header bg-dark text-white">
                                <h3><?php echo $title; ?></h3>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">


                            <?php if ($price): ?>
                                <h4 class="card-title"><?php echo $price; ?></h4>
                            <?php endif; ?>

                            <?php if ($description): ?>
                                <p class="card-text"><?php echo $description; ?></p>
                            <?php endif; ?>

                            <?php if ($features): ?>
                                <ul class="list-group">
                                    <?php foreach ($features
                                    as $feature):
                                    $icon = $feature['icon'] ?? "";
                                    $text = $feature['text'] ?? "";
                                    ?>
                                    <li class="list-group-item">
                                        <?php if ($icon): ?>
                                            <i class="<?php echo $icon; ?>"></i>&nbsp;
                                        <?php endif; ?>
                                        <?php if ($text): ?>
                                            <?php echo $text; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </li>
                                </ul>
                            <?php endif; ?>

                            <?php if ($btn_text): ?>
                                <a href="<?php echo htmlspecialchars($btn_url); ?>"
                                   class="<?php echo htmlspecialchars($btn_class); ?>"><?php echo $btn_text; ?></a>
                            <?php endif; ?>
                        </div>

                        <?php if ($footer_text): ?>
                            <div class="card-footer text-muted"><?php echo $footer_text; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>