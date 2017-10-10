<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Repository\RepositoryList;

use Komin\Application\ElementInstallerOld\Repository\RepositoryInterface;


/**
 * RepositoryListInterface
 * @author Lingtalfi
 * 2015-04-17
 *
 */
interface RepositoryListInterface
{

    public function addRepository(RepositoryInterface $repository);

    public function setRepositories(array $repositories);

    public function getRepositories();
}
