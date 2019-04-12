<?php

namespace Ling\Chloroform\Field;


/**
 * The FileField class.
 *
 * The value of a file field is a flattened array as returned by the
 * PhpUploadFileFixTool::fixPhpFile method of @page(the PhpUploadFileFix planet),
 * with the dot argument set to true.
 *
 * So basically the array looks like this:
 *
 * - name
 * - type
 * - tmp_name
 * - error
 * - size
 *
 *
 */
class FileField extends AbstractField
{


    /**
     *
     * Builds and returns the instance.
     *
     *
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
        return new static($properties);
    }
}