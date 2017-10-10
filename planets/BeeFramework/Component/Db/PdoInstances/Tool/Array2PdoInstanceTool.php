<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Db\PdoInstances\Tool;


/**
 * Array2PdoInstanceTool
 * @author Lingtalfi
 * 2015-05-29
 *
 */
class Array2PdoInstanceTool
{

    /**
     * @param array $pdoAsArray
     *          - dsn:
     *          - username:
     *          - password:
     *          - options: array of options, the keys are constants as strings (and the values are the values)
     *                          for instance:
     *                          PDO::MYSQL_ATTR_INIT_COMMAND => SET NAMES 'UTF8'
     * @return \PDO
     */
    public static function getPdoInstance(array $pdoAsArray)
    {
        $options = [];
        if (array_key_exists('options', $pdoAsArray)) {
            foreach ($pdoAsArray['options'] as $k => $v) {
                $options[constant($k)] = $v;
            }
        }
        return new \PDO(
            $pdoAsArray['dsn'],
            $pdoAsArray['username'],
            $pdoAsArray['password'],
            $options
        );
    }
}
