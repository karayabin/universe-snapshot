<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\UniqueBaseName\AffixGenerator;

use BeeFramework\Bat\RandomTool;


/**
 * AffixGenerator
 * @author Lingtalfi
 * 2015-04-15
 *
 */
class AffixGenerator implements AffixGeneratorInterface
{


    /**
     * @var string $type = numeric : one of:
     *
     *          - numeric
     *          - alpha
     *                      uses php incrementor on strings
     *                      http://php.net/language.operators.increment
     *          - random
     *
     */
    protected $type;

    /**
     * @var int $baseLength = 3, the desired width.
     *                      Might be overridden with too many calls.
     */
    protected $baseLength;

    /**
     * @var int|string $startAt = null,
     *              the starting point, only for numeric or alpha types
     *              If null, it's not used
     *              For a numeric type, it should be an int
     *              For an alpha type, it should be a string
     *
     */
    protected $startAt;
    protected $randomOptions;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'type' => 'numeric',
            'baseLength' => 3,
            'startAt' => null,
            'randomOptions' => [],
        ], $options);
        $this->setType($options['type']);
        $this->setBaseLength($options['baseLength']);
        $this->setStartAt($options['startAt']);
        $this->setRandomOptions($options['randomOptions']);
    }






    //------------------------------------------------------------------------------/
    // IMPLEMENTS AffixGeneratorInterface
    //------------------------------------------------------------------------------/
    /**
     * @return callable
     */
    public function getGenerator()
    {
        switch ($this->type) {
            case 'numeric':
                $current = 0;
                if (null !== $this->startAt) {
                    $current = $this->startAt;
                }
                return function () use (&$current) {
                    return vsprintf("%0" . $this->baseLength . "s", $current++);
                };

                break;
            case 'alpha':
                $current = 'a';
                if (null !== $this->startAt) {
                    $current = $this->startAt;
                }
                $current = vsprintf("%'a" . $this->baseLength . "s", $current);
                return function () use (&$current) {
                    return $current++;
                };
                break;
            case 'random':
                return function () use (&$current) {
                    return RandomTool::getRandom($this->baseLength, $this->randomOptions);
                };
                break;
            default:
                throw new \RuntimeException(sprintf("Unknown type: %s", $this->type));
                break;
        }
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getBaseLength()
    {
        return $this->baseLength;
    }

    public function setBaseLength($baseLength)
    {
        $this->baseLength = $baseLength;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getStartAt()
    {
        return $this->startAt;
    }

    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    public function getRandomOptions()
    {
        return $this->randomOptions;
    }

    public function setRandomOptions($randomOptions)
    {
        $this->randomOptions = $randomOptions;
    }


}
