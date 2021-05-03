<?php


namespace Ling\Light_Kit_Editor\Light_Realform\SuccessHandler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Kit_Editor\Storage\LightKitEditorBabyYamlStorage;
use Ling\Light_Kit_Editor\Storage\LightKitEditorDatabaseStorage;
use Ling\Light_Kit_Editor\Storage\LightKitEditorStorageInterface;
use Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface;

/**
 * The LightKitEditorRealformSuccessHandler class.
 */
class LightKitEditorRealformSuccessHandler implements RealformSuccessHandlerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * This property holds the engineType for this instance.
     *
     * It can be one of:
     * - db
     * - babyYaml
     *
     *
     * Defaults to babyYaml.
     *
     * @var string
     */
    private string $engineType;


    /**
     * Builds the LightKitEditorRealformSuccessHandler instance.
     */
    public function __construct()
    {
        $this->engineType = "babyYaml";
        $this->container = null;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the engineType.
     *
     * @param string $engineType
     */
    public function setEngineType(string $engineType)
    {
        if (false === in_array($engineType, [
                'db',
                'babyYaml',
            ])) {
            $this->error("Unknown engine type: $engineType.");
        }
        $this->engineType = $engineType;
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
    // RealformSuccessHandlerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function execute(array $data, array $options = [])
    {
        if (true === array_key_exists("storageId", $options)) {
            $storageId = $options['storageId'];
            switch ($storageId) {
                case "lke_page":
                    $identifier = $this->getDataProperty("identifier", $data);
                    $storage = $this->getStorage();
                    $storage->addPage($identifier, $data);
                    break;
                case "lke_block":
                    $identifier = $this->getDataProperty("identifier", $data);
                    $storage = $this->getStorage();
                    $storage->addBlock($identifier);
                    break;
                default:
                    $this->error("Unknown storageId: $storageId.");
                    break;
            }
        } else {
            $this->error("storageId not defined. Aborting.");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the babyYaml root directory.
     * If null (and the babyYaml engine is used), this will cause an error.
     *
     * @return ?string
     * @overrideMe
     */
    protected function getBabyYamlRootDir(): ?string
    {
        return null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the storage instance to use.
     * @return LightKitEditorStorageInterface
     */
    private function getStorage(): LightKitEditorStorageInterface
    {
        if ('db' === $this->engineType) {
            $o = new LightKitEditorDatabaseStorage();

        } else {

            $o = new LightKitEditorBabyYamlStorage();
            $dir = $this->getBabyYamlRootDir();
            if (null === $dir) {
                $this->error("BabyYaml root dir not set. Aborting.");
            }
            $o->setRootDir($dir);
        }

        $o->setContainer($this->container);
        return $o;
    }


    /**
     * Returns the property value from the given data, or throws an exception if it doesn't exist.
     *
     * @param string $property
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    private function getDataProperty(string $property, array $data): mixed
    {
        if (true === array_key_exists($property, $data)) {
            return $data[$property];
        }
        throw new LightKitEditorException(__METHOD__ . ":: missing property: $property.");
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitEditorException(static::class . ": " . $msg, $code);
    }
}