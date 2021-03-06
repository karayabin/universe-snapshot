<?php


namespace Ling\Bat;


/**
 * The LocaleTool class.
 */
class LocaleTool
{

    private static $alpha2To3 = [
        'AD' => 'AND',
        'AE' => 'ARE',
        'AF' => 'AFG',
        'AG' => 'ATG',
        'AI' => 'AIA',
        'AL' => 'ALB',
        'AM' => 'ARM',
        'AN' => 'ANT',
        'AO' => 'AGO',
        'AQ' => 'ATA',
        'AR' => 'ARG',
        'AS' => 'ASM',
        'AT' => 'AUT',
        'AU' => 'AUS',
        'AW' => 'ABW',
        'AX' => 'ALA',
        'AZ' => 'AZE',
        'BA' => 'BIH',
        'BB' => 'BRB',
        'BD' => 'BGD',
        'BE' => 'BEL',
        'BF' => 'BFA',
        'BG' => 'BGR',
        'BH' => 'BHR',
        'BI' => 'BDI',
        'BJ' => 'BEN',
        'BL' => 'BLM',
        'BM' => 'BMU',
        'BN' => 'BRN',
        'BO' => 'BOL',
        'BR' => 'BRA',
        'BS' => 'BHS',
        'BT' => 'BTN',
        'BV' => 'BVT',
        'BW' => 'BWA',
        'BY' => 'BLR',
        'BZ' => 'BLZ',
        'CA' => 'CAN',
        'CC' => 'CCK',
        'CD' => 'COD',
        'CF' => 'CAF',
        'CG' => 'COG',
        'CH' => 'CHE',
        'CI' => 'CIV',
        'CK' => 'COK',
        'CL' => 'CHL',
        'CM' => 'CMR',
        'CN' => 'CHN',
        'CO' => 'COL',
        'CR' => 'CRI',
        'CU' => 'CUB',
        'CV' => 'CPV',
        'CX' => 'CXR',
        'CY' => 'CYP',
        'CZ' => 'CZE',
        'DE' => 'DEU',
        'DJ' => 'DJI',
        'DK' => 'DNK',
        'DM' => 'DMA',
        'DO' => 'DOM',
        'DZ' => 'DZA',
        'EC' => 'ECU',
        'EE' => 'EST',
        'EG' => 'EGY',
        'EH' => 'ESH',
        'ER' => 'ERI',
        'ES' => 'ESP',
        'ET' => 'ETH',
        'FI' => 'FIN',
        'FJ' => 'FJI',
        'FK' => 'FLK',
        'FM' => 'FSM',
        'FO' => 'FRO',
        'FR' => 'FRA',
        'GA' => 'GAB',
        'GB' => 'GBR',
        'GD' => 'GRD',
        'GE' => 'GEO',
        'GF' => 'GUF',
        'GG' => 'GGY',
        'GH' => 'GHA',
        'GI' => 'GIB',
        'GL' => 'GRL',
        'GM' => 'GMB',
        'GN' => 'GIN',
        'GP' => 'GLP',
        'GQ' => 'GNQ',
        'GR' => 'GRC',
        'GS' => 'SGS',
        'GT' => 'GTM',
        'GU' => 'GUM',
        'GW' => 'GNB',
        'GY' => 'GUY',
        'HK' => 'HKG',
        'HM' => 'HMD',
        'HN' => 'HND',
        'HR' => 'HRV',
        'HT' => 'HTI',
        'HU' => 'HUN',
        'ID' => 'IDN',
        'IE' => 'IRL',
        'IL' => 'ISR',
        'IM' => 'IMN',
        'IN' => 'IND',
        'IO' => 'IOT',
        'IQ' => 'IRQ',
        'IR' => 'IRN',
        'IS' => 'ISL',
        'IT' => 'ITA',
        'JE' => 'JEY',
        'JM' => 'JAM',
        'JO' => 'JOR',
        'JP' => 'JPN',
        'KE' => 'KEN',
        'KG' => 'KGZ',
        'KH' => 'KHM',
        'KI' => 'KIR',
        'KM' => 'COM',
        'KN' => 'KNA',
        'KP' => 'PRK',
        'KR' => 'KOR',
        'KW' => 'KWT',
        'KY' => 'CYM',
        'KZ' => 'KAZ',
        'LA' => 'LAO',
        'LB' => 'LBN',
        'LC' => 'LCA',
        'LI' => 'LIE',
        'LK' => 'LKA',
        'LR' => 'LBR',
        'LS' => 'LSO',
        'LT' => 'LTU',
        'LU' => 'LUX',
        'LV' => 'LVA',
        'LY' => 'LBY',
        'MA' => 'MAR',
        'MC' => 'MCO',
        'MD' => 'MDA',
        'ME' => 'MNE',
        'MF' => 'MAF',
        'MG' => 'MDG',
        'MH' => 'MHL',
        'MK' => 'MKD',
        'ML' => 'MLI',
        'MM' => 'MMR',
        'MN' => 'MNG',
        'MO' => 'MAC',
        'MP' => 'MNP',
        'MQ' => 'MTQ',
        'MR' => 'MRT',
        'MS' => 'MSR',
        'MT' => 'MLT',
        'MU' => 'MUS',
        'MV' => 'MDV',
        'MW' => 'MWI',
        'MX' => 'MEX',
        'MY' => 'MYS',
        'MZ' => 'MOZ',
        'NA' => 'NAM',
        'NC' => 'NCL',
        'NE' => 'NER',
        'NF' => 'NFK',
        'NG' => 'NGA',
        'NI' => 'NIC',
        'NL' => 'NLD',
        'NO' => 'NOR',
        'NP' => 'NPL',
        'NR' => 'NRU',
        'NU' => 'NIU',
        'NZ' => 'NZL',
        'OM' => 'OMN',
        'PA' => 'PAN',
        'PE' => 'PER',
        'PF' => 'PYF',
        'PG' => 'PNG',
        'PH' => 'PHL',
        'PK' => 'PAK',
        'PL' => 'POL',
        'PM' => 'SPM',
        'PN' => 'PCN',
        'PR' => 'PRI',
        'PS' => 'PSE',
        'PT' => 'PRT',
        'PW' => 'PLW',
        'PY' => 'PRY',
        'QA' => 'QAT',
        'RE' => 'REU',
        'RO' => 'ROU',
        'RS' => 'SRB',
        'RU' => 'RUS',
        'RW' => 'RWA',
        'SA' => 'SAU',
        'SB' => 'SLB',
        'SC' => 'SYC',
        'SD' => 'SDN',
        'SE' => 'SWE',
        'SG' => 'SGP',
        'SH' => 'SHN',
        'SI' => 'SVN',
        'SJ' => 'SJM',
        'SK' => 'SVK',
        'SL' => 'SLE',
        'SM' => 'SMR',
        'SN' => 'SEN',
        'SO' => 'SOM',
        'SR' => 'SUR',
        'SS' => 'SSD',
        'ST' => 'STP',
        'SV' => 'SLV',
        'SY' => 'SYR',
        'SZ' => 'SWZ',
        'TC' => 'TCA',
        'TD' => 'TCD',
        'TF' => 'ATF',
        'TG' => 'TGO',
        'TH' => 'THA',
        'TJ' => 'TJK',
        'TK' => 'TKL',
        'TL' => 'TLS',
        'TM' => 'TKM',
        'TN' => 'TUN',
        'TO' => 'TON',
        'TR' => 'TUR',
        'TT' => 'TTO',
        'TV' => 'TUV',
        'TW' => 'TWN',
        'TZ' => 'TZA',
        'UA' => 'UKR',
        'UG' => 'UGA',
        'UM' => 'UMI',
        'US' => 'USA',
        'UY' => 'URY',
        'UZ' => 'UZB',
        'VA' => 'VAT',
        'VC' => 'VCT',
        'VE' => 'VEN',
        'VG' => 'VGB',
        'VI' => 'VIR',
        'VN' => 'VNM',
        'VU' => 'VUT',
        'WF' => 'WLF',
        'WS' => 'WSM',
        'YE' => 'YEM',
        'YT' => 'MYT',
        'ZA' => 'ZAF',
        'ZM' => 'ZMB',
        'ZW' => 'ZWE',
    ];

