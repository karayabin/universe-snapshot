<?php


namespace PhpFile;


use Bat\FileSystemTool;

class PhpFile
{


    protected $useStatements;
    protected $headStatements;
    protected $bodyStatements;

    public function __construct()
    {
        $this->useStatements = [];
        $this->headStatements = [];
        $this->bodyStatements = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addUseStatement($useStatement)
    {
        if (is_string($useStatement)) {
            $useStatement = [$useStatement];
        }
        $this->useStatements = array_merge($this->useStatements, $useStatement);
        return $this;
    }

    public function addHeadStatement($statement)
    {
        if (is_string($statement)) {
            $statement = [$statement];
        }
        $this->headStatements = array_merge($this->headStatements, $statement);
        return $this;
    }

    public function addBodyStatement($bodyStatement)
    {
        if (is_string($bodyStatement)) {
            $bodyStatement = [$bodyStatement];
        }
        $this->bodyStatements = array_merge($this->bodyStatements, $bodyStatement);
        return $this;
    }

    public function render($destination = null)
    {
        $br = PHP_EOL;

        $s = '';
        $s .= '<?php ' . $br;
        $s .= $br;

        //--------------------------------------------
        // USE STATEMENTS
        //--------------------------------------------
        foreach ($this->useStatements as $statement) {
            $s .= $statement . $br;
        }
        $s .= str_repeat(PHP_EOL, 2);


        //--------------------------------------------
        // HEAD STATEMENTS
        //--------------------------------------------
        foreach ($this->headStatements as $statement) {
            $s .= $statement . $br;
        }
        $s .= str_repeat(PHP_EOL, 2);


        //--------------------------------------------
        // BODY STATEMENTS
        //--------------------------------------------
        foreach ($this->bodyStatements as $statement) {
            $s .= $statement . $br;
        }
        $s .= str_repeat(PHP_EOL, 2);


        if (null !== $destination) {
            FileSystemTool::mkfile($destination, $s);
        }


        return $s;
    }

}