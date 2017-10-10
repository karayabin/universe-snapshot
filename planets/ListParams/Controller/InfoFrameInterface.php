<?php


namespace ListParams\Controller;


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