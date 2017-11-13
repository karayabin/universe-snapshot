<?php


namespace SokoForm\ValidationRule;


use Bat\HttpTool;
use SokoForm\Control\SokoControlInterface;
use SokoForm\Exception\SokoFormException;
use SokoForm\Form\SokoFormInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Source: http://www.tvaintracommunautaire.eu/
 * Source: http://ec.europa.eu/taxation_customs/vies/vatRequest.html
 * Source: http://ec.europa.eu/taxation_customs/vies/faqvies.do#item_11
 */
class SokoTvaIntracomValidationRule extends SokoValidationRule
{


    /**
     * This array identifies just the intracom number with the 2 letters country prefix.
     * The source used is this one, which I believe is the most accurate I found:
     * http://ec.europa.eu/taxation_customs/vies/faqvies.do#item_11
     *
     */
    private static $country2Pattern = [
        'AT' => '!^ATU[0-9]{8}$!',
        'BE' => '!^BE0[0-9]{9}$!',
        'BG' => '!^(BG[0-9]{9}|BG0[0-9]{9})$!',
        'CY' => '!^CY[0-9]{8}[a-zA-Z]$!',
        'CZ' => '!^CZ[0-9]{8,10}$!',
        'DE' => '!^DE[0-9]{9}$!',
        'DK' => '!^DK[0-9]{8}$!',
        'EE' => '!^EE[0-9]{9}$!',
        'GR' => '!^EL[0-9]{9}$!',
        'ES' => '!^(ES[0-9][0-9]{7}[a-zA-Z]|ES[a-zA-Z][0-9]{7}[a-zA-Z]|ES[a-zA-Z][0-9]{7}[0-9])$!',
        'FI' => '!^FI[0-9]{8}$!',
        'FR' => '!^FR[a-zA-Z0-9][a-zA-Z0-9][0-9]{9}$!',
        'GB' => '!^(GB[0-9]{9}|GB[0-9]{12}|GBGD[0-9]{3}|GBHA[0-9]{3})$!',
        'HR' => '!^HR[0-9]{11}$!',
        'HU' => '!^HU[0-9]{8}$!',
        'IE' => '!^(IE[0-9][0-9a-z+*A-Z][0-9]{5}[a-zA-Z]|IE[0-9]{7}WI)$!',
        'IT' => '!^IT[0-9]{11}$!',
        'LT' => '!^(LT[0-9]{9}|LT[0-9]{12})$!',
        'LU' => '!^LU[0-9]{8}$!',
        'LV' => '!^LV[0-9]{11}$!',
        'MT' => '!^MT[0-9]{8}$!',
        'NL' => '!^NL[0-9]{9}B[0-9]{2}$!',
        'PL' => '!^PL[0-9]{10}$!',
        'PT' => '!^PT[0-9]{9}$!',
        'RO' => '!^RO[0-9]{2,10}$!',
        'SE' => '!^SE[0-9]{12}$!',
        'SI' => '!^SI[0-9]{8}$!',
        'SK' => '!^SK[0-9]{10}$!',
    ];

    private $useWebservice;

    public function __construct()
    {
        parent::__construct();
        $this->useWebservice = true;


        $this->setErrorMessage("The TVA intracom number isn't valid for the selected country ({countryLabel})");

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {

            if (true === $this->checkSubmitted($value, $error)) {

                $countryValue = $preferences['countryValue'];
                if (false === $this->match($value, $countryValue)) {
                    $error = $this->getErrorMessage();
                    return false;
                }

            } else {
                return false;
            }
            return true;
        });
    }


    /**
     * @param $value , iso-3166-2 (2 letters code uppercase):
     * @return $this
     * @throws \Exception
     */
    public function setCountry($value, $label)
    {
        if (!array_key_exists($value, self::$country2Pattern)) {
            throw new SokoFormException("This country code is not valid (i.e. not part of the UE): $value");
        }
        $this->preferences["countryValue"] = $value;
        $this->preferences["countryLabel"] = $label;
        return $this;
    }

    public function setUseWebservice($bool)
    {
        $this->useWebservice = $bool;
        return $this;
    }


    public static function countryIsInUe($country)
    {
        return (array_key_exists($country, self::$country2Pattern));
    }

    public static function getUeCountries()
    {
        return array_keys(self::$country2Pattern);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function match($tvaNumber, $country)
    {
        if (!array_key_exists($country, self::$country2Pattern)) {
            return false;
        }
        $pattern = self::$country2Pattern[$country];
        if (preg_match($pattern, $tvaNumber)) {

            if ('FR' === $country) {
                $cle = (int)substr($tvaNumber, 2, 2);
                $siren = substr($tvaNumber, 4);
                $computedKey = $this->computeKey($siren);
                if ($cle !== $computedKey) {
                    return false;
                }
            }
            if (true === $this->useWebservice) {
                $intracomNumber = substr($tvaNumber, 2);
                if (false === $this->checkTvaIntracomUsingVies($intracomNumber, $country)) {
                    return false;
                }
            }

            return true;
        }
        return false;
    }


    private function computeKey($siren)
    {
        /**
         * Clé TVA = [12 + 3 × (SIREN modulo 97)] modulo 97
         * Clé TVA = [12 + 3 × (452793177 modulo 97)] modulo 97
         * Clé TVA = [12 + 3 × (87)] modulo 97
         * Clé TVA = [273] modulo 97
         * Clé TVA = 79
         */
        return (12 + 3 * ((int)$siren % 97)) % 97;
    }


    /**
     * @param $intracomNumber
     * @param $country , iso 3166 (2 letters code uppercase)
     * @return bool
     *
     * Example:
     * in France, renault's tva number is:
     * - FR63441639465
     *
     * The intracomNumber is: 63441639465
     * and the country is: FR
     *
     * Every country has its own format.
     *
     *
     *
     */
    private function checkTvaIntracomUsingVies($intracomNumber, $country)
    {
        $uri = "http://ec.europa.eu/taxation_customs/vies/vatResponse.html";
        $html = HttpTool::post($uri, [
            'memberStateCode' => $country,
            'number' => $intracomNumber,
            'traderName' => '',
            'traderStreet' => '',
            'traderPostalCode' => '',
            'traderCity' => '',
            'requesterMemberStateCode' => 'FR',
            'requesterNumber' => "63441639465", // renault
            'action' => 'check',
            'check' => 'Vérifier',
        ]);


        $crawler = new Crawler($html);

        $table = $crawler->filter("#vatResponseFormTable");
        if ('Yes' === substr($table->text(), 0, 3)) {
            return true;
        }
        return false;
    }
}