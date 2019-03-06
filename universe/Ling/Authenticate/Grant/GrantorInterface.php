<?php


namespace Ling\Authenticate\Grant;


interface GrantorInterface
{
    public function has($badge);
}