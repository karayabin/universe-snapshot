<?php


namespace Ling\LinearFile\LineSet;


interface LineSetInterface
{

    public function getName();

    public function getStartLine();

    public function getEndLine();

    public function toString();

}