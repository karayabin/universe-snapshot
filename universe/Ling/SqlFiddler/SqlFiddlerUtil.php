<?php


namespace Ling\SqlFiddler;

use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SqlFiddler\Exception\SqlFiddlerException;

/**
 * The SqlFiddlerUtil class.
 */
class SqlFiddlerUtil
{


    /**
     * This property holds the searchExpression for this instance.
     * @var string
     */
    private string $searchExpression;

    /**
     * This property holds the searchExpressionMarkerName for this instance.
     * @var string
     */
    private string $searchExpressionMarkerName;

    /**
     * This property holds the searchExpressionMode for this instance.
     * @var string
     */
    private string $searchExpressionMode;

    /**
     * This property holds the orderByMap for this instance.
     * You must define the default value using the _default key.
     * It's an array of key => items, where each item is an array of:
     * - 0: the sql expression to use in the query
     * - 1: the label to display in a gui select
     *
     *
     * @var array
     */
    private array $orderByMap;

    /**
     * This property holds the pageLengthMap for this instance.
     * @var array
     */
    private array $pageLengthMap;


    /**
     * Builds the SqlFiddlerUtil instance.
     */
    public function __construct()
    {
        $this->searchExpression = '1';
        $this->searchExpressionMarkerName = '';
        $this->searchExpressionMode = '%%';
        $this->orderByMap = [];
        $this->pageLengthMap = [];
    }


    /**
     * Sets the searchExpression.
     *
     *
     * The markerName will be injected in the markers automatically when you call the getSearchExpression method.
     *
     *
     *
     * The injected value is decorated, depending on the search mode, which can be one of the followings:
     *
     * - %%: %like%
     * - %like%: %like%
     *
     * - %: %like
     * - %like: %like
     * - %s: %like
     *
     * - s%: like%
     * - like%: like%
     *
     * - none: (the value of the marker is exactly what you pass to the getSearchExpression)
     * - n: alias of none
     *
     *
     * The default value is %%, assuming that you search using the %like% mode.
     *
     *
     *
     *
     *
     * Note: by default, for all "like" modes (i.e. a mode containing %), we escape the % and _ chars from the value, assuming that you are using mysql (those are special search symbols in mysql),
     * and assuming that your search value don't use those wildcards.
     *
     *
     *
     *
     * @param string $searchExpression
     * @param string $markerName
     * @param string $searchMode
     *
     *
     * @return $this
     */
    public function setSearchExpression(string $searchExpression, string $markerName, string $searchMode = '%%'): static
    {
        $this->searchExpression = $searchExpression;
        $this->searchExpressionMarkerName = $markerName;
        $this->searchExpressionMode = $searchMode;
        return $this;
    }

    /**
     * Sets the orderByMap.
     *
     * @param array $orderByMap
     * @return $this
     */
    public function setOrderByMap(array $orderByMap): static
    {
        $this->orderByMap = $orderByMap;
        return $this;
    }

    /**
     * Sets the pageLengthMap.
     *
     * @param array $pageLengthMap
     * @return $this
     */
    public function setPageLengthMap(array $pageLengthMap): static
    {
        $this->pageLengthMap = $pageLengthMap;
        return $this;
    }


    /**
     * Returns the "search" snippet to insert in your query.
     *
     * If the user expression is null (or empty string when trimmed), 1 is returned by default, so that you can do "WHERE 1" in your query.
     *
     * The markers array is filled with the appropriate marker that you defined when calling the setSearchExpression method.
     *
     *
     *
     * @param string|null $userExpression
     * @param array $markers
     * @return string
     */
    public function getSearchExpression(string $userExpression = null, array &$markers = []): string
    {
        $defaultReturn = "1";
        if (null === $userExpression) {
            return $defaultReturn;
        }
        if ('' === trim($userExpression)) {
            return $defaultReturn;
        }

        switch ($this->searchExpressionMode) {
            case "%%":
            case "%like%":
            case "%s%":
                $userExpression = '%' . addcslashes($userExpression, '%_') . '%';
                break;
            case "%":
            case "%like":
            case "%s":
                $userExpression = '%' . addcslashes($userExpression, '%_');
                break;
            case "s%":
            case "like%":
                $userExpression = addcslashes($userExpression, '%_') . '%';
                break;
            case "n":
            case "none":
                break;
            default:
                throw new SqlFiddlerException("Unknown searchMode: $this->searchExpressionMode.");
                break;
        }

        $markers[':' . $this->searchExpressionMarkerName] = $userExpression;
        return $this->searchExpression;
    }


