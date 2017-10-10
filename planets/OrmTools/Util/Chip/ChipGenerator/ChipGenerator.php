<?php


namespace OrmTools\Util\Chip\ChipGenerator;

use Bat\CaseTool;
use Bat\FileSystemTool;
use OrmTools\Helper\OrmToolsHelper;


/**
 * Chip generator.
 *
 * Help:
 * - See howto in the ChipDescription source comments
 * - see the chip-generator.php pseudo code example
 * - see the chip definition in ekom todo: rappatriate chip definition somewhere...
 */
class ChipGenerator
{

    /**
     * The base dir where all chips will be created
     */
    private $targetDir;
    /**
     * The namespace corresponding to the targetDir
     */
    private $targetNamespace;

    /**
     * contextual helper for writing use statements
     */
    private $_statements;


    public static function create()
    {
        return new static();
    }


    public function setTargetDir($targetDir)
    {
        $this->targetDir = $targetDir;
        return $this;
    }

    public function setTargetNamespace($targetNamespace)
    {
        $this->targetNamespace = $targetNamespace;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function newChip($name, ChipDescription $chipDescription)
    {
        $this->_statements = []; // prepare the statements collector


        $namespace = $this->targetNamespace;
        $chipClassName = CaseTool::snakeToFlexiblePascal($name) . 'Chip';
        $targetFile = $this->targetDir . "/$chipClassName.php";


        $tables = $chipDescription->getTables();
        $columnsInfo = $this->getColumnsInfo($tables, $chipDescription);
//        az($columnsInfo);


        $sProps = OrmToolsHelper::renderClassPropertiesDeclaration($columnsInfo);
        $sConstructor = OrmToolsHelper::renderConstructorInit($columnsInfo);
        $sAccessors = $this->computeAccessors($columnsInfo);
        $sStatements = OrmToolsHelper::renderStatements($this->_statements);


        $tpl = file_get_contents(__DIR__ . "/ChipTemplate.tpl.php");
        $tpl = str_replace([
            'Module\\EkomEvents\\Chip\\Event', // namespace
            'EventChip', // className
            '// define properties', // private $location;
            '// constructor init', // constructor init
            '// getters/setters',
            '// use statements',
        ], [
            $namespace,
            $chipClassName,
            $sProps,
            $sConstructor,
            $sAccessors,
            $sStatements,
        ], $tpl);


//        header("content-type: text/plain");
//        a($tpl);


        FileSystemTool::mkfile($targetFile, $tpl);
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    private function getColumnsInfo(array $tables, ChipDescription $desc)
    {
        $ret = [];
        $ignoreCols = $desc->getIgnoreColumns();
        $realLinkColumns = $desc->getLinkColumns();
        $transformers = $desc->getTransformerColumns();
        $children = $desc->getChildrenColumns();
        $columns = $desc->getColumns();
        $chKeys = [];
        foreach ($children as $child) {

            $path = $child[1];
            if (false !== strpos($path, '\\')) {
                $this->_statements[] = $path;
            } else {
                $path .= 'Chip';
            }

            $hint = $path . '[]';
            $child = $child[0];
            if (is_array($child)) {
                $singular = $child[0];
                $child = $child[1]; // take plural form
            } else {
                $singular = $child;
                if ('s' === substr($singular, -1)) {
                    $singular = substr($singular, 0, -1);
                }
            }
            $chKeys[$child] = [$hint, $singular];
        }

        $def = OrmToolsHelper::getPhpDefaultValuesByTables($tables);

        $linkCols = []; // colName => propertyName
        foreach ($realLinkColumns as $linkColumn) {
            $linkCols[$linkColumn[0]] = [$linkColumn[1], $linkColumn[2]];
            /**
             * addLink can also create a new column (if the
             * column does not exist)
             */
            if (false === array_key_exists($linkColumn[0], $def)) {
                $def[$linkColumn[0]] = null;
            }
        }


        foreach ($columns as $col => $defaultValue) {
            $def[$col] = $defaultValue;
        }


        foreach ($def as $col => $value) {


            $type = 'default';
            $hint = null;
            /**
             * ignoring ignore columns
             */
            if (in_array($col, $ignoreCols)) {
                continue;
            } elseif (array_key_exists($col, $transformers)) {
                $type = 'transformer';
                $value = $transformers[$col][1];
                if (is_array($value)) {
                    if (array_key_exists('hint', $value)) {
                        $hint = $value['hint'];
                        $p = explode('\\', $hint);
                        if (count($p) > 1) {
                            $this->_statements[] = $hint;
                            $hint = array_pop($p);
                        }

                    }
                    if (array_key_exists('default', $value)) {
                        $value = $value['default'];
                    } else {
                        $value = null;
                    }
                }
                $col = $transformers[$col][0];
            } /**
             * linked columns also transform the column name
             */
            elseif (array_key_exists($col, $linkCols)) {
                $path = $linkCols[$col][1];
                $col = $linkCols[$col][0];
                if (null === $path) {
                    $pascal = CaseTool::snakeToFlexiblePascal($col);
                    $path = $pascal;
                }
                if (false === strpos($path, '\\')) {
                    $path .= 'Chip';
                } else { // external path
                    $this->_statements[] = $path;
                }
                $type = 'link';
                $hint = $path;
                $value = null;
            }

            $ret[$col] = [
                'type' => $type,
                'default' => $value,
                'hint' => $hint,
            ];
        }


        foreach ($chKeys as $col => $info) {
            list($hint, $singular) = $info;
            $ret[$col] = [
                'type' => 'children',
                'default' => [],
                'hint' => $hint,
                'singular' => $singular,
            ];
        }
        return $ret;
    }




    private function computeAccessors(array $colsInfo)
    {
        $s = '' . PHP_EOL;
        $sp = str_repeat(' ', 4);
        $sp2 = str_repeat(' ', 8);

        foreach ($colsInfo as $col => $info) {


            $pascal = CaseTool::snakeToFlexiblePascal($col);

            $hint = $info['hint'];
            if (null !== $hint) {
                OrmToolsHelper::renderHint($s, $hint, $sp, 'return');
            }

            $fnName = "get" . $pascal;
            $s .= $sp . 'public function ' . $fnName . '()' . PHP_EOL;
            $s .= $sp . '{' . PHP_EOL;
            $s .= $sp2 . 'return $this->' . $col . ';' . PHP_EOL;
            $s .= $sp . '}' . PHP_EOL;
            $s .= PHP_EOL;


            $model = 'default';
            if (null !== $hint) {
                if (']' === substr($hint, -1)) {
                    $model = 'oneToMany';
                } else {
                    $model = 'oneToOne';
                }
            }


            switch ($model) {
                case "oneToMany":
                    $pascal = CaseTool::snakeToFlexiblePascal($info['singular']);
                    $fnName = "add" . $pascal;
                    $s .= $sp . 'public function ' . $fnName . '(';
                    $objectHint = rtrim($hint, '[]');
                    $s .= $objectHint . ' ';
                    $s .= '$' . $info['singular'] . ')' . PHP_EOL;
                    $s .= $sp . '{' . PHP_EOL;
                    $s .= $sp2 . '$this->' . $col . '[] = $' . $info['singular'] . ';' . PHP_EOL;
                    $s .= $sp2 . 'return $this;' . PHP_EOL;
                    break;
                default:
                    $fnName = "set" . $pascal;
                    $s .= $sp . 'public function ' . $fnName . '(';

                    if ('oneToOne' === $model) {
                        $objectHint = rtrim($hint, '[]');
                        $s .= $objectHint . ' ';
                    }

                    $s .= '$' . $col . ')' . PHP_EOL;
                    $s .= $sp . '{' . PHP_EOL;
                    $s .= $sp2 . '$this->' . $col . ' = $' . $col . ';' . PHP_EOL;
                    $s .= $sp2 . 'return $this;' . PHP_EOL;
                    break;
            }


            $s .= $sp . '}' . PHP_EOL;
            $s .= PHP_EOL;
        }
        return $s;
    }


}