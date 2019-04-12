<?php

namespace Ling\Chloroform\Field;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Form\Chloroform;

/**
 * The PasswordField class.
 */
class PasswordField extends AbstractField implements FormAwareFieldInterface
{


    /**
     * This property holds the form for this instance.
     * @var Chloroform
     */
    protected $form;

    /**
     *
     * Builds and returns the instance.
     *
     *
     * @param string $label
     * @param array $properties
     * @return $this
     */
    public static function create(string $label, array $properties = [])
    {
        $properties['label'] = $label;
        return new static($properties);
    }


    /**
     * @implementation
     */
    public function getValue()
    {
        return (string)$this->value;
    }


    /**
     * @implementation
     */
    public function setForm(Chloroform $form)
    {
        $this->form = $form;
    }


    /**
     * Returns the form instance attached to this instance.
     *
     * @return Chloroform
     * @throws ChloroformException
     */
    public function getForm(): Chloroform
    {
        if (null === $this->form) {
            throw new ChloroformException("The getForm method can only be called after the field has been attached to the form instance.");
        }
        return $this->form;
    }
}