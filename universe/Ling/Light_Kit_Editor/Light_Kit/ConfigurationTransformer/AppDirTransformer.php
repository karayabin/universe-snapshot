<?php


namespace Ling\Light_Kit_Editor\Light_Kit\ConfigurationTransformer;


use Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface;

/**
 * The AppDirTransformer class.
 *
 *
 */
class AppDirTransformer implements ConfigurationTransformerInterface
{

    /**
     * This property holds the appDir for this instance.
     * @var string|null
     */
    protected ?string $appDir;

    /**
     * Builds the WebsiteRootTransformer instance.
     */
    public function __construct()
    {
        $this->appDir = null;
    }

    /**
     * Sets the appDir.
     *
     * @param string $appDir
     */
    public function setAppDir(string $appDir)
    {
        $this->appDir = $appDir;
    }




    //--------------------------------------------
    // ConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$conf)
    {
        if (array_key_exists("layout", $conf)) {
            $conf["layout"] = str_replace('${app_dir}', $this->appDir, $conf["layout"]);
        }
    }


}