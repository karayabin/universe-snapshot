<?php


namespace Ling\RowsGenerator\Util;


class RowsTransformerUtil
{
    /**
     * Will reshape the rows using the headers and the transformers arrays.
     *
     * The headers array is used to order the columns, and/or to create new ones on the fly.
     *
     * The transformers array is used to update the value of any column using a php callback.
     *
     *
     * @param array $rows
     * @param array $headers , array of columnId
     * @param array $transformers , array of columnId => callback
     *
     *          mixed:newData fn ( oldValue, columnId, row )
     *
     * Note that a transformer's callback can return fancy things like arrays or objects,
     * that's because renderers have different capabilities.
     *
     *
     * @return array
     */
    public static function transform(array $rows, array $headers, array $transformers)
    {
        $ret = [];
        foreach ($rows as $row) {
            foreach ($headers as $columnId) {
                $v = "";
                if (array_key_exists($columnId, $row)) {
                    $v = $row[$columnId];
                }
                if (array_key_exists($columnId, $transformers)) {
                    $v = call_user_func($transformers[$columnId], $v, $columnId, $row);
                }
                $row[$columnId] = $v;
            }
            $ret[] = $row;
        }
        return $ret;
    }
}