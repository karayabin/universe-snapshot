<?php


namespace PhpTailer;


use Bat\FileTool;

/**
 * Works only on a machine with the following programs:
 *
 * - cat
 * - grep
 * - head
 * - tail
 *
 * (i.e. not windows)
 *
 */
class PhpTailer
{
    protected $file;
    protected $nipp;
    protected $reverse;


    public function __construct()
    {
        $this->nipp = 20;
        $this->reverse = false;
    }

    public static function create()
    {
        return new static();
    }

    /**
     * params:
     *      - page: int
     *      - expression: a grep expression.
     *              Note that we don't do special escape treatment, so that you can use the full regex power (alternatives, ...)
     *              So if you are looking for a string like [debug], you should escape it manually (i.e. \[debug\])
     */
    public function output(array $params = [], &$nbPages = 0)
    {
        $page = $params['page'] ?? 1;
        $expression = $params['expression'] ?? null;

        if ($this->nipp > 0) {

            if (file_exists($this->file)) {

                // first getting the number of lines
                $cmd = "cat \"" . str_replace('"', '\"', $this->file) . "\"";
                if ($expression) {
                    $cmd .= " | grep \"" . $expression . "\"";
                }
                $cmd .= " | wc -l";
                ob_start();
                passthru($cmd);
                $nbLines = (int)trim(ob_get_clean());


                if (0 === $nbLines) {
                    $this->error("no lines to show");
                } else {


                    $nbPages = ceil($nbLines / $this->nipp);


                    // fix potential page problems
                    if ($page < 1) {
                        $page = 1;
                    } elseif ($page > $nbPages) {
                        $page = $nbPages;
                    }

                    if (false === $this->reverse) {
                        $startLine = ($page - 1) * $this->nipp;
                        $startLine++;
                    } else {
                        $startLine = $nbLines - ($this->nipp * $page);
                        if ($startLine < 0) {
                            $startLine = 0;
                        }
                    }

//                    a("nbLines=$nbLines, nbPages=$nbPages, startLine=$startLine");

                    // now compiling command
                    $cmd = "cat \"" . str_replace('"', '\"', $this->file) . "\"";
                    if ($expression) {
                        $cmd .= " | grep \"" . $expression . "\"";
                    }

                    // https://unix.stackexchange.com/questions/47407/cat-line-x-to-line-y-on-a-huge-file
                    // tail -n+10 kamille.log.txt | head -n 10
                    // cat kamille.log.txt | grep "\[debug\]" | tail -n+2 | head -n 3
                    // works on ubuntu and mac
                    $cmd .= " | tail -n+$startLine | head -n " . $this->nipp;


                    ob_start();
                    passthru($cmd);
                    echo nl2br(ob_get_clean());


                }
            } else {
                $this->error("File not found: {$this->file}");
            }
        } else {
            $this->error("The number of items per page cannot be less than 1");
        }
    }


    public function setFile(string $file)
    {
        $this->file = $file;
        return $this;
    }

    public function setReverse(bool $reverse)
    {
        $this->reverse = $reverse;
        return $this;
    }

    public function setNumberOfItemsPerPage(int $nipp)
    {
        $this->nipp = $nipp;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        echo $msg;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getNbLines($file)
    {
        return FileTool::getNbLines($file);
    }
}