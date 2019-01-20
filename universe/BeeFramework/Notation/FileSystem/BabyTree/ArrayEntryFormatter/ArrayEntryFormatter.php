<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\FileSystem\BabyTree\ArrayEntryFormatter;


/**
 * ArrayEntryFormatter
 * @author Lingtalfi
 * 2015-04-28
 *
 */
abstract class ArrayEntryFormatter
{

    protected $options;

    abstract protected function getFormat(array $entry);


    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            'perms' => true,
            'ownership' => true,
        ], $options);
    }

    public function format(array $entry)
    {

        if (false === $this->options['perms']) {
            unset($entry['perms']);
        }
        if (false === $this->options['ownership']) {
            unset($entry['owner']);
        }
        if (false === $this->options['ownership']) {
            unset($entry['ownerGroup']);
        }


        $this->prepareEntry($entry);


        $perms = (array_key_exists('perms', $entry)) ? $entry['perms'] : '';
        $owner = (array_key_exists('owner', $entry)) ? $entry['owner'] : '';
        $ownerGroup = (array_key_exists('ownerGroup', $entry)) ? $entry['ownerGroup'] : '';


        $ret = str_replace([
            '$type',
            '$perms',
            '$ownerGroup',
            '$owner',
            '$path',
            '$linkTarget',
        ], [
            $entry['type'],
            $perms,
            $ownerGroup,
            $owner,
            $entry['path'],
            $entry['linkTarget'],
        ], $this->getFormat($entry));
        $this->decorate($ret);
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function prepareEntry(array &$entry)
    {

    }

    protected function decorate(&$string)
    {

    }
}
