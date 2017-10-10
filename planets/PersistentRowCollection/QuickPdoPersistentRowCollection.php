<?php


namespace PersistentRowCollection;


use FormModel\Control\HiddenInputControl;
use FormModel\Control\InputTextControl;
use FormModel\FormModel;
use FormModel\FormModelInterface;
use FormModel\Validation\ControlsValidator\ControlsValidator;
use PersistentRowCollection\Exception\PersistentRowCollectionException;
use PersistentRowCollection\Util\PersistentRowCollectionHelper;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoStmtTool;
use RowsGenerator\QuickPdoRowsGenerator;

abstract class QuickPdoPersistentRowCollection implements InteractivePersistentRowCollectionInterface
{


    protected $table;
    protected $fields;
    protected $query;


    public function __construct()
    {
        //
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function create(array $row)
    {
        if (false !== ($lastInsertId = QuickPdo::insert($this->table, $row))) {
            $ric = $this->getRic();
            $ret = [];
            if (null !== ($aic = $this->getAutoIncrementedColumn())) {
                $ret[$aic] = $lastInsertId;
            } else {
                foreach ($ric as $column) {
                    if (array_key_exists($column, $row)) {
                        $ret[$column] = $row[$column];
                    } else {
                        throw new PersistentRowCollectionException("The given row doesn't contain the column named $column");
                    }
                }
            }
            return $ret;
        }
        throw new PersistentRowCollectionException("Couldn't insert row");
    }


    public function read(&$page, $nipp, array $searchValues = [], array $sortValues = [], &$nbTotalItems = 0)
    {
        $g = QuickPdoRowsGenerator::create()
            ->setFields($this->fields)
            ->setQuery($this->query)
            ->setPage($page)
            ->setSortValues($sortValues)
            ->setSearchItems($searchValues)
            ->setNbItemsPerPage($nipp);

        $ret = $g->getRows();
        $page = $g->getPage();
        $nbTotalItems = $g->getNbTotalItems();
        return $ret;
    }


    public function readByRic($ric)
    {
        $fields = PersistentRowCollectionHelper::combineRic($ric, $this->getRic());
        $markers = [];
        $stmt = sprintf($this->query, $this->fields);
        QuickPdoStmtTool::addWhereEqualsSubStmt($fields, $stmt, $markers, $this->table . ".");
        return QuickPdo::fetch($stmt, $markers);
    }

    public function update(array $ric, array $newRow)
    {
        $where = [];
        foreach ($ric as $k => $v) {
            $where[] = [$k, '=', $v];
        }
        QuickPdo::update($this->table, $newRow, $where);
    }

    public function delete(array $ric)
    {
        $where = [];
        foreach ($ric as $k => $v) {
            $where[] = [$k, '=', $v];
        }
        QuickPdo::delete($this->table, $where);
    }


    public function getForm($type, $ric = null)
    {

        $validator = ControlsValidator::create()
//            ->setTests("reference_lf", "reference_lf", [
//                RequiredControlTest::create(),
//                MinCharControlTest::create()->min(5),
//            ])
        ;


        $m = $this->getFormModelInstance();
        if ($m instanceof FormModel) {

            $m->setValidator($validator);
            if ('update' === $type) {
                if (null !== ($aic = $this->getAutoIncrementedColumn())) {
                    $m->addControl($aic, InputTextControl::create()
                        ->addHtmlAttribute(null, "readonly")
                        ->label($aic)
                        ->name($aic)
                    );
                }
                $m->addControl("ric", HiddenInputControl::create()
                    ->setValue($ric)
                    ->label("ric")
                    ->name("ric")
                );
            }
        }
        $this->decorateFormModelValidator($validator);
        $this->decorateFormModel($m);
        return $m;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getAutoIncrementedColumn()
    {
        return null;
    }

    protected function decorateFormModelValidator(ControlsValidator $validator)
    {

    }

    protected function decorateFormModel(FormModel $model)
    {

    }

    /**
     * @return FormModelInterface
     */
    protected function getFormModelInstance()
    {
        return FormModel::create();
    }
}