<?php


namespace Ling\FormModel\Control;


abstract class HtmlControl implements ControlInterface
{
    protected $type; // this needs to be defined by concrete classes
    //
    private $_label;
    private $htmlAttributes;
    private $_hint;
    private $errors;


    public function __construct()
    {
        $this->htmlAttributes = [];
        $this->errors = [];
    }

    public static function create()
    {
        return new static();
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    public function getArray()
    {
        $ret = [
            'type' => $this->type,
            'label' => $this->_label,
            'htmlAttributes' => $this->htmlAttributes,
            'hint' => $this->_hint,
            'errors' => $this->errors,
        ];
        $this->prepareArray($ret);
        return $ret;
    }

    public function getName()
    {
        if (array_key_exists("name", $this->htmlAttributes)) {
            return $this->htmlAttributes["name"];
        }
        return null;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * $name: html name (sometimes ends with [])
     */
    public function name($name)
    {
        $this->htmlAttributes['name'] = $name;
        return $this;
    }

    public function required()
    {
        $this->htmlAttributes[] = 'required';
        return $this;
    }

    public function label($label)
    {
        $this->_label = $label;
        return $this;
    }

    public function addHtmlAttribute($key, $value)
    {
        if (null !== $key) {
            $this->htmlAttributes[$key] = $value;
        } else {
            $this->htmlAttributes[] = $value;
        }
        return $this;
    }

    public function hint($hint)
    {
        $this->_hint = $hint;
        return $this;
    }

    public function addError($errorMsg)
    {
        $this->errors[] = $errorMsg;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function prepareArray(array &$array)
    {
        // override me
    }
}