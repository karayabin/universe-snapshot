<?php

namespace Meredith\ListPreConfigScript;

/*
 * LingTalfi 2016-01-05 
 */
use Meredith\ListButtonCode\ListButtonCodeInterface;
use Meredith\MainController\MainControllerInterface;

class AuthorListPreConfigScript implements ListPreConfigScriptInterface
{


    private $headerButtons;
    private $lengthMenu;
    private $pageLength;

    public function __construct()
    {
        $this->headerButtons = [];
        $this->lengthMenu = [];
    }

    public static function create()
    {
        return new static();
    }


    public function render(MainControllerInterface $mc)
    {
        $f = __DIR__ . "/AuthorListPreConfigScript/preconfig-script.php";
        $buttons = $this->headerButtons; // variable for template
        $lengthMenu = $this->lengthMenu;
        $pageLength = $this->pageLength;
        ob_start();
        require_once $f;
        return ob_get_clean();
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function addHeaderButton(ListButtonCodeInterface $b)
    {
        $this->headerButtons[] = $b;
        return $this;
    }


    /*
     * Sets the datatable lengthMenu options.
     * 
     * If value is -1, it means display all items.
     * @param array $values2Labels
     */
    public function setLengthMenu(array $values2Labels)
    {
        $this->lengthMenu = [array_keys($values2Labels), array_values($values2Labels)];
        return $this;
    }

    public function setPageLength($pageLength)
    {
        $this->pageLength = $pageLength;
        return $this;
    }
    

}
