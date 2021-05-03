<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface;
use Ling\Light_Kit_Editor\Api\Generated\Classes\PageApi;


/**
 * The CustomPageApi class.
 */
class CustomPageApi extends PageApi implements CustomPageApiInterface
{


    /**
     * Builds the CustomPageApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    public function getAllWidgetsByPage(string $identifier, $default = null, bool $throwNotFoundEx = false): array
    {
        $ret = $this->pdoWrapper->fetchAll("

select 
    p.id as page_id,
    p.identifier as page_identifier,
    p.label as page_label,
    p.layout as page_layout,
    p.layout_vars as page_layout_vars,
    p.title as page_title,  
    p.description as page_description,
    p.bodyclass as page_bodyclass,
    
    h.position_name,
    h.block_index,
    
    z.id as block_id,
    z.identifier as block_identifier,
    
    h2.position as widget_position,
    
    w.id as widget_id,
    w.identifier as widget_identifier,
    w.name as widget_name,
    w.type as widget_type,
    w.classname as widget_classname,
    w.widget_dir,
    w.template as widget_template,
    w.js as widget_js,
    w.skin as widget_skin,
    w.vars as widget_vars,
    w.active as widget_active
    
    
    
    

from lke_page p
left join lke_page_has_block h on h.page_id=p.id
left join lke_block z on z.id=h.block_id
left join lke_block_has_widget h2 on h2.block_id=z.id
left join lke_widget w on w.id=h2.widget_id

where
    p.identifier=:identifier

", [
            "identifier" => $identifier,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with identifier=$identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


}
