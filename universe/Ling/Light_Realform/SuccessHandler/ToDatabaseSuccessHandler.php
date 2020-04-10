<?php


namespace Ling\Light_Realform\SuccessHandler;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Crud\Service\LightCrudService;

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
     * This property holds the pluginName for this instance.
     * It's the name of the plugin used as a handler for the crud service.
     *
     * @var string
     */
    protected $pluginName;


    /**
     * This property holds the multiplier array for this instance.
     * See more details in @page(the form multiplier trick document).
     * @var array
     */
    protected $multiplier;

    /**
     * Whether to use @page(the user row restriction system).
     * @var bool = false
     */
    protected $useRowRestriction;


    /**
     * Builds the ToDatabaseSuccessHandler instance.
     */
    public function __construct()
    {
        $this->table = null;
        $this->container = null;
        $this->pluginName = null;
        $this->multiplier = null;
        $this->useRowRestriction = false;
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
        /**
         * @var $crud LightCrudService
         */
        $contextId = $this->pluginName . '.Light_RealForm-ToDatabaseSuccessHandler';
        $crud = $this->container->get('crud');


        //--------------------------------------------
        // UPDATE
        //--------------------------------------------
        if (array_key_exists('updateRic', $options)) {
            $updateRic = $options['updateRic'];
            $crud->execute($contextId, $this->table, 'update', [
                'data' => $data,
                'updateRic' => $updateRic,
                'useRowRestriction' => $this->useRowRestriction,
            ]);
        }
        //--------------------------------------------
        // INSERT
        //--------------------------------------------
        else {
            $crud->execute($contextId, $this->table, 'create', [
                'data' => $data,
                'multiplier' => $this->multiplier,
                'useRowRestriction' => $this->useRowRestriction,
            ]);
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
     * Sets the pluginName.
     *
     * @param string $pluginName
     */
    public function setPluginName(string $pluginName)
    {
        $this->pluginName = $pluginName;
    }

    /**
     * Sets the multiplier.
     *
     * @param array $multiplier
     */
    public function setMultiplier(array $multiplier)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * Sets the useRowRestriction.
     *
     * @param bool $useRowRestriction
     */
    public function setUseRowRestriction(bool $useRowRestriction)
    {
        $this->useRowRestriction = $useRowRestriction;
    }



}