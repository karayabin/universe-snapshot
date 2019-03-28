<?php


namespace Ling\Deploy\Command;


/**
 * The DiffBackCommand class.
 *
 * Same as the @object(DiffCommand), but displays the differences to have the remote files mirrored on the site.
 *
 *
 * Flags
 * ------------
 * - -f: files. If this flag is set, the diff command will write the diff to 3 files instead of displaying it
 *          to the screen. The 3 files are:
 *              - $app/.deploy/diff-add.txt
 *              - $app/.deploy/diff-remove.txt
 *              - $app/.deploy/diff-replace.txt
 *
 *
 *
 */
class DiffBackCommand extends DiffCommand
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->sentenceCreateDiff = "Creating diff between the remote and the current site:";
        $this->reverse = true;
    }
}