<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\Collection;

use BeeFramework\Component\Html\Crawler\BDomElement\BDomElement;
use BeeFramework\Component\Html\Crawler\BDomElement\BDomElementInterface;
use BeeFramework\Component\Html\Crawler\Exception\CrawlerException;
use BeeFramework\Component\Html\Crawler\Tool\CrawlerDevTool;


/**
 * Collection
 * @author Lingtalfi
 * 2015-06-18
 */
class CollectionDepr implements CollectionInterface
{
    /**
     * @var \DOMDocument
     */
    private $domDocument;
    private $defaultContext;

    /**
     * @var BDomElementInterface[]
     */
    private $elements;

    private function __construct($context, $isFile = false)
    {
        $domDocument = $context;
        $defaultContext = null;
        if (false === $isFile) {

            if (is_string($context)) {
                $o = new \DOMDocument();
                $o->loadHTML($context);
                $domDocument = $o;
            }
            elseif ($context instanceof BDomElementInterface) {
                $domDocument = $context->domElement()->ownerDocument;
                $defaultContext = $context->domElement();
            }
        }
        else {
            if (file_exists($context)) {
                $o = new \DOMDocument();
                $o->loadHTML(file_get_contents($context));
                $domDocument = $o;
            }
            else {
                $this->error("File not found: $context");
            }
        }

        if (!$domDocument instanceof \DOMDocument) {
            $this->error(sprintf("Unknown context type: a string or \\DomDocument were expected, %s given", gettype($domDocument)));
        }
        $this->domDocument = $domDocument;
        if (null === $defaultContext) {
            $defaultContext = $domDocument;
        }
        $this->defaultContext = $defaultContext;
        $this->elements = [];
    }


    /**
     * @param $context , either:
     *              - a string: the html representing the document
     *              - a DOMDocument object
     *              - a BDOMElementInterface object, in which case the default context will be set to that element
     *
     * @return static
     */
    public static function fromContext($context)
    {
        return new static($context);
    }

    public static function fromFile($file)
    {
        return new static($file, true);
    }

    /**
     * @param \DOMNodeList|\DOMNodeList[] $els
     * @param $context , see self::fromContext method
     * @return static
     */
    public static function fromElements($els, $context)
    {
        $o = new static($context);
        $o->elements = CrawlerDevTool::domNodeListToArrayOfBDomElements($els);
        return $o;
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS CollectionInterface
    //------------------------------------------------------------------------------/
    /**
     * @param $crawlerQuery
     * @param null $context
     * @return CollectionInterface
     */
    public function find($crawlerQuery, $context = null)
    {
        $this->error("Not implemented yet");
        // convert to xPath,
        // return this->xpath(blabla);
    }

    /**
     * @param $xpath
     * @param null $context
     * @return CollectionInterface
     */
    public function xpath($xpathQuery, $context = null)
    {
        if ($context instanceof BDomElementInterface) {
            $context = $context->domElement();
        }
        if (0 === count($this->elements)) {
            if (null === $context) {
                if (null === $this->defaultContext) {
                    $context = $this->domDocument;
                }
                else {
                    $context = $this->defaultContext;
                }
            }
            $xpath = new \DOMXPath($this->domDocument);
            $els = $xpath->query($xpathQuery, $context);
        }
        else {
            $xpath = new \DOMXPath($this->domDocument);
            $els = [];
            if (null === $context) {
                if (null === $this->defaultContext) {
                    foreach ($this->elements as $el) {
                        $els[] = $xpath->query($xpathQuery, $el->getDomElement());
                    }
                }
                else {
                    foreach ($this->elements as $el) {
                        $els[] = $xpath->query($xpathQuery, $this->defaultContext);
                    }
                }
            }
            else {
                foreach ($this->elements as $el) {
                    $els[] = $xpath->query($xpathQuery, $context);
                }
            }
        }
        return self::fromElements($els, $this->domDocument);
    }

    /**
     * @param callable $callable
     *                  void    callable ( BDomElementInterface )
     * @return static
     */
    public function each(callable $callable)
    {
        foreach ($this->elements as $element) {
            call_user_func($callable, $element);
        }
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new CrawlerException($m);
    }

}
