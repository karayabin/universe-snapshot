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
 * RepositoryList
 * @author Lingtalfi
 * 2015-04-17
 *
 */
class RepositoryList implements RepositoryListInterface
{

    protected $repositories;

    public function __construct(array $repositories = [])
    {
        $this->setRepositories($repositories);
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS RepositoryListInterface
    //------------------------------------------------------------------------------/
    public function addRepository(RepositoryInterface $repository)
    {
        $this->repositories[] = $repository;
    }

    public function setRepositories(array $repositories)
    {
        $this->repositories = $repositories;
    }

    public function getRepositories()
    {
        return $this->repositories;
    }

}
