<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$video_url = $z['video_url'] ?? "";
$icon = $z['icon'] ?? "fas fa-play fa-3x";
$text = $z['text'] ?? "";
$background_url = $z['background_url'] ?? "";
$background_height = $z['background_height'] ?? "200px";
$background_position = $z['background_position'] ?? "0 -300px";
$overlay_color = $z['overlay_color'] ?? "rgba(0,0,0,0.7)";


$videoId = StringTool::getUniqueCssId('parallax_header_with_video_trigger-');
$videoVideoId = $z['_video_id'];

$sStyle = "background-image: url(" . $background_url . ");";
$sStyle .= "min-height: " . $background_height . ";";
$sStyle .= "background-position: " . $background_position . ";";

?>


<section class="kit-bwl-parallax_header_with_video_trigger <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
         style="<?php echo htmlspecialchars($sStyle); ?>"
>
    <div class="dark-overlay" style="background-color: <?php echo htmlspecialchars($overlay_color); ?>">
        <div class="row">
            <div class="col">
                <div class="container p-5">
                    <a id="<?php echo $videoVideoId; ?>" href="#" class="video" data-video="<?php echo htmlspecialchars($video_url); ?>"
                       data-toggle="modal" data-target="#<?php echo $videoId; ?>">
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    </a>
                    <h1><?php echo $text; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- VIDEO MODAL -->
<div class="modal fade" id="<?php echo $videoId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
