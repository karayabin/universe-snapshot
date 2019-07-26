<?php


/**
 * @var $this ZeroAdminStatSummaryIconWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminStatSummaryIconWidget;


$card_column_class = $z['card_column_class'] ?? "col-sm-6 col-xl-3 mb-3";
$cards = $z['cards'] ?? [];


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


?>

<div class="kit-bwl-zeroadmin_statsummaryicon container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="row info-cards">


        <?php foreach ($cards as $item):
            $icon = $item['icon'];
            $value = $item['value'];
            $text = $item['text'] ?? "";
            $value_class = $item['value_class'] ?? "";
            $link_text = $item['link_text'] ?? "";
            $link_url = $item['link_url'] ?? "";
            $icon_padding = $item['icon_padding'] ?? true;

            if (true === $icon_padding) {
                $cardPad = "3";
                $iconPad = "3";
            } else {
                $cardPad = "0";
                $iconPad = "4";
            }

            ?>
            <div class="<?php echo htmlspecialchars($card_column_class); ?>">
                <div class="card">
                    <div class="card-body p-<?php echo $cardPad; ?> d-flex align-items-center">
                        <i class="<?php echo htmlspecialchars($icon); ?> mr-3 p-<?php echo $iconPad; ?>"></i>
                        <div>
                            <div class="text-sm <?php echo htmlspecialchars($value_class); ?>"><?php echo $value; ?></div>
                            <div class="text-muted text-uppercase font-weight-bold small"><?php echo $text; ?></div>
                        </div>
                    </div>
                    <?php if ($link_text): ?>
                        <div class="card-footer px-3 py-2">
                            <a class="btn-block text-muted d-flex justify-content-between align-items-center"
                               href="<?php echo htmlspecialchars($link_url); ?>">
                                <span class="small font-weight-bold"><?php echo $link_text; ?></span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>