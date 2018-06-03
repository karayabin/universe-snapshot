<?php


namespace _controllerNamespace_;

use Controller\Ekom\Back\Generated\EkUser\EkUserListController;

class _controllerClassname_ extends EkUserListController
{
    public function __construct()
    {
        parent::__construct();
        $this->addConfigValues([
            'route' => "Ekom_Orders_Order_List",
            'form' => "back/orders/order",
            'list' => "back/orders/order",
        ]);
    }
}


