<?php


namespace Ling\SimpleCurl\Response;


/**
 * The SimpleCurlResponseInterface class.
 * It represents the response of a curl method call.
 *
 * A response contains the following elements:
 *
 * - a http code: the returned http code
 * - a body: the body returned with the response, if available (i.e. some methods don't return a body)
 * - headers: an array of (lowercase) headers returned along with the response
 * - raw info: an array of various info about the curl response, provided by the curl php library
 *
 *
 *
 */
interface SimpleCurlResponseInterface
{


    /**
     * Returns the (last returned) http code of the response.
     *
     * @return int
     */
    public function getHttpCode();

    /**
     * Returns an array of headers.
     * All header keys are lowercase
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Returns the body associated with the response if any.
     *
     * @return string|null
     */
    public function getBody();


    /**
     * Returns the raw info returned by the curl curl_getinfo function.
     * Example of output:
     *
     * array(26) {
     * ["url"] => string(23) "http://www.example.com/"
     * ["content_type"] => string(24) "text/html; charset=UTF-8"
     * ["http_code"] => int(200)
     * ["header_size"] => int(322)
     * ["request_size"] => int(54)
     * ["filetime"] => int(-1)
     * ["ssl_verify_result"] => int(0)
     * ["redirect_count"] => int(0)
     * ["total_time"] => float(0.233953)
     * ["namelookup_time"] => float(0.020366)
     * ["connect_time"] => float(0.126439)
     * ["pretransfer_time"] => float(0.126468)
     * ["size_upload"] => float(0)
     * ["size_download"] => float(1270)
     * ["speed_download"] => float(5450)
     * ["speed_upload"] => float(0)
     * ["download_content_length"] => float(1270)
     * ["upload_content_length"] => float(-1)
     * ["starttransfer_time"] => float(0.233559)
     * ["redirect_time"] => float(0)
     * ["redirect_url"] => string(0) ""
     * ["primary_ip"] => string(13) "93.184.216.34"
     * ["certinfo"] => array(0) {
     * }
     * ["primary_port"] => int(80)
     * ["local_ip"] => string(12) "192.168.1.60"
     * ["local_port"] => int(59572)
     * }
     *
     *
     *
     * @return array
     *
     */
    public function getRawInfo();
}