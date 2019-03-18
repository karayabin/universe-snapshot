<?php


namespace Ling\SimpleCurl;


use Ling\SimpleCurl\Exception\SimpleCurlException;
use Ling\SimpleCurl\Response\SimpleCurlResponse;
use Ling\SimpleCurl\Response\SimpleCurlResponseInterface;

/**
 * The SimpleCurl class.
 */
class SimpleCurl
{

    /**
     * This property holds the errors for this instance.
     * @var array
     */
    protected $errors;


    /**
     * Builds the SimpleCurl instance.
     */
    public function __construct()
    {
        $this->errors = [];
    }


    /**
     * Calls an url and returns the corresponding response.
     * Returns false in case of an error, in which case errors are available via the getErrors method.
     *
     * This method was designed to call a simple url.
     * For instance, if you want to ping a google server to ask them to crawl your website,
     * you want to call this url:
     *
     * http://www.google.com/ping?sitemap=https://example.com/sitemap.xml
     *
     * See more info here: https://support.google.com/webmasters/answer/183668?hl=en&ref_topic=4581190
     *
     *
     * @param string $url
     * @return SimpleCurlResponseInterface|false
     * @throws SimpleCurlException
     */
    public function call(string $url)
    {
        return $this->curlRequest($url);
    }

    /**
     * Returns the errors of this instance.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Executes the curl request on the given $url with the given $curlOptions,
     * and returns a SimpleCurlResponse, or false in case of failure.
     *
     * Note: by default the following options will be set (you might override them using
     * the $curlOptions):
     *
     * - CURLOPT_URL
     * - CURLOPT_RETURNTRANSFER
     * - CURLOPT_HEADERFUNCTION
     *
     *
     *
     *
     * @param string $url
     * @param array $curlOptions
     * @return SimpleCurlResponseInterface|false
     *
     * @throws SimpleCurlException
     */
    protected function curlRequest(string $url, array $curlOptions = [])
    {


        if (extension_loaded("curl")) {
            /**
             * Returning body AND headers
             * https://stackoverflow.com/questions/9183178/can-php-curl-retrieve-response-headers-and-body-in-a-single-request
             */
            $ch = curl_init();
            if (false !== $ch) {


                $headers = [];
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                //--------------------------------------------
                // COLLECTING HEADERS
                //--------------------------------------------
                // this function is called by curl for each header received
                curl_setopt($ch, CURLOPT_HEADERFUNCTION,
                    function ($curl, $header) use (&$headers) {
                        $len = strlen($header);
                        $header = explode(':', $header, 2);
                        if (count($header) < 2) {// ignore invalid headers
                            return $len;
                        }
                        $name = strtolower(trim($header[0]));
                        if (!array_key_exists($name, $headers)) {
                            $headers[$name] = [trim($header[1])];
                        } else {
                            $headers[$name][] = trim($header[1]);
                        }
                        return $len;
                    }
                );


                //--------------------------------------------
                // ADDITIONAL OPTIONS
                //--------------------------------------------
                foreach ($curlOptions as $option => $value) {
                    if (is_array($value)) {
                        throw new SimpleCurlException("value as array is not implemented yet."); // because I didn't need it so far...
                    }
                    curl_setopt($ch, $option, $value);
                }


                $body = curl_exec($ch);
                if (false !== $body) {

                    $info = curl_getinfo($ch);
                    if (false !== $info) {


                        $o = new SimpleCurlResponse();
                        $o->setHeaders($headers);
                        $o->setRawInfo($info);
                        $o->setBody($body);
                        return $o;

                    } else {

                        $this->addError("Could not access information about the curl session: the curl_getinfo function failed.");
                    }
                } else {
                    $this->addError("Could not execute the curl session properly: the curl_exec function failed.");
                }

            } else {
                $this->addError("Could not init the curl session: the curl_init method failed.");
            }

        } else {
            $this->addError("The curl extension is not loaded.");
        }

        return false;
    }


    /**
     * Adds an error.
     * @param string $msg
     */
    protected function addError(string $msg)
    {
        $this->errors[] = $msg;
    }
}

