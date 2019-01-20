<?php


namespace Http4All\Header;


class AcceptLanguageHelper
{
    // https://github.com/matriphe/php-iso-639/blob/master/src/ISO639.php
    private static $iso1_iso3 = [
        'aa' => 'aar',
        'ab' => 'abk',
        'ae' => 'ave',
        'af' => 'afr',
        'ak' => 'aka',
        'am' => 'amh',
        'an' => 'arg',
        'ar' => 'ara',
        'as' => 'asm',
        'av' => 'ava',
        'ay' => 'aym',
        'az' => 'aze',
        'ba' => 'bak',
        'be' => 'bel',
        'bg' => 'bul',
        'bh' => '',
        'bi' => 'bis',
        'bm' => 'bam',
        'bn' => 'ben',
        'bo' => 'bod',
        'br' => 'bre',
        'bs' => 'bos',
        'ca' => 'cat',
        'ce' => 'che',
        'ch' => 'cha',
        'co' => 'cos',
        'cr' => 'cre',
        'cs' => 'ces',
        'cu' => 'chu',
        'cv' => 'chv',
        'cy' => 'cym',
        'da' => 'dan',
        'de' => 'deu',
        'dv' => 'div',
        'dz' => 'dzo',
        'ee' => 'ewe',
        'el' => 'ell',
        'en' => 'eng',
        'eo' => 'epo',
        'es' => 'spa',
        'et' => 'est',
        'eu' => 'eus',
        'fa' => 'fas',
        'ff' => 'ful',
        'fi' => 'fin',
        'fj' => 'fij',
        'fo' => 'fao',
        'fr' => 'fra',
        'fy' => 'fry',
        'ga' => 'gle',
        'gd' => 'gla',
        'gl' => 'glg',
        'gn' => 'grn',
        'gu' => 'guj',
        'gv' => 'glv',
        'ha' => 'hau',
        'he' => 'heb',
        'hi' => 'hin',
        'ho' => 'hmo',
        'hr' => 'hrv',
        'ht' => 'hat',
        'hu' => 'hun',
        'hy' => 'hye',
        'hz' => 'her',
        'ia' => 'ina',
        'id' => 'ind',
        'ie' => 'ile',
        'ig' => 'ibo',
        'ii' => 'iii',
        'ik' => 'ipk',
        'io' => 'ido',
        'is' => 'isl',
        'it' => 'ita',
        'iu' => 'iku',
        'ja' => 'jpn',
        'jv' => 'jav',
        'ka' => 'kat',
        'kg' => 'kon',
        'ki' => 'kik',
        'kj' => 'kua',
        'kk' => 'kaz',
        'kl' => 'kal',
        'km' => 'khm',
        'kn' => 'kan',
        'ko' => 'kor',
        'kr' => 'kau',
        'ks' => 'kas',
        'ku' => 'kur',
        'kv' => 'kom',
        'kw' => 'cor',
        'ky' => 'kir',
        'la' => 'lat',
        'lb' => 'ltz',
        'lg' => 'lug',
        'li' => 'lim',
        'ln' => 'lin',
        'lo' => 'lao',
        'lt' => 'lit',
        'lu' => 'lub',
        'lv' => 'lav',
        'mg' => 'mlg',
        'mh' => 'mah',
        'mi' => 'mri',
        'mk' => 'mkd',
        'ml' => 'mal',
        'mn' => 'mon',
        'mr' => 'mar',
        'ms' => 'msa',
        'mt' => 'mlt',
        'my' => 'mya',
        'na' => 'nau',
        'nb' => 'nob',
        'nd' => 'nde',
        'ne' => 'nep',
        'ng' => 'ndo',
        'nl' => 'nld',
        'nn' => 'nno',
        'no' => 'nor',
        'nr' => 'nbl',
        'nv' => 'nav',
        'ny' => 'nya',
        'oc' => 'oci',
        'oj' => 'oji',
        'om' => 'orm',
        'or' => 'ori',
        'os' => 'oss',
        'pa' => 'pan',
        'pi' => 'pli',
        'pl' => 'pol',
        'ps' => 'pus',
        'pt' => 'por',
        'qu' => 'que',
        'rm' => 'roh',
        'rn' => 'run',
        'ro' => 'ron',
        'ru' => 'rus',
        'rw' => 'kin',
        'sa' => 'san',
        'sc' => 'srd',
        'sd' => 'snd',
        'se' => 'sme',
        'sg' => 'sag',
        'si' => 'sin',
        'sk' => 'slk',
        'sl' => 'slv',
        'sm' => 'smo',
        'sn' => 'sna',
        'so' => 'som',
        'sq' => 'sqi',
        'sr' => 'srp',
        'ss' => 'ssw',
        'st' => 'sot',
        'su' => 'sun',
        'sv' => 'swe',
        'sw' => 'swa',
        'ta' => 'tam',
        'te' => 'tel',
        'tg' => 'tgk',
        'th' => 'tha',
        'ti' => 'tir',
        'tk' => 'tuk',
        'tl' => 'tgl',
        'tn' => 'tsn',
        'to' => 'ton',
        'tr' => 'tur',
        'ts' => 'tso',
        'tt' => 'tat',
        'tw' => 'twi',
        'ty' => 'tah',
        'ug' => 'uig',
        'uk' => 'ukr',
        'ur' => 'urd',
        'uz' => 'uzb',
        've' => 'ven',
        'vi' => 'vie',
        'vo' => 'vol',
        'wa' => 'wln',
        'wo' => 'wol',
        'xh' => 'xho',
        'yi' => 'yid',
        'yo' => 'yor',
        'za' => 'zha',
        'zh' => 'zho',
        'zu' => 'zul',
    ];

    /**
     * @return array, array of languages/locales => priority,
     * ordered by decreasing priority.
     *
     *
     * For instance, the following string:
     *
     * - fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5
     *
     * yields the following result:
     *
     * - fr-CH => 1
     * - fr => 0.9
     * - en => 0.8
     * - de => 0.7
     * - * => 0.5
     *
     *
     */
    public static function parseAcceptLanguage($acceptLanguage)
    {
        $ret = [];
        $p = explode(',', $acceptLanguage);
        foreach ($p as $frag) {
            $q = explode(';', $frag, 2);
            if (2 === count($q)) {
                $r = explode('=', $q[1]);
                if (2 === count($r)) {
                    $indice = (float)$r[1];
                } else {
                    $indice = 0;
                }
                $ret[trim($q[0])] = $indice;
            } else {
                $ret[trim($q[0])] = 1;
            }
        }
        arsort($ret);
        return $ret;
    }

    /**
     * Return the user's preferred iso-639-3 language
     * based on the given accept-language.
     *
     * If no correspondence is found the default will be returned.
     *
     */
    public static function acceptLanguageToPreferredIso639_3($acceptLanguage, $default = "eng")
    {
        $language = self::getPreferredLanguage($acceptLanguage);
        /**
         * Note: this is an iso639-1 to iso639-3 conversion,
         * not sure if that's what should be done, but anyway
         * this is a starting point.
         */
        if (array_key_exists($language, self::$iso1_iso3)) {
            return self::$iso1_iso3[$language];
        }
        return $default;
    }


    public static function getPreferredLanguage($acceptLanguageString){
        $p = array_keys(self::parseAcceptLanguage($acceptLanguageString));
        $p = array_shift($p);
        $q = explode('-', $p);

        $language = array_shift($q);
        return $language;
    }
}