<?php


namespace SokoForm\ValidationRule;


use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;


/**
 * Sources:
 * - how to validate the number:
 *      https://www.agecsa.com/expert_comptable_siret.html
 * - find clé de luhn:
 *      http://fagot.alain.free.fr/helpilaro/verifcle.html
 *      http://codes-sources.commentcamarche.net/source/42857-verification-de-la-validite-des-codes-siret-et-siren
 *      https://www.grafikart.fr/forum/topics/4492
 *
 * - in monaco, the siret number can also be a series of alphanumeric characters, for example, MONACOCONFO001.
 *      https://en.wikipedia.org/wiki/SIRET_code#cite_note-2
 *      => Note: in this class, when monaco is chosen, we won't apply any particular validation
 *
 */
class SokoSiretValidationRule extends SokoValidationRule
{

    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage("This is not a valid siret number");

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {

            if (true === $this->checkSubmitted($value, $error)) {
                $countryValue = $preferences['countryValue'];
                if ('MC' !== $countryValue) { // rules don't apply to monaco
                    if (false === $this->isValidSiret($value)) {
                        $error = $this->getErrorMessage();
                        return false;
                    }
                }
            } else {
                return false;
            }
            return true;
        });
    }


    public function setCountry($countryValue, $countryLabel)
    {
        $this->preferences["countryValue"] = $countryValue;
        $this->preferences["countryLabel"] = $countryLabel;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function isValidSiret($siret)
    {
        if (empty($siret)) {
            return false;
        }
        if (14 !== strlen($siret)) {
            return false;
        }
        return $this->isValidLuhn($siret);
    }


    private function isValidLuhn($num)
    {
        $num = preg_replace('/[^\d]/', '', $num);
        $sum = '';
        for ($i = strlen($num) - 1; $i >= 0; --$i) {
            $sum .= $i & 1 ? $num[$i] : $num[$i] * 2;
        }
        return array_sum(str_split($sum)) % 10 === 0;
    }
}