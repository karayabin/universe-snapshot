<?php


namespace Updf\Model;


class FooterModel extends AbstractModel implements FooterModelInterface
{

    private $pageNumber;
    private $nbPageTotal;
    private $footerText;

    public function __construct()
    {
        $this->footerText = "MyCompany - France";
    }


    public function setFooterText($t)
    {
        $this->footerText = $t;
        return $this;
    }

    public function setPageNumber($n)
    {
        $this->pageNumber = $n;
        return $this;
    }

    public function setNbTotalPages($n)
    {
        $this->nbPageTotal = $n;
        return $this;
    }

    public function getVariables()
    {
        return [
            'footer_text' => $this->footerText,
            'page_number' => $this->pageNumber,
            'nb_page_total' => $this->nbPageTotal,
        ];
    }

}