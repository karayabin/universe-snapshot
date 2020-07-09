<?php


namespace Ling\Light_UploadGems\GemHelper;


/**
 * The GemHelperInterface interface.
 */
interface GemHelperInterface
{


    /**
     * Sets an array of tags that will be used in the applyCopies method.
     *
     * @param array $tags
     */
    public function setTags(array $tags);


    /**
     * Returns the custom config array attached to this instance.
     * @return array
     */
    public function getCustomConfig(): array;


    /**
     * Returns the custom config value corresponding to the given key.
     *
     * If the key doesn't exist:
     * - it throws an exception if the throwEx flag is set to true
     * - it returns null if the throwEx flag is set to false
     *
     *
     * @param string $key
     * @param bool $throwEx
     * @return mixed
     */
    public function getCustomConfigValue(string $key, bool $throwEx = true);

    /**
     * Applies the defined name transformations to the given filename and returns the transformed filename.
     *
     * If an error occurs, an exception is thrown.
     *
     * @param string $filename
     * @return string
     * @throws \Exception
     */
    public function applyNameTransform(string $filename): string;

    /**
     * Applies the defined validation constraints to the given filename, and returns
     * true if they all pass, or returns the error message returned by the first failing constraint otherwise.
     *
     * @param string $filename
     *
     * @return true|string
     */
    public function applyNameValidation(string $filename);


    /**
     * Applies the defined validation constraints to the chunk which path is given, and returns
     * true if they all pass, or returns the error message returned by the first failing constraint otherwise.
     *
     *
     * @param string $path
     * The absolute path to the chunk to validate.
     *
     * @return true|string
     */
    public function applyChunkValidation(string $path);


    /**
     * Applies the defined validation constraints to the file which path is given, and returns
     * true if they all pass, or returns the error message returned by the first failing constraint otherwise.
     *
     *
     * @param string $path
     * The absolute path to the file to validate.
     *
     * @return true|string
     */
    public function applyValidation(string $path);


    /**
     * Make the copies of the file which path was given, based on the defined configuration, and returns the path of the desired copy.
     * See more information in the @page(UploadGems conception notes).
     *
     *
     * @param string $path
     * The absolute path to the file to copy.
     *
     * @param array $options
     *      - onDstReady: a callable triggered when the destination path is set.
     *          This is triggered before each copy is actually written to the destination path.
     *          Use this callable to change the destination path for each copy.
     *          The callable signature is:
     *          - onDstReady ( string &$dst, int $copyIndex, array $copyItem )
     *              With:
     *              - dst: the destination path were the copy is going to be written (you can change it)
     *              - copyIndex: the numerical index of this copy
     *              - copyItem: the copy configuration item (from the gem config)
     *      - onBeforeCopy: a callable triggered if there is at least one copy, and before the first copy is processed.
     *      - onCopyAfter: a callable triggered after the copy has been copied.
     *          The callable signature is:
     *          - onCopyAfter ( string $dst, int $copyIndex, array $copyItem )
     *              With:
     *              - dst: the destination path were the copy was written to
     *              - copyIndex: the numerical index of this copy
     *              - copyItem: the copy configuration item (from the gem config)
     *
     *
     * @return string
     * @throws \Exception
     */
    public function applyCopies(string $path, array $options = []): string;

}