<?php


namespace Ling\Light_Realist\DuelistEngine;

/**
 * The DuelistEngineInterface interface.
 */
interface DuelistEngineInterface
{

    /**
     * Returns an array based on the given requestId, duelist declaration and tags, or false if something wrong occurs.
     *
     * The structure of the returned array is:
     *
     * - rows: the rows to render, in mysql associative style (i.e. key/value pairs)
     * - nbTotalRows: the total number of rows if the request were not filtered
     * - limit: array of:
     *      - offset: int, the index of the first rendered element in the context of all the rows
     *      - length: int, the page length (i.e. how many items should be rendered)
     * - debugInfo: additional info which the engine wants to share with the caller.
     *      It's an array of key/value pairs.
     *
     * If not otherwise specified, the tags used are the @page(open tags).
     * Duelist declaration: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md.
     *
     * If something wrong occurs, the error message can be fetched via the getError method.
     *
     *
     * Throws an exception if something unexpected occurs.
     *
     *
     *
     * @param string $requestId
     * @param array $duelistDeclaration
     * @param array $tags
     * @return array|false
     * @throws \Exception
     */
    public function getRowsInfo(string $requestId, array $duelistDeclaration, array $tags): array|false;


    /**
     * Returns the error message if any, or null otherwise.
     *
     * @return string|null
     */
    public function getError(): string|null;
}