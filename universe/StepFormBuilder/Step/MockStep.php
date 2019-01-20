<?php


namespace StepFormBuilder\Step;


class MockStep extends Step
{

    private $_isPosted;
    private $_getModel;
    private $_isValid;


    public function isPosted()
    {
        if (is_callable($this->_isPosted)) {
            return call_user_func($this->_isPosted);
        }
        return $this->_isPosted;
    }

    public function getModel(array $values)
    {
        if (is_callable($this->_getModel)) {
            return call_user_func($this->_getModel, $values);
        }
        return $this->_getModel;
    }

    public function isValid(array $data)
    {
        if (is_callable($this->_isValid)) {
            return call_user_func($this->_isValid, $data);
        }
        return $this->_isValid;
    }

    public function inject(array $data)
    {

    }

    public function getData()
    {
        // TODO: Implement getData() method.
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    public function setIsPosted($isPosted)
    {
        $this->_isPosted = $isPosted;
        return $this;
    }

    public function setGetModel($getModel)
    {
        $this->_getModel = $getModel;
        return $this;
    }

    public function setIsValid($isValid)
    {
        $this->_isValid = $isValid;
        return $this;
    }
}


