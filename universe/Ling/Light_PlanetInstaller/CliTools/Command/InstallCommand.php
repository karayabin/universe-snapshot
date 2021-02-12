<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The InstallCommand class.
 *
 */
class InstallCommand extends ImportCommand
{


    /**
     * Builds the InstallCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->operationMode = "install";
    }


    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $ret = <<<EEE
Same as import, but does a few extra steps:
- copy the <$concept>assets/map</$concept>(<$url>https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap</$url>) if any
- triggers post assets/map hooks if any 
- <$concept>logic installs</$concept> the <$concept>Light plugin</$concept> if it's <$concept>installable</$concept>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-difference-between-install-and-import</$url>).
EEE;

        return $ret;
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $url = LpiFormatHelper::getUrlFmt();
        $pmt = LpiFormatHelper::getCommandLineParameterFmt();


        $desc = <<<EEE
if defined, will <$concept>install</$concept> (<$url>https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary</$url>) 
the given planet (and its dependencies recursively), with the <$concept>assets/map</$concept>,and update the <$concept>lpi.byml</$concept> file accordingly, using a plus symbol at the end of every newly imported planet's version number.
  
<$pmt>planetDefinition</$pmt> stands for: planetDotName(:versionExpression)?

With:
- planetDotName: the <$concept>planetDotName</$concept> (<$url>https://github.com/karayabin/universe-snapshot#the-planet-dot-name</$url>)
- versionExpression: the <$concept>versionExpression</$concept> defaults to <b>last</b> if not defined
EEE;


        return [
            "planetDefinition" => [
                $desc,
                false
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $concept = LpiFormatHelper::getConceptFmt();
        $pmt = LpiFormatHelper::getCommandLineParameterFmt();
        return [
            "d" => "Whether to use <b>debug</b> mode. In <b>debug</b> mode, the display is more verbose and shows the debug and trace messages.",
            "n" => "if set, doesn't update the <$concept>lpi file</$concept> when the <$pmt>planetDefinition</$pmt> parameter is defined",
            "f" => "if set, forces the reimporting and reinstalling of the planet, even if it's already in your app and already installed",
            "keep-build" => "if set, the <$concept>build directory</$concept> will not be automatically removed after a successful operation.",
        ];
    }


    /**
     * @overrides
     */
    public function getAliases(): array
    {
        return [
            "install" => 'lpi install',
        ];
    }


}