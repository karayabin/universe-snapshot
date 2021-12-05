<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The StoreWidgetsListController class.
 */
class StoreWidgetsListController extends StoreSearchResultsController
{


    /**
     * Renders the widgets list page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        $items = $this->prepareRender($request, [
            'itemTypes' => '3',
        ]);
        return $this->renderPage("Ling.Light_Kit_Store/widgets", [
            "widgetVariables" => [
                "body.kitstore_widgets_list" => [
                    "items" => $items,
                ],
            ],
        ]);
    }

}

