<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Html\Crawler\BDomElement;


/**
 * BDomElementInterface
 * @author Lingtalfi
 * 2015-06-18
 *
 */
interface BDomElementInterface
{

    public function name();

    public function html();

    public function innerHtml();

    public function collapsedText();

    public function text();

    public function attributes();

    public function attribute($name, $default = null);

    public function hasAttribute($name);

    /**
     * @return \DOMElement
     */
    public function domElement();
}
