<?php


namespace RowsGenerator;

use QuickPdo\QuickPdo;
use RowsGenerator\Exception\RowsGeneratorException;
use RowsGenerator\Util\QuickPdoRowsGeneratorUtil;

/**
 * This rowGenerator implements only two kinds of searchItems:
 * - searchExpression
 * - searchConstraint
 *
 *
 * The fields is a string representing the part of the sql query corresponding to the selected columns
 * (just after the select and before the where if any).
 * Each column must be on its own line, and end with a comma (except the very last line)
 *
 * For instance, if the request was:
 *      select id, pseudo from users where active=1
 *
 * Then the fields string would be:
 *
 *          id,
 *          pseudo
 *
 *
 * Note: the fields string accepts table aliases (for instance a.pseudo).
 * Note: the reason why each line must be on its own line is because it eases the implementation of extracting
 *      the fields, while being reasonably easy to write for the user.
 *      The problem with implementation is the possible use of CONCAT, or other functions which use comma (like IFNULL),
 *      and so if we want to separate fields by comma, we would need to parse concat, which might require
 *      more regex (=more processor power) ...
 *      So, forcing the user to put one column per line, we can split using the "comma followed by a carriage return"
 *      trick.
 *
 *
 * The query is the sql request, with the fields part replaced with %s,
 * for instance:
 *
 *      select %s from users where active=1
 *
 *
 *
 *
 * Nomenclature
 * ==================
 *
 * alias name vs functional name
 * --------------------------------
 *
 * Say we have the following request:
 *
 *
 * SELECT
 *      c.id,
 *      c.equipe_id,
 *      o.nom as equipe_nom,
 *      c.titre,
 *      c.url_photo,
 *      c.url_video,
 *      c.date_debut,
 *      c.date_fin,
 *      c.lots,
 *      c.reglement,
 *      c.description
 *
 * FROM oui.concours c
 * INNER JOIN oui.equipe o ON o.id=c.equipe_id
 *
 *
 * The alias names are:
 * id, equipe_id, equipe_nom, titre, url_photo, ...
 *
 *
 * The functional names are:
 * c.id, c.equipe_id, o.nom, c.titre, ...
 *
 *
 * In the front, we use exclusively alias names, because we want to protect/abstract the data from a malicious user,
 * and so, columnIds, sorting column names, and search column names all use the alias names notation.
 *
 * But then we have to process the data server side to update the list.
 * At the sql request level, the ORDER BY clause accept alias names, but the WHERE clause doesn't.
 * The WHERE clause requires functional names, and so we need to convert alias names back to functional names
 * when necessary.
 *
 *
 * Alias name is also known as columnId.
 *
 *
 *
 *
 */
class QuickPdoRowsGenerator extends AbstractRowsGenerator
{

    private $fields;
    private $query;
    private $markers;
    private $onErrorCallback;
    private $realPage;


