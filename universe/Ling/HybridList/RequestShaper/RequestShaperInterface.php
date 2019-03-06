<?php


namespace Ling\HybridList\RequestShaper;


use Ling\HybridList\Shaper\ShaperInterface;
use Ling\HybridList\SqlRequest\SqlRequestInterface;

interface RequestShaperInterface extends ShaperInterface
{
    /**
     * @param $input , string, the input value
     * @param SqlRequestInterface $sqlRequest the request to interact with
     * @return void
     */
    public function execute($input, SqlRequestInterface $sqlRequest);

}