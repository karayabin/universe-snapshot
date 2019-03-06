<?php


namespace Ling\UltimateUploadHandler\Constraint;


use Ling\Bat\ConvertTool;

class SizeConstraint extends BaseConstraint
{

    protected $maxSize;

    public function __construct()
    {
        parent::__construct();
        $this->maxSize = "5M";
        $this->messages["too_large"] = "
The file is too large ({{currentFileSize}}). 
Allowed maximum size is {{maxFileSize}}.";
    }

    public function setMaxSize(string $maxSize)
    {
        $this->maxSize = $maxSize;
        return $this;
    }

    public function check(array $phpFile, string &$errorMessage = null)
    {
        $fileSize = $phpFile['size'];

        $maxFileSize = ConvertTool::convertHumanSizeToBytes($this->maxSize);
        if ($fileSize > $maxFileSize) {


            $humanFileSize = ConvertTool::convertBytes($fileSize, "h");

            $errorMessage = str_replace([
                '{{currentFileSize}}',
                '{{maxFileSize}}',
            ], [
                $humanFileSize,
                $this->maxSize,
            ], $this->messages['too_large']);
            return false;
        }
        return true;
    }


}