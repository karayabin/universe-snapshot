<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The PasswordValidator class.
 *
 */
class PasswordValidator extends AbstractValidator
{


    /**
     * This property holds the minimum number of digits that the password should contain.
     * If null, there is no restriction.
     *
     * @var int = null
     */
    protected $nbDigits;

    /**
     * This property holds the minimum number of alphabetical chars (letters) that the password should contain.
     * If null, there is no restriction.
     *
     * @var int = null
     */
    protected $nbAlpha;


    /**
     * This property holds the minimum number of lower case alphabetical chars (letters) that the password should contain.
     * If null, there is no restriction.
     *
     * @var int = null
     */
    protected $nbAlphaLower;

    /**
     * This property holds the minimum number of upper case alphabetical chars (letters) that the password should contain.
     * If null, there is no restriction.
     *
     * @var int = null
     */
    protected $nbAlphaUpper;

    /**
     * This property holds the minimum number of special chars (not letters nor numbers) that the password should contain.
     * If null, there is no restriction.
     *
     * @var int = null
     */
    protected $nbSpecial;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->nbAlpha = null;
        $this->nbAlphaLower = null;
        $this->nbAlphaUpper = null;
        $this->nbDigits = null;
        $this->nbSpecial = null;
    }

    /**
     * Sets the nbDigits.
     *
     * @param int $nbDigits
     * @return $this
     */
    public function setNbDigits(int $nbDigits)
    {
        $this->nbDigits = $nbDigits;
        return $this;
    }

    /**
     * Sets the nbAlpha.
     *
     * @param int $nbAlpha
     * @return $this
     */
    public function setNbAlpha(int $nbAlpha)
    {
        $this->nbAlpha = $nbAlpha;
        return $this;
    }

    /**
     * Sets the nbAlphaLower.
     *
     * @param int $nbAlphaLower
     * @return $this
     */
    public function setNbAlphaLower(int $nbAlphaLower)
    {
        $this->nbAlphaLower = $nbAlphaLower;
        return $this;
    }

    /**
     * Sets the nbAlphaUpper.
     *
     * @param int $nbAlphaUpper
     * @return $this
     */
    public function setNbAlphaUpper(int $nbAlphaUpper)
    {
        $this->nbAlphaUpper = $nbAlphaUpper;
        return $this;
    }

    /**
     * Sets the nbSpecial.
     *
     * @param int $nbSpecial
     * @return $this
     */
    public function setNbSpecial(int $nbSpecial)
    {
        $this->nbSpecial = $nbSpecial;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {


        if (is_string($value)) {

            // https://stackoverflow.com/questions/9438158/split-utf8-string-into-array-of-chars
            $chars = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
            $info = $this->count($chars);
            $messages = $this->getMessages(true);

            $failures = [];

            if (null !== $this->nbAlpha && $info["alpha"] < $this->nbAlpha) {
                $failures[] = str_replace('{alpha}', $this->nbAlpha, $messages['_alpha']);
            }
            if (null !== $this->nbAlphaLower && $info["alphaLower"] < $this->nbAlphaLower) {
                $failures[] = str_replace('{alphaLower}', $this->nbAlphaLower, $messages['_alpha_lower']);
            }
            if (null !== $this->nbAlphaUpper && $info["alphaUpper"] < $this->nbAlphaUpper) {
                $failures[] = str_replace('{alphaUpper}', $this->nbAlphaUpper, $messages['_alpha_upper']);
            }
            if (null !== $this->nbDigits && $info["digit"] < $this->nbDigits) {
                $failures[] = str_replace('{digit}', $this->nbDigits, $messages['_digit']);
            }
            if (null !== $this->nbSpecial && $info["special"] < $this->nbSpecial) {
                $failures[] = str_replace('{special}', $this->nbSpecial, $messages['_special']);
            }


            if ($failures) {
                $intro = str_replace('{fieldName}', $fieldName, $messages['_main']);
                /**
                 * assuming that all languages will have the intro part on the left...
                 */
                if (1 === count($failures)) {
                    $error = $intro . " " . $failures[0];
                } else {
                    $last = array_pop($failures);
                    $and = $messages['_and'];
                    $error = $intro . " " .  implode(", ", $failures) . " " . $and . " " . $last;
                }
                return false;
            }
            return true;


        } else {
            $type = gettype($value);
            throw new ChloroformException("This validator only works with strings ($type passed).");
        }
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "nb_alpha" => $this->nbAlpha,
            "nb_alpha_lower" => $this->nbAlphaLower,
            "nb_alpha_upper" => $this->nbAlphaUpper,
            "nb_digit" => $this->nbDigits,
            "nb_special" => $this->nbSpecial,
        ]);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array containing how many of each category (alpha, alphaLower, alphaUpper, digit, special)
     * the given string contains.
     *
     *
     * @param array $chars
     * @return array
     */
    private function count(array $chars)
    {
        $alpha = 0;
        $alphaLower = 0;
        $alphaUpper = 0;
        $digit = 0;
        $special = 0;

        foreach ($chars as $char) {
            if (true === ctype_alpha($char)) {
                $alpha++;
            }
            if (true === ctype_lower($char)) {
                $alphaLower++;
            }
            if (true === ctype_upper($char)) {
                $alphaUpper++;
            }
            if (true === ctype_digit($char)) {
                $digit++;
            }
            if (true === ctype_punct($char)) {
                $special++;
            }
        }


        return [
            "alpha" => $alpha,
            "alphaLower" => $alphaLower,
            "alphaUpper" => $alphaUpper,
            "digit" => $digit,
            "special" => $special,
        ];
    }
}