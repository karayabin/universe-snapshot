<?php


namespace Kamille\Utils\Claws;


use Kamille\Services\XLog;

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

    /**
     * @var array of widgetId => pos,
     * pos being defined in doc/claws/widget-position.md
     */
    private $widgetId2Pos;
    private $orderedIds;


    public function __construct()
    {
        $this->widgets = [];
        $this->widgetId2Pos = [];
        $this->orderedIds = null;
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
        $this->orderWidgets();
        return $this->widgets;
    }

    /**
     * @param $id , string, the widgetId:
     *
     *                          - widgetId: ( <positionName>. )? <widgetInternalName>
     *
     * See https://github.com/lingtalfi/laws for more info
     * @param $widget
     * @param $position , string: the widget position as defined in doc/claws/widget-position.md
     * @return $this
     */
    public function setWidget($id, ClawsWidget $widget, $position = null)
    {
        $this->widgets[$id] = $widget;
        $this->widgetId2Pos[$id] = $position;
        return $this;
    }

    public function removeWidget($id)
    {
        unset($this->widgets[$id]);
        unset($this->widgetId2Pos[$id]);
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

        //--------------------------------------------
        // PREPARING THE OUTPUT
        //--------------------------------------------
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


    //--------------------------------------------
    //
    //--------------------------------------------
    private function orderWidgets()
    {
        if (null === $this->orderedIds) {
            $widgets = $this->widgets;
            $ids = array_keys($this->widgets);
            foreach ($this->widgetId2Pos as $id => $pos) {
                switch ($pos) {
                    case "first":
                        unset($ids[array_search($id, $ids)]);
                        array_unshift($ids, $id);
                        break;
                    case "last":
                        unset($ids[array_search($id, $ids)]);
                        $ids[] = $id;
                        break;
                    default:
                        if (0 === strpos($pos, 'before:')) {
                            $baseIndex = array_search($id, $ids);
                            unset($ids[$baseIndex]);
                            $ids = array_merge($ids);

                            $targetWidgetId = substr($pos, 7);
                            $targetWidgetIndex = array_search($targetWidgetId, $ids);
                            if (false !== $targetWidgetIndex) {
                                $index = $targetWidgetIndex;
                                array_splice($ids, $index, 0, $id);
                            } else {
                                XLog::error("[Kamille Claws]: Claws.toArray widget id not found: $targetWidgetId");
                                array_splice($ids, $baseIndex, 0, $id); // canceling

                            }
                        } elseif (0 === strpos($pos, 'after:')) {
                            $baseIndex = array_search($id, $ids);
                            unset($ids[$baseIndex]);
                            $ids = array_merge($ids);

                            $targetWidgetId = substr($pos, 6);
                            $targetWidgetIndex = array_search($targetWidgetId, $ids);
                            if (false !== $targetWidgetIndex) {
                                $index = $targetWidgetIndex + 1;
                                array_splice($ids, $index, 0, $id);
                            } else {
                                XLog::error("[Kamille Claws]: Claws.toArray widget id not found: $targetWidgetId");
                                array_splice($ids, $baseIndex, 0, $id); // canceling

                            }
                        }
                        break;
                }
                $ids = array_merge($ids);
            }
            $this->orderedIds = $ids;


            //--------------------------------------------
            // RE-ORDERING WIDGETS ACCORDING TO THEIR POSITION
            //--------------------------------------------
            $this->widgets = [];
            foreach ($ids as $pos) {
                $this->widgets[$pos] = $widgets[$pos];
            }
        }
        return $this->orderedIds;
    }

}