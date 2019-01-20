<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper;

use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\PhpStdinStreamWrapper\PhpStdinStreamWrapper;


/**
 * StdinInputStreamWrapper
 * @author Lingtalfi
 * 2015-03-23
 *
 * We can use this wrapper to programmatically write into stdin,
 * or to track stdin's inputs.
 *
 *
 *
 *
 */
class StdinInputStreamWrapper
{
    protected $stdinWrapperResource;
    protected $userInputs;
    protected $registered;
    protected $initialContent;

    public function __construct($initialContent = '')
    {
        $this->registered = false;
        $this->userInputs = [];
        $this->initialContent = $initialContent;
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS InputStreamWrapperInterface
    //------------------------------------------------------------------------------/
    /**
     * @return object, a StreamWrapper object as defined in php
     *                  (generally STDIN).
     */
    public function getInput()
    {
        if (false === $this->registered) {
            stream_wrapper_register('kominStdin', 'Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\PhpStdinStreamWrapper\PhpStdinStreamWrapper');
            $this->registered = true;
        }

        $context = stream_context_create([
            'kominStdin' => [
                "wrapper" => $this,
            ],
        ]);
        return fopen("kominStdin://any", 'r+', false, $context);

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function storeUserInput($input)
    {
        $this->userInputs[] = $input;
    }

    /**
     * @return array
     */
    public function getUserInputs($includeInitialContent = true)
    {
        $userInputs = $this->userInputs;
        if (true === $includeInitialContent) {
            array_unshift($userInputs, $this->initialContent);
        }
        return $userInputs;
    }

    public function getInitialContent()
    {
        return $this->initialContent;
    }
}
