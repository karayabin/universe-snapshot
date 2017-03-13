<?php


namespace Kamille\Architecture\Request\Web;


use Kamille\Architecture\Request\RequestInterface;

interface HttpRequestInterface extends RequestInterface
{
    //--------------------------------------------
    // FROM PHP $_SERVER
    //--------------------------------------------
    /**
     * @return string: uri, starts with a slash (/)
     */
    public function uri($withQueryString = true);

    public function queryString();

    public function isHttps();

    /**
     * @return string, lowercase http method used (get, post, ...)
     */
    public function method();


    public function host();

    /**
     * @return int
     */
    public function port();

    /**
     * @return string, the case sensitive protocol identifier (like HTTP/1.1 for instance)
     */
    public function protocol();


    public function remoteAddress();

    public function remotePort();


    /**
     * Returns an http header.
     *
     * @param $headerName, string, case insensitive using dash as separator.
     *                      For instance, possible values are:
     *                      - host
     *                      - user-agent
     *                      - accept
     *                      - accept-language
     *                      - ...
     * @return null|string
     */
    public function header($headerName);




    //--------------------------------------------
    // OTHER SUPER ARRAYS
    //--------------------------------------------
    /**
     * In this implementation, I prefer NOT to use the arrays below,
     * because it's faster to use php's native super arrays.
     *
     * $_GET["pou"]        vs         $p->getRequest()->get("pou")
     *
     *
     * I believe it's not worth implementing such redundant arrays.
     */
//    public function get($key);
//    public function post($key);
//    public function cookie($key);
//    public function file($key);




}