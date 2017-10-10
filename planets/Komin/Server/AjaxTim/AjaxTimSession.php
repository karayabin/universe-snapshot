<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\AjaxTim;


/**
 * AjaxTimSession
 * @author Lingtalfi
 * 2014-10-24
 *
 */
class AjaxTimSession implements AjaxTimSessionInterface
{

    protected $type;
    protected $errMsg;
    protected $successMsg;
    protected $options;

    private function __construct(array $options = [])
    {
        $this->type = 's';
        $this->errMsg = '';
        $this->successMsg = '';
        $this->options = array_replace([
            'errorMsgPrefix' => '',
        ], $options);
    }


    public static function create(array $options = [])
    {
        return new static($options);
    }

    public function setErrorMsg($msg)
    {
        $this->type = 'e';
        $this->errMsg = $this->options['errorMsgPrefix'] . $msg;
        return $this;
    }

    public function setSuccessData($data)
    {
        $this->type = 's';
        $this->successMsg = $data;
        return $this;
    }

    public function start($callable)
    {
        if (is_callable($callable)) {
            try {
                call_user_func($callable, $this);
            } catch (\Exception $e) {
                $this->setErrorMsg($e->getMessage());
            }
        }
        else {
            throw new \InvalidArgumentException("callable must be a callable");
        }
        return $this;
    }


    public function output()
    {
        $msg = ('s' === $this->type) ? $this->successMsg : $this->errMsg;
        echo json_encode([
            't' => $this->type,
            'm' => $msg,
        ]);
    }


}
