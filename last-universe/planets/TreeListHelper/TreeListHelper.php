<?php

namespace TreeListHelper;

/*
 * LingTalfi 2016-08-26
 */
use Bat\CaseTool;
use Bat\FileSystemTool;

class TreeListHelper
{

    private $nameHumanize;
    private $transform;
    private $dirFilter;
    private $fileFilter;
    private $allowedExtensions;
    private $pruneEmptyDir;
    private $ignoreLinks;
    private $showBrokenLinks;
    private $skipHidden;
    private $decorate;

    private function __construct(array $options)
    {
        $this->nameHumanize = $options['nameHumanize'] ?? true;
        $this->ignoreLinks = $options['ignoreLinks'] ?? true;
        $this->showBrokenLinks = $options['showBrokenLinks'] ?? false;
        $this->skipHidden = $options['skipHidden'] ?? true;
        $this->allowedExtensions = $options['allowedExtensions'] ?? null;
        if (is_array($this->allowedExtensions)) {
            $this->allowedExtensions = array_map('strtolower', $this->allowedExtensions);
        }
        $this->pruneEmptyDir = $options['pruneEmptyDir'] ?? true;
        $this->dirFilter = $options['dirFilter'] ?? function () {
                return true;
            };
        $this->fileFilter = $options['fileFilter'] ?? function () {
                return true;
            };
        $this->transform = $options['transform'] ?? function ($name) {
                return $name;
            };
        $this->decorate = $options['decorate'] ?? function (array &$item) {

            };

    }


    public static function scan(string $dir, array $options = []): array
    {
        if (is_dir($dir)) {
            $o = new TreeListHelper($options);
            $ret = [];
            $o->_scan($dir, $ret);
            return $ret;
        }
        throw new TreeListHelperException("dir is not valid: " . $dir);
    }


    private function _scan(string $dir, array &$ret, &$hasFile = false)
    {
        $files = scandir($dir);
        foreach ($files as $basename) {
            if ('.' !== $basename && '..' !== $basename) {

                $path = $dir . "/" . $basename;
                $isLink = is_link($path);

                if (
                    false === $isLink ||
                    (true === $isLink && false === $this->ignoreLinks)
                ) {

                    $item = null;

                    // hidden thing?
                    if (true === $this->skipHidden && '.' === $basename[0]) {
                        continue;
                    }


                    // dir
                    if (true === is_dir($path)) {
                        if (true === call_user_func($this->dirFilter, $basename, $path)) {
                            if (true === $this->nameHumanize) {
                                $name = $this->nameHumanizeDir($basename);
                            }
                            else {
                                $name = $basename;
                            }
                            $name = call_user_func($this->transform, $name);
                            $children = [];
                            $atLeastOneFile = false;
                            $this->_scan($path, $children, $atLeastOneFile);

                            // prune empty dir 
                            if (false === $atLeastOneFile && true === $this->pruneEmptyDir) {
                                $item = null;
                            }
                            else {
                                $item = [
                                    'name' => $name,
                                    'path' => $basename,
                                    'children' => $children,
                                ];
                            }
                        }
                    }
                    // file or broken link
                    else {

                        
                        if (false === is_file($path) && false === $this->showBrokenLinks) {
                            continue;
                        }

                        // extension filter
                        if (is_array($this->allowedExtensions)) {
                            $ext = strtolower(FileSystemTool::getFileExtension($basename));
                            if (false === in_array($ext, $this->allowedExtensions)) {
                                continue;
                            }
                        }

                        if (true === call_user_func($this->fileFilter, $basename, $path)) {
                            if (true === $this->nameHumanize) {
                                $name = $this->nameHumanizeFile($basename);
                            }
                            else {
                                $name = $basename;
                            }
                            $name = call_user_func($this->transform, $name);

                            $item = [
                                'name' => $name,
                                'path' => $basename,
                            ];
                            $hasFile = true;

                        }
                    }


                    // adding the resource (dir/file/link)
                    if (null !== $item) {
                        call_user_func_array($this->decorate, [&$item]);
                        $ret[] = $item;
                    }
                }
            }
        }
    }


    private function nameHumanizeDir(string $basename): string
    {
        return $basename;
    }

    private function nameHumanizeFile(string $basename): string
    {
        $name = FileSystemTool::getFileName($basename);
        return $name;
    }


}
