<?php


namespace Ling\ListParams\Controller;


use Ling\Bat\UriTool;
use Ling\ListParams\ListParamsInterface;
use Ling\ListParams\Util\ListParamsUtil;


/**
 *
 * This class is basically an adapted implementation of the ListSortBar
 * (https://github.com/lingtalfi/Models/blob/master/ListSortBar/ListSortBarModel.php)
 * for the ListParams environment.
 *
 *
 * The widget represented is originally a form containing two elements:
 *
 * - the sort selector
 * - the sort dir selector
 *
 * When the user updates any of the two selectors,
 * it submits the form (by default using the get method), which has the effect of sorting the list.
 *
 *
 *
 *
 *
 *
 * The following params are used:
 *
 * - formMethod: string (get|post)
 * - formTrail: string
 * - nameSort: string
 * - nameSortDir: string
 * - sortItems: array
 *      - (item)
 *          - value: string
 *          - label: string|null.
 *                      If null, the translated version of the value will be used.
 *          - selected: bool
 * - valueSortDirAsc: string
 * - valueSortDirDesc: string
 * - selectedSortDirAsc: bool
 * - selectedSortDirDesc: bool
 *
 *
 *
 *
 */
class SortFrame implements SortFrameInterface
{

    private $formMethod;
    private $formTrail;
    //
    private $nameSort;
    private $nameSortDir;
    private $sortItems;
    private $valueSortDirAsc;
    private $valueSortDirDesc;
    private $selectedSortDirAsc;
    private $selectedSortDirDesc;


    public function __construct()
    {
        $this->formMethod = 'get';
        $this->formTrail = '';
        //
        $this->nameSort = 'sort';
        $this->nameSortDir = 'asc';
        $this->sortItems = [];
        $this->valueSortDirAsc = '1';
        $this->valueSortDirDesc = '0';
        $this->selectedSortDirAsc = true;
        $this->selectedSortDirDesc = false;
    }


    public static function createByLabels(array $value2Label, ListParamsInterface $params)
    {
        return self::createByOptions([
            'nameSort' => $params->getNameSort(),
            'nameSortDir' => $params->getNameSortDir(),
            'pool' => $params->getPool(),
            'value2Label' => $value2Label,
            'formMethod' => $params->getPoolType(),
            //
            'formTrail' => ListParamsUtil::getFormTrail($params->getPool(), $params, "sort"),
        ]);
    }


    public static function createByOptions(array $options)
    {

        $options = array_replace([
            'nameSort' => 'sort',
            'nameSortDir' => 'asc',
            'pool' => [],
            'value2Label' => [],
            'formMethod' => 'get',
            //
            'formTrail' => '',
        ], $options);



        $o = new self();

        $nameSort = $options['nameSort'];
        $nameSortDir = $options['nameSortDir'];
        $pool = $options['pool'];


        $o->nameSort = $nameSort;
        $o->nameSortDir = $nameSortDir;


        $val = null;
        if (array_key_exists($nameSort, $pool)) {
            $val = $pool[$nameSort];
        }
        $sortItems = [];
        foreach ($options['value2Label'] as $value => $label) {
            $selected = ($value === $val);
            $sortItems[] = [
                'value' => $value,
                'selected' => $selected,
                'label' => $label,
            ];
        }
        $o->sortItems = $sortItems;


        $val = null;
        if (array_key_exists($nameSortDir, $pool)) {
            $val = $pool[$nameSortDir];
        }

        /**
         * Note: ListParams doesn't provide the valueSortDirAsc/Desc,
         * so we rely on convention (1=asc, 0=desc).
         * Is that a good idea?
         */
        $o->selectedSortDirAsc = ($o->valueSortDirAsc === $val);
        $o->selectedSortDirDesc = ($o->valueSortDirDesc === $val);


        $o->formMethod = $options['formMethod'];
        $o->formTrail = $options['formTrail'];


        return $o;
    }


    /**
     * @return array
     */
    public function getArray()
    {
        return [
            'formMethod' => $this->formMethod,
            'formTrail' => $this->formTrail,
            'nameSort' => $this->nameSort,
            'nameSortDir' => $this->nameSortDir,
            'sortItems' => $this->sortItems,
            'valueSortDirAsc' => $this->valueSortDirAsc,
            'valueSortDirDesc' => $this->valueSortDirDesc,
            'selectedSortDirAsc' => $this->selectedSortDirAsc,
            'selectedSortDirDesc' => $this->selectedSortDirDesc,
        ];
    }


    /**
     * @return mixed
     */
    public function getNameSort()
    {
        return $this->nameSort;
    }

    public function setNameSort($nameSort)
    {
        $this->nameSort = $nameSort;
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
     * @return array
     */
    public function getSortItems()
    {
        return $this->sortItems;
    }

    public function setSortItems(array $sortItems)
    {
        $this->sortItems = $sortItems;
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