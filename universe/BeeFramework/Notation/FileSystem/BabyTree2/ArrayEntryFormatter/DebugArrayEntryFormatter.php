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
 * DebugArrayEntryFormatter
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class DebugArrayEntryFormatter extends ArrayEntryFormatter
{
    private $rootDir;

    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->rootDir = (array_key_exists('rootDir', $options)) ? $options['rootDir'] : null;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getFormat(array $entry)
    {
        $type = $entry['type'];

        $permFmt = '';
        if (
            array_key_exists('perms', $entry) ||
            array_key_exists('owner', $entry)
        ) {
            if (array_key_exists('perms', $entry)) {
                $perms = $entry['perms'];
                if (false !== $perms) {
                    $permFmt .= '- $perms ';
                }
                else {
                    $permFmt = ' [_resource_not_existing_]';
                }
            }
            if (array_key_exists('owner', $entry)) {
                if (false !== $entry['owner']) {
                    $permFmt .= '- $owner:$ownerGroup';
                }
                else {
                    $permFmt = ' [_resource_not_existing_]';
                }
            }
        }


        if ('link' === $type) {
            $fmt = '$path ($type) -> $linkTarget ' . $permFmt;
        }
        else {
            $fmt = '$path ($type) ' . $permFmt;
        }
        return $fmt;
    }

    protected function prepareEntry(array &$entry)
    {
        if (null !== $this->rootDir) {
            $entry['path'] = $this->rootDir . DIRECTORY_SEPARATOR . $entry['path'];
        }
        if (false === $entry['linkTarget']) {
            $entry['linkTarget'] = '_readlink_error';
        }
    }
}
