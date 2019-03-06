<?php


namespace Ling\NaturallySimpleXmlElement;

/**
 * http://php.net/manual/en/simplexmlelement.addchild.php#104458
 */
class NaturallySimpleXmlElement extends \SimpleXMLElement
{


    /**
     * Create a child with CDATA value
     * @param string $name The name of the child element to add.
     * @param string $cdata_text The CDATA value of the child element.
     */
    public function addChildCData($name, $cdata_text)
    {
        $child = $this->addChild($name);
        $child->addCData($cdata_text);
    }

    /**
     * This method is here just to help the IDE provide consistent methods auto-completion.
     *
     *
     * @param string $name
     * @param null $value
     * @param null $namespace
     * @return NaturallySimpleXmlElement|void
     */
    public function addChild($name, $value = null, $namespace = null)
    {
        return parent::addChild($name, $value, $namespace);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Add CDATA text in a node
     * @param string $cdata_text The CDATA value  to add
     */
    private function addCData($cdata_text)
    {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($cdata_text));
    }
}