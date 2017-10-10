<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\RemoteShell\Command;

use BeeFramework\Bat\ClassTool;


/**
 * BaseCommand
 * @author Lingtalfi
 * 2014-10-29
 *
 * A BaseCommand can use special _vars key to define tags,
 *              which then might be used to shorten writing of other params values.
 *
 */
abstract class BaseCommand implements CommandInterface
{

    private $vars;

    public function __construct()
    {
        $this->vars = [];
    }

    public function execute(array $params)
    {
        $this->prepareParams($params);
        $this->doExecute($params);
    }

    abstract protected function doExecute(array $params);


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CommandInterface
    //------------------------------------------------------------------------------/
    public function getName()
    {

        return strtolower(ClassTool::getClassShortName($this, "Command"));
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function replaceVars(&$string)
    {
        $string = str_replace(array_keys($this->vars), array_values($this->vars), $string);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function prepareParams(array &$params)
    {
        if (array_key_exists('_vars', $params)) {
            $this->vars = $params['_vars'];
            unset($params['_vars']);
        }
    }


}
