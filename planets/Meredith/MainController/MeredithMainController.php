<?php

namespace Meredith\MainController;

use Meredith\Column2LabelAdaptor\Column2LabelAdaptorInterface;
use Meredith\Exception\MeredithException;
use Meredith\ActionColumn\ActionColumnInterface;
use Meredith\FormDataProcessor\FormDataProcessorInterface;
use Meredith\FormHandler\FormHandlerInterface;
use Meredith\ListHandler\ListHandlerInterface;
use Meredith\OnFormReady\OnFormReadyInterface;
use Meredith\TableColumns\TableColumnsFactoryInterface;

/**
 * LingTalfi 2015-12-28
 */
class MeredithMainController implements MainControllerInterface
{
    private $formId;
    private $formDataProcessor;
    private $formHandler;
    private $listHandler;
    private $tableColumnsFactory;
    private $referenceTable;
    private $idf;
    private $autoIncremented;


    public function __construct()
    {
        $this->idf = [];
    }


    public static function create()
    {
        return new static();
    }

    public function init($formId)
    {
        $this->formId = $formId;
        return $this;
    }

    /**
     * @return FormDataProcessorInterface
     */
    public function getFormDataProcessor()
    {
        return $this->formDataProcessor;
    }


    public function getFormId()
    {
        return $this->formId;
    }


    /**
     * @return FormHandlerInterface
     */
    public function getFormHandler()
    {
        return $this->formHandler;
    }


    /**
     * @return ListHandlerInterface
     */
    public function getListHandler()
    {
        return $this->listHandler;
    }


    public function getTableColumnsFactory()
    {
        return $this->tableColumnsFactory;
    }

    /**
     * @return string
     */
    public function getReferenceTable()
    {
        if (null !== $this->referenceTable) {
            return $this->referenceTable;
        }
        return $this->formId;
    }

    /**
     * @return array
     */
    public function getIdentifyingFields()
    {
        return $this->idf;
    }


    public function getAutoIncrementedField()
    {
        return $this->autoIncremented;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setFormHandler(FormHandlerInterface $formHandler)
    {
        $this->formHandler = $formHandler;
        return $this;
    }

    public function setFormId($formId)
    {
        $this->formId = $formId;
        return $this;
    }

    public function setListHandler(ListHandlerInterface $listHandler)
    {
        $this->listHandler = $listHandler;
        return $this;
    }

    public function setFormDataProcessor(FormDataProcessorInterface $p)
    {
        $this->formDataProcessor = $p;
        return $this;
    }

    public function setReferenceTable($referenceTable)
    {
        $this->referenceTable = $referenceTable;
        return $this;
    }

    public function setAutoIncrementedField($field)
    {
        $this->autoIncremented = $field;
        return $this;
    }

    public function setIdentifyingFields(array $idf)
    {
        $this->idf = $idf;
        return $this;
    }


}