<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\HtmlPage;

use BeeFramework\Bat\HtmlTool;
use BeeFramework\Bat\StringTool;


/**
 * HtmlHead
 * @author Lingtalfi
 * 2014-10-21
 *
 */
class HtmlHead implements HtmlHeadInterface
{

    private static $inst;
    protected $title;
    protected $description;
    protected $scripts;
    protected $links;
    protected $contents;
    protected $options;

    private function __construct()
    {
        $this->scripts = [];
        $this->links = [];
        $this->contents = [];
        $this->options = [];
    }


    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS HtmlHeadInterface
    //------------------------------------------------------------------------------/
    public function render()
    {
        /**
         * In this implementation, for contents:
         *
         * pos0
         * metaTitle
         * metaDescription
         * pos1
         * scripts
         * links
         * pos2
         *
         * Also, we assume that content is html and not xhtml
         * (this changes the way meta tags are written: http://www.w3schools.com/tags/tag_meta.asp)
         * Also link tags are affected, and probably other tags as well.
         */
        $s = '';
        if (array_key_exists(0, $this->contents)) {
            foreach ($this->contents[0] as $content) {
                $s .= $content . PHP_EOL;
            }
        }

        if ($this->title) {
            $s .= '<title>' . $this->title . '</title>' . PHP_EOL;
        }
        if ($this->description) {
            $s .= '<meta name="description" content="' . htmlspecialchars($this->description) . '">' . PHP_EOL;
        }
        if (array_key_exists(1, $this->contents)) {
            foreach ($this->contents[1] as $content) {
                $s .= $content . PHP_EOL;
            }
        }
        foreach ($this->scripts as $attr) {
            $attr = array_replace([
                'text' => 'text/javascript',
            ], $attr);
            $s .= '<script' . HtmlTool::toAttributesString($attr) . '></script>' . PHP_EOL;
        }
        foreach ($this->links as $attr) {
            $attr = array_replace([
                'rel' => 'stylesheet',
                'type' => 'text/css',
            ], $attr);
            $s .= '<link' . HtmlTool::toAttributesString($attr) . '>' . PHP_EOL;
        }

        if (array_key_exists(2, $this->contents)) {
            foreach ($this->contents[2] as $content) {
                $s .= $content . PHP_EOL;
            }
        }
        return '<head>' . PHP_EOL . $s . PHP_EOL . '</head>' . PHP_EOL;
    }


    /**
     * @return HtmlHeadInterface
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return HtmlHeadInterface
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return HtmlHeadInterface
     */
    public function addScript($src)
    {
        $this->scripts[] = [
            'src' => $src,
        ];
        return $this;
    }

    /**
     * @return HtmlHeadInterface
     */
    public function addLink($href, array $extraAttr = [])
    {
        $this->links[] = array_replace($extraAttr, [
            'href' => $href,
        ]);
        return $this;
    }

    /**
     * @return HtmlHeadInterface
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * @return HtmlHeadInterface
     */
    public function addContent($content, $pos = 0)
    {
        if (!array_key_exists($pos, $this->contents)) {
            $this->contents[$pos] = [];
        }
        $this->contents[$pos][] = $content;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return array of attributes
     */
    public function getScripts()
    {
        return $this->scripts;
    }

    /**
     * @return array of attributes
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function getOption($k, $defaultValue = null)
    {
        if (array_key_exists($k, $this->options)) {
            return $this->options[$k];
        }
        return $defaultValue;
    }

    public function getContent($pos)
    {
        if (array_key_exists($pos, $this->contents)) {
            return implode(PHP_EOL, $this->contents[$pos]);
        }
        return '';
    }


}
