<?php


namespace Ling\ConventionTools;


/**
 * The ConventionTool class.
 */
class ConventionTool
{


    /**
     * Returns the custom (if it exists) or generated version of the given file.
     *
     * See more info at https://github.com/lingtalfi/TheBar/blob/master/discussions/generated-custom-config-pattern.md.
     *
     *
     * @param string $file
     * @return string
     */
    public static function getGeneratedCustomPath(string $file): string
    {
        if (true === str_contains($file, "generated")) {
            $f = str_replace("generated", "custom", $file);
            if (true === file_exists($f)) {
                $file = $f;
            }
        }
        return $file;
    }

}