<?php


namespace Ling\Light_Kit_Admin\Realist\Rendering;


use Ling\Bat\StringTool;
use Ling\Light_Realist\Rendering\BaseRealistListItemRenderer;

/**
 * The LightKitAdminRealistRowsRenderer class.
 */
class LightKitAdminRealistListItemRenderer extends BaseRealistListItemRenderer
{


    /**
     * @overrides
     */
    protected function renderPropertyContent(string $value, string $type, array $options, array $row): string
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
                $includeRic = $options['include_ric'] ?? false;
                $params = $options['params'] ?? [];
                $sRic = '';

                $confirm = $options['confirmText'] ?? null;
                $confirmExecute = $options['confirmExecute'] ?? [];
                $confirmExecuteText = $confirmExecute['text'] ?? null;


                //
                $url = $this->getAjaxHandlerServiceUrl();
                $attr = [
                    'data-param-url' => $url,
                    'data-param-handler' => 'Light_Kit_Admin',
                    'data-param-action' => $actionId,
                    'data-param-request_id' => $this->requestId,
                    'data-success-after' => "realist-refresh",
                ];

                if (null !== $confirm) {
                    $attr['data-confirm'] = $confirm;
                }

                if (null !== $confirmExecuteText) {
                    $attr['data-confirm-execute'] = $confirmExecuteText;

                    $confirmExecuteLoader = $confirmExecute['loader'] ?? false;
                    if (false !== $confirmExecuteLoader) {
                        $attr['data-confirm-execute-loader'] = '1';
                    }

                    if (array_key_exists("title", $confirmExecute)) {
                        $attr['data-confirm-execute-title'] = $confirmExecute['title'];
                    }
                    if (array_key_exists("okText", $confirmExecute)) {
                        $attr['data-confirm-execute-oktext'] = $confirmExecute['okText'];
                    }
                    if (array_key_exists("cancelText", $confirmExecute)) {
                        $attr['data-confirm-execute-canceltext'] = $confirmExecute['cancelText'];
                    }
                    if (array_key_exists("loadingText", $confirmExecute)) {
                        $attr['data-confirm-execute-loadingtext'] = $confirmExecute['loadingText'];
                    }

                }
                foreach ($params as $k => $v) {
                    $attr['data-param-' . $k] = $v;
                }
                $csrfToken = $this->getCsrfSimpleTokenValue();
                $attr['data-param-csrf_token'] = $csrfToken;


                if (true === $includeRic) {
                    $ric = $this->extractRic($row);
                    $sRic = 'data-paramjson-rics=\'' . json_encode([$ric]) . '\'';
                }


                $icon = $options['icon'] ?? null;
                $text = $options['text'];

                if (null === $icon) {

                    return '<a 
                    class="acplink"
                    ' .
                        StringTool::htmlAttributes($attr)
                        . ' ' . $sRic . ' ' . '
                href="' . htmlspecialchars($url) . '">' . $text . '</a>';
                } else {
                    return '<a 
                    class="acplink"
                    title="' . htmlspecialchars($text) . '"
                    ' .
                        StringTool::htmlAttributes($attr)
                        . ' ' . $sRic . ' ' . '
                href="' . htmlspecialchars($url) . '"><i class="acplink ' . htmlspecialchars($icon) . '"'
                        .
                        StringTool::htmlAttributes($attr)
                        . ' ' . $sRic . ' ' . '></i></a>';
                }


                break;
//            case "lka-generic_ric_form_link":
//                $ric = $this->extractRic($row);
//                $url = $this->getUrlByRoute($options['route'], $ric);
//                return '<a href="' . htmlspecialchars($url) . '">' . $options['text'] . '</a>';
//                break;
            default:
                return parent::renderPropertyContent($value, $type, $options, $row);
                break;
        }

    }


}