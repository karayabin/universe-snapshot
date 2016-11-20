<?php

namespace Meredith\DynamicConfig;

use Meredith\MainController\MainControllerInterface;
use Meredith\Supervisor\MeredithSupervisor;

/**
 * LingTalfi 2015-12-31
 */
class DynamicConfig implements DynamicConfigInterface
{

    public static function create()
    {
        return new static();
    }

    public function render(MainControllerInterface $mc)
    {
        $url = MeredithSupervisor::inst()->getUrl("insertUpdate");
        return <<<ZZZ
<script>
window.meredithRegistry.insertUpdateUrl = "$url";
</script>
ZZZ;

    }
}