<?php


namespace Models\ListSortBar\Lee;


use Models\ListSortBar\ListSortBarModel;


class LeeListSortBarModel extends ListSortBarModel
{


    private $nbItems;
    private $nameSortItems;
    private $sortItems;
    private $nameSortDir;
    private $valueSortDirAsc;
    private $valueSortDirDesc;
    private $formTrail;
    private $selectedSortDirAsc;
    private $selectedSortDirDesc;
    private $formMethod;


    public function __construct()
    {
        $this->nbItems = 0;
        $this->nameSortItems = 'sort';
        $this->sortItems = [];
        $this->nameSortDir = 'sort-dir';
        $this->valueSortDirAsc = 'asc';
        $this->valueSortDirDesc = 'desc';
        $this->formTrail = '';
        $this->selectedSortDirAsc = true;
        $this->selectedSortDirDesc = false;
        $this->formMethod = 'get';
    }

    public static function create()
    {
        return parent::create();
    }

    /**
     * @param array $name2Label
     * @param array $pool , array of name => value
     * @return LeeListSortBarModel
     */
    public static function createByName2Values(array $name2Label, array $pool)
    {
        $o = new self();
        $sortItems = [];

        $val = null;
        if (array_key_exists($o->nameSortItems, $pool)) {
            $val = $pool[$o->nameSortItems];
        }
        foreach ($name2Label as $name => $label) {
            $selected = ($name === $val);
            $sortItems[] = [
                'value' => $name,
                'selected' => $selected,
                'label' => $label,
            ];
        }
        $o->sortItems = $sortItems;


        $val =null;
        if (array_key_exists($o->nameSortDir, $pool)) {
            $val = $pool[$o->nameSortDir];
        }
        $o->selectedSortDirAsc = ($o->valueSortDirAsc === $val);
        $o->selectedSortDirDesc = ($o->valueSortDirDesc === $val);

        return $o;
    }


    /**
     * @return array
     */
    public function getArray()
    {
        return [
            'nbItems' => $this->nbItems,
            'nameSortItems' => $this->nameSortItems,
            'sortItems' => $this->sortItems,
            'nameSortDir' => $this->nameSortDir,
            'valueSortDirAsc' => $this->valueSortDirAsc,
            'valueSortDirDesc' => $this->valueSortDirDesc,
            'formTrail' => $this->formTrail,
            'selectedSortDirAsc' => $this->selectedSortDirAsc,
            'selectedSortDirDesc' => $this->selectedSortDirDesc,
        ];
    }


    /**
     * @return mixed
     */
    public function getNbItems()
    {
        return $this->nbItems;
    }

    public function setNbItems($nbItems)
    {
        $this->nbItems = $nbItems;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameSortItems()
    {
        return $this->nameSortItems;
    }

    public function setNameSortItems($nameSortItems)
    {
        $this->nameSortItems = $nameSortItems;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSortItems()
    {
        return $this->sortItems;
    }

    public function setSortItems($sortItems)
    {
        $this->sortItems = $sortItems;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameSortDir()
    {
        return $this->nameSortDir;
    }

    public function setNameSortDir($nameSortDir)
    {
        $this->nameSortDir = $nameSortDir;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueSortDirAsc()
    {
        return $this->valueSortDirAsc;
    }

    public function setValueSortDirAsc($valueSortDirAsc)
    {
        $this->valueSortDirAsc = $valueSortDirAsc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueSortDirDesc()
    {
        return $this->valueSortDirDesc;
    }

    public function setValueSortDirDesc($valueSortDirDesc)
    {
        $this->valueSortDirDesc = $valueSortDirDesc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormTrail()
    {
        return $this->formTrail;
    }

    public function setFormTrail($formTrail)
    {
        $this->formTrail = $formTrail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSelectedSortDirAsc()
    {
        return $this->selectedSortDirAsc;
    }

    public function setSelectedSortDirAsc($selectedSortDirAsc)
    {
        $this->selectedSortDirAsc = $selectedSortDirAsc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSelectedSortDirDesc()
    {
        return $this->selectedSortDirDesc;
    }

    public function setSelectedSortDirDesc($selectedSortDirDesc)
    {
        $this->selectedSortDirDesc = $selectedSortDirDesc;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormMethod()
    {
        return $this->formMethod;
    }

    public function setFormMethod($formMethod)
    {
        $this->formMethod = $formMethod;
        return $this;
    }


}