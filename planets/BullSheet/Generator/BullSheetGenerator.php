<?php

namespace BullSheet\Generator;

/*
 * LingTalfi 2016-02-10
 */
use Bat\LocalHostTool;
use BullSheet\Tool\PickRandomLineTool;
use DirScanner\YorgDirScannerTool;

class BullSheetGenerator implements BullSheetGeneratorInterface
{


    private $dir;
    private $fileLists;


    public function __construct()
    {
        $this->fileLists = [];
    }


    public static function create()
    {
        return new static();
    }


    public function getPureData($domain = null): string
    {
        $file = $this->selectFile($domain);
        return PickRandomLineTool::getRandomLine($file);
    }


    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getDir()
    {
        return $this->dir;
    }

    protected function selectFile($domain)
    {
        $fileList = $this->getFileList($domain);
        return $fileList[array_rand($fileList)];
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


    private function getFileList($domain = null): array
    {
        if (is_array($domain)) {
            $hashIndex = implode('', $domain);
        }
        else {
            $hashIndex = (string)$domain;
        }
        if (array_key_exists($hashIndex, $this->fileLists)) {
            $fList = $this->fileLists[$hashIndex];
        }
        else {
            $fList = [];
            if (is_array($domain)) {
                foreach ($domain as $dom) {
                    $this->collectDataFiles($dom, $fList);
                }
            }
            else {
                $this->collectDataFiles((string)$domain, $fList);
            }
            $this->fileLists[$hashIndex] = $fList;
        }
        return $fList;
    }

    private function collectDataFiles(string $dom, array &$fileList, $silent = false)
    {
        // resolving wildcard if any
        if (false !== ($pos = strpos($dom, '/*/'))) {

            $rPath = substr($dom, 0, $pos);
            $baseDir = $this->getDir() . "/" . $rPath;
            $suffix = substr($dom, $pos + 3);

            if (is_dir($baseDir)) {
                $domains = scandir($baseDir);


                foreach ($domains as $domain) {
                    if (
                        '.' !== $domain &&
                        '..' !== $domain &&
                        '.' !== substr($domain, 0, 1)  // removing the hidden files too (.DS_Store, ...)
                    ) {
                        $rdom = $rPath . '/' . $domain;
                        if (strlen($suffix) > 0) {
                            $rdom .= '/' . $suffix;
                        }
                        /**
                         * We call silent mode, because it happens that one of the rdom try is not a directory.
                         * For instance, if you have this structure:
                         *
                         * - first_name/
                         * ----- 1967/
                         * --------- male/
                         * --------- female/
                         * ----- 1968/
                         * --------- male/
                         * --------- female/
                         * ----- all/
                         *
                         * You see that the all directory does not contain a male or female directory,
                         * so a call to this domain
                         *
                         *          first_name/(wildcard)/male
                         *
                         * will successfully try the
                         *
                         *          first_name/1967/male
                         * and
                         *          first_name/1968/male
                         * directories,
                         * but also fail trying the non existing first_name/all/male directory.
                         *
                         */
                        $this->collectDataFiles($rdom, $fileList, true);
                    }
                }
            }
            else {
                trigger_error("This is not a directory: $baseDir (expanded from $dom)", E_USER_WARNING);
            }
        }
        else {
            $f = $this->getDir() . "/" . $dom;
            if (is_dir($f)) {
                $files = YorgDirScannerTool::getFilesWithExtension($f, 'txt', false, true);
                $fileList = array_merge($fileList, $files);
            }
            else {
                if (false === $silent) {
                    trigger_error("This is not a directory: $f", E_USER_WARNING);
                }
            }
        }
    }


}
