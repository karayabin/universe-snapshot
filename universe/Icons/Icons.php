<?php

namespace Icons;


// https://github.com/lingtalfi/Icons
class Icons
{
    public static $icons = [];

    public static function printIcon($name, $color = null, $size = 24)
    {

        $fill = (null !== $color) ? 'fill="' . $color . '"' : '';
        ?>
        <svg class="icon" viewBox="0 0 24 24" <?php echo $fill; ?>
             style="width:<?php echo $size; ?>px; height: <?php echo $size; ?>px">
            <use
                    xlink:href="#<?php echo $name; ?>"></use>
        </svg>
        <?php
        self::$icons[] = $name;
    }



}