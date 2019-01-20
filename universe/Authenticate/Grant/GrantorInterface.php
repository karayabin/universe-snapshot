<?php


namespace Authenticate\Grant;


interface GrantorInterface
{
    public function has($badge);
}