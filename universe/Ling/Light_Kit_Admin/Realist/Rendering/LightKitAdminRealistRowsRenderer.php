<?php


namespace Ling\Light_Kit_Admin\Realist\Rendering;


use Ling\Bat\StringTool;
use Ling\Light_Realist\Rendering\BaseRealistRowsRenderer;

/**
 * The LightKitAdminRealistRowsRenderer class.
 */
class LightKitAdminRealistRowsRenderer extends BaseRealistRowsRenderer
{


    /**
     * @overrides
     */
    protected function renderColumnContent(string $value, string $type, array $options, array $row): string
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
            case "lka-edit_link":
                $ric = $this->extractRic($row);
                $url = $this->getUrlByRoute($options['route'], $ric);
                return '<a href="' . htmlspecialchars($url) . '">' . $options['text'] . '</a>';
                break;
            case "Light_Kit_Admin.list_action":
                //
                $actionId = $options['action_id'];
                $useCsrfToken = $options['csrf_token'] ?? true;
                $includeRic = $options['include_ric'] ?? false;
                $params = $options['params'] ?? [];
                $sRic = '';

                //
                $url = $this->getAjaxHandlerServiceUrl();
                $attr = [
                    'data-param-url' => $url,
                    'data-param-ajax_handler_id' => 'Light_Kit_Admin',
                    'data-param-ajax_action_id' => $actionId,
                    'data-param-request_id' => $this->requestId,
                    'data-confirm' => "Are you sure you want to delete this row?",
                    'data-success-after' => "realist-refresh",
                ];
                if (true === $useCsrfToken) {
                    $csrfToken = $this->getCsrfSimpleTokenValue();
                    $attr['data-param-csrf_token'] = $csrfToken;

                }

                if (true === $includeRic) {
                    $ric = $this->extractRic($row);
                    $sRic = 'data-paramjson-rics=\'' . json_encode([$ric]) . '\'';
                }


                return '<a 
                    class="acplink"
                    ' .
                    StringTool::htmlAttributes($attr)
                    . ' ' . $sRic . ' ' . '
                    data-paramjson-params="' . json_encode($params) . '"
                    
                href="' . htmlspecialchars($url) . '">' . $options['text'] . '</a>';
                break;
//            case "lka-generic_ric_form_link":
//                $ric = $this->extractRic($row);
//                $url = $this->getUrlByRoute($options['route'], $ric);
//                return '<a href="' . htmlspecialchars($url) . '">' . $options['text'] . '</a>';
//                break;
            default:
                return parent::renderColumnContent($value, $type, $options, $row);
                break;
        }

    }


}