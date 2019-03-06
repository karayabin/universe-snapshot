<?php

namespace Ling\Colis\ColisUploadHandler;

/*
 * LingTalfi 2016-01-14
 */
use Ling\Tim\TimServer\TimServerInterface;

interface ColisUploadHandlerInterface {

    public function handle(TimServerInterface $s);
}
