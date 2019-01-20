<?php

namespace Colis\ServiceHandler;

/*
 * LingTalfi 2016-01-14
 */
use Tim\TimServer\TimServerInterface;

interface LingColisServiceHandlerInterface
{
    public function handle(TimServerInterface $s);

    public function getInfo($name, &$err);
}
