<?php


namespace Ling\Light_Kit_Editor\Storage;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightKitEditorAbstractStorage interface.
 */
abstract class LightKitEditorAbstractStorage implements LightKitEditorStorageInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the errors for this instance.
     * @var array
     */
    private array $errors;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface | null
     */
    private ?LightServiceContainerInterface $container;

    /**
     * Builds the LightKitEditorAbstractStorage instance.
     */
    public function __construct()
    {
        $this->errors = [];
        $this->container = null;
    }



    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
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
     * Returns the container of this instance.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        return $this->container;
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