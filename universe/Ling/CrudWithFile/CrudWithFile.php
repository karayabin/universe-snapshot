<?php


namespace Ling\CrudWithFile;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\FileSystemTool;
use Ling\CrudWithFile\Exception\CrudWithFileException;

class CrudWithFile implements CrudWithFileInterface
{
    private $ric;
    private $ricSeparator;
    private $file;


    public function __construct($file, array $ric)
    {
        $this->file = $file;
        $this->ric = $ric;
        $this->ricSeparator = '+--ric_separator--+';
    }

    public static function create($file, array $ric)
    {
        return new static($file, $ric);
    }

    public function insert(array $newRow)
    {
        $rows = $this->readRows();
        $rows[] = $newRow;
        return $this->writeRows($rows);
    }

    public function update($ric, array $newRow)
    {
        if (false !== ($index = $this->findIndex($ric))) {
            $rows = $this->readRows();
            $rows[$index] = $newRow;
            $this->writeRows($rows);
        } else {
            $this->error("no matching index with the given ric: $ric");
        }
        return true;
    }

    public function delete($ric)
    {
        if (false !== ($index = $this->findIndex($ric))) {
            $rows = $this->readRows();
            unset($rows[$index]);
            $this->writeRows($rows);
        } else {
            $this->error("no matching index with the given ric: $ric");
        }
        return true;
    }

    public function getRows()
    {
        $rows = $this->readRows();
        return $rows;
    }

    public function getRow($ric)
    {
        if (false !== ($index = $this->findIndex($ric))) {
            $rows = $this->readRows();
            return $rows[$index];
        }
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function findIndex($ric)
    {
        $rows = $this->readRows();
        foreach ($rows as $i => $row) {
            if (true === $this->matchRow($ric, $row)) {
                return $i;
            }
        }
        return false;
    }

    private function matchRow($ric, array $row)
    {
        $p = explode($this->ricSeparator, $ric);
        if (count($p) === count($this->ric)) {
            $ricVals = array_combine($this->ric, $p);
            foreach ($ricVals as $col => $val) {
                if (false === array_key_exists($col, $row) || $val !== $row[$col]) {
                    return false;
                }
            }
        } else {
            $this->error("Count of ric values and ric string not equal");
            return false;
        }
        return true;
    }

    private function readRows()
    {
        $rows = [];
        if (file_exists($this->file)) {
            include $this->file;
        }
        return $rows;
    }

    private function writeRows(array $rows)
    {
        $c = "<?php\n";
        $c .= '$rows = ';
        $c .= ArrayToStringTool::toPhpArray($rows);
        $c .= ";\n\n";
        FileSystemTool::mkfile($this->file, $c);
    }

    private function error($msg)
    {
        throw new CrudWithFileException($msg);
    }
}