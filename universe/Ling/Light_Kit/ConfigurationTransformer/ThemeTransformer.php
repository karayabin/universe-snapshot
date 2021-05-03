<?php


namespace Ling\Light_Kit\ConfigurationTransformer;


/**
 * The ThemeTransformer class.
 *
 *
 */
class ThemeTransformer implements ConfigurationTransformerInterface
{

    /**
     * This property holds the theme for this instance.
     * @var string | null
     */
    protected ?string $theme;

    /**
     * Builds the ThemeTransformer instance.
     */
    public function __construct()
    {
        $this->theme = null;
    }

    /**
     * Sets the theme.
     *
     * @param string $theme
     */
    public function setTheme(string $theme)
    {
        $this->theme = $theme;
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
            $conf["layout"] = str_replace('$t', $this->theme, $conf["layout"]);
        }
    }


}