<?php


namespace Ling\Light_Kit_Editor\Light_Kit\ConfigurationTransformer;


use Ling\Light_Kit\ConfigurationTransformer\ConfigurationTransformerInterface;

/**
 * The WebsiteRootTransformer class.
 *
 *
 */
class WebsiteRootTransformer implements ConfigurationTransformerInterface
{

    /**
     * This property holds the root for this instance.
     * @var string|null
     */
    protected ?string $root;

    /**
     * Builds the WebsiteRootTransformer instance.
     */
    public function __construct()
    {
        $this->root = null;
    }

    /**
     * Sets the root.
     *
     * @param string $root
     */
    public function setRoot(string $root)
    {
        $this->root = $root;
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
            $conf["layout"] = str_replace('$root', $this->root, $conf["layout"]);
        }
    }


}