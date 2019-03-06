<?php


namespace Ling\PersistentRowCollection\Finder;


use Ling\PersistentRowCollection\PersistentRowCollectionInterface;

interface PersistentRowCollectionFinderInterface
{
    /**
     *
     * Return the PersistentRowCollection identified by the given name,
     * or false if the object couldn't be found.
     *
     * @param $name
     * @return false|PersistentRowCollectionInterface
     */
    public function find($name);
}

