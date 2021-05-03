<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Interfaces;

use Ling\Light_Kit_Editor\Api\Generated\Interfaces\PageApiInterface;


/**
 * The CustomPageApiInterface interface.
 */
interface CustomPageApiInterface extends PageApiInterface
{


    /**
     * Returns all rows owned by the page identified by the given identifier.
     *
     *
     * If the page row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * Each returned row has the following structure:
     *
     * (from lke_page)
     * - page_id
     * - page_identifier
     * - page_label
     * - page_layout
     * - page_layout_vars
     * - page_title
     * - page_description
     * - page_bodyclass
     *
     *
     * (from lke_page_has_block)
     * - position_name
     * - block_index
     *
     * (from lke_block)
     * - block_id
     * - block_identifier
     *
     * (from lke_block_has_widget)
     * - widget_position
     *
     * (from lke_widget)
     * - widget_id
     * - widget_identifier
     * - widget_name
     * - widget_type
     * - widget_classname
     * - widget_dir
     * - widget_template
     * - widget_js
     * - widget_skin
     * - widget_vars
     * - widget_active
     *
     *
     *
     *
     *
     * @param string $identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getAllWidgetsByPage(string $identifier, $default = null, bool $throwNotFoundEx = false): array;
}
