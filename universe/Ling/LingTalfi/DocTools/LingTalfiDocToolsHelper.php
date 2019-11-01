<?php


namespace Ling\LingTalfi\DocTools;

use Ling\Bat\FileSystemTool;
use Ling\DocTools\DocBuilder\Git\PhpPlanet\LingGitPhpPlanetDocBuilder;

/**
 * The LingTalfiDocToolsHelper class.
 */
class LingTalfiDocToolsHelper
{

    /**
     * Creates two files to help you with feeding @page(a DocBuilder class) information:
     *
     * - /tmp/doctools-unresolved-class-references.md contains the content to put into the **externalClass2Url** key
     * - /tmp/doctools-unresolved-method-references.md contains the content to put into the **reportIgnore** key
     *
     *
     * @param LingGitPhpPlanetDocBuilder $builder
     */
    public static function generateCrumbs(LingGitPhpPlanetDocBuilder $builder)
    {
        $report = $builder->getReport();
        $file = '/tmp/doctools-unresolved-class-references.md';
        $file2 = '/tmp/doctools-unresolved-method-references.md';


        //--------------------------------------------
        // UNRESOLVED CLASS REFERENCES
        //--------------------------------------------
        $unresolvedClassReferences = $report->getUnresolvedClassReferences();
        $classes = [];
        foreach ($unresolvedClassReferences as $item) {
            $classes[] = trim(rtrim($item[0], '[]'), '\\');
        }
        $classes = array_unique($classes);


        $s = '';
        foreach ($classes as $class) {
            $p = explode('\\', $class);
            $galaxy = array_shift($p);
            $planet = array_shift($p);
            $filePath = str_replace('\\', '/', $class) . '.md';
            $url = 'https://github.com/lingtalfi/' . $planet . '/blob/master/doc/api/' . $filePath;
            $s .= '"' . $class . '" => "' . $url . '",' . PHP_EOL;
        }
        FileSystemTool::mkfile($file, $s);


        //--------------------------------------------
        // UNRESOLVED METHOD REFERENCES
        //--------------------------------------------
        $unresolvedMethodReferences = $report->getUnresolvedMethodReferences();
        $classes = [];
        foreach ($unresolvedMethodReferences as $item) {
            $classes[] = trim(rtrim($item[0], '[]'), '\\');
        }
        $classes = array_unique($classes);
        $s = '';
        foreach ($classes as $class) {
            $s .= '"' . $class . '",' . PHP_EOL;
        }
        FileSystemTool::mkfile($file2, $s);
    }
}