<?php


namespace Kamille\Utils\Morphic\Generator2;


use Bat\CaseTool;
use Bat\StringTool;
use Kamille\Services\XLog;
use Kamille\Utils\Morphic\Generator2\ModuleMorphicGenerator2;
use QuickPdo\QuickPdoInfoTool;


class LingFrenchMorphicGenerator2 extends ModuleMorphicGenerator2
{
    protected $colTranslationFiles;
    protected $tableTranslationFiles;


    public function __construct()
    {
        parent::__construct();
        $this->tableTranslationFiles = [];
        $this->colTranslationFiles = [];
    }

    public function setColTranslationFiles(array $colTranslationFiles)
    {
        $this->colTranslationFiles = $colTranslationFiles;
        return $this;
    }

    public function setTableTranslationFiles(array $tableTranslationFiles)
    {
        $this->tableTranslationFiles = $tableTranslationFiles;
        return $this;
    }

    protected function getRelatedTablesLabel()
    {
        return "Tables liées";
    }

    protected function getControllerBackToListText(array $tableInfo)
    {
        return "Retour à la liste des " . $tableInfo['labelPlural'];
    }

    protected function getControllerNewListItemText(array $tableInfo)
    {
        $sGenre = ($tableInfo['genre'] === 'm') ? 'un nouveau' : 'une nouvelle';
        return "Ajouter $sGenre " . $tableInfo['label'];
    }

    protected function decorateTableInfo(array &$tableInfo)
    {
        $table = $tableInfo['table'];
        $prefix = $tableInfo['prefix'];


        $label = null;
        if (array_key_exists($prefix, $this->tableTranslationFiles)) {
            $file = $this->tableTranslationFiles[$prefix];
            if (file_exists($file)) {
                $xmlstr = file_get_contents($file);
                $cols = new \SimpleXMLElement($xmlstr);
                $itemNodes = $cols->xpath('/infos/item[@table="' . $table . '"]');
                if ($itemNodes) {
                    $itemNode = $itemNodes[0];
                    $label = (string)$itemNode->label;
                    $labelPlural = (string)$itemNode->labelPlural;
                    $article = (string)$itemNode->article;
                    $genre = (string)$itemNode->genre;
                }
            } else {
                XLog::error("[Kamille.LingFrenchMorphicGenerator2]: xml table file not found: $file");
            }
        }

        if (null === $label) {
            $prettyName = $this->getNameByTable($table);
            $label = str_replace("_", ' ', $prettyName);
            $labelPlural = StringTool::getPlural($label);
            $genre = '?';
            $article = '?';
        }
        $tableInfo['genre'] = $genre;
        $tableInfo['article'] = $article;
        $tableInfo['label'] = $label;
        $tableInfo['labelPlural'] = $labelPlural;
    }


    protected function identifierToLabel($identifier, $table, array $tableInfo)
    {
        return ucfirst($this->getColumnLabelFromName($identifier, $table, $tableInfo));
    }


    protected function getControllerNewItemBtnText(array $tableInfo)
    {
        $sGenre = ($tableInfo['genre'] === 'm') ? 'un nouveau' : 'une nouvelle';
        $label = $tableInfo['label'];
        return "Ajouter $sGenre $label";
    }

    protected function getRowActionUpdateForeignRecord(array $tableInfo)
    {
        return "Voir la fiche " . $this->getDuMachin($tableInfo);
    }


    protected function getColumnLabelFromName($colName, $table, array $tableInfo)
    {

        $prefix = $tableInfo['prefix'];

        $label = null;
        if (array_key_exists($prefix, $this->colTranslationFiles)) {
            $file = $this->colTranslationFiles[$prefix];
            if (file_exists($file)) {
                $xmlstr = file_get_contents($file);
                $cols = new \SimpleXMLElement($xmlstr);
                $nameNodes = $cols->xpath('/cols/item/name[text()="' . $colName . '"]');
                if ($nameNodes) {
                    $nameNode = $nameNodes[0];
                    $itemNode = $nameNode->xpath('..')[0];
                    $label = (string)$itemNode->value;
                }
            } else {
                XLog::error("[Kamille.LingFrenchMorphicGenerator2]: xml cols file not found: $file");
            }
        }

        if (null === $label) {
            $label = str_replace('_', ' ', $colName);
        }
        return $label;
    }

    protected function getFormInsertSuccessMessage(array $tableInfo, $table, $label)
    {
        if ('?' === $tableInfo['genre'] || '?' === $tableInfo['article']) {
            return "Le/la " . $label . " a bien été ajouté(e)";
        }
        $last = ("m" === $tableInfo['genre']) ? 'ajouté' : 'ajoutée';
        $article = ucfirst($tableInfo['article']);
        if ('Le' === $article || "La" === $article) {
            $article .= ' ';
        }

        return $article . $label . " a bien été $last";
    }

    protected function getFormUpdateSuccessMessage(array $tableInfo, $table, $label)
    {
        if ('?' === $tableInfo['genre'] || '?' === $tableInfo['article']) {
            return "Le/la " . $label . " a bien été mis(e) à jour";
        }
        $last = ("m" === $tableInfo['genre']) ? 'mis à jour' : 'mise à jour';
        $article = ucfirst($tableInfo['article']);
        if ('Le' === $article || "La" === $article) {
            $article .= ' ';
        }
        return $article . $label . " a bien été $last";
    }

