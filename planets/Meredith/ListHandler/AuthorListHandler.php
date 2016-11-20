<?php

namespace Meredith\ListHandler;

use Meredith\ListButtonCode\ColvisListButtonCode;
use Meredith\ListButtonCode\DeleteSelectedRowsListButtonCode;
use Meredith\ListPreConfigScript\AuthorListPreConfigScript;

/**
 * LingTalfi 2015-12-28
 */
class AuthorListHandler extends BaseListHandler
{
        
    public function __construct()
    {
        parent::__construct();
        $this->setPreConfigScript(AuthorListPreConfigScript::create()
                ->addHeaderButton(ColvisListButtonCode::create())
                ->addHeaderButton(DeleteSelectedRowsListButtonCode::create())
        );
    }
    
    public function addSmartCosmeticChange($columnName, $cosmeticValue, $isIdentifyingField = false)
    {
        $s = "";
        if (true === $isIdentifyingField) {
            $ridf = 'meredith_cc_' . $columnName; // meredith cosmetic change
            $s .= "$columnName as $ridf, ";
            $this->setRequestIdentifyingField($ridf, $columnName);
        }
        $s .= 'concat( "(", ' . $cosmeticValue . ', ")" ) as ' . $columnName;
        return parent::addCosmeticChange($columnName, $s);
    }
    
    
}