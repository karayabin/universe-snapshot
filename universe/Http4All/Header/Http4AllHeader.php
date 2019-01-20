<?php


namespace Http4All\Header;


class Http4AllHeader
{


    public static function getHttpHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }
        return $headers;
    }


    public static function getHttpHeader($name, $default = null)
    {
        $headers = self::getHttpHeaders();
        if (array_key_exists($name, $headers)) {
            return $headers[$name];
        }
        return $default;
    }


    public static function getUserPreferredLang($type = 'iso3')
    {
        $lang = Http4AllHeader::getHttpHeader("Accept-Language");
        if ('iso3' === $type) {
            return AcceptLanguageHelper::acceptLanguageToPreferredIso639_3($lang);
        }
        return AcceptLanguageHelper::getPreferredLanguage($lang);
    }

    /**
     * Return the user's country code (ISO 3166-1 alpha2)
     * based on the browser preferences
     *
     * options:
     *      - onLanguageToCountryMismatch: callable|null
     *                                      fn ( language )
     *                                      if set, will be triggered if the CountryHelper is used and failed
     *                                      to return a match.
     *
     *
     */
    public static function getUserPreferredCountry($defaultCountry = "US", array $options = [])
    {

        $options = array_replace([
            'onLanguageToCountryMismatch' => null,
            'useIp' => true,
            'useIntl' => true,
        ], $options);

        //--------------------------------------------
        // IP BASED SOLUTIONS
        //--------------------------------------------
        if (true === $options['useIp']) {

            // try a free webservice?
            if (array_key_exists("REMOTE_ADDR", $_SERVER)) {
                $ip = $_SERVER['REMOTE_ADDR'];
                if ('127.0.0.1' !== $ip) {
                    $url = 'http://ip2c.org/?ip=' . $ip;
                    $c = file_get_contents($url);
                    $p = explode(";", $c);
                    $country2 = $p[1];
                    if ('ZZZ' !== $country2) {
                        return $country2;
                    }
                }
            }

            // other tools to investigate...
            // http://lifeinide.com/post/2013-09-20-accepted-language-codes/
            // https://freegeoip.net/?q=195.154.191.12
        }


        //--------------------------------------------
        // ACCEPT-LANGUAGE BASED SOLUTIONS
        //--------------------------------------------
        // try intl if support available
        //--------------------------------------------
        // intl (bundled with php since php5.3)
        // http://php.net/manual/en/intl.requirements.php
        if (true === $options['useIntl']) {
            if (extension_loaded("intl")) {
                if (array_key_exists("HTTP_ACCEPT_LANGUAGE", $_SERVER)) {
                    $locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                    $locale = \Locale::getRegion($locale);
                    return $locale;
                }
            }
        }


        $lang = Http4AllHeader::getHttpHeader("Accept-Language");


        $p = array_keys(AcceptLanguageHelper::parseAcceptLanguage($lang));
        $p = array_shift($p);
        $q = explode('-', $p);
        $country = null;
        if (count($q) > 1) {
            $country = strtoupper($q[1]);
        } else {
            // this means we don't have an hyphen, like in "en"
            if (array_key_exists($q[0], CountryHelper::$lang2Country)) {
                $country = CountryHelper::$lang2Country[$q[0]];
            } else {
                if (
                    array_key_exists("onLanguageToCountryMismatch", $options) &&
                    is_callable($options['onLanguageToCountryMismatch'])

                ) {
                    $options['onLanguageToCountryMismatch']($q[0]);
                }
            }
        }
        if (null === $country) {
            $country = $defaultCountry;
        }
        return $country;
    }
}