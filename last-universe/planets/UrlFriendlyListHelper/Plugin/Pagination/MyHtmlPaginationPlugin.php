<?php

namespace UrlFriendlyListHelper\Plugin\Pagination;

/*
 * LingTalfi 2015-11-01
 * 
 * This example plugin displays $width pagination links.
 * 
 */


use Bat\StringTool;
use UrlFriendlyListHelper\ItemGenerator\ItemGeneratorInterface;
use UrlFriendlyListHelper\Plugin\BaseListHelperPlugin;

class MyHtmlPaginationPlugin extends BaseListHelperPlugin
{

    private $width;
    private $activeLinkAttr;

    /**
     * @var ItemGeneratorInterface
     */
    private $generator;

    public function __construct()
    {
        parent::__construct();
        $this->width = 5;
        $this->activeLinkAttr = ['class' => 'active'];
        $this->pluginParams['nbItemsPerPage'] = 10;
    }

    public static function create()
    {
        return new static();
    }

    public function renderHtml()
    {
        $s = '';
        $currentPage = (int)$this->widgetParams['page'];
        if ($currentPage < 1) {
            $currentPage = 1;
        }
        $nbTotalPages = (int)ceil($this->generator->getNbTotalItems() / $this->pluginParams['nbItemsPerPage']);
        if ($currentPage > $nbTotalPages) {
            $currentPage = $nbTotalPages;
        }

        $concreteName = $this->getConcreteName('page');


        $s .= $this->getLink($concreteName, 1, false);
        $start = $currentPage - (int)floor($this->width / 2);
        $end = $start + $this->width;
        if ($nbTotalPages > 0) {
            $s .= ' ... ';

            for ($i = $start; $i < $end; $i++) {
                if ($i > 1 && $i < $nbTotalPages) {

                    if ($start !== $i) {
                        $s .= ' | ';
                    }
                    $s .= $this->getLink($concreteName, $i, ($i === $currentPage));
                }
            }
            $s .= ' ... ';
            $s .= $this->getLink($concreteName, $nbTotalPages, false);
        }


        return $s;
    }

    public function meetGenerator(ItemGeneratorInterface $g)
    {
        $this->generator = $g;
    }


    public function getDefaultWidgetParameters()
    {
        return [
            'page' => 1,
        ];
    }


    public function setNbItemsPerPage($nbItemsPerPage)
    {
        $this->pluginParams['nbItemsPerPage'] = $nbItemsPerPage;
        return $this;
    }


    public function setActiveLinkAttr(array $activeLinkAttr)
    {
        $this->activeLinkAttr = $activeLinkAttr;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getLink($concreteName, $i, $isActive)
    {
        $sActive = '';
        if (true === $isActive) {
            $sActive = StringTool::htmlAttributes($this->activeLinkAttr);
        }

        $href = $this->listHelper->getRouter()->getUrl([$concreteName => $i]);

        return '<a href="' . htmlspecialchars($href) . '"' . $sActive . '>' . $i . '</a>';
    }

}
