<?php

namespace Ling\Meredith\DynamicConfig;

use Ling\Meredith\MainController\MainControllerInterface;
use Ling\Meredith\Supervisor\MeredithSupervisor;

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