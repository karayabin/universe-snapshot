<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information => "information", please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\Tool;

use BeeFramework\Bat\StringTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Component\Html\Crawler\BDomElement\BDomElement;
use BeeFramework\Component\Html\Crawler\BDomElement\BDomElementInterface;
use BeeFramework\Component\Html\Crawler\Collection\CollectionInterface;
use BeeFramework\Component\Html\Crawler\Exception\CrawlerException;


/**
 * CrawlerDevTool
 * @author Lingtalfi
 * 2015-06-18
 *
 */
class CrawlerDevTool
{

    public static $nodeTypes = [
        XML_ELEMENT_NODE => "XML_ELEMENT_NODE",
        XML_ATTRIBUTE_NODE => "XML_ATTRIBUTE_NODE",
        XML_TEXT_NODE => "XML_TEXT_NODE",
        XML_CDATA_SECTION_NODE => "XML_CDATA_SECTION_NODE",
        XML_ENTITY_REF_NODE => "XML_ENTITY_REF_NODE",
        XML_ENTITY_NODE => "XML_ENTITY_NODE",
        XML_PI_NODE => "XML_PI_NODE",
        XML_COMMENT_NODE => "XML_COMMENT_NODE",
        XML_DOCUMENT_NODE => "XML_DOCUMENT_NODE",
        XML_DOCUMENT_TYPE_NODE => "XML_DOCUMENT_TYPE_NODE",
        XML_DOCUMENT_FRAG_NODE => "XML_DOCUMENT_FRAG_NODE",
        XML_NOTATION_NODE => "XML_NOTATION_NODE",
        XML_HTML_DOCUMENT_NODE => "XML_HTML_DOCUMENT_NODE",
        XML_DTD_NODE => "XML_DTD_NODE",
        XML_ELEMENT_DECL_NODE => "XML_ELEMENT_DECL_NODE",
        XML_ATTRIBUTE_DECL_NODE => "XML_ATTRIBUTE_DECL_NODE",
        XML_ENTITY_DECL_NODE => "XML_ENTITY_DECL_NODE",
        XML_NAMESPACE_DECL_NODE => "XML_NAMESPACE_DECL_NODE",
    ];


    public static function getNodeInnerHtml(\DOMNode $element)
    {
        $innerHTML = "";
        $children = $element->childNodes;
        foreach ($children as $child) {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }
        return $innerHTML;
    }

    public static function getNodeHtml(\DOMNode $element)
    {
        return $element->ownerDocument->saveHTML($element);
    }


    /**
     * @param \DOMNodeList|\DOMNodeList[] $els
     * @return BDomElementInterface[]
     */
    public static function domNodeListToArrayOfBDomElements($els)
    {
        $ret = [];
        if (is_array($els)) {

        }
        elseif ($els instanceof \DOMNodeList) {
            $els = [$els];
        }
        else {
            throw new CrawlerException(sprintf("Unknown els type: must be an array or a DomNodeList, %s given", gettype($els)));
        }
        foreach ($els as $list) {
            /**
             * @var \DOMNodeList $list
             */
            foreach ($list as $el) {
                $bdom = BDomElement::create($el);
                /**
                 * we skip BDomElements that have exactly the same properties.
                 * This is required for instance in the case when we first select all "div p",
                 * but then try to go from the p up to the div again (with xpath ancestors for instance),
                 * with some expression like: ./ancestor::div[@class='doo'] for instance;
                 * as ancestors are common to the p, we would have doublons, but the user
                 * doesn't want those doublons so we remove them here.
                 */
                if (!in_array($bdom, $ret)) {
                    $ret[] = $bdom;
                }
            }
        }
        return $ret;
    }



    //------------------------------------------------------------------------------/
    // Personal
    //------------------------------------------------------------------------------/
    public static function m($m)
    {
        $info = [];


        $text = $type = $name = $value = $html = $innerHtml =
            /**
             * Collapsed text (non formal) is a the equivalent of text, but trimmed, and all
             * multiple (consecutive) blanks reduced to one single space.
             */
        $collapsedText = null;
        $attributes = [];


        if ($m instanceof \DOMNode) {
            $name = $m->nodeName;
            $text = $m->textContent;

            if ($m->hasAttributes()) {
                foreach ($m->attributes as $attr) {
                    /**
                     * @var \DOMAttr $attr
                     */
                    $attributes[$attr->name] = $attr->value;
                }
            }
            $type = CrawlerDevTool::$nodeTypes[$m->nodeType];
            $html = CrawlerDevTool::getNodeHtml($m);
            $innerHtml = CrawlerDevTool::getNodeInnerHtml($m);
            $collapsedText = StringTool::collapseWhiteSpaces($m->textContent);

            /**
             * Gets the inner text, replacing html with line feeds (&#10;) and some spaces/tabs
             */
            $value = $m->nodeValue;
            if ($m instanceof \DOMElement) {
                $name = $m->tagName;
            }
        }
        else {
            $type = 'unknown/unimplemented type';
        }
        $info['name'] = $name;
        $info['type'] = $type;
//        $info['value'] = $value;
//        $info['text'] = $text; // same as value?
        $info['collapsedText'] = $collapsedText;
        $info['attributes'] = $attributes;
        $info['html'] = $html;
//        $info['innerHtml'] = $innerHtml;
        a($info);
    }

    public static function debugCollection(CollectionInterface $c)
    {
        $els = [];
        $c->each(function (BDomElementInterface $el) use (&$els) {
            $name = $el->name();
            $id = $el->attribute("id");
            $class = $el->attribute("class");

            $elName = $name;
            if ($id) {
                $elName .= "#$id";
            }
            if ($class) {
                $elName .= ".$class";
            }
            $els[] = $elName;
        });
        return implode(', ', $els);
    }
}
