<?php


namespace CrudGeneratorTools\Util;


use ArrayToString\ArrayToStringTool;
use Bat\FileSystemTool;
use QuickPdo\QuickPdoInfoTool;
use QuickPdo\Util\QuickPdoInfoCacheUtil;

/**
 * Generate default foreignKeyPreferredColumns preferences in $path/auto/$db.php.
 * To override those preferences, manually create $path/manual/$db.php.
 *
 *
 */
class ForeignKeyPreferredColumnUtil
{

    private $cacheDir;
    private $onFileGeneratedCb;

    /**
     * @var $quickPdoInfoCacheUtil QuickPdoInfoCacheUtil
     */
    private $quickPdoInfoCacheUtil;
    private $_useCache;

    public function __construct()
    {
        $this->cacheDir = '/tmp/ForeignKeyPreferredColumnUtil';
        $this->_useCache = true;
    }

    public static function create()
    {
        return new static();
    }

    public function setQuickPdoInfoCacheUtil(QuickPdoInfoCacheUtil $quickPdoInfoCacheUtil)
    {
        $this->quickPdoInfoCacheUtil = $quickPdoInfoCacheUtil;
        return $this;
    }

    public function setOnFileGeneratedCallback(callable $fn)
    {
        $this->onFileGeneratedCb = $fn;
        return $this;
    }


    /**
     * Return the preferred column for a (foreign) table, or false if there is no preferred column
     * for the given table.
     *
     *
     * @param $db
     * @param $table
     * @param bool $useCache
     * @return false|string
     */
    public function getPreferredForeignKey($db, $table)
    {
        $this->prepareQuickPdoInfoCacheUtil();

        $path = $this->cacheDir;
        $autoPath = $this->getAutoFile($db);
        $manualPath = $path . "/manual/$db.php";

        $preferredColumns = [];
        if (file_exists($manualPath)) {
            include $manualPath;
        } else {
            if (false === file_exists($autoPath) || false === $this->_useCache) {
                $this->generatePreferredForeignKey($db, $autoPath);
            }
            include $autoPath;
        }

        if (array_key_exists($table, $preferredColumns)) {
            return $preferredColumns[$table];
        }
        return false;
    }


    public function setUseCache($useCache)
    {
        $this->_useCache = $useCache;
        return $this;
    }


    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
        return $this;
    }

    public function prepareDb($db)
    {
        $this->prepareQuickPdoInfoCacheUtil();
        $autoPath = $this->getAutoFile($db);
        $this->generatePreferredForeignKey($db, $autoPath);
    }

    protected function onFileGenerated($file)
    {
        if (is_callable($this->onFileGeneratedCb)) {
            call_user_func($this->onFileGeneratedCb, $file);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function generatePreferredForeignKey($db, $file)
    {
        $tables = $this->quickPdoInfoCacheUtil->getTables($db);
        $table2Fk = [];
        foreach ($tables as $table) {
            $fkInfos = $this->quickPdoInfoCacheUtil->getForeignKeysInfo($table, $db);
            foreach ($fkInfos as $fkInfo) {

                $fkTable = $fkInfo[1];
                if (!array_key_exists($fkTable, $table2Fk)) {
                    $types = $this->quickPdoInfoCacheUtil->getColumnDataTypes($fkTable, false);
                    foreach ($types as $column => $type) {
                        if ('varchar' === $type) {
                            break;
                        }
                    }
                    $table2Fk[$fkTable] = $column;
                }
            }
        }

        $sArr = ArrayToStringTool::toPhpArray($table2Fk);
        $s = '<?php ' . PHP_EOL . PHP_EOL;
        $s .= '$preferredColumns = ';
        $s .= $sArr . ';' . PHP_EOL . PHP_EOL;
        FileSystemTool::mkfile($file, $s);
        $this->onFileGenerated($file);
    }

    private function prepareQuickPdoInfoCacheUtil()
    {
        if (null === $this->quickPdoInfoCacheUtil) {
            $this->quickPdoInfoCacheUtil = QuickPdoInfoCacheUtil::create();
        }
    }

    private function getAutoFile($db)
    {
        return $this->cacheDir . "/auto/$db.php";
    }

}