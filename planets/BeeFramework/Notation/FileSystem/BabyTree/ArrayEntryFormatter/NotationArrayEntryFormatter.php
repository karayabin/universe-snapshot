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
 * NotationArrayEntryFormatter
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class NotationArrayEntryFormatter extends ArrayEntryFormatter
{

    private $indentFactor;
    private $indentChar;
    private $sepChar;

    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->indentFactor = 4;
        $this->indentChar = '-';
        $this->sepChar = (array_key_exists('sepChar', $options)) ? $options['sepChar'] : '**';

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
                    $permFmt .= ' ' . $this->sepChar . ' [$perms]';
                }
                else {
                    $permFmt = ' ' . $this->sepChar . ' [_resource_not_existing_]';
                }
            }
            if (array_key_exists('owner', $entry)) {
                if (false !== $entry['owner']) {
                    $permFmt .= ' ' . $this->sepChar . ' {$owner=$ownerGroup}';
                }
                else {
                    $permFmt = ' ' . $this->sepChar . ' [_resource_not_existing_]';
                }
            }
        }


        if ('link' === $type) {
            $fmt = '$path -> $linkTarget' . $permFmt;
        }
        else {
            $colon = '';
            if ('dir' === $type) {
                $colon = ':';
            }
            $fmt = '$path' . $permFmt . $colon;
        }
        return $fmt;
    }

    protected function prepareEntry(array &$entry)
    {
        $path = $entry['path'];
        $linkTarget = $entry['linkTarget'];
        if (false === $linkTarget) {
            $entry['linkTarget'] = '*readlink_error*';
        }


        $level = (substr_count($path, DIRECTORY_SEPARATOR)) * $this->indentFactor + 1;
        $entry['path'] = str_repeat($this->indentChar, $level) . " " . basename($path);
    }

    protected function decorate(&$string)
    {

    }

}
