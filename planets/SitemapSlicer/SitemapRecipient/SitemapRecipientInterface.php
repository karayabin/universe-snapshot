<?php

namespace SitemapSlicer\SitemapRecipient;

/*
 * LingTalfi 2015-10-12
 */
interface SitemapRecipientInterface
{

    public function start();

    public function end();

    /**
     * @param $baseName
     *              string: a format string using tag {n}.
     *                      {n} is replaced with the empty string for the base slice (aka slice 1),
     *                      and with the number of the slice for other slices.
     *              callback: returns the filePath, takes one parameter: n, the number of the slice.
     */
    public function setFile($path);

    /**
     * Register a callback to be triggered whenever the event $eventName occurs.
     * The callable takes the event data as its arguments.
     */
    public function listenTo($eventName, callable $f);


    public function addSitemapEntry($sitemapEntry);

}
