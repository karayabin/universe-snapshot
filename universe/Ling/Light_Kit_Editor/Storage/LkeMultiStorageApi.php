<?php


namespace Ling\Light_Kit_Editor\Storage;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Editor\Exception\LightKitEditorException;

/**
 * The LkeMultiStorageApi class.
 */
class LkeMultiStorageApi implements LightKitEditorStorageInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface|null
     */
    private ?LightServiceContainerInterface $container;

    /**
     * This property holds the storageType for this instance.
     * Can be one of:
     * - db     (for database)
     * - baby   (for babyYaml)
     *
     *
     * Default is db.
     *
     *
     * @var string
     */
    private string $storageType;

    /**
     * This property holds the babyRootDir for this instance.
     * The ${app_dir} tag will be resolved to the actual application directory.
     *
     * @var ?string
     */
    private ?string $babyRootDir;

    /**
     * This property holds the babyStorage for this instance.
     * @var LightKitEditorBabyYamlStorage|null
     */
    private ?LightKitEditorBabyYamlStorage $babyStorage;

    /**
     * This property holds the dbStorage for this instance.
     * @var LightKitEditorDatabaseStorage|null
     */
    private ?LightKitEditorDatabaseStorage $dbStorage;


    /**
     * Builds the LkeMultiStorageApi instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->storageType = "db";
        $this->babyStorage = null;
        $this->babyRootDir = null;
        $this->dbStorage = null;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the storageType.
     *
     * @param string $storageType
     * @return $this
     */
    public function setStorageType(string $storageType): static
    {
        $this->storageType = $storageType;
        return $this;
    }

    /**
     * Sets the babyRootDir.
     *
     * @param string $babyRootDir
     * @return $this
     */

    public function setBabyRootDir(string $babyRootDir): static
    {
        $this->babyRootDir = $babyRootDir;
        return $this;
    }








    //--------------------------------------------
    // LightKitEditorStorageInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function addPage(string $pageName, array $pageConf = [])
    {
        return $this->execute("addPage", $pageName, $pageConf);
    }


    /**
     * @implementation
     */
    public function addBlock(string $identifier)
    {
        return $this->execute("addBlock", $identifier);
    }

    /**
     * @implementation
     */
    public function getPageConf(string $pageName): array|false
    {
        return $this->execute("getPageConf", $pageName);
    }


    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return $this->execute("getErrors");
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Delegates the method and args to the appropriate storage instance.
     *
     * @param string $methodName
     * @param mixed ...$args
     * @return mixed
     *
     */
    private function execute(string $methodName, ...$args): mixed
    {
        switch ($this->storageType) {
            case "db":
                $storage = $this->getDbStorage();
                break;
            case "baby":
                $storage = $this->getBabyStorage();
                break;
            default:
                throw new LightKitEditorException("Unknown storage type: $this->storageType.");
        }
        return $storage->$methodName(...$args);
    }


    /**
     * Returns a kit editor babyYaml storage instance.
     * @return LightKitEditorBabyYamlStorage
     */
    private function getBabyStorage(): LightKitEditorBabyYamlStorage
    {
        if (null === $this->babyStorage) {
            $this->babyStorage = new LightKitEditorBabyYamlStorage();
            $this->babyStorage->setContainer($this->container);
            $babyRootDir = str_replace('${app_dir}', $this->container->getApplicationDir(), $this->babyRootDir);
            $this->babyStorage->setRootDir($babyRootDir);
        }
        return $this->babyStorage;
    }


    /**
     * Returns a kit editor db storage instance.
     * @return LightKitEditorDatabaseStorage
     */
    private function getDbStorage(): LightKitEditorDatabaseStorage
    {
        if (null === $this->dbStorage) {
            $this->dbStorage = new LightKitEditorDatabaseStorage();
            $this->dbStorage->setContainer($this->container);
        }
        return $this->dbStorage;
    }
}