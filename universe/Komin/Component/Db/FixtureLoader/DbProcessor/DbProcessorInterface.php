<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\DbProcessor;


/**
 * DbProcessorInterface
 * @author Lingtalfi
 * 2015-05-30
 *
 */
interface DbProcessorInterface
{

    
    public function loadFixtures(array $fixtures, $deleteDataBeforeInsert = true);


    /**
     * @param callable $rowFormatter
     *                  void    rowFormatter ( &row )
     *
     * @return DbProcessorInterface
     */
    public function setRowFormatter($target, callable $rowFormatter);
}
