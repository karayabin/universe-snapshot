<?php


namespace DirTransformer\Transformer;

interface TrackingInterface
{
    /**
     * file: the absolute path to the current file being scanned
     */
    public function setPath($file);
}