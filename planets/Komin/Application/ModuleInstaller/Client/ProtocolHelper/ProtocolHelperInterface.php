<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Client\ProtocolHelper;


/**
 * ProtocolHelperInterface
 * @author Lingtalfi
 * 2015-05-05
 *
 */
interface ProtocolHelperInterface
{
    public function getCanonicalNameByMeta(array $userMeta);

    public function getMetaFileBaseName();

    /**
     * @param array $canonicalNames ,
     *                      this array might contain entries that represent the same module with different versions.
     *                      This is called a conflict.
     *
     * @return array with conflicts resolved by choosing the last version, based on alphaNum comparison.
     */
    public function resolveCanonicalNamesConflicts(array $canonicalNames);

    public function getDownloadInfo(array $meta);

    public function getCommonName_VersionId_CanonicalName_VnsByMeta(array $meta);

    public function getDependencies(array $meta);
}
