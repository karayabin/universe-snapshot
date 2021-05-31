<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;

/**
 * The LpiFormatHelper class.
 */
class LpiFormatHelper
{

    /**
     * Returns the bashtml format for a concept, which is usually defined in the conception notes.
     * @return string
     */
    public static function getConceptFmt(): string
    {
        return LightCliFormatHelper::getConceptFmt();
    }


    /**
     * Returns the bashtml format for a command.
     *
     * @return string
     */
    public static function getCommandFmt(): string
    {
        return LightCliFormatHelper::getCommandFmt();
    }


    /**
     * Returns the bashtml format for a command line option.
     *
     * @return string
     */
    public static function getCommandLineOptionFmt(): string
    {
        return LightCliFormatHelper::getCommandLineOptionFmt();
    }

    /**
     * Returns the bashtml format for a command line flag.
     *
     * @return string
     */
    public static function getCommandLineFlagFmt(): string
    {
        return LightCliFormatHelper::getCommandLineFlagFmt();
    }

    /**
     * Returns the bashtml format for a command line parameter.
     *
     * @return string
     */
    public static function getCommandLineParameterFmt(): string
    {
        return LightCliFormatHelper::getCommandLineParameterFmt();
    }


    /**
     * Returns the bashtml format for a banner.
     *
     * @return string
     */
    public static function getBannerFmt(): string
    {
        return LightCliFormatHelper::getBannerFmt();
    }

    /**
     * Returns the bashtml format for a file.
     *
     * @return string
     */
    public static function getFileFmt(): string
    {
        return LightCliFormatHelper::getFileFmt();
    }

    /**
     * Returns the bashtml format for an url.
     *
     * @return string
     */
    public static function getUrlFmt(): string
    {
        return LightCliFormatHelper::getUrlFmt();
    }

}