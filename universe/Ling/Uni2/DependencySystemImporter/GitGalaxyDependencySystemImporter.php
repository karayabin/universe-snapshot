<?php


namespace Ling\Uni2\DependencySystemImporter;


use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Exception\Uni2Exception;

/**
 * The GitGalaxyDependencySystemImporter class.
 *
 * Will import planets from github.com.
 *
 * See more details in @page(the universe dependency system page).
 *
 * About the importPackage method
 * -------------
 *
 * The packageName argument should be the planetName.
 *
 * The destDir parameter should be the universe directory of the application.
 * Note that the galaxy doesn't appear here, since all planets share the same universe.
 *
 *
 * So for instance if the packageName's value is: Bat,
 * then the planet will ultimately be placed in this directory:
 *
 * - /my_app/universe/Bat
 *
 *
 */
class GitGalaxyDependencySystemImporter extends AbstractGitDependencySystemImporter
{

    /**
     * This property holds the base repo name for this instance.
     *
     *
     * @var string
     */
    protected $baseRepoName;


    /**
     * Builds the GitGalaxyDependencySystemImporter instance.
     *
     */
    public function __construct()
    {
        $this->baseRepoName = null;
    }


    /**
     * @implementation
     */
    public function getPackageSymbolicName(string $packageImportName): string
    {
        return $packageImportName;
    }


    /**
     * @implementation
     */
    public function importPackage(string $packageImportName, string $destDir, OutputInterface $output, array $options = []): bool
    {
        if (null === $this->baseRepoName) {
            throw new Uni2Exception("baseRepoName not set.");
        }

        $repoId = $this->baseRepoName . "/" . $packageImportName;

        return $this->doImportPackage($repoId, $destDir, $output, $options);
    }

    /**
     * Sets the baseRepoName.
     *
     * @param string $baseRepoName
     */
    public function setBaseRepoName(string $baseRepoName)
    {
        $this->baseRepoName = $baseRepoName;
    }


}