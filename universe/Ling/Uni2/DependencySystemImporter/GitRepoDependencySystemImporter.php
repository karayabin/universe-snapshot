<?php


namespace Ling\Uni2\DependencySystemImporter;


use Ling\CliTools\Output\OutputInterface;

/**
 * The GitRepoDependencySystemImporter class.
 *
 * Will import repos from github.com.
 *
 * See more details in @page(the universe dependency system page).
 *
 *
 * About the importPackage method
 * -------------
 *
 * The packageName argument should be the github.com repo url.
 *
 * The destDir parameter of the importPackage method should be the path to the universe-dependencies directory.
 * The importPackage method will then append the repo path to this directory to obtain the exact dependency directory.
 *
 * So for instance if the packageName's value is: https://github.com/tecnickcom/tcpdf
 * Then the repo path will be "tecnickcom/tcpdf",
 * and then the item will be ultimately placed into the following directory:
 *
 * - /my_app/universe-dependencies/tecnickcom/tcpdf
 *
 *
 *
 *
 *
 */
class GitRepoDependencySystemImporter extends AbstractGitDependencySystemImporter
{


    /**
     * @implementation
     */
    public function importPackage(string $packageImportName, string $destDir, OutputInterface $output, array $options = []): bool
    {
        $repoPath = $this->getRepoPath($packageImportName);
        $universeDepDir = $destDir;
        $finalDestDir = $universeDepDir . "/" . $repoPath;
        return $this->doImportPackage($repoPath, $finalDestDir, $output, $options);
    }


    /**
     * @implementation
     */
    public function getPackageSymbolicName(string $packageImportName): string
    {
        return $this->getRepoPath($packageImportName);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the repo path from the given $packageImportName.
     *
     * @param string $packageImportName
     * @return string
     */
    protected function getRepoPath(string $packageImportName): string
    {
        $p = explode("//github.com", $packageImportName);
        array_shift($p);
        return ltrim($p[0], '/');
    }
}