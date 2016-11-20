<?php

namespace UniqueNameGenerator\Generator;

/*
 * LingTalfi 2016-01-07
 * 
 * 
 * Use this to generate names like this:
 * 
 * - fileName.jpg
 * - fileName - copy.jpg
 * - fileName - copy 2.jpg
 * - fileName - copy 3.jpg
 * 
 * 
 * or like this (default):
 * 
 * - fileName.jpg
 * - fileName-2.jpg
 * - fileName-3.jpg
 * 
 * 
 * 
 * 
 * 
 * To generate a name, this class use the following schema:
 * 
 *      name:  <dir>  </>  <prefix>   <generatedThing>    <suffix>
 * 
 * 
 * Where in most cases, prefix is the fileName (https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.fileName.eng.md#file-name),
 * and suffix is a dot followed by the file extension.
 * 
 * The only exceptions for this class is when there is no extension.
 *   
 * 
 * 
 */
use Bat\FileSystemTool;

class SimpleFileSystemUniqueNameGenerator extends AbstractFileSystemUniqueNameGenerator
{

    private $prefix;
    private $suffix;
    private $generateAffixCb;


    public function generate($name)
    {
        $this->prefix = FileSystemTool::getFileName($name);
        $this->suffix = FileSystemTool::getFileExtension($name);
        if ('' !== $this->suffix) {
            $this->suffix = '.' . $this->suffix;
        }
        if (null === $this->generateAffixCb) {
            $this->generateAffixCb = function ($n) {
                return '-' . ++$n;
            };
        }
        return parent::generate($name);
    }

    protected function generateName($name, $n)
    {

        return $this->dir . "/" . $this->prefix . call_user_func($this->generateAffixCb, $n) . $this->suffix;
    }

    public function setGenerateAffixCb(callable $generateAffixCb)
    {
        $this->generateAffixCb = $generateAffixCb;
        return $this;
    }


}
