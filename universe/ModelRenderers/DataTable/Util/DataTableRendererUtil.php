<?php


namespace ModelRenderers\DataTable\Util;


use Bat\StringTool;

class DataTableRendererUtil
{


    public static function getRicValueStringByRow(array $ric, array $row, $sep = null)
    {
        if (null === $sep) {
            $sep = '+--ric_separator--+';
        }
        $values = [];
        foreach ($ric as $key) {
            if (array_key_exists($key, $row)) {
                $values[] = $row[$key];
            } else {
                throw new \RuntimeException("Key not found in ric: $key");
            }
        }
        return implode($sep, $values);
    }

    public static function getCountInfoText(array $model)
    {

        $page = $model['page'];
        $nipp = $model['nipp'];
        $nbItems = $model['nbTotalItems'];

        if ('all' !== $nipp) {
            $offsetStart = (($page - 1) * $nipp) + 1;
            $offsetEnd = $offsetStart + $nipp - 1;
            if ($offsetEnd > $nbItems) {
                $offsetEnd = $nbItems;
            }
        }
        else{
            $offsetStart = 1;
            $offsetEnd = $nbItems;
        }

        return str_replace([
            '{offsetStart}',
            '{offsetEnd}',
            '{nbItems}',
        ], [
            $offsetStart,
            $offsetEnd,
            $nbItems,
        ], $model['textCountInfo']);
    }

    public static function getNippSelector(array $model, array $options = [])
    {

        $s = $model['textNipp'];
        $nipp = $model['nipp'];
        $attr = (array_key_exists('attr', $options)) ? $options['attr'] : [];
        $sel = '<select' . StringTool::htmlAttributes($attr) . '>';
        foreach ($model['nippItems'] as $value) {
            $sSel = ((int)$nipp === (int)$value) ? ' selected="selected"' : '';
            $sel .= '<option' . $sSel . ' value="' . $value . '">';
            if ('all' !== $value) {
                $sel .= $value;
            } else {
                $sel .= $model['textNippAll'];
            }
            $sel .= '</option>';
        }
        $sel .= '</select>';
        return str_replace('{select}', $sel, $s);
    }

    public static function toDataAttributes(array $attributes)
    {
        unset($attributes['label']);
        unset($attributes['icon']);
        $attr = [];
        foreach ($attributes as $k => $v) {
            $attr['data-' . $k] = $v;
        }
        return StringTool::htmlAttributes($attr);
    }

    public static function getStoreAttributes(array $model)
    {
        /**
         * - data-ric: a comma separated list of ric items
         *                  - data-columns: a comma separated list of columnId
         *                  - data-page
         *                  - data-nipp
         *                  - data-sort-$columnId: $sortDir
         *                          There is one attribute of this kind for every available column.
         *                          With sortDir being one of: asc, desc, none.
         *                  - data-search-$columnId: $searchValue
         */

        $ret = [
            'ric' => implode(',', $model['ric']),
            'columns' => implode(',', $model['headers']),
            'page' => $model['page'],
            'nipp' => $model['nipp'],
            'textUseSelectedRowsEmptyWarning' => $model['textUseSelectedRowsEmptyWarning'],
        ];
        foreach ($model['headers'] as $columnId) {
            $sort = 'none';
            if (array_key_exists($columnId, $model['sortValues'])) {
                $sort = $model['sortValues'][$columnId];
            }
            $ret['sort-' . $columnId] = $sort;

            $search = '';
            if (array_key_exists($columnId, $model['searchValues'])) {
                $search = $model['searchValues'][$columnId];
            }
            $ret['search-' . $columnId] = $search;
        }
        return $ret;
    }


    public static function getPaginationMinMax(array $model)
    {
        if ('all' !== $model['nipp']) {
            $nbPages = ceil($model['nbTotalItems'] / $model['nipp']);
            $page = $model['page'];
            $length = $model['paginationLength'];

            if (1 === ($length % 2)) {
                $firstHalfLength = floor($length / 2);
                $secondHalfLength = $firstHalfLength;
            } else {
                $firstHalfLength = ($length / 2) - 1;
                $secondHalfLength = $firstHalfLength + 1;
            }

            $min = $page - $firstHalfLength;
            $max = $page + $secondHalfLength;

            if ($min < 1) {
                $offset = 1 - $min;
                $min = 1;
                $max += $offset;
            } elseif ($max > $nbPages) {
                $offset = $max - $nbPages;
                $min -= $offset;
                $max = $nbPages;
            }

            if ($max > $nbPages) {
                $max = $nbPages;
            }

            if ($min < 1) {
                $min = 1;
            }

            return [$min, $max];
        } else {
            return [1, 1];
        }
    }
}