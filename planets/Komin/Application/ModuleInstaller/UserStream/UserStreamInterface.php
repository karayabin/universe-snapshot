<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\UserStream;


/**
 * UserStreamInterface
 * @author Lingtalfi
 * 2015-05-04
 *
 *
 * The idea behind the user stream is to be able to switch from a console client
 * to a web browser client !
 *
 */
interface UserStreamInterface
{

    public function log($msg);

    public function display($msg);

    /**
     * @param array $choices 
     *                      choice => callback
     */
    public function ask($question, array $choices);
}
