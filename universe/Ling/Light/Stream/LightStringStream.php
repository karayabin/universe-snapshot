<?php


namespace Ling\Light\Stream;


/**
 * The LightStringStream class.
 *
 * A readable/writable stream.
 *
 *
 */
class LightStringStream extends LightStream
{

    /**
     * Builds the LightStringStream instance.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $stream = fopen('php://temp', 'r+');
        rewind($stream);
        $this->setStream($stream);
    }
}