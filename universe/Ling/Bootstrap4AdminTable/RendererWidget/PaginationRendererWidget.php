<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The PaginationRendererWidget class.
 */
class PaginationRendererWidget extends AbstractOpenAdminTableRendererWidget
{

    /**
     * @implementation
     */
    public function render()
    {
        ?>
        <nav aria-label="Page navigation example" class="oath-pagination">
            <ul class="pagination pagination-sm justify-content-start">
                <li class="page-item oath-pagination-item" data-type="first">
                    <a class="page-link" href="#" aria-label="First">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </li>
                <li class="page-item oath-pagination-item" data-type="prev">
                    <a class="page-link" href="#" aria-label="Previous">
                        <i class="fas fa-step-backward"></i>
                    </a>
                </li>


                <li class="page-item oath-pagination-item oath-pagination-item-model">
                    <a class="page-link oath-number-holder" href="#">1</a>
                </li>


                <li class="page-item oath-pagination-item" data-type="next">
                    <a class="page-link" href="#" aria-label="Next">
                        <i class="fas fa-step-forward"></i>
                    </a>
                </li>
                <li class="page-item oath-pagination-item" data-type="last">
                    <a class="page-link" href="#" aria-label="Last">
                        <i class="fas fa-fast-forward"></i>
                    </a>
                </li>
            </ul>


            <span
                    class="d-none rtt-emitter"
                    data-rtt-tag="limit"
                    data-rtt-extra-tag_group="pagination"
                    data-rtt-variable="page"
                    data-rtt-value="1"
            ></span>

        </nav>
        <?php
    }


}