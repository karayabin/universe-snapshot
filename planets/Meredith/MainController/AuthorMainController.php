<?php

namespace Meredith\MainController;

use Meredith\ListHandler\AuthorListHandler;

/**
 * LingTalfi 2015-12-28
 */
class AuthorMainController extends MeredithMainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setListHandler(AuthorListHandler::create());
        $this->setIdentifyingFields(['id']);
        $this->setAutoIncrementedField('id');
    }


}