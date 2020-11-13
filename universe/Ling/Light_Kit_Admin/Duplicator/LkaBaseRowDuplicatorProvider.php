<?php


namespace Ling\Light_Kit_Admin\Duplicator;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;

/**
 * The LkaBaseRowDuplicatorProvider class.
 */
class LkaBaseRowDuplicatorProvider implements RowDuplicatorProviderInterface
{

    /**
     * @implementation
     */
    public function getProvider(string $table): RowDuplicatorInterface
    {
        $o = new LkaBaseRowDuplicator();
        $o->setTable($table);
        if($o instanceof LightServiceContainerAwareInterface){

        }
        return $o;
    }


}