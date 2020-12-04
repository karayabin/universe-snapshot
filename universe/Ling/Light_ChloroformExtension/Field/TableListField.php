<?php


namespace Ling\Light_ChloroformExtension\Field;


use Ling\Chloroform\Field\FormAwareFieldInterface;
use Ling\Chloroform\Field\SelectField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_ChloroformExtension\Field\TableList\TableListService;


/**
 * The TableListField class.
 * See more in the @page(TableListField conception notes)
 */
class TableListField extends SelectField implements FormAwareFieldInterface
{
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the isPrepared for this instance.
     * @var bool=false
     */
    protected $isPrepared;

    /**
     * This property holds the form for this instance.
     * @var Chloroform
     */
    protected $form;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {

        /**
         * Note that most of the properties defined below are overridden by
         * the values set in the nugget identified by the tableListIdentifier.
         */

        // ensure the some properties are defined
        $tableListIdentifier = $properties['tableListIdentifier'] ?? null;
        $tableListDirectiveId = $properties['tableListDirectiveId'] ?? null;


        $threshold = $properties['threshold'] ?? 200;
        $multiplier = $properties['multiplier'] ?? false;


        //
        $properties['tableListIdentifier'] = $tableListIdentifier;
        $properties['tableListDirectiveId'] = $tableListDirectiveId;
        $properties['multiplier'] = $multiplier;

        $properties['threshold'] = $threshold;
        $properties['size'] = $properties['size'] ?? null;

        $properties['renderAs'] = $properties['renderAs'] ?? "adapt"; // adapt|select|autocomplete
        $properties['useAutoComplete'] = false; // dynamically set (i.e. not configurable), this is for the renderer...
        parent::__construct($properties);
        $this->container = null;
        $this->isPrepared = false;
    }



    //--------------------------------------------
    // FormAwareFieldInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setForm(Chloroform $form)
    {
        $this->form = $form;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return $this
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        $this->prepareItems();
        $arr = parent::toArray();

        if ('update' === $this->form->getMode()) {
            $arr['multiple'] = false;
        } else {
            $arr['multiple'] = $this->properties['multiplier'] ?? false;
        }

        $formMode = $this->form->getMode();


        //--------------------------------------------
        // initializing the formatted value for the auto-complete field if necessary
        //--------------------------------------------
        if (true === $arr['useAutoComplete']) {
            /**
             * @var $tableList TableListService
             */
//            $tableList = $this->container->get('chloroform_extension')->getTableListService($arr['tableListIdentifier']);
            $tableList = $this->getTableListService();
            $value = $arr['value'];
            if ('insert' === $formMode) { // insert mode
                $arr['autoCompleteValueToLabels'] = '';
            } else { // update mode

                /**
                 * The user has deleted the record identified by the updateRic,
                 * which cause a null value here, we don't handle this problem (i.e.
                 * it's handled at a higher level), but we avoid throwing the exception
                 * which might confuse the process
                 */
                if (null === $value) {
                    $arr['autoCompleteValueToLabels'] = '';
                } else {
                    $arr['autoCompleteValueToLabels'] = $tableList->getValueToLabels($value);
                }
            }
        }
        return $arr;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prepares this class to be exported with the toArray method.
     * @throws \Exception
     */
    private function prepareItems()
    {
        if (false === $this->isPrepared) {

            /**
             * @var $tableList TableListService
             */
            $tableList = $this->getTableListService();
            $props = [
                "renderAs",
                "threshold",
            ];
            $nugget = $tableList->getNugget();
            foreach ($props as $prop) {
                if (array_key_exists($prop, $nugget)) {
                    $this->properties[$prop] = $nugget[$prop];
                }
            }


            switch ($this->properties['renderAs']) {
                case "select":
                    $items = $tableList->getItems();
                    $this->setItems($items);
                    break;
                case "autocomplete":
                    $this->properties['useAutoComplete'] = true;
                    break;
                case "adapt":
                    $nbItems = $tableList->getNumberOfItems();
                    if ($nbItems > $this->properties['threshold']) {
                        $this->properties['useAutoComplete'] = true;
                    } else {
                        $items = $tableList->getItems();
                        $this->setItems($items);
                    }
                    break;
                default:
                    throw new LightChloroformExtensionException("Unknown renderAs value: " . $this->properties['renderAs']);
                    break;
            }

            $this->isPrepared = true;
        }
    }


    /**
     * Returns a configured TableListService instance.
     *
     * @return TableListService
     * @throws \Exception
     */
    private function getTableListService(): TableListService
    {
        $tableListIdentifier = $this->properties['tableListIdentifier'];
        $tableListDirectiveId = $this->properties['tableListDirectiveId'];
        $id = $tableListDirectiveId ?? $tableListIdentifier;
        return $this->container->get('chloroform_extension')->getTableListService($id);
    }
}