    /**
     * Returns the "order by" snippet to insert in your query.
     *
     * If the userChoice is not found in the orderByMap, we use the given default choice, or we throw an exception if the throwEx flag is raised.
     *
     *
     * @param string $userChoice
     * @param string $default
     * @param bool $throwEx
     * @return string
     * @throws \Exception
     */
    public function getOrderBy(string $userChoice, string $default = "_default", bool $throwEx = false): string
    {
        if (false === array_key_exists($userChoice, $this->orderByMap)) {
            if (true === $throwEx) {
                throw new SqlFiddlerException("No value found in the orderBy map for user choice $userChoice.");
            }
            $userChoice = $default;
        }
        return $this->orderByMap[$userChoice];

    }


    /**
     * Returns the page offset to insert in your query.
     *
     * In Mysql, this corresponds to the offset component of the limit clause.
     *
     * If the given page is null, 0 is returned by default.
     * Otherwise, it returns the given page number minus 1.
     *
     * If the result is below 0, it returns 0.
     *
     *
     * @param int $userPage
     * @param int $pageLength
     * @return int
     */
    public function getPageOffset(int $userPage, int $pageLength): int
    {
        // at this point, we don't know the total number of rows, and so we don't know the total number of pages,
        // so we can only limit by the bottom, not the top.
        if ($userPage < 1) {
            $userPage = 1;
        }

        return ($userPage - 1) * $pageLength;
    }

    /**
     * Returns the "page length" to insert in your query.
     *
     * In Mysql, this corresponds to the row_count component of the limit clause.
     *
     * If userPageLength is null, the "_default" value from the pageLength map is returned.
     *
     * Throws an exception if no value matches the given userPageLength.
     *
     *
     *
     * @param string|null $userPageLength
     * @return int
     */
    public function getPageLength(string $userPageLength = null): int
    {
        if (null === $userPageLength) {
            $userPageLength = "_default";
        }
        if (true === array_key_exists($userPageLength, $this->pageLengthMap)) {
            return (int)$this->pageLengthMap[$userPageLength];
        }
        throw new SqlFiddlerException("No value found in the pageLengthMap map for user choice $userPageLength.");
    }


    /**
     * Returns an array containing the rows of the prepared query and the total number of rows when limit is removed from that query.
     *
     * The returned array has the following structure:
     *
     * - 0: the rows of the prepared query
     * - 1: the total number of rows of that query when limit is removed
     *
     * See the @page(SqlFiddler conception notes) for more details about the prepared query.
     *
     * If your query uses a "group by" clause, you might want to set the useWrap flag to true.
     * The useWrap flag wraps the whole query with an extra "select count(*) from ($yourQuery) as tmp" request,
     * which might/might not be what you want when using group by statements.
     *
     *
     *
     *
     *
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     * @param string $preparedQuery
     * @param array $markers
     * @param bool $useWrap
     * @return array
     * @throws \Exception
     */
    public function fetchAllCount(SimplePdoWrapperInterface $pdoWrapper, string $preparedQuery, array $markers = [], bool $useWrap = false): array
    {


        $q2 = preg_replace('!select .*-- ?endselect!isU', 'select count(*) as count', $preparedQuery);
        $q2 = preg_replace('!limit .*-- ?endlimit!isU', '', $q2);


        if (true === $useWrap) {
            $q2 = "select count(*) as count from ($q2) as tmp";
        }


        $res = $pdoWrapper->fetch($q2, $markers, \PDO::FETCH_ASSOC);
        if (false !== $res) {
            $count = (int)$res['count'];
            $rows = $pdoWrapper->fetchAll($preparedQuery, $markers, \PDO::FETCH_ASSOC);
            return [
                $rows,
                $count,
            ];
        } else {
            throw new SqlFiddlerException("Invalid count query: $q2");
        }
    }


