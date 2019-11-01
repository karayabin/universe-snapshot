<?php


namespace Ling\Bootstrap4AdminTable\Renderer;


use Ling\Bootstrap4AdminTable\RendererWidget\ActionButtonsRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\AdvancedSearchRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\DebugWindowRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\GlobalSearchRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\ListGeneralActionRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\NeckFiltersRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\NumberOfItemsPerPageRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\NumberOfRowsInfoRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\PaginationRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\RelatedLinksRendererWidget;
use Ling\Bootstrap4AdminTable\RendererWidget\ToolbarRendererWidget;


/**
 * The StandardBootstrap4AdminTableRenderer class.
 */
class StandardBootstrap4AdminTableRenderer extends Bootstrap4AdminTableRenderer
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerWidget("advanced_search", new AdvancedSearchRendererWidget());
        $this->registerWidget("related_links", new RelatedLinksRendererWidget());
        $this->registerWidget("debug_window", new DebugWindowRendererWidget());
        $this->registerWidget("global_search", new GlobalSearchRendererWidget());
        $this->registerWidget("neck_filters", new NeckFiltersRendererWidget());
        $this->registerWidget("number_of_items_per_page", new NumberOfItemsPerPageRendererWidget());
        $this->registerWidget("number_of_rows_info", new NumberOfRowsInfoRendererWidget());
        $this->registerWidget("pagination", new PaginationRendererWidget());
        $this->registerWidget("toolbar", new ToolbarRendererWidget());
        $this->registerWidget("general_actions", new ListGeneralActionRendererWidget());
    }
}