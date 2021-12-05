<?php


namespace Ling\HtmlPageTools\Copilot;


/**
 * The HtmlPageCopilot class.
 *
 *
 * HtmlPageCopilot is an object helps creating an html page in a widget environment.
 * It does so by capturing and serving back everything that's related to an html page except for the body content.
 * So for instance the assets, the meta title, the meta description, etc...
 *
 * It's used as a medium object between the widgets and the html page renderer in a widget oriented application.
 *
 *
 *
 *
 */
class HtmlPageCopilot
{
    /**
     * This property holds the title for this instance.
     * This is the title of the html page.
     *
     * @var string
     */
    protected string $title;

    /**
     * This property holds the description for this instance.
     * This is the meta description.
     * @var string
     */
    protected string $description;

    /**
     * This property holds the metas for this instance.
     * It's an array of metas.
     * Each meta being an array of key/value pairs representing the meta attributes along with their corresponding values.
     *
     * @var array
     */
    protected array $metas;

    /**
     * This property holds the libraries for this instance.
     *
     * It's an array of libraryName => assetsItem.
     * Each assetsItem is an array of:
     * - 0: array of regular js files urls
     * - 1: array of css urls
     * - 0: array of js modules urls
     *
     *
     * @var array
     */
    protected array $libraries;


    /**
     * This property holds the jsCodeBlocks for this instance.
     * It's an array of javascript blocks of code.
     *
     * Note: a js code block doesn't include the script tag: a js code block is pure javascript.
     *
     * @var array
     */
    protected $jsCodeBlocks;

    /**
     * This property holds the cssCodeBlocks for this instance.
     * It's an array of css blocks of code.
     *
     * Note: a css code block doesn't include the style tag: a css code block is pure css.
     *
     * @var array
     */
    protected $cssCodeBlocks;

    /**
     * This property holds the bodyTagClasses for this instance.
     * It's an array of css classes (or space separated css classes).
     *
     * @var array
     */
    protected $bodyTagClasses;

    /**
     * This property holds the bodyTagAttributes for this instance.
     * It's an array of key/value representing html attributes.
     * The "class" attribute should not be part of this array, as it's handled separately using the bodyTagClasses property.
     *
     * @var array
     */
    protected $bodyTagAttributes;

    /**
     * This property holds the modals for this instance.
     * It's an array of html modals.
     * @var array
     */
    protected $modals;


    /**
     * Builds the HtmlPage instance.
     */
    public function __construct()
    {
        $this->title = "";
        $this->description = "";
        $this->metas = [];
        $this->libraries = [];
        $this->jsCodeBlocks = [];
        $this->cssCodeBlocks = [];
        $this->bodyTagClasses = [];
        $this->bodyTagAttributes = [];
        $this->modals = [];
    }


    /**
     * Sets the title of the html page.
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the title of this instance.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Returns whether the title was defined.
     * @return bool
     */
    public function hasTitle(): bool
    {
        return ("" !== $this->title);
    }

    /**
     * Sets the description.
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the description of this instance.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Returns whether the description was defined.
     * @return bool
     */
    public function hasDescription(): bool
    {
        return ("" !== $this->description);
    }


    /**
     * Adds a meta to this instance.
     * Note: multiple meta with the same "name" attribute is valid html.
     *
     * @param array $attributes
     */
    public function addMeta(array $attributes)
    {
        $this->metas[] = $attributes;
    }

    /**
     * Returns the metas of this instance.
     *
     * @return array
     */
    public function getMetas(): array
    {
        return $this->metas;
    }


    /**
     * Returns whether a library has been registered.
     *
     * @param string $name
     * The library name.
     *
     * @return bool
     */
    public function hasLibrary(string $name): bool
    {
        return (array_key_exists($name, $this->libraries));
    }


