<?php


namespace Ling\Chloroform\Validator;


use Ling\Bat\ConvertTool;
use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The MinMaxFileSizeValidator class.
 *
 * This class validates the size of the posted file (usually in $_FILES).
 *
 *
 *
 * The validation depends on the properties set.
 *
 * If only min is set: validates only if the file size is greater or equal to $min.
 * If only max is set: validates only if the file size is less than or equal to $max.
 * If both min and max are set: validates only if the file size is comprised between $min and $max (both included).
 *
 *
 *
 * The min and max values can be either a number or a human string representing the file size,
 * as recognized by the @page(ConvertTool::convertHumanSizeToBytes) method (from the @page(Bat planet)).
 * So for instance, you can use the "2M" notation to represent two mega-bytes.
 *
 *
 */
class MinMaxFileSizeValidator extends AbstractMinMaxValidator
{


    /**
     * Sets the min.
     *
     * @param mixed $min
     * @return $this
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * Sets the max.
     *
     * @param mixed $max
     * @return $this
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (null === $this->min && null === $this->max) {
            throw new ChloroformException("At least one of the min or max property must be set.");
        }

        if (false === is_array($value)) {
            throw new ChloroformException("This validator only works with a file array.");
        }

        if (false === array_key_exists('size', $value)) {
            throw new ChloroformException("This validator only works with a file array containing the size key.");
        }


        $min = ConvertTool::convertHumanSizeToBytes($this->min);
        $max = ConvertTool::convertHumanSizeToBytes($this->max);
        $number = $value['size'];
        $numberFormatted = ConvertTool::convertBytes($number, "h");


        if (null !== $this->min && null === $this->max) {
            if ($number < $min) {
                $error = $this->getErrorMessage("min", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "number" => $numberFormatted,
                ]);
                return false;
            }
        } elseif (null !== $this->max && null === $this->min) {
            if ($number > $max) {
                $error = $this->getErrorMessage("max", [
                    "fieldName" => $fieldName,
                    "max" => $this->max,
                    "number" => $numberFormatted,
                ]);
                return false;
            }
        } elseif (null !== $this->min && null !== $this->max) {
            if ($number < $min || $number > $max) {
                $error = $this->getErrorMessage("between", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "max" => $this->max,
                    "number" => $numberFormatted,
                ]);
                return false;
            }
        }
        return true;
    }
}