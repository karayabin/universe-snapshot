<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\ArrayTool;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;

/**
 * The AdminPageController class.
 *
 *
 * This class provides the renderAdminPage which most controllers in Light_Kit_Admin use because it does multiple
 * things:
 *
 * - if the user is not connected at all, she is redirected to the login page
 * - it checks whether the user is allowed to access the page, and if not redirects her
 * - it the user is allowed to access the page, it renders the page
 *
 *
 *
 *
 */
class AdminPageController extends LightKitAdminController
{



    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Renders the given page using the @page(kit service), or redirects the user to the login page
     * if she is not connected yet.
     *
     *
     *
     * Example of page values:
     *
     * - Light_Kit_Admin_UserPreferences/kit/zeroadmin/generated/lup_user_preference_list
     *
     *
     *
     *
     *
     * @param string $page
     * @param array $params
     * @param PageConfUpdator|null $updator
     *
     *
     * @return HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderAdminPage(string $page, $params = [], PageConfUpdator $updator = null): HttpResponseInterface
    {
        $response = $this->checkRight('Light_Kit_Admin.user');
        if (null !== $response) {
            return $response; // redirect the user
        }


        $user = $this->getUser();
        $user = ArrayTool::objectToArray($user);
        $params['user'] = $user;
        return $this->renderPage($page, $params, $updator);
    }
}