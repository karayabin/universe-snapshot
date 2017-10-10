<?php


namespace Kamille\Utils\Claws;


class Claws implements ClawsInterface
{
    /**
     * @var ClawsLayout|string, the layout template
     */
    private $layout;

    /**
     * @var ClawsWidget[]
     */
    private $widgets;


    public function __construct()
    {
        $this->widgets = [];
    }

    /**
     * @return ClawsLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param ClawsLayout|string $layout ,
     *                      if it's a string, it's the template and
     *                      the default ClawsLayout instance will be used to hold it.
     * @return $this
     */
    public function setLayout($layout)
    {
        if (is_string($layout)) {
            $layout = ClawsLayout::create()->setTemplate($layout);
        }
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return ClawsWidget[]
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @param $id , string, the widgetId:
     *
     *                          - widgetId: ( <positionName>. )? <widgetInternalName>
     *
     * See https://github.com/lingtalfi/laws for more info
     * @param $widget
     * @return $this
     */
    public function setWidget($id, ClawsWidget $widget)
    {
        $this->widgets[$id] = $widget;
        return $this;
    }

    public function removeWidget($id)
    {
        unset($this->widgets[$id]);
        return $this;
    }


    public function toArray()
    {
        $layout = $this->getLayout();
        $widgets = $this->getWidgets();
        $widgetsConf = [];
        foreach ($widgets as $id => $widget) {
            $widgetsConf[$id] = [
                "tpl" => $widget->getTemplate(),
                "conf" => $widget->getConf(),
            ];
        }
        $arr = [
            "layout" => [
                'tpl' => $layout->getTemplate(),
            ],
            "widgets" => $widgetsConf,


            /**
             * The grid below comes from the LawsUtil code,
             * I couldn't emulate it for now, see if it's really necessary...
             *
             */
//            "grid" => ["maincontent"],
        ];

        return $arr;
    }

}