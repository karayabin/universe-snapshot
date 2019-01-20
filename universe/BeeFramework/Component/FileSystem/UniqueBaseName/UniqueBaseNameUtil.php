<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\UniqueBaseName;

use BeeFramework\Bat\FileTool;
use BeeFramework\Component\FileSystem\UniqueBaseName\AffixGenerator\AffixGenerator;
use BeeFramework\Exception\FileSystemException;


/**
 * UniqueBaseNameUtil
 * @author Lingtalfi
 * 2015-04-15
 *
 *
 *
 * This class helps finding a new unique baseName for a file/dir we are about to create.
 *
 * The following format serves as a reference for the class:
 *
 *
 *      format: (AFFIX SEP)? BASENAME (SEP AFFIX)? ( . EXTENSION)?
 *
 */
class UniqueBaseNameUtil
{


    /**
     * The affix generator is a callback that returns a different affix for every call.
     * Not to confound with an AffixGeneratorInterface object.
     */
    protected $affixGenerator;


    protected $sep;

    /**
     * a prefix for the affix
     */
    protected $affixHead;
    /**
     * a suffix for the affix
     */
    protected $affixTail;

    /**
     * suffix|prefix
     */
    protected $affixType;
    private $limit;

    public function __construct()
    {
        $this->sep = '-';
        $this->affixType = 'suffix';
        $this->limit = 5000;
    }


    /**
     * @throws FileSystemException
     */
    public function getUniqueResourceBySibling($file)
    {
        if (file_exists($file)) {
            $parentDir = dirname($file);
            $baseName = basename($file);
            $ret = $this->getUniqueResource($baseName, $parentDir);
        }
        else {
            throw new FileSystemException(sprintf("file not found: %s", $file));
        }
        return $ret;
    }

    public function getUniqueResource($baseName, $parentDir)
    {
        if (null === $this->affixGenerator) {
            $gen = new AffixGenerator();
            $this->affixGenerator = $gen->getGenerator();
        }


        $file = $parentDir . '/' . $baseName;
        if (file_exists($file)) {


            list($format, $fileName) = $this->prepareFormatAndFileName($baseName);

            $c = 0;
            while (file_exists($file)) {
                $affix = call_user_func($this->affixGenerator);
                $newBaseName = sprintf($format, $fileName, $affix);
                $file = $parentDir . '/' . $newBaseName;
                if (false === $this->checkLimit($c)) {
                    break;
                }
                $c++;
            }
        }

        return $file;
    }


    public function getUniqueResourceByArray($baseName, array $array)
    {
        if (null === $this->affixGenerator) {
            $gen = new AffixGenerator();
            $this->affixGenerator = $gen->getGenerator();
        }

        if (in_array($baseName, $array, true)) {

            list($format, $fileName) = $this->prepareFormatAndFileName($baseName);

            $c = 0;
            while (in_array($baseName, $array, true)) {
                $affix = call_user_func($this->affixGenerator);
                $baseName = sprintf($format, $fileName, $affix);
                if (false === $this->checkLimit($c)) {
                    break;
                }
                $c++;
            }
        }
        return $baseName;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function getAffixGenerator()
    {
        return $this->affixGenerator;
    }


    public function setAffixGenerator($affixGenerator)
    {
        $this->affixGenerator = $affixGenerator;
    }

    public function getAffixHead()
    {
        return $this->affixHead;
    }

    public function setAffixHead($affixHead)
    {
        $this->affixHead = $affixHead;
    }

    public function getAffixTail()
    {
        return $this->affixTail;
    }

    public function setAffixTail($affixTail)
    {
        $this->affixTail = $affixTail;
    }

    public function getAffixType()
    {
        return $this->affixType;
    }

    public function setAffixType($affixType)
    {
        $this->affixType = $affixType;
    }

    public function getSep()
    {
        return $this->sep;
    }

    public function setSep($sep)
    {
        $this->sep = $sep;
    }
    
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function checkLimit($c)
    {
        if ($c > $this->limit) {
            throw new \RuntimeException(sprintf("Cannot find a unique fileName after %s tries. You might want to override this limit", $this->limit));
        }
        return true;
    }


    private function prepareFormatAndFileName($baseName)
    {
        // find the extension
        $extension = FileTool::getExtension($baseName);
        /**
         * find the format:
         * - %1 is the fileName
         * - %2 is the affix
         */
        if ('suffix' === $this->affixType) {
            $format = '%1$s' . $this->sep . (string)$this->affixHead . '%2$s' . (string)$this->affixTail;
        }
        else {
            $format = (string)$this->affixHead . '%2$s' . (string)$this->affixTail . $this->sep . '%1$s';
        }
        if (false !== $extension) {
            $format .= '.' . $extension;
        }
        $fileName = FileTool::getFileName($baseName);
        return [
            $format,
            $fileName,
        ];
    }

}