    /**
     * Registers an asset library.
     * The library will be added only if it's not already registered.
     *
     * Please for the names of your library, use the camelNotation, examples:
     *
     * - jquery
     * - jqueryUi
     * - bootstrap
     * - myLibrary
     *
     * If you're using a library that comes from a universe planet, then use the planet name directly:
     *
     * - Chloroform_HeliumRenderer
     * - JSortTable
     * - ...
     *
     *
     *
     * Available options:
     * - override: bool=false.
     *      If true, the library will be overwritten in case of conflicts.
     *
     *
     * Tip with override
     * --------
     * If your template has a jquery link hardcoded in it, you can use override like this in your template,
     * so that all modules that use jquery use the version that's hardcoded in your template:
     *
     * ```php
     * $copilot->registerLibrary("Jquery", [], [], [
     * '    override' => true,
     * ]);
     * ```
     *
     *
     *
     *
     *
     *
     *
     * @param string $name
     * @param array $js
     * @param array $css
     * @param array $options
     */
    public function registerLibrary(string $name, array $js = [], array $css = [], array $options = [])
    {
        $override = $options['override'] ?? false;
        if (true === $override || false === array_key_exists($name, $this->libraries)) {

            $jsModules = [];
            foreach ($js as $k => $jsItem) {
                if (true === str_starts_with($jsItem, "module:")) {
                    $jsModules[] = mb_substr($jsItem, 7);
                    unset($js[$k]);
                }
            }

            $this->libraries[$name] = [$js, $css, $jsModules];
        }
    }


    /**
     * Returns all the css urls collected.
     * @return array
     */
    public function getCssUrls(): array
    {
        $urls = [];
        foreach ($this->libraries as $lib) {
            $urls = array_merge($urls, $lib[1]);
        }
        return $urls;
    }


    /**
     * Returns all the js urls collected.
     * @return array
     */
    public function getJsUrls(): array
    {
        $urls = [];
        foreach ($this->libraries as $lib) {
            $urls = array_merge($urls, $lib[0]);
        }
        return $urls;
    }

    /**
     * Returns all the js modules urls collected.
     * @return array
     */
    public function getJsModulesUrls(): array
    {
        $urls = [];
        foreach ($this->libraries as $lib) {
            $urls = array_merge($urls, $lib[2]);
        }
        return $urls;
    }


    /**
     * Adds a js code block to this instance.
     * Note: a js code block doesn't include the script tag: a js code block is pure javascript.
     *
     * @param string $codeBlock
     */
    public function addJsCodeBlock(string $codeBlock)
    {
        $this->jsCodeBlocks[] = $codeBlock;
    }

    /**
     * Adds a css code block to this instance.
     * Note: a css code block doesn't include the style tag: a css code block is pure css.
     *
     * @param string $codeBlock
     */
    public function addCssCodeBlock(string $codeBlock)
    {
        $this->cssCodeBlocks[] = $codeBlock;
    }

    /**
     * Returns the jsCodeBlocks of this instance.
     * It's an array of strings (js code blocks).
     * Note: a js code block doesn't include the script tag: a js code block is pure javascript.
     *
     * @return array
     */
    public function getJsCodeBlocks(): array
    {
        return $this->jsCodeBlocks;
    }


    /**
     * Returns whether the instance has js code blocks.
     * @return bool
     */
    public function hasJsCodeBlocks(): bool
    {
        return (count($this->jsCodeBlocks) > 0);
    }

    /**
     * Returns the cssCodeBlocks of this instance.
     * It's an array of strings (css code blocks).
     * Note: a css code block doesn't include the style tag: a css code block is pure css.
     *
     * @return array
     */
    public function getCssCodeBlocks(): array
    {
        return $this->cssCodeBlocks;
    }

    /**
     * Returns whether the instance has css code blocks.
     * @return bool
     */
    public function hasCssCodeBlocks(): bool
    {
        return (count($this->cssCodeBlocks) > 0);
    }


    /**
     * Adds a css class (or space separated css classes) to the body tag.
     * @param string $class
     */
    public function addBodyTagClass(string $class)
    {
        $this->bodyTagClasses[] = $class;
    }

    /**
     * Sets a body tag attribute.
     * @param string $name
     * @param string $value
     *
     */
    public function setBodyTagAttribute(string $name, string $value)
    {
        $this->bodyTagAttributes[$name] = $value;
    }


    /**
     * Returns the array of all body tag attributes, including the class attribute (if set).
     * @return array
     */
    public function getBodyTagAttributes()
    {
        $ret = $this->bodyTagAttributes;
        if ($this->bodyTagClasses) {
            $ret['class'] = implode(' ', $this->bodyTagClasses);
        }
        return $ret;
    }

    /**
     * Returns the modals of this instance.
     *
     * @return array
     */
    public function getModals(): array
    {
        return $this->modals;
    }


    /**
     * Adds a modal to this instance.
     *
     * @param string $html
     */
    public function addModal(string $html)
    {
        $this->modals[] = $html;
    }

}