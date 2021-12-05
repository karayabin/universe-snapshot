<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The StoreWebsitesListController class.
 */
class StoreWebsitesListController extends StoreSearchResultsController
{


    /**
     * Renders the websites list page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        $items = $this->prepareRender($request, [
            'itemTypes' => '1',
        ]);
        return $this->renderPage("Ling.Light_Kit_Store/websites", [
            "widgetVariables" => [
                "body.kitstore_websites_list" => [
                    "items" => $items,
                ],
            ],
        ]);
    }

}

