<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SuperLogger\Traits;


use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * SuperLoggerTrait
 * @author Lingtalfi
 * 2015-02-15
 *
 */
trait SuperLoggerTrait
{
    private $superLogIsDisabled = false;

    protected function slog($id, $msg)
    {
        if (false === $this->superLogIsDisabled) {
            $id = str_replace('\\', '.', get_called_class()) . '.' . $id;
            SuperLogger::getInst()->log($id, $msg);
        }
    }


    protected function disableSuperLogger()
    {
        $this->superLogIsDisabled = true;
    }

}
