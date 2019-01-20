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
 * ProtocolHelper
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class ProtocolHelper implements ProtocolHelperInterface
{
    //------------------------------------------------------------------------------/
    // IMPLEMENTS ProtocolHelperInterface
    //------------------------------------------------------------------------------/
    public function getCanonicalNameByMeta(array $userMeta)
    {
        $versionId = (array_key_exists('versionId', $userMeta)) ? $userMeta['versionId'] : '';
        return $userMeta['type'] . ':' . $userMeta['id'] . ':' . $versionId;
    }

    public function getMetaFileBaseName()
    {
        return "meta.yml";
    }

    public function resolveCanonicalNamesConflicts(array $canonicalNames)
    {
        $ret = [];
        $sub = [];
        foreach ($canonicalNames as $cName) {
            list($type, $id, $versionId) = explode(':', $cName, 3);
            $commonName = $type . ':' . $id;
            $sub[$commonName][] = $versionId;
        }

        foreach ($sub as $commonName => $versions) {
            $n = count($versions);
            if (1 === $n) {
                $ret[] = $commonName . ':' . current($versions);
            }
            elseif ($n > 1) {
                sort($versions); // notice the simple sort method, for now
                $ret[] = $commonName . ':' . array_pop($versions);
            }
            else {
                throw new \LogicException("The number of versions couldn't be less than one");
            }
        }
        $ret = array_unique($ret);
        return $ret;
    }

    public function getDownloadInfo(array $meta)
    {
        return $meta['download'];
    }

    public function getDependencies(array $meta)
    {
        $ret = [];
        if (array_key_exists('dependencies', $meta)) {
            $ret = $meta['dependencies'];
        }
        return $ret;
    }


    public function getCommonName_VersionId_CanonicalName_VnsByMeta(array $meta)
    {
        $ret = false;
        if (
            array_key_exists('type', $meta) &&
            array_key_exists('id', $meta) &&
            array_key_exists('versionId', $meta)
        ) {

            $vns = (array_key_exists('vns', $meta)) ? $meta['vns'] : '3m';
            $ret = [
                $meta['type'] . ':' . $meta['id'],
                $meta['versionId'],
                $meta['type'] . ':' . $meta['id'] . ':' . $meta['versionId'],
                $vns,
            ];
        }
        else {
            throw new \InvalidArgumentException("Invalid meta given, one of the following key is missing: type, id, versionId");
        }
        return $ret;
    }
}
