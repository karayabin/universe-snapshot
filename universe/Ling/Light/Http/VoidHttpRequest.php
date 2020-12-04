<?php


namespace Ling\Light\Http;

/**
 * The VoidHttpRequest class.
 * Generally used when you're in a cli environment.
 *
 */
class VoidHttpRequest implements HttpRequestInterface
{

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getMethod(): string
    {
        return '';
    }

    /**
     * @implementation
     */
    public function getUri(): string
    {
        return '';
    }

    /**
     * @implementation
     */
    public function getUriPath(): string
    {
        return '';
    }

    /**
     * @implementation
     */
    public function getQueryString(): string
    {
        return '';
    }

    /**
     * @implementation
     */
    public function getQueryArgs(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getTime(): float
    {
        return microtime(true);
    }

    /**
     * @implementation
     */
    public function getHost(): string
    {
        return '';
    }

    /**
     * @implementation
     */
    public function isHttpsRequest(): bool
    {
        return false;
    }

    /**
     * @implementation
     */
    public function getPort(): int
    {
        return 0;
    }

    /**
     * @implementation
     */
    public function getIp(): string
    {
        return 0;
    }

    /**
     * @implementation
     */
    public function getReferer()
    {
        return null;
    }

    /**
     * @implementation
     */
    public function getHeaders(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getHeader(string $header, $default = null)
    {
        return null;
    }

    /**
     * @implementation
     */
    public function getGet(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getGetValue(string $key, bool $throwEx = true)
    {
        return null;
    }


    /**
     * @implementation
     */
    public function getPost(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getPostValue(string $key, bool $throwEx = true)
    {
        return null;
    }


    /**
     * @implementation
     */
    public function getFiles(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getFilesValue(string $key, bool $throwEx = true)
    {
        return null;
    }


    /**
     * @implementation
     */
    public function getCookie(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getCookieValue(string $key, bool $throwEx = true)
    {
        return null;
    }


}