<?php


namespace Ling\Light_Realist\AjaxHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler;
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
     *
     * @implementation
     */
    public function handle(string $action, HttpRequestInterface $request): array
    {
        $response = [];
        $params = $request->getPost();


        switch ($action) {
            case "realist-request":


                //--------------------------------------------
                // REALIST REQUEST
                //--------------------------------------------
                if (array_key_exists("request_id", $params)) {

                    $requestId = $params['request_id'];


                    $tags = $params['tags'] ?? [];
                    $csrfTokenValue = $params['csrf_token'] ?? null;


                    $params = [
                        "tags" => $this->prepareTags($tags),
                        "csrf_token" => $csrfTokenValue,
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
                    az(__FILE__, "reorganize this?");
                    $action = $params['action_id'];
                    $handler = $this->getContainer()->get("realist")->getActionHandler($action);
                    $_params = $params;
                    unset($_params['action_id']);
                    $response = $handler->execute($action, $_params);
                } else {
                    $this->error("Request type not implemented yet.");
                }


                break;
            default:
                throw new LightRealistException("Unknown action $action.");
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
            if (array_key_exists("variables", $tagItem)) {
                foreach ($tagItem['variables'] as $variable) {
                    $tagVariables[$variable['name']] = $variable['value'];
                }
            }
            $tagItem['variables'] = $tagVariables;
            $ret[] = $tagItem;
        }
        return $ret;
    }


}
