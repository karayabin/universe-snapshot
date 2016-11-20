<?php

namespace Meredith\MainController;

use Meredith\FormDataProcessor\FormDataProcessorInterface;
use Meredith\FormHandler\FormHandlerInterface;
use Meredith\ListHandler\ListHandlerInterface;
use Meredith\OnFormReady\OnFormReadyInterface;

/**
 * LingTalfi 2015-12-28
 */
interface MainControllerInterface
{


    /**
     * @return FormDataProcessorInterface
     */
    public function getFormDataProcessor();

    /**
     * @return FormHandlerInterface
     */
    public function getFormHandler();

    public function getFormId();

    /**
     * @return ListHandlerInterface
     */
    public function getListHandler();

    /**
     * @return string
     */
    public function getReferenceTable();

    /**
     * @return array of identifying fields.
     *
     *      Identifying fields are the unique fields needed to UPDATE a row in the database.
     *      Typically, there is only one identifying field named id, but for tables without id,
     *      we would have an array of fields.
     *
     */
    public function getIdentifyingFields();

    /**
     * This is used by services to handle the request in the most appropriate manner.
     * (as the time of writing, it concerns the insert_update_row service and the delete_rows service)
     * 
     * @return string|null
     */
    public function getAutoIncrementedField();


}