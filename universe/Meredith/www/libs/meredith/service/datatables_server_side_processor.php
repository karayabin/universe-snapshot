<?php

require_once __DIR__ . "/../../../../init.php";


use Meredith\Exception\MeredithException;
use Meredith\Supervisor\MeredithSupervisor;
use QuickPdo\QuickPdo;


if (isset($_GET['table'])) {

    $formId = $_GET['table'];

    if (true === MeredithSupervisor::inst()->isGranted($formId, 'fetch')) {


        $ret = [];
        $arr = $_POST;
        if (
            isset($arr['draw']) &&
            isset($arr['start']) &&
            isset($arr['length']) &&
            isset($arr['search'])
        ) {

            try {

                $stmt = "";


                $ret['draw'] = (int)$arr["draw"];
                $start = (int)$arr["start"];
                $length = (int)$arr["length"];
                $search = $arr["search"];


                if (
                    is_array($search) &&
                    array_key_exists("value", $search) &&
                    array_key_exists("regex", $search)
                ) {


                    $searchValue = $search['value']; // I will not be using regex in this script


                    // getMainController either works as expected, or throws an Exception in your face ...
                    MeredithSupervisor::inst()->setFormId($formId);
                    $mc = MeredithSupervisor::inst()->getMainController($formId);


                    $lh = $mc->getListHandler();

                    $mainAlias = $lh->getMainAlias();
                    $aliasPrefix = (null !== $mainAlias) ? $mainAlias . '.' : '';


                    $columns = $lh->getColumns();
                    $orderableCols = $lh->getOrderableColumns();
                    $searchableCols = $lh->getSearchableColumns();
                    $columns = $lh->getColumns();
                    $orderable = [];
                    foreach ($columns as $col) {
                        if (in_array($col, $orderableCols, true)) {
                            $orderable[] = true;
                        }
                        else {
                            $orderable[] = false;
                        }
                    }
                    $searchable = [];
                    foreach ($columns as $col) {
                        if (in_array($col, $searchableCols, true)) {
                            $searchable[] = true;
                        }
                        else {
                            $searchable[] = false;
                        }
                    }
                    $nbColumns = count($columns);


                    // I'm not using those (I prefer to manage those settings server side)
//            for ($i = 0; $i < $nbColumns; $i++) {
//                $arr['columns'][$i]['data'];
//                $arr['columns'][$i]['name'];
//                $arr['columns'][$i]['searchable'];
//                $arr['columns'][$i]['orderable'];
//                $arr['columns'][$i]['search']['value'];
//                $arr['columns'][$i]['search']['regex'];
//            }


                    //------------------------------------------------------------------------------/
                    // CUSTOM WHERE
                    //------------------------------------------------------------------------------/
                    $customWhere = $lh->getWhere();


                    //------------------------------------------------------------------------------/
                    // SEARCH - MODULE
                    //------------------------------------------------------------------------------/
                    $searchFrags = [];
                    $markers = [];
                    if ('' !== $searchValue) {
                        $c = 0;
                        $markers['value'] = '%' . str_replace('%', '\%', $searchValue) . '%';
                        foreach ($searchable as $index => $isSearchable) {
                            if (true === $isSearchable) {
                                $colName = $columns[$index];
                                $searchFrags[] = " " . $aliasPrefix . $colName . " like :value";
                            }
                        }
                    }


                    //------------------------------------------------------------------------------/
                    // COMPILE WHERE STRING
                    //------------------------------------------------------------------------------/
                    $sWhere = '';
                    if (null !== $customWhere) {
                        $sWhere .= ' where (';
                        $sWhere .= $customWhere;
                        $sWhere .= ' )';
                    }
                    if ($searchFrags) {
                        if ('' === $sWhere) {
                            $sWhere .= " where ";
                            $sWhere .= implode(' or ', $searchFrags);
                        }
                        else {
                            $sWhere .= " and ( ";
                            $sWhere .= implode(' or ', $searchFrags);
                            $sWhere .= " )";
                        }
                    }


                    //------------------------------------------------------------------------------/
                    // ORDER BY - MODULE
                    //------------------------------------------------------------------------------/
                    $sOrder = "";
                    if (isset($arr['order']) && is_array($arr['order'])) {
                        if ($arr['order']) {
                            $c = 0;
                            $sOrder .= " order by";
                            foreach ($arr['order'] as $colNum => $info) {
                                if (
                                    is_array($info) &&
                                    array_key_exists('column', $info) &&
                                    array_key_exists('dir', $info)
                                ) {
                                    $isOrderable = (array_key_exists($colNum, $orderable) && true === $orderable[$colNum]);
                                    if (true === $isOrderable) {
                                        if (
                                            $colNum <= $nbColumns && $colNum >= 0 &&
                                            ('asc' === $info['dir'] || 'desc' === $info['dir'])
                                        ) {
                                            if ($c !== 0) {
                                                $sOrder .= ",";
                                            }
                                            $colName = $columns[$colNum];
                                            $sOrder .= " " . $aliasPrefix . $colName . " " . $info['dir'];
                                            $c++;
                                        }
                                    }
                                }
                            }
                        }
                    }


                    //------------------------------------------------------------------------------/
                    // REQUEST COMPUTING
                    //------------------------------------------------------------------------------/
                    $fromClause = $lh->getFrom($mc);


                    if (false !== $info = QuickPdo::fetch("select count(*) as count from $fromClause")) {
                        $ret['recordsTotal'] = (int)$info['count'];
                        $ret['recordsFiltered'] = $ret['recordsTotal'];


                        $requestFields = $lh->getRequestFields();


                        $stmt .= "select " . implode(', ', $requestFields) . " from $fromClause";
                        $stmt .= $sWhere;


                        $stmt .= $sOrder;
                        if (-1 !== (int)$length) {
                            $stmt .= " limit $start, $length";
                        }

                        if (false !== $res = QuickPdo::fetchAll($stmt, $markers)) {
                            $ret['data'] = [];
                            if (null === ($r2eIdfs = $lh->getRequestIdentifyingFields())) {
                                $r2eIdfs = [];
                                foreach ($mc->getIdentifyingFields() as $field) {
                                    $r2eIdfs[$field] = $field;
                                }
                            }

                            foreach ($res as $k => $row) {

                                $idf2Values = [];
                                foreach ($r2eIdfs as $requestIdf => $effectiveIdf) {
                                    if (array_key_exists($requestIdf, $row)) {
                                        $idf2Values[$effectiveIdf] = $row[$requestIdf];
//                                        if($effectiveIdf !== $requestIdf){
//                                        unset($row[$requestIdf]);
//                                        }
                                    }
                                }

                                $row = [
                                        'DT_RowId' => $k,
                                        /**
                                         * Note: it's important to pass the real idfs, because
                                         * the displayed idfs might have been changed by a cosmetic change.
                                         * You need real idfs to access fetch_row and delete_rows services !
                                         */
                                        'DT_RowData' => [
                                            'idf' => $idf2Values,
                                        ],
                                    ] + $row;
                                $ret['data'][$k] = $row;
                            }
                        }

                        // recordFiltered
                        $stmtCountFiltered = "select count(*) as count from $fromClause";
                        $stmtCountFiltered .= $sWhere;
                        if (false !== $info = QuickPdo::fetch($stmtCountFiltered, $markers)) {
                            $ret['recordsFiltered'] = (int)$info['count'];
                        }
                    }
                }


            } catch (\Exception $e) {
                $ret['error'] = MeredithSupervisor::inst()->translate("Oops! An error occurred, please retry later");
                MeredithSupervisor::inst()->log($e);
            }
        }

    }
    else {
        throw new MeredithException("Permission not granted to access rows with $formId");
    }
}
else {
    throw new \Exception("An error occurred"); // but we don't care
}

echo json_encode($ret);