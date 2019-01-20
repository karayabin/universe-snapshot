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

use BeeFramework\Bat\BglobTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * AbstractPatternFinderFilter
 * @author Lingtalfi
 * 2015-04-29
 *
 */
abstract class AbstractPatternFinderFilter extends BaseFinderFilter
{


    private $pattern;
    /**
     * @var bool $accept =true
     *                  if true, accept all resources that match (and only those)
     *                  if false, accept all resources but those that match
     *
     *                  In other words, when the pattern matches,
     *                  is the file accepted or refuted.
     *
     */
    private $accept;

    /**
     * @var         bool callable ( isAccepted )
     *              Returns whether or not to stop the recursion if the file has been accepted
     */
    private $onAcceptedStopRecursion;

    abstract protected function getMethodName();

    public function __construct($pattern, $isRegex = false, $accept = true, $onAcceptedStopRecursion = null)
    {
        if (is_string($pattern)) {
            if (false === $isRegex) {
                $this->pattern = BglobTool::toRegex($pattern);
            }
            else {
                $this->pattern = $pattern;
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("pattern argument must be of type string, %s given", gettype($pattern)));
        }
        $this->accept = $accept;
        $this->onAcceptedStopRecursion = $onAcceptedStopRecursion;
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
        $ret = $this->filterFile($f);
        if (null !== $this->onAcceptedStopRecursion) {
            if (is_callable($this->onAcceptedStopRecursion)) {
                $stopRecursion = call_user_func($this->onAcceptedStopRecursion, $ret);
            }
            elseif (is_bool($this->onAcceptedStopRecursion)) {
                $stopRecursion = $this->onAcceptedStopRecursion;
            }
        }
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function filterFile(FinderFileInfo $f)
    {
        $ret1 = $this->accept;
        $ret2 = !$ret1;
        $method = $this->getMethodName();
        if (preg_match($this->pattern, $f->$method())) {
            return $ret1;
        }
        else {
            return $ret2;
        }
    }


}
