<?php


namespace Ling\DocTools\TemplateWizard;


use Ling\DirScanner\YorgDirScannerTool;

/**
 * The TemplateWizard class.
 * It's invoked by the @class(Ling\DocTools\Page\PageUtil) object and passed to the templates, so that they can
 * do things like:
 *
 * - insert content dynamically
 *
 *
 * Insert content dynamically
 * -------------------------
 * Sometimes, it's not practical to use class doc comments to express some ideas, because of the asterisks in front
 * of every line, and/or because of the space it takes in the code.
 *
 * And so the idea of inserting content is that we can use separated files to hold the content that we want to insert
 * into the documentation.
 *
 * For instance, if we have a lot to say about the class, rather than putting everything in the class comment,
 * we simply create a file named description.md, and it we can inject its content (by calling the getInserts method
 * of the TemplateWizard class) into the template.
 *
 *
 * In this implementation, inserts are done via the file system.
 * The item that we document (class, method, ...) will be created at an arbitrary $itemFile location, under a $rootDirectory.
 *
 * The insert system in this implementation mimics this path, but uses the $insertRootDirectory instead of the $rootDirectory,
 * and uses the $itemFile as a base directory for different types of inserts.
 *
 * The structure looks like this:
 *
 * ```txt
 * - $rootDir/                                      # the regular documentation items are created under this directory
 * ----- $itemRelativePath                         # this is a regular generated documentation item (class, method, ...)
 * - $insertRootDir/                                # this directory contains all our inserts, it mimics the $rootDir structure
 * ----- $itemRelativePathWithoutExtension/        # this directory contains the potential inserts for the $itemRelativePath doc item in particular
 * --------- $type/                                # this directory contains all inserts of type $type for the $itemRelativePath doc item in particular
 * ------------- *.md                              # all markdown files under this directory, recursively, are insert files of type $type for the $itemRelativePath doc item in particular
 * ```
 *
 *
 * Note: we just create inserts for the doc items we need (i.e. we don't need to create ALL inserts files for every doc item).
 *
 *
 *
 *
 * Typical insert types I personally use are:
 *
 * ```txt
 * - class-description.md           # for an extra class description
 * - examples.md                    # for examples
 * - related.md                     # for a "See Also" section
 * ```
 *
 *
 * But of course, this depends on your own needs and you should use any type you want.
 *
 *
 *
 *
 */
class TemplateWizard
{

    /**
     * This property holds the insertDir for this instance.
     * @var string|null. Null means that there is no insert dir.
     *
     */
    protected $insertDir;


    /**
     * Builds the TemplateWizard instance.
     * @param string|null $insertDir
     */
    public function __construct(?string $insertDir)
    {
        $this->insertDir = $insertDir;
    }


    /**
     * Returns whether an insert of the given $type exists.
     * @param string $type
     * @return bool
     */
    public function hasInsert(string $type): bool
    {
        if (null !== $this->insertDir) {
            return is_dir($this->insertDir . "/$type");
        }
        return false;
    }

    /**
     * Returns an array of inserts for the given $type.
     *
     *
     * @param string $type
     * @return array
     * An array of strings.
     */
    public function getInserts(string $type): array
    {
        if (null !== $this->insertDir) {
            $typeDir = $this->insertDir . "/$type";
            if (is_dir($typeDir)) {
                $files = YorgDirScannerTool::getFilesWithExtension($typeDir, "md", false, true);
                $ret = [];
                foreach ($files as $file) {
                    $ret[] = file_get_contents($file);
                }
                return $ret;
            }
        }
        return [];
    }

}