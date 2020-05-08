<?php


namespace Ling\Light\Stream;


use Ling\Light\Exception\LightException;

/**
 * The LightStream class.
 */
abstract class LightStream implements LightStreamInterface
{

    /**
     * A php stream resource.
     * See https://www.php.net/manual/en/language.types.resource.php for more details
     *
     * @var resource
     */
    private $stream;

    /**
     * Resource modes
     *
     * @var array
     * @link http://php.net/manual/function.fopen.php
     */
    protected static $modes = [
        'readable' => ['r', 'r+', 'w+', 'a+', 'x+', 'c+'],
        'writable' => ['r+', 'w', 'w+', 'a', 'a+', 'x', 'x+', 'c', 'c+'],
    ];


    /**
     * Whether the stream is readable. It's a cache.
     * @var bool
     */
    protected $readable;

    /**
     * Whether the stream is writable. It's a cache.
     * @var bool
     */
    protected $writable;

    /**
     * Whether the stream is seekable. It's a cache.
     * @var bool
     */
    protected $seekable;

    /**
     * Whether the stream is a pipe. It's a cache.
     * @var bool
     */
    protected $isPipe;

    /**
     * The current size of the stream in bytes. It's a cache.
     * @var int
     */
    protected $size;


    /**
     * Builds the LightStream instance.
     */
    public function __construct()
    {
        $this->stream = null;
        $this->readable = null;
        $this->writable = null;
        $this->seekable = null;
        $this->isPipe = null;
        $this->size = null;
    }


    /**
     * @implementation
     */
    public function append(string $string): LightStreamInterface
    {
        $position = $this->getSize();
        $this->write($string, $position);
        return $this;
    }

    /**
     * @implementation
     */
    public function prepend(string $string): LightStreamInterface
    {
        $this->checkReadable();
        $data = $string . $this->read(0);
        $this->write($data, 0);
        return $this;
    }

    /**
     * @implementation
     */
    public function write(string $string, int $position = 0): LightStreamInterface
    {
        $this->checkWritable();
        $this->setCursorPosition($position);
        if (false === (fwrite($this->stream, $string))) {
            $this->error("Couldn't write to this stream.");
        }
        $this->size = null;
        return $this;
    }

    /**
     * @implementation
     */
    public function insert(string $string, int $position): LightStreamInterface
    {

        $this->checkReadable();
        $this->checkWritable();
        $position = $this->fixPosition($position);
        $start = $this->read(0, $position);
        $end = $this->read($position);
        $this->write($start . $string . $end, 0);
        return $this;
    }


    /**
     * @implementation
     */
    public function truncate(): LightStreamInterface
    {
        if (false === (ftruncate($this->stream, 0))) {
            $this->error("Could not truncate this stream.");
        }
        $this->size = null;
        return $this;
    }


    /**
     * @implementation
     */
    public function read(int $position = 0, int $length = null): string
    {
        $this->checkReadable();

        $position = $this->fixPosition($position);
        $this->setCursorPosition($position);
        if (null === $length) {
            if (false === ($data = stream_get_contents($this->stream))) {
                $this->error('Could not read from the stream.');
            }
        } else {
            if (false === ($data = fread($this->stream, $length))) {
                $this->error('Could not read from the stream.');
            }
        }
        return $data;
    }


    /**
     * @implementation
     */
    public function getSize(): int
    {

        if (null === $this->size) {
            $stat = fstat($this->stream);
            if (array_key_exists('size', $stat)) {
                $this->size = $stat["size"];
            } else {
                $this->error("Size not available for this stream.");
            }
        }
        return $this->size;
    }


    /**
     * @implementation
     */
    public function tell(): int
    {
        if (false === ($position = ftell($this->stream))) {
            throw new LightException('Could not get the position of the pointer in stream.');
        }

        return $position;
    }


    /**
     * @implementation
     */
    public function setCursorPosition(int $position)
    {
        if (false === $this->isSeekable()) {
            $this->error('This stream is not seekable.');
        }
        $whence = ($position >= 0) ? \SEEK_SET : \SEEK_END;
        if (-1 === fseek($this->stream, $position, $whence)) {
            $this->error('Could not seek this stream.');
        }
    }


    /**
     * @implementation
     */
    public function __toString(): string
    {
        $this->setCursorPosition(0);
        $this->checkReadable();
        if (false === ($data = stream_get_contents($this->stream))) {
            $this->error('Could not get the content of the stream.');
        }
        return $data;
    }

    /**
     * @implementation
     */
    public function isReadable(): bool
    {
        if (null === $this->readable) {
            if (true === $this->isPipe()) {
                $this->readable = true;
            } else {
                $this->readable = false;
                $meta = $this->getMetadata();
                foreach (self::$modes['readable'] as $mode) {
                    if (0 === strpos($meta['mode'], $mode)) {
                        $this->readable = true;
                        break;
                    }
                }
            }
        }
        return $this->readable;
    }

    /**
     * @implementation
     */
    public function isWritable(): bool
    {
        if (null === $this->writable) {
            $meta = $this->getMetadata();
            $this->writable = false;
            foreach (self::$modes['writable'] as $mode) {
                if (0 === strpos($meta['mode'], $mode)) {
                    $this->writable = true;
                    break;
                }
            }
        }
        return $this->writable;
    }

    /**
     * @implementation
     */
    public function isSeekable(): bool
    {
        if (null === $this->seekable) {
            if (true === $this->isPipe) {
                $this->seekable = false;
            } else {
                $meta = $this->getMetadata();
                $this->seekable = $meta['seekable'];
            }
        }
        return $this->seekable;
    }

    /**
     * @implementation
     */
    public function isPipe(): bool
    {
        if (null === $this->isPipe) {
            $this->isPipe = false;
            $mode = fstat($this->stream)['mode'];
            // https://www.php.net/manual/en/function.stat.php
            $this->isPipe = 0 !== ($mode & 0010000);
        }

        return $this->isPipe;
    }


    /**
     * @implementation
     */
    public function getMetaData(): array
    {
        return stream_get_meta_data($this->stream);
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the stream resource for this instance.
     *
     * @param $stream
     * @throws \Exception
     */
    protected function setStream($stream)
    {
        if (false === is_resource($stream)) {
            throw new LightException('Invalid php resource given.');
        }
        $this->stream = $stream;
    }


    /**
     * Returns a positive number representing the position.
     *
     * @param int $position
     * @return int
     */
    protected function fixPosition(int $position): int
    {
        if ($position < 0) {
            $size = $this->getSize();
            $position = $size + $position;
        }
        return $position;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightException($msg);
    }


    /**
     * Checks that the stream is readable, and if not throws an exception.
     *
     * @throws \Exception
     */
    private function checkReadable()
    {
        if (false === $this->isReadable()) {
            $this->error("This stream is not readable.");
        }
    }

    /**
     * Checks that the stream is writable, and if not throws an exception.
     *
     * @throws \Exception
     */
    private function checkWritable()
    {
        if (false === $this->isWritable()) {
            $this->error("This stream is not writable.");
        }
    }
}