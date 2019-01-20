<?php


namespace Kamille\Utils\Routsy\Util\RequirementsChecker;


use Kamille\Architecture\Request\Web\HttpRequestInterface;
use Kamille\Utils\Routsy\Util\RequirementsChecker\Exception\KiwiRequirementsCheckerException;

class KiwiRequirementsChecker
{
    public static function checkRequirements(HttpRequestInterface $request, $requirements)
    {
        if (is_array($requirements)) {
            foreach ($requirements as $key => $requirement) {
                switch ($key) {
                    case 'https':
                        if ((bool)$requirement !== $request->isHttps()) {
                            return false;
                        }
                        break;
                    case 'inGet':
                    case 'inPost':
                        $arr = ('inGet' === $key) ? $_GET : $_POST;
                        foreach ($requirement as $v) {
                            if (!array_key_exists($v, $arr)) {
                                return false;
                            }
                        }
                        break;
                    case 'getValues':
                    case 'postValues':
                        $arr = ('getValues' === $key) ? $_GET : $_POST;
                        foreach ($requirement as $k => $v) {
                            if (!array_key_exists($k, $arr) || $v !== $arr[$k]) {
                                return false;
                            }
                        }
                        break;
                    default:
                        throw new KiwiRequirementsCheckerException("key not found: $key");
                        break;
                }
            }
        } elseif (is_callable($requirements)) {
            return call_user_func($requirements, $request);
        }
        return true;
    }
}