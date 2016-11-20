<?php

namespace QuickPdoMysqlDump\BackupOptions;

/*
 * LingTalfi 2016-01-26
 */
interface BackupOptionsInterface
{

    public function getOr($key, $default = null);
}
