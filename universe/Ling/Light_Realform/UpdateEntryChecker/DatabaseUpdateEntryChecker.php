<?php


namespace Ling\Light_Realform\UpdateEntryChecker;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Nugget\SecurityHandler\LightNuggetSecurityHandlerInterface;
use Ling\Light_Realform\Exception\LightRealformException;

/**
 * The DatabaseUpdateEntryChecker class.
 */
class DatabaseUpdateEntryChecker implements LightNuggetSecurityHandlerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the DatabaseUpdateEntryChecker instance.
     */
    public function __construct()
    {
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
    // UpdateEntryCheckerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function isGranted(array $params = []): bool
    {
        if (false === array_key_exists('updateRic', $params)) {
            $this->error("The updateRic parameter was not found in the given params.");
        }
        if (false === array_key_exists('sql', $params)) {
            $this->error("The sql parameter was not found in the given params.");
        }


        $user = $this->container->get('realform')->getCurrentWebsiteUser();

        $isGranted = false;
        $tags = $params['updateRic'];
        $tags['$userId'] = $user->getId();
        $sql = $params['sql'];


        // replace tags
        foreach ($tags as $k => $v) {
            $sql = str_replace('{' . $k . '}', $v, $sql);
        }


        /**
         * @var $pdo LightDatabaseService
         */
        $pdo = $this->container->get("database");
        $row = $pdo->fetch($sql);
        if (false !== $row) {
            $isGranted = true;
        }
        return $isGranted;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightRealformException($msg);
    }
}