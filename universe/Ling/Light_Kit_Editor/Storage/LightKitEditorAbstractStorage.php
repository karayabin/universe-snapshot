<?php


namespace Ling\Light_Kit_Editor\Storage;

/**
 * The LightKitEditorAbstractStorage interface.
 */
abstract class LightKitEditorAbstractStorage implements LightKitEditorStorageInterface
{


    /**
     * This property holds the errors for this instance.
     * @var array
     */
    private array $errors;

    /**
     * Builds the LightKitEditorAbstractStorage instance.
     */
    public function __construct()
    {
        $this->errors = [];
    }




    //--------------------------------------------
    // LightKitEditorStorageInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds an error message.
     *
     * @param string $msg
     */
    protected function addError(string $msg)
    {
        $this->errors[] = $msg;
    }
}