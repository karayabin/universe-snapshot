<?php


namespace Kamille\Mvc\WidgetDecorator;


class MockGridWidgetDecorator extends GridWidgetDecorator
{

    private $stream;

    public function __construct()
    {
        parent::__construct();
        $this->stream = "";
    }

    public function getStream()
    {
        return $this->stream;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function renderContent($content, $widgetId)
    {
        $p = explode('.', $widgetId, 2);
        $s = $p[1];
        $this->stream .= $s;
        return $s;
    }

    protected function renderRowStart()
    {
        $this->stream .= '[row]';
        return "[row]";
    }

    protected function renderColStart($fragId, $parentSpaceUsed,
                                      $parentAvailableSpace,
                                      $spaceUsed,
                                      $availableSpace,
                                      $hasDash,
                                      $nbDots)
    {
        $this->stream .= "[col-$spaceUsed/$availableSpace]";
        return "[col-$spaceUsed/$availableSpace]";
    }

    protected function renderNestedColStart($fragId, $parentSpaceUsed,
                                            $parentAvailableSpace,
                                            $spaceUsed,
                                            $availableSpace,
                                            $hasDash,
                                            $nbDots)
    {
        $s = "[col-$parentSpaceUsed/$parentAvailableSpace]";
        $s .= "[row]";
        $s .= "[col-$spaceUsed/$availableSpace]";
        $this->stream .= $s;
        return $s;
    }

    protected function renderColEnd()
    {
        $this->stream .= '[/col]';
        return "[/col]";
    }

    protected function renderRowEnd()
    {
        $this->stream .= '[/row]';
        return "[/row]";
    }

    protected function renderNestedColEnd()
    {
        $this->stream .= '[/col][/row]';
        return "[col][/row]";
    }


}