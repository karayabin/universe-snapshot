<?php


namespace HybridList\RequestShaper;


use HybridList\Shaper\ShaperInterface;
use HybridList\SqlRequest\SqlRequestInterface;

interface RequestShaperInterface extends ShaperInterface
{
    /**
     * @param $input , string, the input value
     * @param SqlRequestInterface $sqlRequest the request to interact with
     * @return void
     */
    public function execute($input, SqlRequestInterface $sqlRequest);

}