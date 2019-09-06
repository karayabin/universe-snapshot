<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The NumberOfRowsInfoRendererWidget class.
 */
class NumberOfRowsInfoRendererWidget extends AbstractRendererWidget
{

    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <div class="pt-2 oath-number-of-rows-info">
            Showing rows:
            <span class="nbri-current-first"></span> -
            <span class="nbri-current-last"></span> (
            <span class="nbri-total"></span> total )
        </div>
        <?php
    }


}