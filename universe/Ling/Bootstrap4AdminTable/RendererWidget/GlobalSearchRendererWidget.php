<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The GlobalSearchRendererWidget class.
 */
class GlobalSearchRendererWidget extends AbstractOpenAdminTableRendererWidget
{


    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <div class="input-group oath-global-search">
            <input type="text" class="form-control rtt-emitter"
                   data-rtt-tag="general_search"
                   data-rtt-extra-tag_group="global_search"
                   data-rtt-variable="expression"
                   placeholder=""
                   aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary oath-search-btn" type="button" id="button-addon2">
                    Search
                </button>
                <button class="btn btn-outline-secondary oath-reset-btn" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <?php
    }


}