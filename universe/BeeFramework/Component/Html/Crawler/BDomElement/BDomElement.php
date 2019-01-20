<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\BDomElement;

use BeeFramework\Bat\StringTool;
use BeeFramework\Component\Html\Crawler\Tool\CrawlerDevTool;


/**
 * BDomElement
 * @author Lingtalfi
 * 2015-06-18
 *
 */
class BDomElement implements BDomElementInterface
{
    private $name;
    private $html;
    private $innerHtml;
    private $collapsedText;
    private $text;
    private $attributes;
    private $domElement;

    public function __construct(\DOMElement $domElement)
    {
        $this->attributes = [];
        $this->domElement = $domElement;
        $this->prepareTmp();
    }

    public static function create(\DOMElement $domElement)
    {
        return new static($domElement);
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS BDomElementInterface
    //------------------------------------------------------------------------------/
    public function name()
    {
        $this->prepare();
        return $this->name;
    }

    public function html()
    {
        $this->prepare();
        return $this->html;
    }

    public function innerHtml()
    {
        $this->prepare();
        return $this->innerHtml;
    }

    public function collapsedText()
    {
        $this->prepare();
        return $this->collapsedText;
    }

    public function text()
    {
        $this->prepare();
        return $this->text;
    }

    public function attributes()
    {
        $this->prepare();
        return $this->attributes;
    }

    public function attribute($name, $default = null)
    {
        $this->prepare();
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return $default;
    }

    public function hasAttribute($name)
    {
        $this->prepare();
        if (array_key_exists($name, $this->attributes)) {
            return true;
        }
        return false;
    }


    /**
     * @return \DOMElement
     */
    public function domElement()
    {
        return $this->domElement;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function prepare()
    {
        if (null === $this->name) {
            $m = $this->domElement;
            $this->attributes = [];
            $this->name = $m->nodeName;
            $this->text = $m->textContent;
            $this->html = CrawlerDevTool::getNodeHtml($m);
            $this->innerHtml = CrawlerDevTool::getNodeInnerHtml($m);
            /**
             * Collapsed text (non formal) is a the equivalent of text, but trimmed, and all
             * multiple (consecutive) blanks reduced to one single space.
             */
            $this->collapsedText = StringTool::collapseWhiteSpaces($m->textContent);
            if ($m instanceof \DOMElement) {
                $this->name = $m->tagName;
            }
            if ($m->hasAttributes()) {
                foreach ($m->attributes as $attr) {
                    /**
                     * @var \DOMAttr $attr
                     */
                    $this->attributes[$attr->name] = $attr->value;
                }
            }
        }
    }

    private function prepareTmp()
    {
        if (null === $this->name) {
            $m = $this->domElement;
            $this->attributes = [];
            $this->name = $m->nodeName;
            if ($m->hasAttributes()) {
                foreach ($m->attributes as $attr) {
                    /**
                     * @var \DOMAttr $attr
                     */
                    $this->attributes[$attr->name] = $attr->value;
                }
            }
        }
    }
}
