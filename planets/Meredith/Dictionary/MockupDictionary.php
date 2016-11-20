<?php

namespace Meredith\Dictionary;

/*
 * LingTalfi 2016-01-02
 */
class MockupDictionary extends Dictionary
{

    protected function __construct()
    {
        parent::__construct();
        $this->setWords([
            //------------------------------------------------------------------------------/
            // SERVICES
            //------------------------------------------------------------------------------/
            "An error occurred with the database, please retry later" => "____",
            "Invalid data" => "____",
            "Invalid data: undefined formId" => "____",
            "Oops! An error occurred, please retry later" => "____",
            "The record has been successfully updated" => "____",
            "The record has been successfully recorded" => "____",
        ]);
    }


}
