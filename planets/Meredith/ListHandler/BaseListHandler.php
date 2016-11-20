<?php

namespace Meredith\ListHandler;

use Bat\CaseTool;
use Meredith\ContentTransformer\ContentTransformerInterface;
use Meredith\Exception\MeredithException;
use Meredith\ListPreConfigScript\ListPreConfigScriptInterface;
use Meredith\MainController\MainControllerInterface;
use Meredith\OnModalOpenAfter\OnModalOpenAfterInterface;

/**
 * LingTalfi 2015-12-28
 */
class BaseListHandler implements ListHandlerInterface
{
    private $contentTransformers;
    private $onModalOpenAfter;
    private $preConfig;

    /**
     * @var array of column
     *          column:
     *              0: str:name
     *              1: bool:hasContent (true)
     *              2: str:label (null=auto)
     *
     * the hasContent property means that the column is generated from the database,
     * as opposed to manually rendered (like an action column for instance)
     */
    private $columns;
    private $notOrderable;
    private $notSortable;
    //
    private $mainAlias;
    private $name2cosmetic;
    private $from;
    private $where;
    private $onFetchAfterCb;
    private $requestIdentifyingFields;

    public function __construct()
    {
        $this->contentTransformers = [];
        $this->columns = [];
        $this->notOrderable = [];
        $this->notSearchable = [];
        $this->name2cosmetic = [];
    }

    public static function create()
    {
        return new static();
    }


    public function addColumn($name, $hasContent = true, $label = null)
    {
        if (null === $label) {
            $label = $this->getAutoLabel($name);
        }
        $this->columns[] = [
            $name,
            $hasContent,
            $label,
        ];
        return $this;
    }

    public function getColumnLabels()
    {
        $ret = [];
        foreach ($this->columns as $info) {
            $ret[] = $info[2];
        }
        return $ret;
    }

    public function getColumnNames2Types()
    {
        $ret = [];
        foreach ($this->columns as $info) {
            $ret[$info[0]] = $info[1];
        }
        return $ret;
    }

    public function getColumns()
    {
        $ret = [];
        foreach ($this->columns as $info) {
            $ret[] = $info[0];
        }
        return $ret;
    }

    public function getOrderableColumns()
    {
        $ret = [];
        foreach ($this->columns as $info) {
            if (true === $info[1]) { // only columns with content will possibly be searchable or orderable
                if (!in_array($info[0], $this->notOrderable, true)) {
                    $ret[] = $info[0];
                }
            }
        }
        return $ret;
    }

    /**
     * @return ListPreConfigScriptInterface
     */
    public function getPreConfigScript()
    {
        return $this->preConfig;
    }


    public function getSearchableColumns()
    {
        $ret = [];
        foreach ($this->columns as $info) {
            if (true === $info[1]) { // only columns with content will possibly be searchable or orderable
                if (!in_array($info[0], $this->notSearchable, true)) {
                    $ret[] = $info[0];
                }
            }
        }
        return $ret;
    }


    public function getContentTransformers()
    {
        return $this->contentTransformers;
    }


    /**
     * @return OnModalOpenAfterInterface
     */
    public function getOnModalOpenAfter()
    {
        return $this->onModalOpenAfter;
    }

    /**
     * @return string|null
     */
    public function getMainAlias()
    {
        return $this->mainAlias;
    }

    /**
     * Return the cosmetic fields aware from clause
     *
     * @param MainControllerInterface $mc
     * @return string
     */
    public function getFrom(MainControllerInterface $mc)
    {
        if (null !== $this->from) {
            return $this->from;
        }
        return $mc->getReferenceTable();
    }

    /**
     * @return array of fields to use in the sql request:
     *              those fields are aware of aliases.
     *              Unchanged fields are returned with the alias prefix,
     *              and cosmetic fields are returned as is
     */
    public function getRequestFields()
    {
        $ret = [];
        $prefix = '';
        if (null !== $this->mainAlias) {
            $prefix = $this->mainAlias . ".";
        }
        foreach ($this->columns as $info) {
            if (true === $info[1]) {
                if (array_key_exists($info[0], $this->name2cosmetic)) {
                    $ret[] = $this->name2cosmetic[$info[0]];
                }
                else {
                    $ret[] = $prefix . $info[0];
                }
            }
        }
        return $ret;
    }

    /**
     * @return string|null
     */
    public function getWhere()
    {
        return $this->where;
    }


    public function onFetchAfter(array &$info, array $idf)
    {
        if (null !== $this->onFetchAfterCb) {
            call_user_func_array($this->onFetchAfterCb, [&$info, $idf]);
        }
    }

    public function getRequestIdentifyingFields()
    {
        return $this->requestIdentifyingFields;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /*
     * target: int|string, position or name of the column
     */
    public function setContentTransformer($target, ContentTransformerInterface $contentTransformer)
    {
        if (is_string($target)) {
            $target = $this->columnToTarget($target);
        }
        $this->contentTransformers[$target] = $contentTransformer;
        return $this;
    }


    public function setOnModalOpenAfter(OnModalOpenAfterInterface $onModalOpenAfter)
    {
        $this->onModalOpenAfter = $onModalOpenAfter;
        return $this;
    }

    public function setPreConfigScript(ListPreConfigScriptInterface $preConfig)
    {
        $this->preConfig = $preConfig;
        return $this;
    }


    public function setNotOrderable(array $notOrderable)
    {
        $this->notOrderable = $notOrderable;
        return $this;
    }

    public function setNotSortable(array $notSortable)
    {
        $this->notSearchable = $notSortable;
        return $this;
    }

    public function setMainAlias($mainAlias)
    {
        $this->mainAlias = $mainAlias;
        return $this;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }


    public function addCosmeticChange($columnName, $cosmeticValue)
    {
        $this->name2cosmetic[$columnName] = $cosmeticValue;
        return $this;
    }

    public function setWhere($where)
    {
        $this->where = $where;
        return $this;
    }

    public function setOnFetchAfterCb(callable $onFetchAfterCb)
    {
        $this->onFetchAfterCb = $onFetchAfterCb;
        return $this;
    }

    public function setRequestIdentifyingFields(array $requestIdentifyingFields)
    {
        $this->requestIdentifyingFields = $requestIdentifyingFields;
        return $this;
    }

    public function setRequestIdentifyingField($requestIdf, $effectiveIdf)
    {
        $this->requestIdentifyingFields[$requestIdf] = $effectiveIdf;
        return $this;
    }




    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getAutoLabel($s)
    {
        return ucfirst(strtolower(CaseTool::unsnake($s)));
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function columnToTarget($str)
    {
        $c = 0;
        foreach ($this->columns as $v) {
            if ($str === $v[0]) {
                return $c;
            }
            $c++;
        }
        throw new MeredithException("Target $str cannot resolve to an existing column index");
    }


}