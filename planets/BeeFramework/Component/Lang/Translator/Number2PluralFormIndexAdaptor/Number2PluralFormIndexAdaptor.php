<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Lang\Translator\Number2PluralFormIndexAdaptor;


/**
 * Number2PluralFormIndexAdaptor
 * @author Lingtalfi
 *
 *
 */
class Number2PluralFormIndexAdaptor
{

    private $rules = array();
    private $lang2RealLang = array();


    public function __construct(array $lang2RealLang = array(), array $rules = array())
    {
        $this->locale2RealLang = $lang2RealLang;
        $this->rules = $rules;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS Number2PluralFormIndexAdaptorInterface
    //------------------------------------------------------------------------------/
    /**
     * @param $fnGetPluralFormIndex : callback(number, locale)
     */
    public function set($lang, $fnGetPluralFormIndex)
    {
        if (is_callable($fnGetPluralFormIndex)) {
            $this->rules[$lang] = $fnGetPluralFormIndex;
        }
    }

    /**
     * @return int; 0 if not found
     */
    public function get($number, $lang)
    {

        if (isset($this->rules[$lang])) {
            $return = call_user_func($this->rules[$lang], $number);

            if (!is_int($return) || $return < 0) {
                return 0;
            }

            return $return;
        }


        /**
         * ISO-639-1 codes (2 letters) are deprecated in favor of
         * ISO-639-2 (3 letters)
         */

        switch ($lang) {

            case 'tib':
            case 'bod':
            case 'dzo':
            case 'ind':
            case 'jpn':
            case 'jav':
            case 'geo':
            case 'kat':
            case 'khm':
            case 'kan':
            case 'kor':
            case 'may':
            case 'msa':
            case 'tha':
            case 'tur':
            case 'vie':
            case 'chi':
            case 'zho':
                return 0;
                break;

            case 'afr':
            case 'aze':
            case 'ben':
            case 'bul':
            case 'cat':
            case 'dan':
            case 'ger':
            case 'deu':
            case 'gre':
            case 'ell':
            case 'eng':
            case 'epo':
            case 'spa':
            case 'est':
            case 'baq':
            case 'eus':
            case 'per':
            case 'fas':
            case 'fin':
            case 'fao':
            case 'fur':
            case 'fry':
            case 'glg':
            case 'guj':
            case 'hau':
            case 'heb':
            case 'hun':
            case 'ice':
            case 'isl':
            case 'ita':
            case 'kur':
            case 'ltz':
            case 'mal':
            case 'mon':
            case 'mar':
            case 'nah':
            case 'nob':
            case 'nep':
            case 'dut':
            case 'nld':
            case 'nno':
            case 'nor':
            case 'orm':
            case 'ori':
            case 'pan':
            case 'pap':
            case 'pus':
            case 'por':
            case 'som':
            case 'alb':
            case 'sqi':
            case 'swe':
            case 'swa':
            case 'tam':
            case 'tel':
            case 'tuk':
            case 'urd':
            case 'zul':


                return ($number == 1) ? 0 : 1;

            case 'amh':
            case 'bih':
            case 'fil':
            case 'fre':
            case 'fra':
            case 'gun':
            case 'hin':
            case 'lin':
            case 'mlg':
            case 'nso':
            case 'xbr':
            case 'tir':
            case 'wln':

                return (($number == 0) || ($number == 1)) ? 0 : 1;

            case 'bel':
            case 'bos':
            case 'hrv':
            case 'rus':
            case 'srp':
            case 'ukr':
                return (($number % 10 == 1) && ($number % 100 != 11)) ? 0 : ((($number % 10 >= 2) && ($number % 10 <= 4) && (($number % 100 < 10) || ($number % 100 >= 20))) ? 1 : 2);


            case 'cze':
            case 'ces':
            case 'slo':
            case 'slk':
                return ($number == 1) ? 0 : ((($number >= 2) && ($number <= 4)) ? 1 : 2);

            case 'gle':
                return ($number == 1) ? 0 : (($number == 2) ? 1 : 2);

            case 'lit':
                return (($number % 10 == 1) && ($number % 100 != 11)) ? 0 : ((($number % 10 >= 2) && (($number % 100 < 10) || ($number % 100 >= 20))) ? 1 : 2);

            case 'slv':
                return ($number % 100 == 1) ? 0 : (($number % 100 == 2) ? 1 : ((($number % 100 == 3) || ($number % 100 == 4)) ? 2 : 3));

            case 'mac':
            case 'mkd':
                return ($number % 10 == 1) ? 0 : 1;

            case 'mlt':
                return ($number == 1) ? 0 : ((($number == 0) || (($number % 100 > 1) && ($number % 100 < 11))) ? 1 : ((($number % 100 > 10) && ($number % 100 < 20)) ? 2 : 3));

            case 'lav':
                return ($number == 0) ? 0 : ((($number % 10 == 1) && ($number % 100 != 11)) ? 1 : 2);

            case 'pol':
                return ($number == 1) ? 0 : ((($number % 10 >= 2) && ($number % 10 <= 4) && (($number % 100 < 12) || ($number % 100 > 14))) ? 1 : 2);

            case 'wel':
            case 'cym':
                return ($number == 1) ? 0 : (($number == 2) ? 1 : ((($number == 8) || ($number == 11)) ? 2 : 3));

            case 'rum':
            case 'ron':
                return ($number == 1) ? 0 : ((($number == 0) || (($number % 100 > 0) && ($number % 100 < 20))) ? 1 : 2);


            case 'ara':
                return ($number == 0) ? 0 : (($number == 1) ? 1 : (($number == 2) ? 2 : ((($number >= 3) && ($number <= 10)) ? 3 : ((($number >= 11) && ($number <= 99)) ? 4 : 5))));

            default:
                return 0;
        }
    }

}
