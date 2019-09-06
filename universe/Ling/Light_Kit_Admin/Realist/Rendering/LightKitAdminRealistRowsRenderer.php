<?php


namespace Ling\Light_Kit_Admin\Realist\Rendering;


use Ling\Light_Realist\Rendering\BaseRealistRowsRenderer;

/**
 * The LightKitAdminRealistRowsRenderer class.
 */
class LightKitAdminRealistRowsRenderer extends BaseRealistRowsRenderer
{


    /**
     * @overrides
     */
    protected function renderColumnContent($value, string $type, array $options, array $row): string
    {

        switch ($type) {
            case "my_action":
                return '<button class="btn btn-primary btn-small rath-emitter"
 data-param-action_id="Light_Kit_Admin-action1"
 data-ric-id="6"
 data-ric-pseudo="my_pseudo"
 data-param-one="one"
 data-param-two="22"
 
 
 >Action 1</button>';
                break;
            case "lka_generic_ric_form_link":
                $ric = $this->extractRic($row);
                $url = $this->getUrlByRoute($options['route'], $ric);
                return '<a href="' . htmlspecialchars($url) . '">' . $options['text'] . '</a>';
                break;
            default:
                return parent::renderColumnContent($value, $type, $options, $row);
                break;
        }

    }


}