<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The StorePagesListController class.
 */
class StorePagesListController extends StoreSearchResultsController
{


    /**
     * Renders the pages list page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        $items = $this->prepareRender($request, [
            'itemTypes' => '2',
        ]);
        return $this->renderPage("Ling.Light_Kit_Store/pages", [
            "widgetVariables" => [
                "body.kitstore_pages_list" => [
                    "items" => $items,
                ],
            ],
        ]);
    }

}

