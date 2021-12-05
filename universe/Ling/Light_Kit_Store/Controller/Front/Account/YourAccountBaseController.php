<?php


namespace Ling\Light_Kit_Store\Controller\Front\Account;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_UserManager\Service\LightUserManagerService;


/**
 * The YourAccountBaseController class.
 */
class YourAccountBaseController extends StoreBaseController
{


    /**
     * Renders the given page using the @page(kit service).
     * Options are directly forwarded to @page(the LightKitPageRenderer->renderPage method).
     *
     * This method also ensures that the user is connected.
     * If he's not, this method displays a forbidden page.
     *
     *
     *
     * @param string $page
     * @param array $options
     * @return HttpResponseInterface
     * @throws \Exception
     *
     */
    protected function renderAccountPage(string $page, array $options = []): HttpResponseInterface
    {

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();
        if (false === $user->isValid()) {
            $page = "Ling.Light_Kit_Store/not_connected";
        }


        return parent::renderPage($page, $options);
    }


    /**
     * Returns the user row for the connected user.
     * If the user is not connected, an exception is thrown.
     *
     *
     * @return array
     * @throws \Exception
     */
    protected function getUserRow(): array
    {

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();
        if (false === $user->isValid()) {
            throw new LightKitStoreException("The user is not connected.");
        }
        $userId = $user->getProp("id");


        $userApi = $this->getKitStoreService()->getFactory()->getUserApi();
        return $userApi->getUserById($userId);
    }

}

