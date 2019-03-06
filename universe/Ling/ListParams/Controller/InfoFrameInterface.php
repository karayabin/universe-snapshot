<?php


namespace Ling\ListParams\Controller;


interface InfoFrameInterface
{


    /**
     * @return array:
     *
     * - offsetStart
     * - offsetEnd
     * - nbTotalItems
     * - page
     * - nipp
     */
    public function getArray();
}