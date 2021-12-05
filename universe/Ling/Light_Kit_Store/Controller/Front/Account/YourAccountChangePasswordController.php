<?php


namespace Ling\Light_Kit_Store\Controller\Front\Account;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;


/**
 * The YourAccountChangePasswordController class.
 */
class YourAccountChangePasswordController extends YourAccountBaseController
{


    /**
     * Renders the home page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->renderAccountPage("Ling.Light_Kit_Store/your_account/change_password");
    }

}

