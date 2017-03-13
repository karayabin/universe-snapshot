<?php


namespace Kamille\Architecture\Router\Web;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Architecture\Router\RouterInterface;
use Services\Hooks;
use Services\X;

class StaticPageRouter implements RouterInterface
{
    private $uri2Page;

    public function __construct()
    {
        $this->uri2Page = [];
    }

    public static function create()
    {
        return new static();
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    public function match(HttpRequestInterface $request)
    {
        $uri = $request->uri(false);
        $uri2Page = $this->uri2Page;
        Hooks::StaticPageRouter_feedRequestUri($uri2Page);
        if (array_key_exists($uri, $uri2Page)) {
            $page = $uri2Page[$uri];

            $o = X::StaticPageRouter_getStaticPageController();

            return [
                [$o, 'handlePage'],
                [
                    'page' => $page,
                ],
            ];
        }
    }


}