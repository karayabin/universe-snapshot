<?php


namespace Ling\Bootstrap4AdminTable\RendererWidget;


/**
 * The RelatedLinksRendererWidgetInterface class.
 */
interface RelatedLinksRendererWidgetInterface extends RendererWidgetInterface
{

    /**
     * Sets the links.
     * Each link is an array:
     * - text: the label of the link
     * - url: the url of the link
     * - ?icon: the css class of the icon if any
     *
     * @param array $links
     */
    public function setLinks(array $links);
}