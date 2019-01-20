<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\HtmlPage;


/**
 * HtmlHeadInterface
 * @author Lingtalfi
 * 2014-10-21
 *
 */
interface HtmlHeadInterface
{

    public function render();


    /**
     * @return HtmlHeadInterface
     */
    public function setTitle($title);

    /**
     * @return HtmlHeadInterface
     */
    public function setDescription($title);


    /**
     * @return HtmlHeadInterface
     */
    public function addScript($src);

    /**
     * @return HtmlHeadInterface
     */
    public function addLink($href, array $extraAttr = []);

    /**
     * @return HtmlHeadInterface
     */
    public function setOption($key, $value);

    /**
     * @return HtmlHeadInterface
     */
    public function addContent($content, $pos = 0);


    public function getTitle();

    public function getDescription();

    /**
     * @return array of attributes
     */
    public function getScripts();

    /**
     * @return array of attributes
     */
    public function getLinks();

    public function getOption($k, $defaultValue = null);

    public function getContent($pos);

}
