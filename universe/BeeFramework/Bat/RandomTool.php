<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * RandomTool
 * @author Lingtalfi
 * 2014-08-30
 *
 */
class RandomTool
{


    public static function getRandom($length = 10, array $options = array())
    {
        $options = array_replace(array(
            'charset' => 'alphaNum',
            /**
             * This only works for non cryptographic charset like md5.
             */
            'removeO' => false,
        ), $options);


        $charset = $options['charset'];
        $algo = false;
        $mb = false;
        $characters = '';
        switch ($charset) {
            case 'md5':
                $algo = 'md5';
                break;
            /**
             * Space is not included
             */
            case 'mysqlPass': // "it's best to use only ascii chars for mysql passwords"
            case 'ascii':
            case 'asciiWithSpace':
                $characters = '!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
                if ('asciiWithSpace' === $charset) {
                    $characters .= ' ';
                }
                break;
            case 'asciiExtended':
                $characters = <<<'EEE'
 !"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~€‚ƒ„…†‡ˆ‰Š‹ŒŽ‘’“”•–—˜™š›œžŸ¡¢£¤¥¦§¨©ª«¬®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿ
EEE;
                $mb = true;
                break;
            case 'frenchAscii':
                $characters = <<<'EEE'
 !"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~€ÀÇÈÉÊËÔàáâäçèéêëîïôöùûü
EEE;
                $mb = true;
                break;
            case 'alphaNum':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alphaNumLc':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                break;
            case 'alphaNumUc':
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'num':
                $characters = '0123456789';
                break;
            case 'alpha':
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alphaLc':
                $characters = 'abcdefghijklmnopqrstuvwxyz';
                break;
            case 'alphaUc':
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            /**
             * See [puschUp™]
             */
            case 'puschUp':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-_';
                break;
            case 'pusch':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz.-_';
                break;
            default:
                $characters = $charset;
                break;
        }


        $randomString = '';
        if (false === $algo) {
            if (true === $options['removeO']) {
                $characters = str_replace(['O', 'o'], '', $characters);
            }
            if (false === $mb) {
                $n = strlen($characters) - 1;
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $n)];
                }
            }
            else {
                $n = mb_strlen($characters) - 1;
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= mb_substr($characters, rand(0, $n), 1);
                }
            }
        }
        else {
            switch ($algo) {
                case 'md5':
                    do {
                        $randomString .= md5(uniqid(time() + rand(0, 1000)));
                    } while (strlen($randomString) < $length);
                    break;
                default:
                    throw new \UnexpectedValueException(sprintf("Unknown algorythm %s", $algo));
                    break;
            }
            $randomString = substr($randomString, 0, $length);
        }
        return $randomString;
    }

}
