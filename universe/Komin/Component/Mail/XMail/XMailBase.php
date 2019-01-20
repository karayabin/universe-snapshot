<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Mail\XMail;

use Komin\Component\Mail\XMail\XMailer\XMailerInterface;


/**
 * XMailBase
 * @author Lingtalfi
 * 2014-12-07
 *
 */
abstract class XMailBase implements XMailInterface
{

    protected $defaultMailerType;
    protected $mailers;

    // cache
    private $mailerInstances;


    public function __construct(){
        $this->mailerInstances = [];
    }


    public function init(array $mailersConf, array $options = [])
    {

        $defaultMailerType = 'default';
        if (array_key_exists('defaultMailerType', $mailersConf)) {
            $defaultMailerType = $mailersConf['defaultMailerType'];
        }
        $this->defaultMailerType = $defaultMailerType;

        $mailers = [];
        if (array_key_exists('mailers', $mailersConf)) {
            $mailers = $mailersConf['mailers'];
        }
        $this->mailers = $mailers;
    }

    /**
     * @return XMailerInterface|false
     */
    public function getMailer($mailerId)
    {
        if (array_key_exists($mailerId, $this->mailerInstances)) {
            return $this->mailerInstances[$mailerId];
        }



        $p = explode('.', $mailerId, 2);
        $type = $p[0];
        $tpl = $p[1];

        if (!array_key_exists($type, $this->mailers)) {
            $type = $this->defaultMailerType;
        }

        if (array_key_exists($type, $this->mailers)) {
            $mailer = $this->mailers[$type];

            $class = null;
            if (array_key_exists('name', $mailer)) {
                $fClass = '\Komin\Component\Mail\XMail\XMailer\\' . $mailer['name'];
                $class = new $fClass();
            }
            elseif (array_key_exists('class', $mailer)) {
                $class = new $mailer['class'];
            }
            elseif (array_key_exists('path', $mailer)) {
                $path = $mailer['path'];
                $n = explode(DIRECTORY_SEPARATOR, $path);
                $className = substr(array_pop($n), 0, -4);
                require_once $path;
                $class = new $className;
            }
            else {
                trigger_error(sprintf("Either class or path key must be defined for mailer %s", $type), E_USER_WARNING);
            }


            $templates = $mailer['tpls'];
            if (array_key_exists($tpl, $templates)) {
                /**
                 * @var XMailerInterface $class
                 */
                $class->configure($templates[$tpl]);
                $mailerInstances[$mailerId] = $class;
                return $class;
            }
            else {
                trigger_error(sprintf("tpl key not found: %s for mailer %s", $tpl, $type), E_USER_WARNING);
            }

        }
        else {
            trigger_error(sprintf("The mailer type isn't defined: %s", $type), E_USER_WARNING);
        }
        return false;
    }

    /**
     * @return int: number of sent emails
     */
    public function sendMail(array $params = [])
    {
        if (false !== $class = $this->getMailer($this->defaultMailerType . '.default')) {
            return $class->sendMail($params);
        }
        return 0;
    }

}
