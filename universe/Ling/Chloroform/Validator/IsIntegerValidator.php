<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The IsIntegerValidator class.
 *
 * If the value is an integer, it validates.
 *
 *
 *
 * If the value is null or a float, the validation will fail.
 *
 *
 *
 *
 */
class IsIntegerValidator extends AbstractValidator
{

    /**
     * This property holds the mode for this instance.
     *
     * The mode can be one of:
     *
     * - default (by default)
     * - onlyPositive
     * - onlyNegative
     * - positiveAndZero
     * - negativeAndZero
     *
     *
     *
     * @var string
     */
    protected $mode;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->mode = 'default';
    }


    /**
     * Sets the mode.
     *
     * @param string $mode
     * @return $this
     */
    public function setMode(string $mode): self
    {
        $this->mode = $mode;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (

            (
                false === is_string($value) &&
                false === is_numeric($value)
            )
            ||
            (
                is_string($value) &&
                0 === preg_match('!^-?[0-9]+$!', $value)
            )
        ) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
            ]);
            return false;
        } else {
            $hasError = false;
            switch ($this->mode) {
                case "default":
                    break;
                case "onlyPositive":
                    if ((int)$value <= 0) {
                        $hasError = true;
                    }
                    break;
                case "onlyNegative":
                    if ((int)$value >= 0) {
                        $hasError = true;
                    }
                    break;
                case "positiveAndZero":
                    if ((int)$value < 0) {
                        $hasError = true;
                    }
                    break;
                case "negativeAndZero":
                    if ((int)$value > 0) {
                        $hasError = true;
                    }
                    break;
                default:
                    throw new ChloroformException("Unknown mode: $this->mode.");
                    break;
            }

            if (true === $hasError) {
                $error = $this->getErrorMessage($this->mode, [
                    "fieldName" => $fieldName,
                ]);
                return false;
            }
        }

        return true;
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "mode" => $this->mode,
        ]);
    }

}