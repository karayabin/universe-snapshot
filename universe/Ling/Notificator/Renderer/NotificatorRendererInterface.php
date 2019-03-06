<?php


namespace Ling\Notificator\Renderer;


interface NotificatorRendererInterface
{

    /**
     * This class renders all notifications at once (all types included).
     * This allows us to do a one line rendering in the templates.
     */
    public function display(array $notifications);

}