<?php


namespace FormTools\Rendering;


class FormToolsRenderer
{

    public static function selectOptions(array $options, $value)
    {
        foreach ($options as $k => $v) {
            $sSel = ($k == $value) ? 'selected="selected"' : '';
            echo '<option ' . $sSel . ' value="' . $k . '">' . $v . '</option>';
        }
    }

}