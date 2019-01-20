<?php

namespace Colis\ColisUploadHandler;

/*
 * LingTalfi 2016-01-14
 */
use Tim\TimServer\TimServerInterface;

interface ColisUploadHandlerInterface {

    public function handle(TimServerInterface $s);
}
