<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog;


/**
 * DialogInterface
 * @author Lingtalfi
 * 2015-05-08
 *
 */
interface DialogInterface
{

    /**
     * Sets the question which precedes the user prompt.
     * Since the question and the user answer could be on the same line,
     * one has to specify any carriage return should we need any.
     */
    public function setQuestion($q);

    /**
     * Sets the symbolic codes by which the user answer is recognized as such (usually return, or y, or n)
     */
    public function setSubmitCodes($c);


    /**
     * @return mixed, the user answer
     */
    public function execute();
}
