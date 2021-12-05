<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;


/**
 * The StoreSearchResultsController class.
 */
class StoreSearchResultsController extends StoreBaseController
{


    /**
     * Renders the home page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {

        $items = $this->prepareRender($request);

        return $this->renderPage("Ling.Light_Kit_Store/search_results", [
            "widgetVariables" => [
                "body.kitstore_search_results" => [
                    "items" => $items,
                    "displayCategoriesSidebar" => true,

                ],
            ],
        ]);
    }


    /**
     * Returns the items part of the @page(list super useful information) array for a product list query, and set some common controller variables.
     *
     * Available options are:
     * - itemTypes: a string containing the item types to filter the query with. For instance: 1, 12, 13 123, ...
     *
     *
     * @param HttpRequestInterface $request
     * @param array $options
     * @return array
     */
    protected function prepareRender(HttpRequestInterface $request, array $options = []): array
    {

        $itemTypes = $options['itemTypes'] ?? null;


        $search = $request->getGetValue("search") ?? "";
        $orderBy = $request->getGetValue("orderby") ?? "_default";
        $page = $request->getGetValue("page") ?? 1;
        $authorName = $request->getGetValue("author") ?? null;


        if (null === $itemTypes) {
            $itemTypes = $request->getGetValue("it") ?? "123";
        }
        $pageLength = 8;

        $itemTypes = $this->itemTypesToArray($itemTypes);


        $itemApi = $this->getKitStoreService()->getFactory()->getItemApi();


        $info = $itemApi->getProductListItems([
            "search" => $search,
            "author" => $authorName,
            "orderBy" => $orderBy,
            "page" => $page,
            "pageLength" => $pageLength,
            "itemTypes" => array_keys($itemTypes),
        ]);
        $items = $info['rows'];




        // if the user searches by author name, all items have the same owner
        $authorLabel = "";
        if (null !== $authorName && $items) {
            $authorLabel = $items[0]['author_label'];
        }


        unset($info['rows']);
        $this->setControllerGlobalVar("StoreSearchResultsController.info", $info);
        $this->setControllerGlobalVar("StoreSearchResultsController.search", $search);
        $this->setControllerGlobalVar("StoreSearchResultsController.orderBy", $orderBy);
        $this->setControllerGlobalVar("StoreSearchResultsController.itemTypes", $itemTypes);
        $this->setControllerGlobalVar("StoreSearchResultsController.authorLabel", $authorLabel);
        return $items;
    }


    /**
     * Returns the array version of the given itemTypes.
     * It's an array of itemTypeNumber => label.
     *
     * For itemTypeNumber, numbers other than 1, 2 or 3 are excluded.
     * @param string $itemTypes
     * @return array
     */
    protected function itemTypesToArray(string $itemTypes): array
    {
        $ret = [];
        $arr = str_split($itemTypes);
        foreach ($arr as $v) {
            if ($v >= 1 && $v <= 3) {
                switch ($v) {
                    case "1":
                        $label = "websites";
                        break;
                    case "2":
                        $label = "pages";
                        break;
                    case "3":
                        $label = "widgets";
                        break;
                    default:
                        throw new LightKitStoreException("Unknown itemType: $v.");
                }
                $ret[$v] = $label;
            }
        }
        return $ret;
    }


}

