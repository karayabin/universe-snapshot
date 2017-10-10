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
 * HtmlBodyEndInterface
 * @author Lingtalfi
 * 2014-10-21
 *
 */
interface HtmlBodyEndInterface
{

    public function render();

    /**
     * @return HtmlBodyEndInterface
     */
    public function addScript($src);

    /**
     * @return HtmlBodyEndInterface
     */
    public function setOption($key, $value);

    /**
     * @return HtmlBodyEndInterface
     */
    public function addContent($content, $pos = 0);


    /**
     * @param $code, either:
     *              - string: the js code in global scope
     *              - array: scope name => code
     * @return HtmlBodyEndInterface
     */
    public function addJsCode($code);


    public function getOption($key, $defaultValue = null);

    public function getContent($pos);


    /**
     * @return array of attributes
     */
    public function getScripts();

    /**
     * @return array,
     *      if scope is null: scope => jsCodes,
     *      else: the jsCodes for the given scope
     */
    public function getJsCodes($scope = null);

}
