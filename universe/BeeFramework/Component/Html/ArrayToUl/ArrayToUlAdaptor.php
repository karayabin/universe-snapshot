<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\ArrayToUl;


/**
 * ArrayToUlAdaptor
 * @author Lingtalfi
 * 2015-01-15
 *
 */
class ArrayToUlAdaptor
{

    protected $options;

    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            /**
             * For both formats below:
             * string|string callback ( key, value, path )
             */
            'arrayItemFormat' => '<li>%s: <ul>%s</ul></li>',
            'regularItemFormat' => '<li>%s: %s</li>',
        ], $options);
    }


    public function render(array $values)
    {
        $s = '';
        foreach ($values as $k => $v) {
            $s .= $this->renderItem($k, $v, str_replace('.', '\\.', $k));
        }
        if (true === $this->shouldWrapItems($s)) {
            $this->wrapItems($s);
        }
        return $s;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function renderItem($key, $value, $path)
    {
        /**
         * Note: if you want a mechanism to prevent certain keys to be hidden based on path,
         * you want to extend this method.
         */
        $s = '';
        if (is_array($value)) {
            if (true === $this->shouldDisplayArray($value)) {
                $c = '';
                foreach ($value as $k => $v) {
                    $c .= $this->renderItem($k, $v, $path . '.' . str_replace('.', '\\.', $k));
                }
                $s .= sprintf($this->getArrayItemFormat($key, $value, $path), $key, $c);
            }
        }
        else {
            $s .= sprintf($this->getRegularItemFormat($key, $value, $path), $key, $this->valueToString($value));
        }
        return $s;
    }

    protected function wrapItems(&$items)
    {
        $items = '<ul>' . $items . '</ul>';
    }

    protected function valueToString($value)
    {
        return htmlspecialchars((string)$value);
    }


    protected function shouldDisplayArray(array $value)
    {
        return (count($value) > 0);
    }

    protected function shouldWrapItems($items)
    {
        return (!empty($items));
    }

    protected function getArrayItemFormat($key, $value, $path)
    {
        $c = $this->options['arrayItemFormat'];
        if (is_callable($c)) {
            return call_user_func($c, $key, $value, $path);
        }
        return $c;
    }

    protected function getRegularItemFormat($key, $value, $path)
    {
        $c = $this->options['regularItemFormat'];
        if (is_callable($c)) {
            return call_user_func($c, $key, $value, $path);
        }
        return $c;
    }

}
