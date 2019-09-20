<?php


namespace Ling\Light_Realist\AjaxHandler;


use Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler;
use Ling\Light_Csrf\Service\LightCsrfService;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\Service\LightRealistService;

/**
 * The LightRealistAjaxHandler class.
 *
 */
class LightRealistAjaxHandler extends ContainerAwareLightAjaxHandler
{


    /**
     * Process the given parameters, and returns the appropriate response.
     * The @page(realist-tag-transfer protocol) is assumed.
     *
     * For the csrf token, the token name has to be: realist-request.
     *
     *
     *
     * @implementation
     */
    public function handle(string $actionId, array $params): array
    {
        $response = [];
        switch ($actionId) {
            case "realist-request":


                $this->checkCsrfToken("realist-request", $params);


                //--------------------------------------------
                // REALIST REQUEST
                //--------------------------------------------
                if (array_key_exists("request_id", $params)) {
                    $requestId = $params['request_id'];
                    $tags = $params['tags'] ?? [];
                    $params = [
                        "tags" => $this->prepareTags($tags),
                    ];

                    /**
                     * @var $service LightRealistService
                     */
                    $service = $this->getContainer()->get("realist");
                    $res = $service->executeRequestById($requestId, $params);

                    $response = [
                        "type" => "success",
                        "rows" => $res['rows_html'],
                        'nb_total_rows' => $res['nb_total_rows'],
                        'current_page_first' => $res['current_page_first'],
                        'current_page_last' => $res['current_page_last'],
                        'nb_pages' => $res['nb_pages'],
                        'nb_items_per_page' => $res['nb_items_per_page'],
                        'page' => $res['page'],
                        'sql_query' => $res['sql_query'],
                        'markers' => $res['markers'],
                    ];


                } elseif (array_key_exists('action_id', $params)) {
                    $actionId = $params['action_id'];
                    $handler = $this->getContainer()->get("realist")->getActionHandler($actionId);
                    $_params = $params;
                    unset($_params['action_id']);
                    $response = $handler->execute($actionId, $_params);
                } else {
                    $this->error("Request type not implemented yet.");
                }


                break;
            default:
                throw new LightRealistException("Unknown action $actionId.");
                break;
        }
        return $response;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an error message.
     * @param string $msg
     * @throws \Exception
     *
     */
    protected function error(string $msg)
    {
        throw new LightRealistException($msg);
    }


    /**
     * Returns the tags in the format expected by the LightRealistService->executeRequestById method.
     *
     * @param array $tags
     * @return array
     */
    protected function prepareTags(array $tags): array
    {
        $ret = [];
        foreach ($tags as $tagItem) {
            $tagVariables = [];
            foreach ($tagItem['variables'] as $variable) {
                $tagVariables[$variable['name']] = $variable['value'];
            }
            $tagItem['variables'] = $tagVariables;
            $ret[] = $tagItem;
        }
        return $ret;
    }


    /**
     * Checks whether the csrf token is valid, throws an exception if that's not the case.
     *
     * @param string $tokenName
     * @param array $params
     * @throws \Exception
     */
    protected function checkCsrfToken(string $tokenName, array $params)
    {
        if (array_key_exists("csrf_token", $params)) {
            /**
             * @var $csrf LightCsrfService
             */
            $csrf = $this->container->get("csrf");
            if (true === $csrf->isValid($tokenName, $params['csrf_token'], true)) {
                return;
            }
            $this->error("Invalid csrf token provided.");
        }
        $this->error("The \"crsf_token\" key was not provided with the payload.");

    }

}