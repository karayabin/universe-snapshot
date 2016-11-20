<?php

namespace Meredith\Dictionary;

/*
 * LingTalfi 2016-01-02
 */
class FrenchDictionary extends Dictionary
{

    protected function __construct()
    {
        parent::__construct();
        $this->setWords([
            //------------------------------------------------------------------------------/
            // SERVICES
            //------------------------------------------------------------------------------/
            // delete_rows, fetch_row
            "An error occurred with the database, please retry later" => "Une erreur est survenue dans la base de données, veuillez réessayer plus tard",
            "Invalid data" => "Données invalides",
            // insert_update_row
            "Invalid data: undefined formId" => "Données invalides: formId absent",
            // datatables_server_side_processor
            "Oops! An error occurred, please retry later" => "Oops! Une erreur est survenue, veuillez réessayer plus tard",
        ]);
    }


}
