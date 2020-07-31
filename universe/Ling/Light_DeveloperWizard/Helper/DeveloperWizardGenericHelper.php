<?php


namespace Ling\Light_DeveloperWizard\Helper;


/**
 * The DeveloperWizardGenericHelper class.
 */
class DeveloperWizardGenericHelper
{


    /**
     * Returns a symbolic path, where the given absolute path to the application directory is replaced by the symbol [app].
     *
     * @param string $path
     * @param string $appDir
     * @return string
     */
    public static function getSymbolicPath(string $path, string $appDir): string
    {
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }
}