<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util;


/**
 * The PhotoGalleryWidgetUtil class.
 */
class PhotoGalleryWidgetUtil
{


    /**
     * Prints the photo gallery content.
     *
     *
     * @param array $z
     * The widget variables (vars property of the @page(widget configuration array)).
     */
    public static function printPhotoGallery(array $z)
    {
        $title = $z['title'] ?? "";
        $title_class = $z['title_class'] ?? "";
        $title_level = $z['title_level'] ?? 1;
        $text = $z['text'] ?? "";
        $text_class = $z['text_class'] ?? "";
        $column_class = $z['column_class'] ?? "col-md-4";
        $row_class = $z['row_class'] ?? "mb-4";
        $nb_photos_per_row = $z['nb_photos_per_row'] ?? "3";


// doesn't do anything, ekko problem???
//$photo_height = $z['photo_height'] ?? 560;
//$photo_width = $z['photo_width'] ?? 560;
        $photos = $z['photos'] ?? [];


        $title_level = (int)$title_level;


        $cpt = 0;


        ?>
        <?php if ('' !== $title): ?>
        <h<?php echo $title_level; ?>
                class="<?php echo htmlspecialchars($title_class); ?>"><?php echo $title; ?></h<?php echo $title_level; ?>>
    <?php endif; ?>

        <?php if ('' != $text): ?>
        <p class="<?php echo htmlspecialchars($text_class); ?>"><?php echo $text; ?></p>
    <?php endif; ?>
    <div class="row <?php echo htmlspecialchars($row_class); ?>">

        <?php foreach ($photos

                       as $photo):
        $cpt++;
        ?>
        <div class="<?php echo htmlspecialchars($column_class); ?>">
            <a href="<?php echo htmlspecialchars($photo['url']); ?>" data-toggle="lightbox"
               data-gallery="img-gallery"
            >
                <img src="<?php echo htmlspecialchars($photo['url']); ?>"
                     alt="<?php echo htmlspecialchars($photo['alt']); ?>" class="img-fluid">
            </a>
        </div>

        <?php if ($nb_photos_per_row === $cpt):
        $cpt = 0; ?>
        </div>
        <div class="row <?php echo htmlspecialchars($row_class); ?>">
    <?php endif; ?>


    <?php endforeach; ?>
        </div>
        <?php
    }
}