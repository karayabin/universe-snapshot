<?php


namespace Ling\Light\Stream;


/**
 * The LightStreamInterface interface.
 *
 *
 * Position numbers
 * ----------
 *
 * A position can be defined either as a positive number or a negative number.
 * If it's a positive number, we start to count from the beginning of the first character and moving towards the end of the stream.
 * If it's a negative number, we start to count from the end of the last character and moving towards the beginning of the stream.
 *
 * So for instance in the following stream:
 *
 * - 1234567890
 *
 * A position of 6 will move the cursor to the left of the 7 character.
 * A position of -6 will move the cursor to the left of the 5 character.
 *
 *
 * The position is a modulo
 * -------
 * When the given position is greater than the stream's length, it cycles back from the beginning (in case
 * of a positive number) or from the end (in case of a negative number).
 *
 * In other words, the position number is the position modulo the size of the stream.
 *
 *
 *
 *
 *
 */
interface LightStreamInterface
{


    /**
     * Appends the given string to the stream.
     * Throws an exception if the stream is not writable.
     *
     *
     * @param string $string
     * @return LightStreamInterface
     * @throws \Exception
     */
    public function append(string $string): LightStreamInterface;

    /**
     * Prepends the stream with the given string.
     * Throws an exception if the stream is not writable.
     *
     * @param string $string
     * @return LightStreamInterface
     * @throws \Exception
     */
    public function prepend(string $string): LightStreamInterface;

    /**
     * Writes the given string from the given position.
     * This replaces the corresponding old characters of the stream.
     *
     * The position can be a negative number, in which case it's defined from the end and backward, instead
     * of from the beginning and forward. See the class comment for more details.
     *
     * Throws an exception if the stream is not writable.
     *
     *
     * @param string $string
     * @param int $position = 0
     * @return LightStreamInterface
     * @throws \Exception
     */
    public function write(string $string, int $position = 0):LightStreamInterface;

    /**
     * Inserts the given string at the given position.
     *
     * The position can be a negative number, in which case it's defined from the end and backward, instead
     * of from the beginning and forward. See the class comment for more details.
     *
     * Throws an exception if the stream is not writable.
     *
     * @param string $string
     * @param int $position
     * @return LightStreamInterface
     * @throws \Exception
     */
    public function insert(string $string, int $position):LightStreamInterface;





    /**
     * Empties the stream and returns this instance for chaining.
     *
     * @return LightStreamInterface
     */
    public function truncate(): LightStreamInterface;




    /**
     * Returns a portion of the stream, starting at the given position,
     * and ending after the given length.
     *
     * If the length is null, the stream will be read until the end (that's the default behaviour).
     *
     * The position can be a negative number, in which case it's read from the end and backward, instead
     * of from the beginning and forward. See the class comment for more details.
     *
     *
     * Throws an exception if the stream is not readable.
     *
     * @param int $position
     * @param int|null $length
     * @return string
     * @throws \Exception
     */
    public function read(int $position = 0, int $length = null): string;


    /**
     * Returns the size in bytes of the current stream.
     *
     * @return int
     */
    public function getSize(): int;


    /**
     * Returns the current position of the pointer.
     *
     * @return int
     * @throws \Exception
     */
    public function tell(): int;

    /**
     *
     * Sets the cursor to the given position.
     * This will only work on seekable streams.
     *
     * The position can be a negative number, see the class comments for more details.
     *
     * @param int $position
     * @throws \Exception
     */
    public function setCursorPosition(int $position);


    /**
     * Returns the whole stream as a string.
     *
     * Throws an exception if the stream is not writable.
     *
     * @return string
     * @throws \Exception
     */
    public function __toString(): string;


    /**
     * Returns whether the stream is readable.
     *
     * @return bool
     */
    public function isReadable(): bool;

    /**
     * Returns whether the stream is writable.
     *
     * @return bool
     */
    public function isWritable(): bool;


    /**
     * Returns whether the stream is seekable.
     *
     * @return bool
     */
    public function isSeekable(): bool;


    /**
     * Returns whether the stream is a pipe.
     *
     * @return bool
     */
    public function isPipe(): bool;


    /**
     * Returns the array of meta data.
     * Same as the php method: https://www.php.net/manual/en/function.stream-get-meta-data.php.
     *
     * @return array
     */
    public function getMetaData(): array;


}
