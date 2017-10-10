<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\BodyEntity;

use BeeFramework\Bat\MimeTypeTool;
use BeeFramework\Bat\RandomTool;
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Tool\EncoderTool;


/**
 * MultiPartBodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 * In this implementation, we try to stay pragmatic.
 * We assert that the data comes from an html form,
 * and hence have two types of data:
 *
 *      - fields
 *      - files
 *
 * Both contain entries of key => value,
 *          value can be either:
 *                  - a string,
 *                              for files, it represents the file path,
 *                                          and the file name is the baseName of that file path.
 *
 *                  - an array of value
 *                  - an object (only for files for which you want a pretty name)
 *                              with two properties:
 *                                  - path: the file path
 *                                  - name: the file pretty name
 *
 *
 *
 *
 *
 */
class MultiPartBodyEntity extends BodyEntity
{
    private $boundary;

    public function setFieldsAndFiles(array $fields = [], array $files = [])
    {
        $s = '';
        $eol = "\r\n";
        $boundary = $this->boundary;
        if (null === $boundary) {
            $boundary = md5(time());
        }
        if ($fields || $files) {

            foreach ($fields as $name => $value) {
                if (is_array($value)) {
                    foreach ($value as $k => $val) {
                        $this->addFieldPart($s, $boundary, $eol, $name, $val);
                    }
                }
                else {
                    $this->addFieldPart($s, $boundary, $eol, $name, $value);
                }
            }

            foreach ($files as $name => $file) {
                if (is_array($file)) {
                    foreach ($file as $k => $val) {
                        $this->addFilePart($s, $boundary, $eol, $name, $val);
                    }
                }
                else {
                    $this->addFilePart($s, $boundary, $eol, $name, $file);
                }
            }
            $s .= "--" . $boundary . "--" . $eol . $eol;
        }
        $this->setContent($s);
        $this->setContentType('multipart/form-data; boundary=' . $boundary);
        return $this;
    }


    public function setBoundary($boundary)
    {
        $this->boundary = $boundary;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function addFieldPart(&$s, $boundary, $eol, $fieldName, $value)
    {
        $sName = $this->quoteString($fieldName);
        $s .= '--' . $boundary . $eol;
        $s .= 'Content-Disposition: form-data; name=' . $sName . $eol . $eol;
        $s .= $value . $eol;
    }

    private function addFilePart(&$s, $boundary, $eol, $fieldName, $file)
    {
        $fileName = null;
        if (is_object($file)) {
            if (isset($file->path) && isset($file->name)) {
                $fileName = $file->name;
                $file = $file->path;
            }
            else {
                throw new HttpClientException("The file object does not contain the two properties: path and name");
            }
        }

        if (file_exists($file)) {
            if (null === $fileName) {
                $fileName = basename($file);
            }

            $sFieldName = $this->quoteString($fieldName);
            $sFileName = $this->quoteString($fileName);

            $mime = MimeTypeTool::getMimeType($file);

            $s .= '--' . $boundary . $eol;
            $s .= 'Content-Disposition: form-data; name=' . $sFieldName . '; filename=' . $sFileName . $eol;
            $s .= 'Content-Type: ' . $mime . $eol;
//            $s .= 'Content-Transfer-Encoding: base64' . $eol;
            $s .= $eol;
//            $s .= chunk_split(base64_encode(file_get_contents($file))) . $eol;
            $s .= file_get_contents($file) . $eol;
        }
        else {
            throw new HttpClientException("File not found: $file");
        }
    }

    private function quoteString($s)
    {
        return EncoderTool::quoteString($s);
    }

}
