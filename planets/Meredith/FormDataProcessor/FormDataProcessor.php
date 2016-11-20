<?php

namespace Meredith\FormDataProcessor;

/*
 * LingTalfi 2016-01-02
 */
class FormDataProcessor implements FormDataProcessorInterface
{


    /**
     * Fields of the referenceTable.
     * @var array
     *          - 0: name
     *          - 1: default value
     */
    private $fields;
    /**
     * Fields not in the reference table.
     * For now, we just take the name, but don't rely on this.
     */
    private $foreignFields;
    private $getSuccessMsgCb;
    private $getDefaultErrorMsgCb;
    private $getDuplicateEntryMsgCb;
    private $onInsertBeforeCb;
    private $onUpdatetBeforeCb;
    private $onSuccessAfterCb;
    private $extensions;

    public function __construct()
    {
        $this->fields = [];
        $this->foreignFields = [];
        $this->extensions = [];
    }


    public static function create()
    {
        return new static();
    }


    public function addField($name, $defaultValue = null)
    {
        $this->fields[] = [$name, $defaultValue];
        return $this;
    }

    public function addForeignField($name)
    {
        $this->foreignFields[] = [$name];
        return $this;
    }

    public function setExtension($extensionId, $extension)
    {
        $this->extensions[$extensionId] = $extension;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getDefaultValues()
    {
        $ret = [];
        foreach ($this->fields as $info) {
            $ret[$info[0]] = $info[1];
        }
        return $ret;
    }

    /**
     * @param $formId
     * @param string $type (insert|update)
     * @return string|false
     */
    public function getSuccessMessage($formId, $type)
    {
        if (null !== $this->getSuccessMsgCb) {
            return call_user_func($this->getSuccessMsgCb, $formId, $type);
        }
        return false;
    }

    /**
     * @param $formId
     * @param string $type (insert|update)
     * @return string|false
     */
    public function getDefaultErrorMessage($formId, $type)
    {
        if (null !== $this->getDefaultErrorMsgCb) {
            return call_user_func($this->getDefaultErrorMsgCb, $formId, $type);
        }
        return false;
    }

    /**
     * @param $formId
     * @param string $type (insert|update)
     * @return string|false
     */
    public function getDuplicateEntryMessage($formId, $type)
    {
        if (null !== $this->getDuplicateEntryMsgCb) {
            return call_user_func($this->getDuplicateEntryMsgCb, $formId, $type);
        }
        return false;
    }

    /**
     * @param $extensionId
     * @return mixed|false
     */
    public function getExtension($extensionId)
    {
        if (array_key_exists($extensionId, $this->extensions)) {
            return $this->extensions[$extensionId];
        }
        return false;
    }


    public function onInsertBefore($table, array &$values, &$cancelMsg, array $foreignValues)
    {
        if (null !== $this->onInsertBeforeCb) {
            return call_user_func_array($this->onInsertBeforeCb, [$table, &$values, &$cancelMsg, $foreignValues]);
        }
    }

    public function onUpdateBefore($table, array $values, &$cancelMsg, array $foreignValues, array $idf2Values)
    {
        if (null !== $this->onUpdatetBeforeCb) {
            return call_user_func_array($this->onUpdatetBeforeCb, [$table, $values, &$cancelMsg, $foreignValues, $idf2Values]);
        }
    }


    public function onSuccessAfter($mode, array $nac2Values, array $foreignValues, $lastInsertId, $idf2Values)
    {
        if (null !== $this->onSuccessAfterCb) {
            call_user_func($this->onSuccessAfterCb, $mode, $nac2Values, $foreignValues, $lastInsertId, $idf2Values);
        }
    }

    public function getForeignFields()
    {
        $ret = [];
        foreach ($this->foreignFields as $info) {
            $ret[] = $info[0];
        }
        return $ret;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setGetDuplicateEntryMsgCb(callable $getDuplicateEntryMsgCb)
    {
        $this->getDuplicateEntryMsgCb = $getDuplicateEntryMsgCb;
        return $this;
    }

    public function setGetSuccessMsgCb(callable $getSuccessMsgCb)
    {
        $this->getSuccessMsgCb = $getSuccessMsgCb;
        return $this;
    }

    public function setGetDefaultErrorMsgCb(callable $cb)
    {
        $this->getDefaultErrorMsgCb = $cb;
        return $this;
    }


    /**
     * @param callable $cb void function ( $table, array &$values, &$cancelMsg, array $foreignValues )
     * @return $this
     */
    public function setOnInsertBeforeCb(callable $cb)
    {
        $this->onInsertBeforeCb = $cb;
        return $this;
    }


    /**
     * @param $onUpdatetBeforeCb   void function ( $table, array $values, &$cancelMsg, array $foreignValues, array $idf2Values )
     * @return $this
     */
    public function setOnUpdatetBeforeCb($onUpdatetBeforeCb)
    {
        $this->onUpdatetBeforeCb = $onUpdatetBeforeCb;
        return $this;
    }


    /**
     *
     * @param callable $cb void  function ( $mode, array $nac2Values, $lastInsertId, $idf2Values, array $foreignValues )
     * @return $this
     */
    public function setOnSuccessAfterCb(callable $cb)
    {
        $this->onSuccessAfterCb = $cb;
        return $this;
    }


}
