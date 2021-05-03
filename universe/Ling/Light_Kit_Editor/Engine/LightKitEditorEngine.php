<?php


namespace Ling\Light_Kit_Editor\Engine;


use Ling\Kit\ConfStorage\ConfStorageInterface;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface;

/**
 * The LightKitEditorEngine class.
 *
 * @method void addPage(string $pageName, array $pageConf = [])
 *
 */
class LightKitEditorEngine implements ConfStorageInterface
{

    /**
     * This property holds the storage for this instance.
     * @var LightKitEditorStorageInterface | null
     */
    private ?LightKitEditorStorageInterface $storage;



    /**
     * Builds the LightKitEditorEngine instance.
     */
    public function __construct()
    {
        $this->storage = null;
    }

    /**
     * Sets the storage.
     *
     * @param LightKitEditorStorageInterface $storage
     */
    public function setStorage(LightKitEditorStorageInterface $storage)
    {
        $this->storage = $storage;
    }


    //--------------------------------------------
    // ConfStorageInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getPageConf(string $pageName): array|false
    {
        return $this->storage->getPageConf($pageName);
    }


    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return $this->storage->getErrors();
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * The php magic method to proxy to the corresponding LightKitEditorStorageInterface methods.
     *
     * @param $function
     * @param $arguments
     * @throws \Exception
     */
    public function __call($function, $arguments)
    {
        $n = new \ReflectionClass("\Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface");
        $methods = $n->getMethods();
        foreach ($methods as $method) {
            if ($function === $method->getName()) {
                $this->storage->$function(...$arguments);
                return;
            }
        }
        $this->error("Unknown method $function.");
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitEditorException(static::class . ": " . $msg, $code);
    }


}