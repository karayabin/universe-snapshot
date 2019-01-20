<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\Tool;

use BeeFramework\Application\ParameterBag\BdotParameterBag;
use BeeFramework\Application\ParameterBag\ParameterBagInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainer\ReadableParametersServiceContainer;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;
use BeeFramework\Bat\BdotTool;
use BeeFramework\Notation\Service\Biscotte\BiscotteParser;


/**
 * HotServiceContainerTool
 * @author Lingtalfi
 * 2015-04-17
 *
 */
class HotServiceContainerTool
{


    public static function createHotServiceContainer(array $services, $serviceParameters, array $options = [])
    {
        $options = array_replace([
            'onServiceCodeAttached' => function ($dotPath, ServicePlainCode $plainCode) {

            },
        ], $options);
        $cb = $options['onServiceCodeAttached'];


        $bag = null;
        if (is_array($serviceParameters)) {
            $bag = BdotParameterBag::create()->setAll($serviceParameters);
        }
        elseif ($serviceParameters instanceof ParameterBagInterface) {
            $bag = $serviceParameters;
        }
        else {
            throw new \InvalidArgumentException(sprintf("servicesParameters argument must be either of type array or ParameterBagInterface, %s given", gettype($serviceParameters)));
        }

        $container = new ReadableParametersServiceContainer($bag);
        $biscotte = new BiscotteParser();
        BdotTool::walk($services, function (&$v, $k, $p) use ($biscotte, $container, $cb) {
            /**
             * We want to exclude any service which name contains the forbidden words:
             *
             * - _args
             *
             * That's because otherwise it creates parasitic redundant methods.
             * See reflections on this somewhere else.
             */
            if (false !== $code = $biscotte->parseValue($v, $p)) {
                if (false === strpos($p, '._args')) {
                    $oCode = new ServicePlainCode($code);
                    $container->setCode($p, $oCode);
                    call_user_func($cb, $p, $oCode);
                }
            }
        });
        return $container;
    }
}
