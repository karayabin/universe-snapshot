<?php


namespace Ling\Light_ChloroformExtension\Field;


use Ling\Chloroform\Field\FormAwareFieldInterface;
use Ling\Chloroform\Field\SelectField;
use Ling\Chloroform\Form\Chloroform;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
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
        // ensure the some properties are defined
        $tableListIdentifier = $properties['tableListIdentifier'] ?? null;
        $threshold = $properties['threshold'] ?? 200;
        $mode = $properties['mode'] ?? 'default'; // default | multiplier
        $useAutoComplete = false;

        //
        $properties['tableListIdentifier'] = $tableListIdentifier;
        $properties['threshold'] = $threshold;
        $properties['useAutoComplete'] = $useAutoComplete;
        $properties['mode'] = $mode;
        parent::__construct($properties);
        $this->container = null;
        $this->isPrepared = false;
    }


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

        if ('multiplier' === $this->properties['mode']) {
            if ('insert' === $this->form->getMode()) {
                $arr['multiple'] = true;
            }
        }


        //--------------------------------------------
        // initializing the formatted value for the auto-complete field if necessary
        //--------------------------------------------
        if (true === $arr['useAutoComplete']) {
            /**
             * @var $tableList TableListService
             */
            $tableList = $this->container->get('chloroform_extension')->getTableListService($arr['tableListIdentifier']);
            $value = $arr['value'];
            if ('insert' === $this->form->getMode()) { // insert mode
                $arr['autoCompleteLabel'] = '';
            } else { // update mode
                $arr['autoCompleteLabel'] = $tableList->getLabel($value);
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

            $tableListIdentifier = $this->properties['tableListIdentifier'];

            /**
             * @var $tableList TableListService
             */
            $tableList = $this->container->get('chloroform_extension')->getTableListService($tableListIdentifier);
            $numberOfItems = $tableList->getNumberOfItems();


            if ($numberOfItems > $this->properties['threshold']) {
                // use auto-complete

                $this->properties['useAutoComplete'] = true;
            } else {
                $items = $tableList->getItems();
                $this->setItems($items);
            }
            $this->isPrepared = true;
        }
    }

}