<?php


namespace Kamille\Architecture\Router\Web;


use Kamille\Architecture\Application\Web\WebApplication;
use Kamille\Architecture\Controller\Web\StaticPageController;
use Kamille\Architecture\Request\Web\HttpRequestInterface;


class StaticPageRouter implements WebRouterInterface
{

    protected $uri2Page;
    protected $staticPageController;

    public function __construct()
    {
        $this->uri2Page = [];
    }

    public static function create()
    {
        return new static();
    }


    public function setUri2Page($uri2Page)
    {
        $this->uri2Page = $uri2Page;
        return $this;
    }


    public function setStaticPageController(StaticPageController $staticPageController)
    {
        $this->staticPageController = $staticPageController;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function match(HttpRequestInterface $request)
    {
        $uri = $request->uri(false);
        $uri2Page = $this->uri2Page;
        if (array_key_exists($uri, $uri2Page)) {
            $page = $uri2Page[$uri];
            $o = $this->getStaticPageController();
            return [
                [$o, 'handlePage'],
                [
                    'page' => $page,
                ],
            ];
        }
    }

    protected function getStaticPageController()
    {
        if (null === $this->staticPageController) {
            $this->staticPageController = new StaticPageController();
            $this->staticPageController->setPagesDir(WebApplication::inst()->get('app_dir') . "/pages");
        }
        return $this->staticPageController;
    }

}