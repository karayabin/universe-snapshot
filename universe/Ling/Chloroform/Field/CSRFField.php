<?php

namespace Ling\Chloroform\Field;


use Ling\CSRFTools\CSRFProtector;


/**
 * The CSRFField class.
 */
class CSRFField extends HiddenField
{


    /**
     * This property holds the CSRFIdentifier for this instance.
     *
     * The [Csrf identifier](https://github.com/lingtalfi/CSRFTools#a-quick-word-about-concurrent-csrf-tokens).
     *
     * @var string
     */
    protected $CSRFIdentifier;


    /**
     * This property holds the _tokenCreated for this instance.
     * It's an internal variable that I use to keep track of whether the token
     * was already created.
     *
     * @var bool
     */
    private $_tokenCreated;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {
        $this->CSRFIdentifier = "default";
        $this->_tokenCreated = false;
        parent::__construct($properties);
    }

    /**
     * Sets the CSRFIdentifier.
     *
     * @param string $CSRFIdentifier
     * @return $this
     */
    public function setCSRFIdentifier(string $CSRFIdentifier)
    {
        $this->CSRFIdentifier = $CSRFIdentifier;
        return $this;
    }

    /**
     * Returns the CSRFIdentifier of this instance.
     *
     * @return string
     */
    public function getCSRFIdentifier(): string
    {
        return $this->CSRFIdentifier;
    }





    /**
     * @implementation
     */
    public function getValue()
    {
        /**
         * Ensuring that subsequent calls during the same process will
         * return the same token every time.
         *
         * Note: in this design the user can't manually set the value: it is automatically
         * set to the CSRFProtector provided token.
         */
        if (false === $this->_tokenCreated) {
            $this->value = CSRFProtector::inst()->createToken($this->CSRFIdentifier);
            $this->_tokenCreated = true;
        }
        return $this->value;
    }
}