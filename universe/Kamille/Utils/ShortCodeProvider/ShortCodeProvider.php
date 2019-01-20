<?php


namespace Kamille\Utils\ShortCodeProvider;

use BeeFramework\Notation\String\ShortCode\Tool\ShortCodeTool;
use Kamille\Services\XLog;

abstract class ShortCodeProvider implements ShortCodeProviderInterface
{

    public static function create()
    {
        return new static();
    }

    public function process($shortCodeFunction, &$wasProcessed = false)
    {
        $p = explode(':', $shortCodeFunction, 2);
        $args = [];
        if (2 === count($p)) {
            $function = $p[0];
            try {
                $args = ShortCodeTool::parse($p[1]);
            } catch (\Exception $e) {
                XLog::error("ShortCodeTool problem: $e");
                return "";
            }
        } else {
            $function = $p[0];
        }

        if (method_exists($this, $function)) {
            $ret = call_user_func_array([$this, $function], $args);
            $wasProcessed = true;
            return $ret;
        } else {
            XLog::error("[Kamille.ShortCodeProvider] - ShortCodeProvider: Method not found: $function");
        }
        return "";
    }

    public function getName()
    {
        $class = get_called_class();
        $p = explode('\\', $class);
        $className = array_pop($p);
        return strtolower(substr($className, 0, -17));
    }
}