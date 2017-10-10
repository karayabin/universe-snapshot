<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\PhpStdinStreamWrapper;

use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\StdinInputStreamWrapper;


/**
 * PhpStdinStreamWrapper
 * @author Lingtalfi
 * 2015-03-23
 *
 */
class PhpStdinStreamWrapper
{


    public $context;
    /**
     * @var StdinInputStreamWrapper
     */
    protected $wrapper;
    protected $loaded;

    public function __construct()
    {
        $this->tell(__METHOD__);
        $this->inputs = [];
        $this->loaded = false;
    }



    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $this->tell(__METHOD__);
        $opt = stream_context_get_options($this->context);
        $this->wrapper = $opt['kominStdin']['wrapper'];
        if (false === $this->loaded) {
            $this->loaded = true;
            fwrite(STDIN, $this->wrapper->getInitialContent());
        }
        return STDIN;
    }

    public function stream_eof()
    {
        $this->tell(__METHOD__);
        return feof(STDIN);
    }

    public function stream_read($count)
    {
        $this->tell(__METHOD__);
        $r = fread(STDIN, $count);
        $this->wrapper->storeUserInput($r);
        return $r;
    }

    public function stream_flush()
    {
        $this->tell(__METHOD__);
        return fflush(STDIN);
    }

    public function stream_close()
    {
        /**
         * We don't close stdin because I don't know
         * how to re-open it afterwards.
         * ( i.e. it seems to be closed forever, so that 
         * other programs (like TerminalInfoTool::getCurrentPosition)
         * stop working. )
         * 
         */
        $this->tell(__METHOD__);
//        fclose(STDIN);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function tell($msg)
    {
        echo $msg;
        echo PHP_EOL;
    }


}
