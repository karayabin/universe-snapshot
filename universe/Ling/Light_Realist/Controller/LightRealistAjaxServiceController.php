<?php


namespace Ling\Light_Realist\Controller;

use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\Service\LightRealistService;

/**
 * The LightRealistAjaxServiceController class.
 */
class LightRealistAjaxServiceController extends LightController
{


    /**
     * Process the json parameters passed via $_POST,
     * and returns the appropriate response.
     * The @page(realist-tag-transfer protocol) is assumed.
     *
     *
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function handleJsonRequest(): HttpResponseInterface
    {

        try {

            //--------------------------------------------
            // REALIST REQUEST
            //--------------------------------------------
            if (array_key_exists("request_id", $_POST)) {
                $requestId = $_POST['request_id'];
                $tags = $_POST['tags'] ?? [];
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


            } elseif (array_key_exists('action_id', $_POST)) {
                $actionId = $_POST['action_id'];
                $handler = $this->getContainer()->get("realist")->getActionHandler($actionId);
                $params = $_POST;
                unset($params['action_id']);
                $response = $handler->execute($actionId, $params);
            } else {
                $this->error("Request type not implemented yet.");
            }

        } catch (\Exception $e) {
            $response = [
                "type" => "error",
                "error" => $e->getMessage(),
            ];
        }
        return HttpJsonResponse::create($response);
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
}