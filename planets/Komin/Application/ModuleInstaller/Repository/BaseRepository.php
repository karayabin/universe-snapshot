<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Repository;

use BeeFramework\Component\Log\SimpleLogger\Traits\LoggerTrait;
use Komin\Application\ModuleInstaller\Repository\ProtocolHelper\RepositoryProtocolHelper;
use Komin\Application\ModuleInstaller\Repository\ProtocolHelper\RepositoryProtocolHelperInterface;


/**
 * BaseRepository
 * @author Lingtalfi
 * 2015-05-06
 *
 */
abstract class BaseRepository implements RepositoryInterface
{

    use LoggerTrait;


    /**
     * @var RepositoryProtocolHelperInterface
     */
    private $repoProtocolHelper;


    /**
     * @param string|null $versionId , if null, means the last version available
     * @param string $concreteVersionId , the name of the concrete version used by the class
     * @return array|false
     */
    abstract protected function resolveModuleMeta($type, $id, $versionId, &$concreteVersionId);

    /**
     * @return mixed, the download info corresponding to the given userMeta
     */
    abstract protected function getDownloadInfo($type, $id, $versionId, array $userMeta);


    //------------------------------------------------------------------------------/
    // IMPLEMENTS RepositoryInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array|false,
     *          the serverMeta array for the given module,
     *          or false if the module couldn't be found.
     */
    public function getModuleMeta($searchPattern)
    {
        if (is_string($searchPattern)) {

            list($type, $id, $versionId) = $this->_getRepositoryProtocolHelper()->getTypeAndIdAndVersion($searchPattern);
            $concreteVersionId = $versionId;
            if (false !== $userMeta = $this->resolveModuleMeta($type, $id, $versionId, $concreteVersionId)) {
                $downloadInfo = $this->getDownloadInfo($type, $id, $concreteVersionId, $userMeta);
                $serverMeta = $this->repoProtocolHelper->createServerMeta($downloadInfo, $userMeta);
                return $serverMeta;
            }
            $this->slog("Couldn't access meta with searchPattern=$searchPattern");
        }
        else {
            throw new \InvalidArgumentException(sprintf("searchPattern argument must be of type string, %s given", gettype($searchPattern)));
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return RepositoryProtocolHelperInterface
     */
    public function getRepositoryProtocolHelper()
    {
        return $this->repoProtocolHelper;
    }

    public function setRepositoryProtocolHelper(RepositoryProtocolHelperInterface $repoProtocolHelper)
    {
        $this->repoProtocolHelper = $repoProtocolHelper;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * @return RepositoryProtocolHelperInterface
     */
    protected function _getRepositoryProtocolHelper()
    {
        if (null === $this->repoProtocolHelper) {
            $this->repoProtocolHelper = new RepositoryProtocolHelper();
        }
        return $this->repoProtocolHelper;
    }

}
