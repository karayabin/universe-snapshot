<?php

namespace CrudGeneratorTools\Skinny\Generator;


use CrudGeneratorTools\Skinny\SkinnyTypeUtil;

class SkinnyModelGenerator implements SkinnyModelGeneratorInterface
{



    /**
     * @var SkinnyTypeUtil $skinnyTypeUtil
     */
    protected $skinnyTypeUtil;


    public function __construct()
    {
        //
    }


    public static function create()
    {
        return new static();
    }

    public function generateFormModel($db, $table, array &$snippets, array &$uses)
    {
        $this->prepare();
        if (false !== ($types = $this->skinnyTypeUtil->getTypes($db, $table))) {
            foreach ($types as $column => $type) {
                $p = explode('+', $type, 2);
                $typeId = $p[0];
                $this->generateFormControlModel($typeId, $type, $column, $db, $table, $snippets, $uses);
            }
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setSkinnyTypeUtil(SkinnyTypeUtil $skinnyTypeUtil)
    {
        $this->skinnyTypeUtil = $skinnyTypeUtil;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function prepare()
    {
        if (null === $this->skinnyTypeUtil) {
            $this->skinnyTypeUtil = SkinnyTypeUtil::create();
        }
    }

    protected function generateFormControlModel($typeId, $type, $column, $db, $table, array &$snippets, array &$uses)
    {
        $name = $this->getControlName($type, $column, $db, $table);
        switch ($typeId) {
            case 'auto_increment':

//                        $snippets[] = <<<EEE
//            ->addControl("$column", InputTextControl::create()
//                ->label("$column")
//                ->addHtmlAttribute("readonly", "readonly")
//                ->name("$column")
//            )
//EEE;
//                        $uses[] = 'FormModel\Control\InputTextControl';

                break;
            case 'input':
                $snippets[] = <<<EEE
            ->addControl("$column", InputTextControl::create()
                ->label("$column")
                ->name("$name")
            )
EEE;
                $uses[] = 'FormModel\Control\InputTextControl';
                break;
            case 'textarea':
                $snippets[] = <<<EEE
            ->addControl("$column", TextAreaControl::create()
                ->label("$column")
                ->name("$name")
            )
EEE;
                $uses[] = 'FormModel\Control\TextAreaControl';
                break;
            case 'pass':
                $snippets[] = <<<EEE
            ->addControl("$column", InputPasswordControl::create()
                ->label("$column")
                ->name("$name")
            )
EEE;
                $uses[] = 'FormModel\Control\InputPasswordControl';
                break;
            default:
                break;
        }
    }

    protected function getControlName($type, $column, $db, $table)
    {
        return $column;
    }
}