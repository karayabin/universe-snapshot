<?php


namespace UltimateUploadHandler\UploadHandler;


use Bat\FileSystemTool;
use UltimateUploadHandler\Constraint\ConstraintInterface;
use UltimateUploadHandler\Exception\ConstraintUltimateUploadHandlerException;
use UltimateUploadHandler\Exception\UltimateUploadHandlerException;

class BasicUploadHandler implements UltimateUploadHandlerInterface
{


    /**
     * @var ConstraintInterface[]
     */
    protected $constraints;
    protected $fileName;
    protected $dstFile;
    protected $constraintErrMsgPrefix;


    public function __construct()
    {
        $this->constraints = [];
        $this->fileName = "files";
        $this->constraintErrMsgPrefix = "Error while checking file {{fileName}}: ";
        $this->dstFile = null;
    }

    public static function create()
    {
        return new static();
    }

    public function setDstFile($dstFile)
    {
        $this->dstFile = $dstFile;
        return $this;
    }

    public function setConstraintErrMsgPrefix(string $constraintErrMsgPrefix)
    {
        $this->constraintErrMsgPrefix = $constraintErrMsgPrefix;
        return $this;
    }



    public function checkFile(array $phpFileItem)
    {
        foreach ($this->constraints as $constraint) {
            $errorMessage = null;
            $constraint->check($phpFileItem, $errorMessage);
            if ($errorMessage) {
                $fileName = $phpFileItem['name'];
                $msgPrefix = str_replace('{{fileName}}', $fileName, $this->constraintErrMsgPrefix);
                throw new ConstraintUltimateUploadHandlerException($msgPrefix . $errorMessage);
            }
        }
    }

    public function moveFile(array $phpFileItem)
    {
        $fileName = $phpFileItem['name'];
        $dstFile = $this->dstFile;
        if (null === $dstFile) {
            $dstFile = sys_get_temp_dir() . "/" . $fileName;
        }
        if (is_callable($dstFile)) {
            $dstFile = call_user_func($dstFile, $phpFileItem);
        }


        // security check
        if (true) {
            if (false === is_uploaded_file($phpFileItem['tmp_name'])) {
                throw new UltimateUploadHandlerException("Security warning: file $fileName was not uploaded via HTTP POST. Upload canceled");
            }
        }


        // creating dst folder if not exist
        FileSystemTool::mkdir(dirname($dstFile));


        // moving the file
        move_uploaded_file($phpFileItem['tmp_name'], $dstFile);


        return $this->getReturnInfo($dstFile, $phpFileItem);

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function addConstraint(ConstraintInterface $constraint)
    {
        $this->constraints[] = $constraint;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getReturnInfo(string $dstFile, array $phpFileItem)
    {
        return [
            "dstFile" => $dstFile,
        ];
    }

}