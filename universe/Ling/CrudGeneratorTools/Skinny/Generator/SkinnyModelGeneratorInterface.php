<?php

namespace Ling\CrudGeneratorTools\Skinny\Generator;


interface SkinnyModelGeneratorInterface
{
    public function generateFormModel($db, $table, array &$snippets, array &$uses);
}