<?php


namespace Ling\Jin\Component\PreRouting;


use Ling\Bat\FileSystemTool;
use Ling\Jin\Http\HttpRequest;
use Ling\Jin\Http\HttpResponse;
use Ling\Jin\Registry\Access;

/**
 * @info The AssetNotFoundLog class sends an alert message to the main logger on the "missing_assets" channel when a
 * requested asset is not found.
 * If the asset is missing, it returns an empty http response to the browser to fake the asset (makes it easier to process for the browser than
 * a full featured generic error page, and also avoid an extra route not found log message that would otherwise occur).
 *
 * Note: in a jin app all virtual web traffic is redirected to the main entry point of the app: www/index.php
 *
 *
 * By default, an asset is any file which ends with one of the following extension (you can customize those extensions), case insensitive:
 *
 * - css
 * - js
 * - mp3
 * - mp4
 * - png
 * - jpg
 * - jpeg
 * - gif
 *
 *
 *
 *
 *
 */
class AssetNotFoundLog
{


    /**
     * @info This property holds the array of assets extensions.
     * An asset will be recognized as such only if it's in this array.
     *
     * @type array
     */
    private $extensions;


    /**
     * @info Builds the AssetNotFoundLog instance.
     *
     */
    public function __construct()
    {
        $this->extensions = [
            "css",
            "js",
            "mp3",
            "mp4",
            "png",
            "jpg",
            "jpeg",
            "gif",
        ];
    }

    /**
     * @info Detects whether an asset was requested (by looking the file extension of uri path in the http request),
     * and if this is the case (missing asset), then:
     *      - sends a log message to the "missing_assets" channel
     *      - returns a response with an empty string
     *
     * Otherwise, if it's not a missing asset but a regular virtual request, it does nothing.
     *
     *
     * @param HttpRequest $request
     * @return \Jin\Http\HttpResponse|null
     *
     */
    public function handleRequest(HttpRequest $request)
    {
        $response = null;

        if (false !== strpos($request->uriPath, '.')) {
            $extension = FileSystemTool::getFileExtension($request->uriPath);
            if (in_array($extension, $this->extensions, true)) {
                $response = new HttpResponse();
                Access::log()->log("(Jin\Component\Exception\AssetNotFoundLog->handleException): missing asset: " . $request->uriPath, "missing_assets");
            }
        }

        return $response;
    }


    /**
     * @info Sets the extensions recognized as assets.
     * @param array $extensions
     */
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
    }
}



