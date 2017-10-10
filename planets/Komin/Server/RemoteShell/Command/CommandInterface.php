<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\RemoteShell\Command;


/**
 * CommandInterface
 * @author Lingtalfi
 * 2014-10-29
 *
 */
interface CommandInterface
{

    /**
     * @return bool, true is returned if 100% of the task is completed
     */
    public function execute(array $params);

    public function getName();
}
