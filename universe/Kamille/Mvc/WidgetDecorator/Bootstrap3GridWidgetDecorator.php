<?php


namespace Kamille\Mvc\WidgetDecorator;


class Bootstrap3GridWidgetDecorator extends GridWidgetDecorator
{


    protected function renderRowStart()
    {
        return '<div class="' . $this->getExtraCssClass('rowStart') . '">';
    }

    protected function renderColStart($fragId, $parentSpaceUsed,
                                      $parentAvailableSpace,
                                      $spaceUsed,
                                      $availableSpace,
                                      $hasDash,
                                      $nbDots)
    {


        $sExtra = $this->getExtraCssClass('colStart');
        return '<div class="' . $sExtra . $this->getCssClass($spaceUsed, $availableSpace) . '">';
    }

    protected function renderNestedColStart($fragId, $parentSpaceUsed,
                                            $parentAvailableSpace,
                                            $spaceUsed,
                                            $availableSpace,
                                            $hasDash,
                                            $nbDots)
    {

        $s = '<div class="' . $this->getExtraCssClass('nestedColParentStart') . $this->getCssClass($parentSpaceUsed, $parentAvailableSpace) . '">';
        $s .= '<div class="' . $this->getExtraCssClass('nestedColRowStart') . '">';
        $s .= '<div class="' . $this->getExtraCssClass('nestedColChildStart') . $this->getCssClass($spaceUsed, $availableSpace) . '">';
        return $s;
    }

    protected function renderColEnd()
    {
        return '</div>';
    }

    protected function renderRowEnd()
    {
        return '</div>';
    }

    protected function renderNestedColEnd()
    {
        return '</div></div>';
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    private function getExtraCssClass($type)
    {
        switch ($type) {
            case 'rowStart':
            case 'nestedColRowStart':
                $s = 'row';
                if (array_key_exists("rowClass", $this->widgetConfig)) {
                    $s .= " " . $this->widgetConfig['rowClass'];
                }
                return $s;
                break;
            case 'colStart':
            case 'nestedColChildStart':
                if (array_key_exists("colClass", $this->widgetConfig)) {
                    return $this->widgetConfig['colClass'];
                }
                return '';
                break;
            default:
                return "";
                break;
        }
    }

    private function getCssClass($spaceUsed, $availableSpace)
    {
        $frag = $spaceUsed . "/" . $availableSpace;
        $s = "";
        switch ($frag) {
            case '1/1':
                $s = "col-md-12 col-sm-12 col-xs-12";
                break;
            case '1/2':
            case '2/4':
            case '3/6':
                $s = "col-md-6 col-sm-6 col-xs-12";
                break;
            case '1/3':
            case '2/6':
                $s = "col-md-4 col-sm-4 col-xs-12";
                break;
            case '2/3':
            case '4/6':
                $s = "col-md-8 col-sm-8 col-xs-12";
                break;
            case '1/4':
                $s = "col-md-3 col-sm-3 col-xs-12";
                break;
            case '3/4':
                $s = "col-md-9 col-sm-9 col-xs-12";
                break;
            case '1/6':
                $s = "col-md-2 col-sm-4 col-xs-6";
                break;
            case '5/6':
                $s = "col-md-10 col-sm-10 col-xs-12";
                break;
            default:
                break;
        }
        return $s;
    }
}