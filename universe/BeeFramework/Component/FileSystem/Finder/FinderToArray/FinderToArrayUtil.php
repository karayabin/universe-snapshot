<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Finder\FinderToArray;

use BeeFramework\Component\FileSystem\Finder\BaseFinder;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * FinderToArrayUtil
 * @author Lingtalfi
 * 2015-04-29
 *
 */
class FinderToArrayUtil
{

    protected $options;

    public function __construct(array $options = [])
    {

        $this->options = array_replace([
            /**
             * Array of baseNames used by the default filter to decide
             * whether or not the entry should be part of the result.
             */
            'ignoreBaseNames' => [
                '.DS_Store',
            ],
        ], $options);
    }


    /**
     * @param BaseFinder $finder
     * @param null|array $propToMethods
     *                      Array of properties (of the returned array) to methods (of FinderFileInfo)
     * @param bool =true $reduce,
     *                          if there is only one property in the $propToMethods array,
     *                          whether or not to create entries as string instead of as an array (of properties).
     *
     * @return array of entries (string or array, depending on the $reduce value).
     */
    public function toArray(BaseFinder $finder, $propToMethods = null, $reduce = true)
    {
        $ret = [];
        if (null === $propToMethods) {
            $propToMethods =
                [
                    'components' => 'getComponentsPath',
                ];
        }
        $finder->find(function (FinderFileInfo $f) use (&$ret, $propToMethods, $reduce) {
            if (true === $this->accept($f)) {
                $res = [];
                $n = 0;
                foreach ($propToMethods as $prop => $method) {
                    $res[$prop] = $f->$method();
                    $n++;
                }
                if (true === $reduce && 1 === $n) {
                    $res = current($res);
                }
                $ret[] = $res;
            }
        });
        return $ret;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function accept(FinderFileInfo $f)
    {
        if (is_array($this->options['ignoreBaseNames']) && in_array($f->getBasename(), $this->options['ignoreBaseNames'], true)) {
            return false;
        }
        return true;
    }


}
