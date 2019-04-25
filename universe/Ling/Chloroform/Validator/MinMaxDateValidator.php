<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The MinMaxDateValidator class.
 *
 * The validation depends on the properties set.
 *
 * If only min is set: validates only if the date given by the user is greater or equal to $min.
 * If only max is set: validates only if the date given by the user is less than or equal to $max.
 * If both min and max are set: validates only if the date given by the user is comprised between $min and $max (both included).
 *
 * This validator also works for datetime and/or time.
 * The format for a date would be yyyy-mm-dd for instance.
 *
 *
 *
 */
class MinMaxDateValidator extends AbstractMinMaxValidator
{



    /**
     * Sets the min date.
     *
     * @param string $min
     * @return $this
     */
    public function setMin(string $min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * Sets the max date.
     *
     * @param string $max
     * @return $this
     */
    public function setMax(string $max)
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


        $date = $value;

        if (null !== $this->min && null === $this->max) {
            if ($date < $this->min) {
                $error = $this->getErrorMessage("min", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "date" => $date,
                ]);
                return false;
            }
        } elseif (null !== $this->max && null === $this->min) {
            if ($date > $this->max) {
                $error = $this->getErrorMessage("max", [
                    "fieldName" => $fieldName,
                    "max" => $this->max,
                    "date" => $date,
                ]);
                return false;
            }
        } elseif (null !== $this->min && null !== $this->max) {
            if ($date < $this->min || $date > $this->max) {
                $error = $this->getErrorMessage("between", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "max" => $this->max,
                    "date" => $date,
                ]);
                return false;
            }
        }
        return true;
    }
}