    /**
     * https://www.loc.gov/standards/iso639-2/php/code_list.php
     */
    private static $iso639_2to1 = [
        'aar' => 'aa',
        'abk' => 'ab',
        'afr' => 'af',
        'aka' => 'ak',
        'sqi' => 'sq',
        'amh' => 'am',
        'ara' => 'ar',
        'arg' => 'an',
        'hye' => 'hy',
        'asm' => 'as',
        'ava' => 'av',
        'ave' => 'ae',
        'aym' => 'ay',
        'aze' => 'az',
        'bak' => 'ba',
        'bam' => 'bm',
        'eus' => 'eu',
        'bel' => 'be',
        'ben' => 'bn',
        'bih' => 'bh',
        'bis' => 'bi',
        'bod' => 'bo',
        'bos' => 'bs',
        'bre' => 'br',
        'bul' => 'bg',
        'mya' => 'my',
        'cat' => 'ca',
        'ces' => 'cs',
        'cha' => 'ch',
        'che' => 'ce',
        'zho' => 'zh',
        'chu' => 'cu',
        'chv' => 'cv',
        'cor' => 'kw',
        'cos' => 'co',
        'cre' => 'cr',
        'cym' => 'cy',
        'dan' => 'da',
        'deu' => 'de',
        'div' => 'dv',
        'nld' => 'nl',
        'dzo' => 'dz',
        'ell' => 'el',
        'eng' => 'en',
        'epo' => 'eo',
        'est' => 'et',
        'ewe' => 'ee',
        'fao' => 'fo',
        'fas' => 'fa',
        'fij' => 'fj',
        'fin' => 'fi',
        'fra' => 'fr',
        'fry' => 'fy',
        'ful' => 'ff',
        'kat' => 'ka',
        'gla' => 'gd',
        'gle' => 'ga',
        'glg' => 'gl',
        'glv' => 'gv',
        'grn' => 'gn',
        'guj' => 'gu',
        'hat' => 'ht',
        'hau' => 'ha',
        'heb' => 'he',
        'her' => 'hz',
        'hin' => 'hi',
        'hmo' => 'ho',
        'hrv' => 'hr',
        'hun' => 'hu',
        'ibo' => 'ig',
        'isl' => 'is',
        'ido' => 'io',
        'iii' => 'ii',
        'iku' => 'iu',
        'ile' => 'ie',
        'ina' => 'ia',
        'ind' => 'id',
        'ipk' => 'ik',
        'ita' => 'it',
        'jav' => 'jv',
        'jpn' => 'ja',
        'kal' => 'kl',
        'kan' => 'kn',
        'kas' => 'ks',
        'kau' => 'kr',
        'kaz' => 'kk',
        'khm' => 'km',
        'kik' => 'ki',
        'kin' => 'rw',
        'kir' => 'ky',
        'kom' => 'kv',
        'kon' => 'kg',
        'kor' => 'ko',
        'kua' => 'kj',
        'kur' => 'ku',
        'lao' => 'lo',
        'lat' => 'la',
        'lav' => 'lv',
        'lim' => 'li',
        'lin' => 'ln',
        'lit' => 'lt',
        'ltz' => 'lb',
        'lub' => 'lu',
        'lug' => 'lg',
        'mkd' => 'mk',
        'mah' => 'mh',
        'mal' => 'ml',
        'mri' => 'mi',
        'mar' => 'mr',
        'msa' => 'ms',
        'mlg' => 'mg',
        'mlt' => 'mt',
        'mon' => 'mn',
        'nau' => 'na',
        'nav' => 'nv',
        'nbl' => 'nr',
        'nde' => 'nd',
        'ndo' => 'ng',
        'nep' => 'ne',
        'nno' => 'nn',
        'nob' => 'nb',
        'nor' => 'no',
        'nya' => 'ny',
        'oci' => 'oc',
        'oji' => 'oj',
        'ori' => 'or',
        'orm' => 'om',
        'oss' => 'os',
        'pan' => 'pa',
        'pli' => 'pi',
        'pol' => 'pl',
        'por' => 'pt',
        'pus' => 'ps',
        'que' => 'qu',
        'roh' => 'rm',
        'ron' => 'ro',
        'run' => 'rn',
        'rus' => 'ru',
        'sag' => 'sg',
        'san' => 'sa',
        'sin' => 'si',
        'slk' => 'sk',
        'slv' => 'sl',
        'sme' => 'se',
        'smo' => 'sm',
        'sna' => 'sn',
        'snd' => 'sd',
        'som' => 'so',
        'sot' => 'st',
        'spa' => 'es',
        'srd' => 'sc',
        'srp' => 'sr',
        'ssw' => 'ss',
        'sun' => 'su',
        'swa' => 'sw',
        'swe' => 'sv',
        'tah' => 'ty',
        'tam' => 'ta',
        'tat' => 'tt',
        'tel' => 'te',
        'tgk' => 'tg',
        'tgl' => 'tl',
        'tha' => 'th',
        'tir' => 'ti',
        'ton' => 'to',
        'tsn' => 'tn',
        'tso' => 'ts',
        'tuk' => 'tk',
        'tur' => 'tr',
        'twi' => 'tw',
        'uig' => 'ug',
        'ukr' => 'uk',
        'urd' => 'ur',
        'uzb' => 'uz',
        'ven' => 've',
        'vie' => 'vi',
        'vol' => 'vo',
        'wln' => 'wa',
        'wol' => 'wo',
        'xho' => 'xh',
        'yid' => 'yi',
        'yor' => 'yo',
        'zha' => 'za',
        'zul' => 'zu',

    ];


    /**
     * @param $alpha2Code , an ISO 3166-1 alpha-2 code
     * @param string $default =USA, the default value to return in case of no match
     * @return string, the ISO 3166-1 alpha-3 code
     */
    public static function getCountryAlpha3CodeByAlpha2Code($alpha2Code, $default = "USA")
    {
        if (array_key_exists($alpha2Code, self::$alpha2To3)) {
            return self::$alpha2To3[$alpha2Code];
        }
        return $default;
    }


    public static function getLangIso639_1ByIso639_2($iso639_2Code, $default = "eng")
    {
        if (array_key_exists($iso639_2Code, self::$iso639_2to1)) {
            return self::$iso639_2to1[$iso639_2Code];
        }
        return $default;
    }
}