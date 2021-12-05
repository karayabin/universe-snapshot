<?php


/**
 * @var $this LightKitPrototypeWidgetHandler
 */


use Ling\Bat\UriTool;
use Ling\Light_Kit\WidgetHandler\LightKitPrototypeWidgetHandler;

$search = $this->getControllerVar("StoreSearchResultsController.search");
$orderBy = $this->getControllerVar("StoreSearchResultsController.orderBy");
$info = $this->getControllerVar("StoreSearchResultsController.info");


$orderByPublicMap = $info['orderByPublicMap'];
$orderByReal = $info['orderByReal'];
$orderByLabel = $orderByPublicMap[$orderByReal];

$currentUri = UriTool::getCurrentUri();


$obf = function (string $key) use ($orderByPublicMap, $currentUri): string {
    return UriTool::uri($currentUri, [
        "orderby" => $key,
    ], false);
};


?>

<div class="list-top-bar border-bottom d-flex mb-3" style="height:40px;">

    <div class="element  flex-grow-1  ps-4 text-med" style="padding-top: 9px;">
        <?php if (1 === $info['nbPages']): ?>
            <?php echo $info['nbItems']; ?> results for <span class="color-alt">"<?php echo $search; ?>"</span>
        <?php else: ?>
            <?php echo $info['firstItemIndex']; ?>-<?php echo $info['lastItemIndex']; ?> of <?php echo $info['nbItemsTotal']; ?> results

            <?php if ($search): ?>
                for
                <span class="color-alt">"<?php echo $search; ?>"</span>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="element ms-auto pe-4" style="padding-top: 6px;">
        <div class="dropdown">
            <a class="btn btn-secondary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
               data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $orderByLabel; ?>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php foreach ($orderByPublicMap as $key => $label): ?>
                    <li><a class="dropdown-item" href="<?php echo $obf($key); ?>"><?php echo $label; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
