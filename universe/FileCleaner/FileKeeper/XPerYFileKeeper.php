<?php


namespace FileCleaner\FileKeeper;




abstract class XPerYFileKeeper extends TimeBasedFileKeeper
{

    protected $periods;
    private $x;


    public function __construct()
    {
        parent::__construct();
        $this->periods = [];
    }


    public function setX($x)
    {
        $this->x = $x;
        return $this;
    }


    public function getKeptFiles()
    {
        $keepFiles = [];

        foreach ($this->periods as $index => $files) {

            $n = count($files);
            if ($n > 0 && $this->x > 0) {
                $keepFiles[] = $files[0];
                if ($n > 1 && $this->x > 1) {
//                    $keepFiles[] = $files[$n - 1];

                    // equal distribution
                    $x = $this->x;
                    if ($x > $n) {
                        $x = $n;
                    }
                    $nbSegments = $x;

                    $segmentLength = floor($n / $nbSegments);

                    for ($i = 0; $i < $nbSegments; $i++) {
                        if (0 !== $i) {
                            $offset = $i * $segmentLength;
                            $keepFiles[] = $files[$offset];
                        }
                    }

                }
            }
        }

        $keepFiles = array_unique($keepFiles);
        $this->keptFiles = $keepFiles;
        return parent::getKeptFiles();
    }

}