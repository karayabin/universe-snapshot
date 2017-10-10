<?php


namespace Http4All\Header;


class AcceptLanguageHelper
{
    // https://github.com/matriphe/php-iso-639/blob/master/src/ISO639.php
    private static $iso1_iso3 = [
        'ab' => 'abk',
        'aa' => 'aar',
        'af' => 'afr',
        'ak' => 'aka',
        'sq' => 'sqi',
        'am' => 'amh',
        'ar' => 'ara',
        'an' => 'arg',
        'hy' => 'hye',
        'as' => 'asm',
        'av' => 'ava',
        'ae' => 'ave',
        'ay' => 'aym',
        'az' => 'aze',
        'bm' => 'bam',
        'ba' => 'bak',
        'eu' => 'eus',
        'be' => 'bel',
        'bn' => 'ben',
        'bh' => '',
        'bi' => 'bis',
        'bs' => 'bos',
        'br' => 'bre',
        'bg' => 'bul',
        'my' => 'mya',
        'ca' => 'cat',
        'ch' => 'cha',
        'ce' => 'che',
        'ny' => 'nya',
        'zh' => 'zho',
        'cv' => 'chv',
        'kw' => 'cor',
        'co' => 'cos',
        'cr' => 'cre',
        'hr' => 'hrv',
        'cs' => 'ces',
        'da' => 'dan',
        'dv' => 'div',
        'nl' => 'nld',
        'dz' => 'dzo',
        'en' => 'eng',
        'eo' => 'epo',
        'et' => 'est',
        'ee' => 'ewe',
        'fo' => 'fao',
        'fj' => 'fij',
        'fi' => 'fin',
        'fr' => 'fra',
        'ff' => 'ful',
        'gl' => 'glg',
        'ka' => 'kat',
        'de' => 'deu',
        'el' => 'ell',
        'gn' => 'grn',
        'gu' => 'guj',
        'ht' => 'hat',
        'ha' => 'hau',
        'he' => 'heb',
        'hz' => 'her',
        'hi' => 'hin',
        'ho' => 'hmo',
        'hu' => 'hun',
        'ia' => 'ina',
        'id' => 'ind',
        'ie' => 'ile',
        'ga' => 'gle',
        'ig' => 'ibo',
        'ik' => 'ipk',
        'io' => 'ido',
        'is' => 'isl',
        'it' => 'ita',
        'iu' => 'iku',
        'ja' => 'jpn',
        'jv' => 'jav',
        'kl' => 'kal',
        'kn' => 'kan',
        'kr' => 'kau',
        'ks' => 'kas',
        'kk' => 'kaz',
        'km' => 'khm',
        'ki' => 'kik',
        'rw' => 'kin',
        'ky' => 'kir',
        'kv' => 'kom',
        'kg' => 'kon',
        'ko' => 'kor',
        'ku' => 'kur',
        'kj' => 'kua',
        'la' => 'lat',
        '' => 'lld',
        'lb' => 'ltz',
        'lg' => 'lug',
        'li' => 'lim',
        'ln' => 'lin',
        'lo' => 'lao',
        'lt' => 'lit',
        'lu' => 'lub',
        'lv' => 'lav',
        'gv' => 'glv',
        'mk' => 'mkd',
        'mg' => 'mlg',
        'ms' => 'msa',
        'ml' => 'mal',
        'mt' => 'mlt',
        'mi' => 'mri',
        'mr' => 'mar',
        'mh' => 'mah',
        'mn' => 'mon',
        'na' => 'nau',
        'nv' => 'nav',
        'nd' => 'nde',
        'ne' => 'nep',
        'ng' => 'ndo',
        'nb' => 'nob',
        'nn' => 'nno',
        'no' => 'nor',
        'ii' => 'iii',
        'nr' => 'nbl',
        'oc' => 'oci',
        'oj' => 'oji',
        'cu' => 'chu',
        'om' => 'orm',
        'or' => 'ori',
        'os' => 'oss',
        'pa' => 'pan',
        'pi' => 'pli',
        'fa' => 'fas',
        'pl' => 'pol',
        'ps' => 'pus',
        'pt' => 'por',
        'qu' => 'que',
        'rm' => 'roh',
        'rn' => 'run',
        'ro' => 'ron',
        'ru' => 'rus',
        'sa' => 'san',
        'sc' => 'srd',
        'sd' => 'snd',
        'se' => 'sme',
        'sm' => 'smo',
        'sg' => 'sag',
        'sr' => 'srp',
        'gd' => 'gla',
        'sn' => 'sna',
        'si' => 'sin',
        'sk' => 'slk',
        'sl' => 'slv',
        'so' => 'som',
        'st' => 'sot',
        'es' => 'spa',
        'su' => 'sun',
        'sw' => 'swa',
        'ss' => 'ssw',
        'sv' => 'swe',
        'ta' => 'tam',
        'te' => 'tel',
        'tg' => 'tgk',
        'th' => 'tha',
        'ti' => 'tir',
        'bo' => 'bod',
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
        'cy' => 'cym',
        'wo' => 'wol',
        'fy' => 'fry',
        'xh' => 'xho',
        'yi' => 'yid',
        'yo' => 'yor',
        'za' => 'zha',
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
                $ret[trim($q[0])] = (float)$q[1];
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
     * If no correspondance is found the default will be returned.
     *
     */
    public static function acceptLanguageToPreferredIso639_3($acceptLanguage, $default = "eng")
    {
        $p = array_keys(self::parseAcceptLanguage($acceptLanguage));
        $p = array_shift($p);
        $q = explode('-', $p);


        /**
         * Note: this is an iso639-1 to iso639-3 conversion,
         * not sure if that's what should be done, but anyway
         * this is a starting point.
         */
        $language = array_shift($q);
        if (array_key_exists($language, self::$iso1_iso3)) {
            return self::$iso1_iso3[$language];
        }
        return $default;
    }
}