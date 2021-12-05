<?php


namespace Ling\PaypalTools\Tool;

/**
 * The PaypalTool class.
 */
class PaypalTool
{


    /**
     * Returns an array of access token information, based on the given client id and secret.
     *
     * The returned array is defined by paypal, but at the moment, returns the following properties:
     *
     * - scope: str, see paypal docs for more info
     * - access_token: str, the access token
     * - token_type: str=Bearer, see paypal docs for more info
     * - app_id: str, see paypal docs for more info
     * - expires_in: int, the number of seconds the access token is valid
     * - nonce: str, see paypal docs for more info
     *
     *
     * https://developer.paypal.com/docs/platforms/get-started/#exchange-your-api-credentials-for-an-access-token
     *
     *
     * @param string $clientId
     * @param string $secret
     * @return array|false
     */
    public static function getAccessTokenInfo(string $clientId, string $secret): array|false
    {

        // https://stackoverflow.com/questions/37262192/paypal-get-access-token-with-php-curl


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_USERPWD => $clientId . ":" . $secret,
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Accept-Language: en_US"
            ),
        ));

        $result = curl_exec($curl);
        if (false !== $result) {

            $array = json_decode($result, true);
            if (true === is_array($array)) {
                return $array;
            }
        }
        return false;
    }
}