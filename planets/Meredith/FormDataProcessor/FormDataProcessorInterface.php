<?php

namespace Meredith\FormDataProcessor;

/*
 * LingTalfi 2016-01-02
 */

interface FormDataProcessorInterface
{


    /**
     * Return the default values for the attached fields, excluding auto-incremented fields.
     * Originally created for unchecked checkboxes.
     *
     * @return array of name => defaultValue
     */
    public function getDefaultValues();


    /**
     * @param $formId
     * @param string $type (insert|update)
     * @return string|false
     */
    public function getSuccessMessage($formId, $type);

    /**
     * @param $formId
     * @param $type (insert|update)
     * @return string|false
     */
    public function getDefaultErrorMessage($formId, $type);

    /**
     * @param $formId
     * @param string $type (insert|update)
     * @return string|false
     */
    public function getDuplicateEntryMessage($formId, $type);


    /**
     * @param $extensionId
     * @return false|mixed
     */
    public function getExtension($extensionId);


    /**
     * This method is executed just before an insert.
     * It has the power to skip the insert, if cancelMsg is set to a non null value.
     *
     * This method is the opportunity for you to check special unique constraints for instance.
     *
     * For example, I had the case with two unique indexes, one of them being null:
     * http://stackoverflow.com/questions/25844786/unique-multiple-columns-and-null-in-one-column
     *
     *
     * 
     * Another useful case is when you use GUI helpers in such a way that your form controls names are 
     * not synchronized anymore with your database names.
     * Then, before you insert data in the database, you need to transpose the GUI form control helpers' names
     * to actual table names, and the onInsertBefore is a good place to do so.
     * 
     * 
     * The onInsertBefore is also a good place to implement mechanisms against cross site scripting.
     * Since meredith is a general plugin, it doesn't know the details of your application.
     * You might have a connected user, and she might only be able to insert/update under certain conditions;
     * so if this is the case, the onInsertBefore method is a place of choice for doing just that.
     * 
     * 
     *
     *
     * @param string $table ,
     * @param array $values
     * @param $cancelMsg
     * @return void
     */
    public function onInsertBefore($table, array &$values, &$cancelMsg, array $foreignValues);

    /**
     *
     * This method is executed just before an update.
     * It has the power to skip the update, if cancelMsg is set to a non null value.
     *
     * This method is the opportunity for you to check whether a certain operation is
     * permitted.
     * For instance, if the user wants to update a configuration table,
     * she shall not be permitted to update the key, but only the value.
     *
     *
     * @param $table
     * @param array $values
     * @param $cancelMsg
     * @param array $foreignValues
     * @param array $idf2Values
     * @return mixed
     */
    public function onUpdateBefore($table, array $values, &$cancelMsg, array $foreignValues, array $idf2Values);


    /**
     * This method is called after a successful insert/update, because the dev might want to perform
     * additional changes to the database, like for instance adding tags after that
     * an article has been created...
     *
     * @param str :mode (insert|update)
     * @param array :nac2Values, non auto-incremented to values (fields from the reference table only)
     * @param array :foreignValues, foreign to values (fields that are NOT in reference table only)
     * @param str|null:lastInsertId,    if the mode is insert, the last inserted id (auto incremented field for mysql).
     *                                  if the mode is update, the null value
     * @param array|null:idf2Values, if the mode is insert, the null value
     *                               if the mode is update, the array of identifying fields 2 values (used in the where clause of the update request)
     *
     *
     * @throws \Exception to interrupt the insert/update transaction.
     *
     * Tip:
     * This method is fired from the insert_update_row service, which uses an Opaque tim server.
     * So you could throw an exception, or a transparent exception depending on the error message you want to
     * communicate to the user.
     */
    public function onSuccessAfter($mode, array $nac2Values, array $foreignValues, $lastInsertId, $idf2Values);


    public function getForeignFields();
}
