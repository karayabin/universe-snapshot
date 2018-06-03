<?php


namespace _controllerNamespace_;

use Kamille\Architecture\Controller\Web\KamilleClawsController;
use Kamille\Utils\Claws\ClawsWidget;

class _controllerClassname_ extends KamilleClawsController
{
    public function render()
    {
        $this->prepareClaws();

        $this->getClaws()
            ->setLayout("admin/default")
            ->setWidget("maincontent.dummay", ClawsWidget::create()
                ->setTemplate("Dummy/default")// theme/$themeName/widgets/Dummy/default.tpl.php
                ->setConf([])
            );

        return parent::doRenderClaws();
    }
}


