<?php


namespace Ling\Light_Realform\SuccessHandler;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_Realform\Exception\LightRealformException;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The ToDatabaseSuccessHandler class.
 *
 * This success handler will save the data to a database table, which you define before hand.
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
 *
 *
 *
 */
class ToDatabaseSuccessHandler implements RealformSuccessHandlerInterface
{

    /**
     * This property holds the table in which the data will be saved.
     * @var string
     */
    protected $table;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the microPermissionPluginName for this instance.
     * If null (by default), the micro permission system will not be used.
     * If set to a plugin name, the micro permission system will be using that plugin name.
     * We use the @page(recommended micro-permission notation for database).
     *
     *
     *
     * @var string|null
     */
    protected $microPermissionPluginName;


    /**
     * Builds the ToDatabaseSuccessHandler instance.
     */
    public function __construct()
    {
        $this->table = null;
        $this->container = null;
        $this->microPermissionPluginName = null;
    }


    /**
     * The options used by this method are:
     * - ?updateRic: the array of key => value pairs representing the row to update (i.e. the old row).
     *
     * If the updateRic key is defined in the options, then the class switches to update mode,
     * otherwise the class assumes insert mode.
     *
     * See the notes in the class description for more details.
     *
     *
     *
     *
     * @implementation
     */
    public function processData(array $data, array $options = [])
    {

        $useMicroPerm = false;
        $microPermService = null;

        if (null !== $this->microPermissionPluginName) {
            $useMicroPerm = true;
            $microPerm = $this->microPermissionPluginName . ".tables." . $this->table . '.';
        }


        /**
         * @var $db SimplePdoWrapperInterface
         */
        $db = $this->container->get("database");
        //--------------------------------------------
        // UPDATE
        //--------------------------------------------
        if (array_key_exists('updateRic', $options)) {
            if (true === $useMicroPerm) {
                $microPerm .= 'update';
                $this->checkMicroPermission($microPerm);
            }
            $db->update($this->table, $data, $options['updateRic']);
        }
        //--------------------------------------------
        // INSERT
        //--------------------------------------------
        else {
            if (true === $useMicroPerm) {
                $microPerm .= 'create';
                $this->checkMicroPermission($microPerm);
            }
            $db->insert($this->table, $data);
        }
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
     * Sets the table.
     *
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
    }

    /**
     * Sets the microPermissionPluginName.
     *
     * @param string|null $microPermissionPluginName
     */
    public function setMicroPermissionPluginName(?string $microPermissionPluginName)
    {
        $this->microPermissionPluginName = $microPermissionPluginName;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Ensures that the current user has the given micro-permission.
     * If not, an exception is thrown.
     *
     *
     * @param string $microPermission
     * @throws \Exception
     */
    protected function checkMicroPermission(string $microPermission)
    {
        /**
         * @var $microPermService LightMicroPermissionService
         */
        $microPermService = $this->container->get("micro_permission");
        if (false === $microPermService->hasMicroPermission($microPermission)) {
            throw new LightRealformException("Permission defined. You don't have the micro-permission: $microPermission.");
        }
    }
}