    protected function getFormInsertStatement(array $tableInfo, $table, $insertCols)
    {
        $object = $this->getXiaoObjectName($table);
        if (false === $object) {
            return parent::getFormInsertStatement($tableInfo, $table, $insertCols);
        }

        return <<<EEE
            \$o = new $object();
            \$ric = \$o->create(\$fData, false, true);
EEE;
    }

    protected function getFormUpdateStatement(array $tableInfo, $table, $updateCols, $updateWhere, array $updateWhereCols)
    {
        $object = $this->getXiaoObjectName($table);
        if (false === $object) {
            return parent::getFormUpdateStatement($tableInfo, $table, $updateCols, $updateWhere, $updateWhereCols);
        }

        $s = '';
        $indent = "\t\t\t\t";
        foreach ($updateWhereCols as $col) {
            $s .= PHP_EOL . $indent . '"' . $col . '" => $' . $col . ',';

        }

        return <<<EEE
            \$o = new $object();
            \$o->update(\$fData, [$s            
            ]);
EEE;
    }

    protected function getForeignKeyExtraLinkText($label, array $tableInfo, array $fkTableInfo)
    {
        $sGenre = ($fkTableInfo['genre'] === 'm') ? 'un nouveau' : 'une nouvelle';
        $label = $fkTableInfo['label'];
        return "Créer $sGenre $label";
    }


    protected function getRenderWithParentCodeBlockLangInfo($tableInfo)
    {
        $label = $tableInfo['label'];
        $labelPlural = $tableInfo['labelPlural'];
        $article = $tableInfo['article'];

        if ('le' === $article || 'la' === $article) {
            $label = $article . " " . $label;
        } else {
            $label = $article . "" . $label;
        }

        return [
            $label,
            $labelPlural,
            $tableInfo['article'],
        ];
    }

    protected function _getControllerGetAddBtnTextByAvatarMethod(array $tableInfo)
    {
        $genre = $tableInfo['genre'];
        if ('m' === $genre) {
            $sGenre = "un ";
        } else {
            $sGenre = "une ";
        }
        $s = <<<EEE
        
    protected function getAddBtnTextByAvatar(\$parentAvatar, \$elementLabel, \$parentLabel)
    {
        \$elementLabel = lcfirst(\$elementLabel);
        return "Ajouter $sGenre \$elementLabel pour \$parentLabel \"\$parentAvatar\"";
    }        
    
EEE;
        return $s;
    }

    protected function _getControllerGetRenderWithParentTitle(array $tableInfo)
    {
        $s = <<<EEE
        
    protected function getRenderWithParentTitle(\$parentAvatar, \$elementLabelPlural, \$parentLabel)
    {
        return "\$elementLabelPlural pour \$parentLabel \"\$parentAvatar\"";
    }
    
EEE;
        return $s;
    }


    protected function getChoiceListFirstValueLabel()
    {
        return "Aucune valeur";
    }

    protected function getTheThingFromTableInfo(array $tableInfo)
    {
        return $this->getLeMachin($tableInfo);
    }

    protected function getTitleDecorationBlock(array $parentWords)
    {

        $s = "";
        if ($parentWords) {


            $s = <<<EEE
\$avatar = \$context['avatar'] ?? null;
if (\$avatar) {
EEE;

            $c = 0;
            foreach ($parentWords as $col => $theThing) {
                $theThing = str_replace('"', '\"', $theThing);

                if (0 === $c) {
                    $s .= <<<EEE
                
    if (array_key_exists('$col', \$context)) {
EEE;

                } else {
                    $s .= <<<EEE
                
    } elseif (array_key_exists('$col', \$context)) {
EEE;

                }

                $s .= <<<EEE

        \$theThing = "$theThing";
EEE;


                $c++;
            }

            $s .= "
    }        
        ";

            $s .= <<<EEE
        
    \$title .= " pour \$theThing \"" . \$avatar . '"';
}
EEE;
        }
        return $s;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    private function getXiaoObjectName($table)
    {
        foreach ($this->prefix2Module as $prefix => $module) {
            if (0 === strpos($table, $prefix)) {
                $p = explode('_', $table);
                array_shift($p); // drop the prefix
                return '\Module\\' . $module . '\Api\Object\\' . ucfirst(CaseTool::snakeToCamel(implode('_', $p)));
            }
        }

        return false;
    }


    private function getLeMachin(array $tableInfo)
    {
        $article = $tableInfo['article'];
        $label = $tableInfo['label'];

        if ('le' === $article || 'la' === $article) {
            return $article . " " . $label;
        }
        return $article . $label;
    }

    private function getDuMachin(array $tableInfo)
    {
        $article = $tableInfo['article'];
        $label = $tableInfo['label'];
        if ('le' === $article) {
            return "du " . $label;
        } elseif ('la' === $article) {
            return "de la " . $label;
        }
        return "de l'" . $label;
    }
}