<?php


namespace ApplicationItemManager\Repository;


class KamilleModulesRepository extends AbstractRepository
{

    public function getName()
    {
        return 'KamilleModules';
    }


    //--------------------------------------------
    // OVERRIDE THOSE METHODS
    //--------------------------------------------
    protected function createItemList()
    {
        return [
            'Connexion' => [
                'deps' => [
                    '+KamilleModules.GentelellaWebDirectory',
                ],
                'description' => <<<EEE
This module allows the user to log into the application, via a login form.
It uses the Privilege framework under the hood.
Tags: kaminos; lingtalfi
EEE
                ,
            ],
            'GentelellaWebDirectory' => [
                'deps' => [],
                'description' => <<<EEE
This module imports the gentelella admin theme into the web directory of your application.
Tags: theme; bootstrap
EEE
                ,
            ],
        ];
    }
}