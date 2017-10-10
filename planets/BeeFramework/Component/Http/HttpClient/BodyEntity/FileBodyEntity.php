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
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;


/**
 * FileBodyEntity
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class FileBodyEntity extends BodyEntity
{

    /**
     * $convertToBinary, bool,
     *                  should be true if you pass the file path,
     *                  or false if you directly pass the file content
     *
     *
     * setFile will try to guess the content type, based on the file extension (if any).
     *
     * If you know the content type, use the setContentType method AFTER
     * a call to setFile.
     *
     */
    public function setFile($file, $convertToBinary = true)
    {
        $type = 'application/octet-stream';
        if (true === $convertToBinary) {
            if (file_exists($file)) {
                $type = MimeTypeTool::getMimeType($file);
                $file = file_get_contents($file);
            }
            else {
                throw new HttpClientException("File not found: $file");
            }
        }
        $this->setContent($file);
        $this->setContentType($type);
        return $this;
    }
}
