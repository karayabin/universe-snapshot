<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\SimplePdoWrapper\Util\Limit;


/**
 * The StoreProductPageController class.
 */
class StoreProductPageController extends StoreBaseController
{


    /**
     * Renders the home page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {

        $itemId = $request->getGetValue("id") ?? null;
        if (null === $itemId) {
            return $this->getRedirectResponse("404");
        }

        $item = $this->getItem($itemId);
        if (null === $item) {
            return $this->getRedirectResponse("404_product");
        }

        return $this->renderPage("Ling.Light_Kit_Store/product_page", [
            "widgetVariables" => [
                "body.kitstore_product_page" => [
                    "item" => $item,
                ],
            ],
        ]);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array of information about the item which id is given, or null if no item was found.
     *
     * See the source code for more info.
     *
     * Available options are:
     * - useReviews: bool = true. Whether to return the 8 first reviews in the array.
     *
     *
     *
     * @param int $itemId
     * @param array $options
     * @return array|null
     * @throws \Exception
     */
    protected function getItem(int $itemId, array $options = []): array|null
    {

        $useReviews = $options['useReviews'] ?? true;

        $factory = $this->getKitStoreService()->getFactory();
        $itemApi = $factory->getItemApi();
        $userRatesItemApi = $factory->getUserRatesItemApi();


        $res = $itemApi->getItemById($itemId);
        if (null === $res) {
            return null;
        }


        $item = $itemApi->getProductInfoById($itemId, [
            'imageSizes' => true,
        ]);

        if (true === $useReviews) {
            $item['reviews'] = $userRatesItemApi->getCustomUserRatesItemsByItemId($itemId, [
                Limit::inst()->set(0, 8),
            ]);
        }
        return $item;
    }


}

