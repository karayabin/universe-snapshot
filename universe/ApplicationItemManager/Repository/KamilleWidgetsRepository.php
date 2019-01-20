<?php


namespace ApplicationItemManager\Repository;


class KamilleWidgetsRepository extends AbstractRepository
{
    public function getName()
    {
        return 'KamilleWidgets';
    }


    //--------------------------------------------
    // OVERRIDE THOSE METHODS
    //--------------------------------------------
    protected function createItemList()
    {
        return [
            'BookedMeteo' => [
                'deps' => [],
                'description' => "Widget to display the weather conditions for your city",
            ],
        ];
    }
}