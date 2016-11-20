<?php


namespace MyAppTools\Application;


use Uri2PageRouter\Uri2PageRouterInterface;

class MyApp extends Application
{

    /**
     * @var Uri2PageRouterInterface
     */
    private $router;

    public function setRouter(Uri2PageRouterInterface $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getRouter()
    {
        return $this->router;
    }
} 