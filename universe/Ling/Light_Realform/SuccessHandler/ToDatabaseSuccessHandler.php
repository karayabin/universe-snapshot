<?php


namespace Ling\Light_Realform\SuccessHandler;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Crud\Service\LightCrudService;
use Ling\Light_Realform\Exception\LightRealformException;

/**
 * The ToDatabaseSuccessHandler class.
 *
 * This success handler will save the data to a database table, which you define before hand.
 *
 * We use the @page(crud service) under the hood, so that the app can benefit the events hooks.
 *
 * This class has two operation modes:
 *
 * - insert (default), will (try to) create a new row
 * - update, will (try to) update an already existing row
 *
 * To use the update mode, you need to provide the updateRic with the options (see the processData method for more info).
 * The updateRic is an array of key/value pairs representing the ric identifying the (old) row to update.
 *
 *
 * As a design choice, this class doesn't handle permission problem: I believe it's better to handle the permission
 * problems separately.
 *
 *
 * This handler can handle @page(the form multiplier pattern).
 *
 *
 *
 *
 *
 */
class ToDatabaseSuccessHandler implements RealformSuccessHandlerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the ToDatabaseSuccessHandler instance.
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
    // RealformSuccessHandlerInterface
    //--------------------------------------------

    /**
     * @implementation
     */
    public function execute(array $data, array $options = [])
    {
        $updateRic = $options['updateRic'] ?? false;
        $storageId = $options['storageId'] ?? null;
        $multiplier = $options['multiplier'] ?? null;


        if (null === $storageId) {
            $this->error("Undefined storage id.");
        }


        /**
         * @var $crud LightCrudService
         */
        $crud = $this->container->get('crud');
        //--------------------------------------------
        // UPDATE
        //--------------------------------------------
        if (false !== $updateRic) {
            $crud->execute($storageId, 'update', [
                'data' => $data,
                'updateRic' => $updateRic,
            ]);
        }
        //--------------------------------------------
        // INSERT
        //--------------------------------------------
        else {
            $crud->execute($storageId, 'create', [
                'data' => $data,
                'multiplier' => $multiplier,
            ]);
        }
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
        throw new LightRealformException("ToDatabaseSuccessHandler: " . $msg);
    }

}