    /**
     *
     * Returns an array of information about the given query.
     *
     * The returned information looks like this:
     *
     * - nbPages: int
     * - desiredPage: int
     * - realPage: int
     * - nbItems: int
     * - nbItemsTotal: int
     * - firstItemIndex: int
     * - lastItemIndex: int
     * - rows: array
     *
     *
     * See more details in the @page(SqlFiddler conception notes).
     *
     * Note that the limit portion is rewritten entirely by this function, based on the given page/pageLength.
     * In other words, it doesn't matter what you have in your limit clause in the given query.
     *
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     * @param string $preparedQuery
     * @param array $markers
     * @param int $desiredPage
     * @param int $pageLength
     * @param bool $useWrap
     * @return array
     * @throws \Exception
     */
    public function fetchAllCountInfo(SimplePdoWrapperInterface $pdoWrapper, string $preparedQuery, array $markers, int $desiredPage, int $pageLength, bool $useWrap = false): array
    {
        $q2 = preg_replace('!select .*-- ?endselect!isU', 'select count(*) as count', $preparedQuery);
        $q2 = preg_replace('!limit .*-- ?endlimit!isU', '', $q2);


        if (true === $useWrap) {
            $q2 = "select count(*) as count from ($q2) as tmp";
        }


        $res = $pdoWrapper->fetch($q2, $markers, \PDO::FETCH_ASSOC);

        if (false !== $res) {
            $nbItemsTotal = (int)$res['count'];


            $nbPages = (int)ceil($nbItemsTotal / $pageLength);
            $realPage = $desiredPage;
            if ($realPage < 1) {
                $realPage = 1;
            }
            if (0 !== $nbPages && $realPage > $nbPages) {
                $realPage = $nbPages;
            }

            $offset = ($realPage - 1) * $pageLength;


            $limit = "$offset, $pageLength";


            $q1 = preg_replace('!limit .*-- ?endlimit!isU', "limit $limit", $preparedQuery);


            $rows = $pdoWrapper->fetchAll($q1, $markers, \PDO::FETCH_ASSOC);

            $nbItems = count($rows);


            $firstItemIndex = $offset + 1;
            if ($realPage === $nbPages) {
                $lastItemIndex = $offset + $nbItems;
            } else {
                $lastItemIndex = $offset + $pageLength;
            }

            return [
                "nbPages" => $nbPages,
                "desiredPage" => $desiredPage,
                "realPage" => $realPage,
                "nbItems" => $nbItems,
                "nbItemsTotal" => $nbItemsTotal,
                "firstItemIndex" => $firstItemIndex,
                "lastItemIndex" => $lastItemIndex,
                "rows" => $rows,
            ];
        } else {
            throw new SqlFiddlerException("Invalid count query: $q2");
        }
    }


    /**
     * Returns an array of information related to the orderBy field.
     * The returned array contains the following:
     * - query: string, the orderBy clause (without the "order by" keyword) to insert in your sql query
     * - publicMap: array, an array of orderBy key => label, to use in a select on the front website for instance
     * - real: string, the "order by" key really used by the query (since the user might provide an unexpected value).
     *      Note: if the user provides a value that doesn't exist in the orderByMap, we use the "_default" orderby key
     *      by default.
     *
     *
     *
     * @param string $desiredOrderBy
     * @return array
     */
    public function getOrderByInfo(string $desiredOrderBy): array
    {
        if (false === array_key_exists($desiredOrderBy, $this->orderByMap)) {
            if (false === array_key_exists("_default", $this->orderByMap)) {
                throw new SqlFiddlerException("Undefined _default key for order by.");
            }
            $desiredOrderBy = "_default";
        }
        $query = $this->orderByMap[$desiredOrderBy][0];
        $publicMap = [];
        foreach ($this->orderByMap as $k => $item) {
            $publicMap[$k] = $item[1];
        }
        return [
            "query" => $query,
            "publicMap" => $publicMap,
            "real" => $desiredOrderBy,
        ];
    }
}