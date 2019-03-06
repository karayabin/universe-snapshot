<?php


namespace Module\KamilleUserProductHistory;


use Core\Module\ApplicationModule;
use Core\Services\A;
use Module\My\Api\MyApi;
use Ling\QuickPdo\QuickPdo;

class MyModule extends ApplicationModule
{


    protected function installDatabase()
    {
        A::quickPdoInit();
        $query = $this->getSqlQueryByFile("kamille", __DIR__ . "/assets/db/sqlFileBaseName");
        $this->output->notice("Installing MyModule database structure...");
//        $this->output->notice($query);
        QuickPdo::freeQuery($query);

    }

    protected function uninstallDatabase()
    {
        A::quickPdoInit();
        // delete-tables
    }
}


