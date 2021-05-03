<?php


namespace Ling\SectionComment;

use Ling\Bat\FileSystemTool;
use Ling\Bat\FileTool;
use Ling\SectionComment\Exception\SectionCommentException;

/**
 * The SectionCommentUtil class.
 * An implementation of a [babyYaml based section comment](https://github.com/lingtalfi/TheBar/blob/master/discussions/section-comment.md).
 *
 *
 * Note that in this implementation, a single **dash line** ends a section.
 *
 *
 */
class BabyYamlSectionCommentUtil
{


    /**
     * This property holds the file for this instance.
     * @var string | null
     */
    private ?string $file;


    /**
     * Builds the SectionCommentUtil instance.
     */
    public function __construct()
    {
        $this->file = null;
    }

    /**
     * Sets the file.
     *
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }


    /**
     * Adds or replaces a section to the current file.
     *
     * If the file doesn't exist, it's created.
     *
     * Available options are:
     *
     * - replace: bool=true. Whether to replace the section if it already exists.
     *      If false, and the section already exists, the file is left unchanged.
     *
     *
     *
     *
     *
     * @param string $title
     * @param string $content
     * @param array $options
     * @throws SectionCommentException
     */
    public function addSection(string $title, string $content, array $options = [])
    {
        $this->init();

        $replace = $options['replace'] ?? true;


        $sectionsInfo = $this->getSectionsInfo();
        $sectionFound = false;
        foreach ($sectionsInfo as $info) {
            if ($title === $info['title']) {
                $sectionFound = true;
                if (true === $replace) {
                    $thingToAdd = $this->getHeader($title);
                    $thingToAdd .= PHP_EOL;
                    $thingToAdd .= $content;

                    FileTool::cut($this->file, $info["start"], $info['end'], true);
                    FileTool::insert($info['start'], $thingToAdd, $this->file);

                } else {
                    // do nothing if replace is false
                }

            }
        }


        if (false === $sectionFound) {
            $currentContent = '';
            if (true === is_file($this->file)) {
                $currentContent = file_get_contents($this->file);
                if ('' !== trim($currentContent)) {
                    $currentContent .= PHP_EOL;
                    $currentContent .= PHP_EOL;
                }
            }
            $currentContent .= $this->getHeader($title);
            $currentContent .= PHP_EOL;
            $currentContent .= $content;

            FileSystemTool::mkfile($this->file, $currentContent);
        }
    }


    /**
     * Returns an array of info about the sections found in the current file.
     * The returned array contains sectionItems, each of which:
     *
     * - title: string, the title of the section
     * - content: string, the section content
     * - start: int, the line number at which the section starts (this includes the header)
     * - end: int, the line number at which the section ends
     *
     *
     * @return array
     * @throws \Exception
     */
    public function getSectionsInfo(): array
    {
        $ret = [];
        $this->init();
        $lines = file($this->file);
        $firstCommentLine = false;
        $sectionStartLine = null;
        $titleFound = false;
        $secondCommentLine = false;
        $sectionHeaderFound = false;
        $title = null;
        $sectionGobber = [];

        $lineNumber = 0;
        foreach ($lines as $line) {
            $lineNumber++;


            if (false === $sectionHeaderFound) {
                if (false === $firstCommentLine) {
                    if (true === $this->matchCommentLine($line)) {
                        $firstCommentLine = true;
                        $sectionStartLine = $lineNumber;
                        continue;
                    }
                } else {
                    if (false === $titleFound) {

                        /**
                         * Every time a dash line is found (and the title is not fully parsed yet),
                         * we consider it as the potential new start of a header
                         */
                        if (true === $this->matchCommentLine($line)) {
                            $firstCommentLine = true;
                            $sectionStartLine = $lineNumber;
                            continue;
                        } elseif (true === $this->matchTitleLine($line, $title)) {
                            $titleFound = true;
                            continue;
                        }
                    } else {
                        if (false === $secondCommentLine) {
                            if (true === $this->matchCommentLine($line)) {
                                $secondCommentLine = true;
                                $sectionHeaderFound = true;
                                continue;
                            }
                        }
                    }
                }
            } else {


                /**
                 * Any comment line will interrupt the current section.
                 */
                if (true === $this->matchCommentLine($line)) {
                    $this->appendItem($ret, [
                        "title" => $title,
                        "start" => $sectionStartLine,
                        "end" => $lineNumber - 1,
                        "gob" => $sectionGobber,
                    ]);


                    $sectionGobber = [];
                    $sectionStartLine = null;
                    $titleFound = false;
                    $secondCommentLine = false;
                    $sectionHeaderFound = false;
                    $title = null;
                    $firstCommentLine = true;
                    $sectionStartLine = $lineNumber;


                    continue;
                } else {
                    $sectionGobber[] = $line;
                }

            }
        }


        /**
         *
         */
        if (true === $sectionHeaderFound) {
            $this->appendItem($ret, [
                "title" => $title,
                "start" => $sectionStartLine,
                "end" => $lineNumber,
                "gob" => $sectionGobber,
            ]);
        }


        return $ret;
    }


    /**
     * Appends the given item to the ret array.
     * The item array contains:
     *
     * - title: string, the title of the section header comment
     * - start: int, the line number at which the section starts (including the header)
     * - end: int, the line number at which the section ends
     * - gob: array, the captured lines representing the content of the section
     *
     *
     * The appended item is described in the doc comments of the getSectionsInfo method above.
     *
     *
     * @param array $ret
     * @param array $item
     */
    private function appendItem(array &$ret, array $item)
    {
        $ret[] = [
            "title" => $item['title'],
            "start" => $item['start'],
            "end" => $item['end'],
            "content" => implode('', $item['gob']),
        ];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Makes sure the instance is configured properly.
     */
    private function init()
    {
        if (null === $this->file) {
            throw new SectionCommentException("SectionCommentUtil: File not set.");
        }
        if (false === is_file($this->file)) {
            FileSystemTool::mkfile($this->file, "");
        }
    }


    /**
     * Returns whether the current line is a comment line.
     *
     * @param string $line
     * @return bool
     */
    private function matchCommentLine(string $line): bool
    {
        return ('# --------------------------------------' . PHP_EOL === $line);
    }

    /**
     * Returns whether the current line is a title line.
     * Also feeds the title variable if a title was found.
     *
     * @param string $line
     * @param ?string $title
     * @return bool
     */
    private function matchTitleLine(string $line, string &$title = null): bool
    {
        if (preg_match('!^#\s*([\S]+)$!', $line, $match)) {
            $title = trim($match[1]);
            return true;
        }
        return false;
    }

    /**
     * Returns the section header comment from the given title.
     *
     * @param string $title
     * @return string
     */
    private function getHeader(string $title): string
    {
        return <<<EEE
# --------------------------------------
# $title
# --------------------------------------
EEE;
    }

}