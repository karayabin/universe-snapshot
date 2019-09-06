<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The DebugWindowRendererWidget class.
 *
 * This class renders a debug window.
 * We usually use this to display debug information that comes from the server (via an ajax request).
 *
 */
class DebugWindowRendererWidget extends AbstractRendererWidget
{


    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <div class="card-text mb-5 border border-info p-3 oath-debug-window"></div>
        <?php
    }


}