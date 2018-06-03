<?php

namespace Models\DropDown;


use Models\Model\AbstractModel;


/**
 * This is a simpler version of the DropDownModel, it is not related to the DropDownModel.
 *
 *
 * A SimpleDropDownModel is represented by the following array:
 *
 * - label: string, the label of the dropdown
 * - ?icon: string, an icon suggestion. This has to be adapted to the concrete view tools you are using.
 *          For instance if you are using the famfam framework, you could put string like: "fa fa-pencil".
 * - items: array of item, each of which can be either:
 *
 *              - a divider: string, the string "divider"
 *              - a link: an array with the following structure:
 *                  - label: string, the label
 *                  - link: string, the link
 *                  - ?icon: an optional icon
 *
 *
 */
class SimpleDropDownModel extends AbstractModel
{

    protected $label;
    protected $icon;
    protected $items;

    public function __construct()
    {
        parent::__construct();
        $this->label = "";
        $this->items = [];
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function addLink(string $label, string $link, string $icon = null)
    {
        $item = [
            "label" => $label,
            "link" => $link,
        ];
        if ($icon) {
            $item["icon"] = $icon;
        }
        $this->items[] = $item;
        return $this;
    }

    public function addDivider()
    {
        $this->items[] = "divider";
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function getArray()
    {
        $ret = [
            "label" => $this->label,
        ];
        if ($this->icon) {
            $ret['icon'] = $this->icon;
        }
        $ret["items"] = $this->items;
        return $ret;
    }


}