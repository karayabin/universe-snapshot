<?php


namespace Ling\XiaoApi\Helper\QuickPdoStmtHelper;

/**
 *
 * The secret goal: this class helps creating a nice one liner sql request, so that a potential cache implementation on requests is easier.
 */
class QuickPdoStmtHelper
{

    public static function addFields(&$query, $fields)
    {
        if (null !== $fields) {
            $c = 0;
            foreach ($fields as $k => $v) {
                if (0 !== $c) {
                    $query .= ', ';
                }
                if (is_int($k)) {
                    $query .= $v;
                } else {
                    $query .= "$k as $v";
                }
                $c++;
            }
        } else {
            $query .= '*';
        }

    }

    public static function addOrderAndPage(&$query, $order, $page, $nipp)
    {

        if (null !== $order) {
            if (count($order) > 0) {
                $query .= ' ORDER BY ';
                $c = 0;
                foreach ($order as $k => $v) {
                    if (0 !== $c) {
                        $query .= ', ';
                    }
                    $query .= "$k $v";
                    $c++;
                }
            }
        }


        if (null !== $page && null !== $nipp) {
            $page = (int)$page;
            if ($page < 1) {
                $page = 1;
            }
            $nipp = (int)$nipp;
            $offset = ($page - 1) * $nipp;
            $query .= " LIMIT $offset, $nipp";
        }
    }

}