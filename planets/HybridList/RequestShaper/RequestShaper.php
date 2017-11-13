<?php


namespace HybridList\RequestShaper;


use HybridList\Shaper\Shaper;
use HybridList\SqlRequest\SqlRequestInterface;

class RequestShaper extends Shaper implements RequestShaperInterface
{
    public function execute($input, SqlRequestInterface $sqlRequest)
    {
        if (null !== $this->executeCallback) {
            call_user_func($this->executeCallback, $input, $sqlRequest);
        }
    }

}