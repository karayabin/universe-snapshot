<?php


namespace Ling\Light_Cli\Helper;


/**
 * The LightCliFormatHelper class.
 */
class LightCliFormatHelper
{
    /**
     * Returns the bashtml format for a concept, which is usually defined in the conception notes.
     * @return string
     */
    public static function getConceptFmt(): string
    {
        return 'bold:green';
    }


    /**
     * Returns the bashtml format for a command.
     *
     * @return string
     */
    public static function getCommandFmt(): string
    {
        return 'bold:red';
    }


    /**
     * Returns the bashtml format for a command line option.
     *
     * @return string
     */
    public static function getCommandLineOptionFmt(): string
    {
        return 'bold:green';
    }


    /**
     * Returns the bashtml format for a command line flag.
     *
     * @return string
     */
    public static function getCommandLineFlagFmt(): string
    {
        return 'bold:bgLightYellow';
    }


    /**
     * Returns the bashtml format for a command line parameter.
     *
     * @return string
     */
    public static function getCommandLineParameterFmt(): string
    {
        return 'bold:blue';
    }


    /**
     * Returns the bashtml format for a banner.
     *
     * @return string
     */
    public static function getBannerFmt(): string
    {
        return 'white:bgBlue';
    }


    /**
     * Returns the bashtml format for a file.
     *
     * @return string
     */
    public static function getFileFmt(): string
    {
        return 'blue';
    }


    /**
     * Returns the bashtml format for an url.
     *
     * @return string
     */
    public static function getUrlFmt(): string
    {
        return 'lightBlue:bold';
    }

    /**
     * Returns the bashtml format for a header. This includes inline headers (i.e. category headers).
     *
     * @return string
     */
    public static function getHeaderFmt(): string
    {
        return 'underlined:bold';
    }
}