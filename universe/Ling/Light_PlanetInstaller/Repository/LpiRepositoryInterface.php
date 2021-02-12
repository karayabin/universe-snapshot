<?php


namespace Ling\Light_PlanetInstaller\Repository;

/**
 * The LpiRepositoryInterface interface.
 */
interface LpiRepositoryInterface
{

    /**
     * Returns whether the repository contains a planet matching the given arguments.
     *
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return bool
     */
    public function hasPlanet(string $planetDot, string $realVersion): bool;


    /**
     * Returns the real version number of the planet that is at least $realVersion, or false if not possible.
     *
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return string|false
     */
    public function getFirstVersionWithMinimumNumber(string $planetDot, string $realVersion);


    /**
     * Make a copy of the given planet so that the copy's path is $dstDir.
     *
     * If the given planet doesn't exist, or something unexpected occurs, an exception will be thrown.
     *
     * The warnings array is filled when the method wants to warn the user of something.
     * It's an array of strings.
     *
     *
     * @param string $planetDot
     * @param string $realVersion
     * @param string $dstDir
     * @param array $warnings
     * @return void
     * @throws \Exception
     */
    public function copy(string $planetDot, string $realVersion, string $dstDir, array &$warnings = []): void;


    /**
     * Returns the array of dependencies for the given planet and version.
     *
     * The returned array contains items, each of which has the following structure:
     * - 0: planetDot
     * - 1: versionExpr
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return array
     */
    public function getDependencies(string $planetDot, string $realVersion): array;

    /**
     * Returns the array of dependencies, in the uni style.
     * Each item is a planetDot name.
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return array
     */
    public function getUniDependencies(string $planetDot, string $realVersion): array;
}