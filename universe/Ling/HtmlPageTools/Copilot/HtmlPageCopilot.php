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
    protected $title;

    /**
     * This property holds the description for this instance.
     * This is the meta description.
     * @var string
     */
    protected $description;

    /**
     * This property holds the metas for this instance.
     * It's an array of metas.
     * Each meta being an array of key/value pairs representing the meta attributes along with their corresponding values.
     *
     * @var array
     */
    protected $metas;

    /**
     * This property holds the libraries for this instance.
     * It's an array of the registered libraries names.
     * A library is registered whenever the addCssLibrary or the addJsLibrary method is called.
     *
     *
     * @var array
     */
    protected $libraryNames;

    /**
     * This property holds the cssLibraries for this instance.
     * It's an array of (css libraries) urls.
     *
     * @var array
     */
    protected $cssLibraries;

    /**
     * This property holds the jsLibraries for this instance.
     * It's an array of (js libraries) urls.
     * @var array
     */
    protected $jsLibraries;

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
     * Builds the HtmlPage instance.
     */
    public function __construct()
    {
        $this->title = "";
        $this->description = "";
        $this->metas = [];
        $this->libraryNames = [];
        $this->cssLibraries = [];
        $this->jsLibraries = [];
        $this->jsCodeBlocks = [];
        $this->cssCodeBlocks = [];
        $this->bodyTagClasses = [];
        $this->bodyTagAttributes = [];
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
     * Returns whether a library has been registered to this instance.
     *
     * @param string $name
     * The library name.
     * @return bool
     */
    public function hasLibrary(string $name): bool
    {
        return (in_array($name, $this->libraryNames, true));
    }


    /**
     * Adds the $name css library to this instance.
     *
     * @param string $name
     * The library name.
     *
     * @param string $href
     */
    public function addCssLibrary(string $name, string $href)
    {
        if (false === in_array($name, $this->libraryNames, true)) {
            $this->libraryNames[] = $name;
        }
        $this->cssLibraries[] = $href;
    }

    /**
     * Returns the cssLibraries of this instance.
     * It's an array of urls.
     *
     * @return array
     */
    public function getCssLibraries(): array
    {
        return $this->cssLibraries;
    }


    /**
     * Adds the $name js library to this instance.
     * The src attribute is actually the url of the js library to add.
     *
     * @param string $name
     * The library name.
     * @param string $src
     */
    public function addJsLibrary(string $name, string $src)
    {
        if (false === in_array($name, $this->libraryNames, true)) {
            $this->libraryNames[] = $name;
        }
        $this->jsLibraries[] = $src;
    }

    /**
     * Returns the jsLibraries of this instance.
     * It's an array of urls.
     *
     * @return array
     */
    public function getJsLibraries(): array
    {
        return $this->jsLibraries;
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

}