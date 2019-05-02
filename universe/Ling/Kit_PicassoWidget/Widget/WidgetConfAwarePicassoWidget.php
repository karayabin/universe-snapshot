<?php

namespace Ling\Kit_PicassoWidget\Widget;


/**
 * The WidgetConfAwarePicassoWidget class.
 *
 * In a nutshell
 * ------------
 * If your widget ever needs to access @page(the widget configuration array),
 * then extend this class instead of the PicassoWidget class.
 *
 * Otherwise, just extend the PicassoWidget class.
 *
 */
class WidgetConfAwarePicassoWidget extends PicassoWidget implements WidgetConfAwarePicassoWidgetInterface
{


    /**
     * This property holds the widgetConf for this instance.
     * @var array
     */
    protected $widgetConf;


    /**
     * Builds the WidgetConfAwarePicassoWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->widgetConf = [];
    }


    /**
     * @implementation
     */
    public function setWidgetConf(array $widgetConf)
    {
        $this->widgetConf = $widgetConf;
    }

    /**
     * @implementation
     */
    public function getWidgetConf(): array
    {
        return $this->widgetConf;
    }


}