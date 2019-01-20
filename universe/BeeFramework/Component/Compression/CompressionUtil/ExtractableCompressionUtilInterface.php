<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Compression\CompressionUtil;


/**
 * ExtractableCompressionUtilInterface
 * @author Lingtalfi
 * 2015-05-05
 *
 */
interface ExtractableCompressionUtilInterface
{


    /**
     * Returns the content of a file from the archive, without extracting the archive,
     * @return false|string,
     *                  the content of the file as a string,
     *                  or false if the file was not found.
     */
    public function extractFile($archivePath, $fileRelativePath);

}
