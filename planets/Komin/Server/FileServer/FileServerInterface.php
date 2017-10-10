<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\FileServer;


/**
 * FileServerInterface
 * @author Lingtalfi
 * 2015-04-20
 *
 *
 * A file server encapsulates the details of accessing a file in a given tree,
 * that is: where exactly (and at which level) is it stored.
 *
 * The elementId is the abstract (unique) name of a file.
 * It is the only way an human should refer to a file.
 *
 *
 */
interface FileServerInterface
{


    /**
     * @return bool 
     */
    public function putFile($elementId, $file);

    /**
     * @return string|false, path to the file, or false if not found
     */
    public function getFile($elementId);
}



