<?php


namespace Ling\PaginationHelper\Paginator;

/**
 * The PaginatorInterface interface.
 */
interface PaginatorInterface
{


    /**
     * Renders a pagination widget.
     *
     * The given page number must be the real page number (between 1 and $nbPages).
     *
     * The linkFormat uses the {page} tag as the (dynamic) page number.
     *
     *
     * @param int $page
     * @param int $nbPages
     * @param string $linkFormat
     * @return string
     */
    public function render(int $page, int $nbPages, string $linkFormat): string;
}