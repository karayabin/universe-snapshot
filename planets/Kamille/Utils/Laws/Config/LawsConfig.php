<?php


namespace Kamille\Utils\Laws\Config;


use Kamille\Utils\Laws\Config\Exception\LawsConfigException;

class LawsConfig
{

    private $ops;


    public function __construct()
    {
        $this->ops = [];
    }


    public static function create()
    {
        return new static();
    }


    public function apply(array &$config)
    {
        foreach ($this->ops as $op) {
            $this->applyOperation($op, $config);
        }
    }

    /**
     * @param $replace , array or callback
     * @return $this
     */
    public function replace($replace)
    {
        $this->ops[] = ['replace', $replace];
        return $this;
    }

    /**
     * @return $this
     */
    public function removeWidget($widgetName)
    {
        $this->ops[] = ['removeWidget', $widgetName];
        return $this;
    }

    /**
     * @param $replace , string or callback
     * @return $this
     */
    public function replaceWidgetTemplate($widgetId, $replace)
    {
        $this->ops[] = ['replaceWidgetTemplate', [$widgetId, $replace]];
        return $this;
    }

    /**
     * @param $replace , string or callback
     * @return $this
     */
    public function replaceWidget($widgetId, $replace)
    {
        $this->ops[] = ['replaceWidget', [$widgetId, $replace]];
        return $this;
    }


    public function addWidget($widgetId, array $widgetInfo)
    {
        $this->ops[] = ['addWidget', [$widgetId, $widgetInfo]];
        return $this;
    }


    public function assignPosition($widgetInternalName, $position)
    {
        $this->ops[] = ['assignPosition', [$widgetInternalName, $position]];
        return $this;
    }

    public function assignPositions(array $names2Positions)
    {
        $this->ops[] = ['assignPositions', $names2Positions];
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function applyOperation($op, array &$config)
    {
        $operation = $op[0];
        $value = $op[1];
        switch ($operation) {
            case 'replace':
                if (is_array($value)) {
                    $config = array_replace_recursive($config, $value);
                } elseif (is_callable($value)) {
                    call_user_func_array($value, [&$config]);
                } else {
                    throw new LawsConfigException("Unknown replace type " . gettype($value));
                }
                break;
            case 'removeWidget':
                if (
                    array_key_exists('widgets', $config) &&
                    array_key_exists($value, $config['widgets'])
                ) {
                    unset($config['widgets'][$value]);
                }
                break;
            case 'replaceWidgetTemplate':
                list($widgetId, $replace) = $value;

                if (is_string($replace)) {
                    $config['widgets'][$widgetId]['tpl'] = $replace;
                } elseif (is_callable($replace)) {
                    $config['widgets'][$widgetId]['tpl'] = call_user_func($replace, $config['widgets'][$widgetId]['tpl']);
                } else {
                    throw new LawsConfigException("replaceWidgetTemplate: Unknown replace type " . gettype($value));
                }
                break;
            case 'replaceWidget':
                list($widgetId, $replace) = $value;
                if (is_callable($replace)) {
                    $config['widgets'][$widgetId]['conf'] = call_user_func($replace, $config['widgets'][$widgetId]['conf']);
                } else {
                    $config['widgets'][$widgetId]['conf'] = $replace;
                }
                break;
            case 'addWidget':
                list($widgetId, $widgetInfo) = $value;
                if (false === array_key_exists($widgetId, $config['widgets'])) {
                    $config['widgets'][$widgetId] = $widgetInfo;
                }
                break;
            case 'assignPosition':
                list($widgetInternalName, $position) = $value;
                $this->doAssignPosition($widgetInternalName, $position, $config);
                break;
            case 'assignPositions':
                foreach ($value as $widgetInternalName => $position) {
                    $this->doAssignPosition($widgetInternalName, $position, $config);
                }
                break;
            default:
                throw new LawsConfigException("Operation not found: $operation");
                break;
        }
    }

    private function doAssignPosition($widgetName, $position, array &$config)
    {
        if (array_key_exists('widgets', $config)) {
            foreach ($config['widgets'] as $p => $widget) {
                $q = explode('.', $p, 2);
                if (array_key_exists(1, $q) && $widgetName === $q[1]) {
                    $config['widgets'][$position . "." . $widgetName] = $widget;
                    unset($config['widgets'][$p]);
                }
            }
        }
    }
}