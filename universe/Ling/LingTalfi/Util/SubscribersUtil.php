<?php


namespace Ling\LingTalfi\Util;

use Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The SubscribersUtil class.
 */
class SubscribersUtil
{


    /**
     * Updates the planets which depend on the given planetDot.
     * By update, I mean increment the version number and push them using my kpp shortcut.
     *
     *
     *
     * @param string $appDir
     * @param string $planetDot
     * @throws \Exception
     */
    public function updateSubscribersDependenciesAndCommit(string $appDir, string $planetDot)
    {

        $uniDir = LocalUniverseTool::getLocalUniversePath();

        $noLpiFiles = [];

        $planetDir = $uniDir . "/" . PlanetTool::getPlanetSlashNameByDotName($planetDot);
        $currentVersion = MetaInfoTool::getVersion($planetDir);


        $depHelper = new LpiDependenciesHelper();
        $matches = $depHelper->getSubscribersList($planetDot, $uniDir, $noLpiFiles, [
            "lastOnly" => true,
        ]);


        foreach ($matches as $subscriberDot => $info) {
            list($subscriberVersion, $referencedVersion) = $info;
            $referencedVersion = LpiVersionHelper::toMiniVersionExpression($planetDot, $referencedVersion);
            $referencedVersion = LpiVersionHelper::removeModifierSymbol($referencedVersion);

            if ($referencedVersion !== $currentVersion) {
                $subscriberPlanetDir = $uniDir . "/" . PlanetTool::getPlanetSlashNameByDotName($subscriberDot);

                $message = "Update dependencies to $planetDot (pushed by SubscribersUtil)";
                CommitUtil::regularLingCommit($subscriberPlanetDir, $message, $appDir);

            }


        }
    }
}