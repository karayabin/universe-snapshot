<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Finder\Filter;

use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * ExtensionFinderFilter
 * @author Lingtalfi
 * 2015-04-29
 *
 * We can filter single extension, like .jpg.
 * Or multiple extensions, like .meta.txt.
 *
 * Matching is by default case insensitive.
 * We write the extensions without the leading dot.
 *
 * We can get all resources matching a given extensions,
 * or conversely all resources which DON'T match the given extensions.
 *
 *
 */
class ExtensionFinderFilter extends BaseFinderFilter
{


    protected $extensions;
    protected $caseSensitive;

    /**
     * @var string $filterType ,  accept(default)|refute
     *                      if accept, will accept only resources which extensions match
     *                      if refute, will accept any resources except those which extensions match
     *
     */
    protected $filterType;

    public function __construct($filterType, $extensions, $caseSensitive = false)
    {
        if (is_string($extensions)) {
            $extensions = [$extensions];
        }
        if (is_array($extensions)) {
            foreach ($extensions as $ext) {
                if (is_string($ext)) {
                    $this->extensions[$ext] = strlen($ext);
                }
                else {
                    throw new \InvalidArgumentException(sprintf("each extension entry must be of type string, %s given", gettype($ext)));
                }
            }

        }
        else {
            throw new \InvalidArgumentException(sprintf("extensions argument must be of type array, %s given", gettype($extensions)));
        }
        $this->caseSensitive = $caseSensitive;
        if (in_array($filterType, ['accept', 'refute'], true)) {
            $this->filterType = $filterType;
        }
        else {
            throw new \InvalidArgumentException("filterType argument must be a string: either accept or refute");
        }
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS FinderFilterInterface
    //------------------------------------------------------------------------------/
    /**
     * Decides whether or not the given file should be incorporated into the matching results of the finder.
     * If the stopRecursion flag is set to true and the given resource is a dir, the finder will not dive
     * into that dir.
     *
     *
     * @return bool, whether or not the given file is accepted
     */
    public function filter(FinderFileInfo $f, &$stopRecursion = false)
    {


        $retTwo = ('accept' === $this->filterType) ? false : true;
        $retOne = !$retTwo;

        if ($this->extensions) {
            foreach ($this->extensions as $ext => $len) {
                if (
                    (true === $this->caseSensitive && $ext === substr($f->getBasename(), -$len)) ||
                    (false === $this->caseSensitive && strtolower($ext) === strtolower(substr($f->getBasename(), -$len)))
                ) {
                    return $retOne;
                }
            }
        }
        return $retTwo;
    }


}
