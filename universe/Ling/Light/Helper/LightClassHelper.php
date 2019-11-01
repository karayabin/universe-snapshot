<?php


namespace Ling\Light\Helper;

use Ling\Light\Exception\LightException;

/**
 * The LightClassHelper class.
 */
class LightClassHelper
{


    /**
     * Returns the class name of the light class contained in the given file.
     *
     *
     * @param string $path
     * @return string
     * @throws \Exception
     */
    public static function getLightClassNameByFile(string $path): string
    {
        $p = explode('/', $path);
        foreach ($p as $component) {
            if (
                'Light' === $component ||
                0 === strpos($component, 'Light_')
            ) {
                $last = array_pop($p);
                // removing .php at the end of the file
                $last = substr($last, 0, -4);


                return 'Ling\\' . implode('\\', $p) . '\\' . $last;
            }
            array_shift($p);
        }
        throw new LightException("This is not a standard file path to a Light class: $path.");
    }
}