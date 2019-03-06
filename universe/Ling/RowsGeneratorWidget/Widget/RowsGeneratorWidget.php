<?php


namespace Ling\RowsGeneratorWidget\Widget;


use Ling\RowsGenerator\RowsGeneratorInterface;

class RowsGeneratorWidget implements RowsGeneratorWidgetInterface
{


    /**
     * @var RowsGeneratorInterface
     */
    private $rowsGenerator;

    // default values
    private $_nipp;
    private $_page;
    private $_sortValues;
    private $_searchItems;


    public function __construct()
    {
        $this->_nipp = 20;
        $this->_page = 1;
        $this->_sortValues = [];
        $this->_searchItems = [];
    }

    public static function create()
    {
        return new static();
    }

    public function getRows(array $params = [])
    {

        $page = (array_key_exists('page', $params)) ? $params['page'] : $this->_page;
        $nipp = (array_key_exists('nipp', $params)) ? $params['nipp'] : $this->_nipp;
        $sortValues = (array_key_exists('sortValues', $params)) ? $params['sortValues'] : $this->_sortValues;
        $searchItems = (array_key_exists('searchItems', $params)) ? $params['searchItems'] : $this->_searchItems;



        $this->rowsGenerator->setNbItemsPerPage($nipp);
        $this->rowsGenerator->setSortValues($sortValues);
        $this->rowsGenerator->setSearchItems($searchItems);
        $this->rowsGenerator->setPage($page);


        return $this->rowsGenerator->getRows();
    }

    public function getNbPages()
    {

        $nbItems = $this->rowsGenerator->getNbTotalItems();
        $nipp = $this->rowsGenerator->getNbItemsPerPage();

        return ceil($nbItems / $nipp);
    }

    public function getNbItems()
    {
        return $this->rowsGenerator->getNbTotalItems();
    }

    public function getNipp()
    {
        return $this->rowsGenerator->getNbItemsPerPage();
    }

    public function getPage()
    {
        return $this->rowsGenerator->getPage();
    }

    public function getSortValues()
    {
        return $this->rowsGenerator->getSortValues();
    }

    public function getSearchItems()
    {
        return $this->rowsGenerator->getSearchItems();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setRowsGenerator(RowsGeneratorInterface $rowsGenerator)
    {
        $this->rowsGenerator = $rowsGenerator;
        return $this;
    }
}