    public function __construct()
    {
        parent::__construct();
        $this->markers = [];
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function setOnErrorCallback(callable $onErrorCallback)
    {
        $this->onErrorCallback = $onErrorCallback;
        return $this;
    }


    public function getRows()
    {
        if (false !== ($alias2Functional = $this->getAliasToFunctionalNames($this->fields))) {

            $searchTail = "";
            //--------------------------------------------
            // FILTERING
            //--------------------------------------------
            $markers = [];
            if (count($this->searchItems) > 0) {

                $hasWhere = false;
                if (preg_match('!\swhere\s!i', $this->query)) {
                    $hasWhere = true;
                }

                $i = 1;
                $first = true;
                foreach ($this->searchItems as $columnId => $value) {
                    if (array_key_exists($columnId, $alias2Functional)) {
                        /**
                         * Now the functional name is "user" safe
                         */
                        $functionalName = $alias2Functional[$columnId];

                        // searchExpression
                        if (is_string($value) || is_numeric($value)) {
                            $value = ['like', (string)$value];
                        }

                        // searchConstraint
                        if (is_array($value)) {


                            if (true === $first) {
                                if (true === $hasWhere) {
                                    $searchTail .= " and (";
                                } else {
                                    $searchTail .= " where (";
                                }
                            }


                            $markerName = "marker_" . $i++;


                            if (false === $first) {
                                $searchTail .= " and ";
                            }


                            list($operator, $operand) = $value;
                            switch ($operator) {
                                case '<':
                                case '<=':
                                case '>':
                                case '>=':
                                case '=':
                                case '!=':
                                    $markers[$markerName] = $operand;
                                    $searchTail .= "$functionalName $operator :" . $markerName;
                                    $first = false;
                                    break;
                                case 'between':
                                    $operand2 = $value[2];
                                    $markers[$markerName] = $operand;
                                    $markerName2 = "marker_" . $i++;
                                    $markers[$markerName2] = $operand2;
                                    $searchTail .= "$functionalName $operator :" . $markerName . " and :" . $markerName2;
                                    $first = false;
                                    break;
                                case 'like':
                                    $markers[$markerName] = '%' . str_replace('%', '\%', $operand) . '%';
                                    $searchTail .= "$functionalName like :" . $markerName;
                                    $first = false;
                                    break;
                                case '%like':
                                    $markers[$markerName] = '%' . str_replace('%', '\%', $operand);
                                    $searchTail .= "$functionalName like :" . $markerName;
                                    $first = false;
                                    break;
                                case 'like%':
                                    $markers[$markerName] = str_replace('%', '\%', $operand) . '%';
                                    $searchTail .= "$functionalName like :" . $markerName;
                                    $first = false;
                                    break;
                                default:
                                    $this->error("Unsupported operator: $operator");
                                    $searchTail .= "1";
                                    break;
                            }
                        }
                    } else {
                        $this->error("columnId $columnId is not safe: not a valid alias name, original query: " . $this->getOriginalQuery());
                    }
                }

                if (false === $first) {
                    $searchTail .= ')';
                }

            }


            //--------------------------------------------
            // SORTING
            //--------------------------------------------
            $sortTail = "";
            if (count($this->sortValues) > 0) {
                // note that sortValues come from the user, we don't trust them
                $allowedSorts = ['asc', 'desc'];
                $atLeastOne = false;
                $s = " order by ";
                foreach ($this->sortValues as $aliasName => $sortDir) {
                    // checking that user data is consistent with the developer's query
                    if (array_key_exists($aliasName, $alias2Functional) && in_array($sortDir, $allowedSorts, true)) {
                        if (true === $atLeastOne) {
                            $s .= ", ";
                        }
                        $s .= $aliasName . " " . $sortDir;
                        $atLeastOne = true;
                    }
                }
                if (true === $atLeastOne) {
                    $sortTail .= $s;
                }
            }


            $countQuery = $this->getQuery("count(*) as count") . $searchTail;
            $this->nbTotalItems = (int)QuickPdo::fetch($countQuery, $markers)['count'];

            //--------------------------------------------
            // SLICE
            //--------------------------------------------
            $limitTail = "";
            if ('all' !== $this->nipp) {
                $page = $this->page;
                if ($page <= 1) {
                    $page = 1;
                }
                $maxPage = ceil($this->nbTotalItems / $this->nipp);

                if (0 === (int)$maxPage) {
                    $this->realPage = 1;
                    return [];
                }

                if ($page > $maxPage) {
                    $page = $maxPage;
                }
                $this->realPage = $page;
                $offset = ($page - 1) * $this->nipp;
                $limitTail .= " limit $offset, " . $this->nipp;
            } else {
                $this->realPage = 1;
            }

            $rowsQuery = $this->getQuery($this->fields) . $searchTail . $sortTail . $limitTail;

            $rows = QuickPdo::fetchAll($rowsQuery, $markers);

            return $rows;
        } else {
            return [];
        }
    }

    public function getPage()
    {
        return $this->realPage;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function doError($msg)
    {
        if (null === $this->onErrorCallback) {
            throw new RowsGeneratorException($msg);
        } else {
            call_user_func($this->onErrorCallback, $msg);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getQuery($fields)
    {
        return sprintf($this->query, $fields);
    }


    private function getAliasToFunctionalNames($fields)
    {
        $aliasNames = QuickPdoRowsGeneratorUtil::getAliasNames($fields);
        $functionalNames = QuickPdoRowsGeneratorUtil::getFunctionalNames($fields);
        if (count($aliasNames) === count($functionalNames)) {
            return array_combine($aliasNames, $functionalNames);
        } else {
            $this->error("not the same number of aliasNames and functionalNames with fields: $fields");
            return false;
        }
    }



    private function error($msg)
    {
        $msg = "QuickPdoRowsGenerator: " . $msg;
        $this->doError($msg);
    }

    private function getOriginalQuery()
    {
        return sprintf($this->query, $this->fields);
    }
}