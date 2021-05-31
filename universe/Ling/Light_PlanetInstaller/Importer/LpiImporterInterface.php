<?php


namespace Ling\Light_PlanetInstaller\Importer;


/**
 * The LpiImporterInterface interface.
 */
interface LpiImporterInterface
{

    /**
     * Configures the importer before it's used.
     *
     * @param array $importerConf
     */
    public function configure(array $importerConf);


    /**
     * Imports the item described by the $planetIdentifier and $version to the $dstDir.
     *
     * Returns true if the operation went smoothly, or an array of errors otherwise.
     *
     * Note that the $dstDir is the new location of the imported item.
     * So, $dstDir is not the parent dir containing the item, but the item itself.
     *
     * The item must be ultimately resolved as a directory.
     * It can be downloaded as a zip file at first, or any compressed file, but once unzipped, should always
     * become a directory located at $dstDir.
     *
     * An exception is thrown if the method fails.
     *
     * The warnings array is filled by this method if a warning should be displayed to the user, but the method can still be
     * executed successfully. It's an array of strings.
     *
     *
     *
     * @param string $planetIdentifier
     * @param string $version
     * @param string $dstDir
     * @param array $warnings
     *
     * @return true|array.
     * @throws \Exception
     */
    public function importItem(string $planetIdentifier, string $version, string $dstDir, array &$warnings = []);


    /**
     * Returns whether there is planet with identifier $planetIdentifier in the given $version.
     *
     * @param string $planetIdentifier
     * @param string $version
     * @return bool
     */
    public function hasItem(string $planetIdentifier, string $version): bool;


    /**
     * Returns the current version number of the planet which identifier is given.
     *
     * @param string $planetIdentifier
     * @return string
     * @throws \Exception
     */
    public function getCurrentVersion(string $planetIdentifier): string;

    /**
     * Returns an array of all available versions of the planet, sorted by increasing number.
     *
     * @param string $planetIdentifier
     * @return array
     */
    public function getAllVersions(string $planetIdentifier): array;

    /**
     * Returns the array of lpi dependencies for the given planet.
     *
     * Throws a LpiIncompatibleException exception if the lpi deps file can't be found.
     *
     *
     * @param string $planetIdentifier
     * @return array
     * @throws \Exception
     */
    public function getLpiDependencies(string $planetIdentifier): array;

    /**
     * Returns an array of planetDotNames corresponding to the uni style dependencies for the given planet identifier.
     *
     * @param string $planetIdentifier
     * @return array
     */
    public function getUniDependencies(string $planetIdentifier): array;

}

