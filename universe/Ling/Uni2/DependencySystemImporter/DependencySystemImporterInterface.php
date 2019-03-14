<?php


namespace Ling\Uni2\DependencySystemImporter;


use Ling\CliTools\Output\OutputInterface;

/**
 * The DependencySystemImporterInterface interface.
 *
 * A dependency system importer will know how to import a package from the web to a local machine.
 *
 *
 *
 */
interface DependencySystemImporterInterface
{



    /**
     *
     * Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.
     *
     * What's a $packageImportName and a destDir is dependent on the concrete class and therefore should be explained
     * further in the concrete class documentation.
     *
     * All messages should be logged to the output whenever possible.
     *
     *
     * @param string $packageImportName
     * @param string $destDir
     * @param OutputInterface $output
     * @param array $options
     *      - indentLevel: int=0. The base indent level to use for writing messages on the output.
     * @return bool
     */
    public function importPackage(string $packageImportName, string $destDir, OutputInterface $output, array $options = []): bool;

    /**
     * Returns the package symbolic name from the given $packageImportName.
     *
     * The package symbolic name is a filesystem portion of the path to an item in the local server, such as:
     *
     * ```txt
     * - local item path: <local planet path> | <local non-planet path>
     * - local planet path: <universe root dir> </> <galaxy> </> <package symbolic name>
     * - local non-planet path: <universe dependencies root dir> </> <dependency system> </> <package symbolic name>
     *
     * ```
     *
     *
     *
     *
     *
     * Examples of package symbolic names are:
     *
     * - Bat                    (the planet https://github.com/lingtalfi/Bat)
     * - tecnickcom/tcpdf       (the non-planet https://github.com/tecnickcom/TCPDF)
     *
     *
     *
     *
     *
     *
     * @param string $packageImportName
     * @return string
     */
    public function getPackageSymbolicName(string $packageImportName): string;


}