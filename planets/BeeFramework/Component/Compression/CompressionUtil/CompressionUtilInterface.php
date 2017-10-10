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
 * CompressionUtilInterface
 * @author Lingtalfi
 * 2015-04-24
 *
 */
interface CompressionUtilInterface
{


    /**
     *
     * Compress the given resources into an "archive" directory.
     * It takes all given resources and place them at the root of an
     * archive directory which path is given by $dst.
     *
     *
     * A resource is either a file or a directory.
     *
     *
     * @param array|string $src , a resource or an array of resources to add to the archive.
     * @param $dst
     * @param array $options
     *          onResourceNotFound: int, how to react when a resource from src is not found
     *                      0: throw an exception (default)
     *                      1: return false
     *                      2: skip
     *
     *          onResourceConflict: int, since files are added relatively to the root,
     *                                      it is possible that two or more resources have the same baseName.
     *                                      This option indicates how to react when two or more resources have the same baseName
     * 
     *                      0: throw an exception (default)
     *                      1: let the concrete implementation handle the problem
     * 
     *          onTargetExist: how to react if the target (dst) already exists.
     *                              
     *                              false|void      callback (dst)
     * 
     *                                  If the callback returns false,
     *                                  it will cause the compress method to abort and return false.
     * 
     *                      By default,  
     *                          If it's a dir, an exception will be thrown
     *                          If it's a file or a link, it will be overwritten
     * 
     * 
     *
     *          More properties might be added by concrete implementations.
     *
     *
     *
     * @return bool, whether or not the compression could be performed
     */
    public function compress($src, $dst, array $options = []);

    /**
     *
     * Decompress an "archive" to a directory.
     * 
     *
     * The decompression results in a directory which location is given by the $dst parameter,
     * and which contains any resources that were put inside of the archive.
     *
     *
     * @param $src
     * @param string|null $dst ,
     *          if dst is null, the directory will be located next to the src "archive",
     *          and its basename will be based on the "archive" too.
     * 
     * @param array $options , an array of options for concrete implementations to use.
     *
     *
     * @return bool, whether or not the decompression could be performed
     */
    public function decompress($src, &$dst = null, array $options = []);
}
