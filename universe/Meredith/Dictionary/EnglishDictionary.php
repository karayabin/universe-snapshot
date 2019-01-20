<?php

namespace Meredith\Dictionary;

/*
 * LingTalfi 2016-01-02
 */
class EnglishDictionary extends Dictionary 
{
    
    protected function __construct()
    {
        parent::__construct();
        $this->setWords([
            //------------------------------------------------------------------------------/
            // SERVICES
            //------------------------------------------------------------------------------/
            // delete_rows, fetch_row
            "An error occurred with the database, please retry later" => "An error occurred with the database, please retry later",
            "Invalid data" => "Invalid data",
            // insert_update_row
            "Invalid data: undefined formId" => "Invalid data: undefined formId",
            // datatables_server_side_processor
            "Oops! An error occurred, please retry later" => "Oops! An error occurred, please retry later",
        ]);
    }


}
