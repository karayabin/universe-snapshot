<?php


namespace Icons;


class IconsFactory
{

    public static function printIconsDefinitions()
    {

        if (count(Icons::$icons) > 0):
            ?>
            <svg style="display: none">
                <defs>
                    <?php
                    foreach (Icons::$icons as $name):

                        switch ($name) {
                            // switch
                        }
                    endforeach;
                    ?>
                </defs>
            </svg>
            <?php
        endif;
    }

}