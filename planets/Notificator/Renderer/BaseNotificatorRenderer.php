<?php


namespace Notificator\Renderer;


abstract class BaseNotificatorRenderer implements NotificatorRendererInterface
{


    public static function create()
    {
        return new static();
    }
}