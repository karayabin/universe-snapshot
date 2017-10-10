<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SuperLogger\Listener;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Component\Log\FileRotator\BySizeFileRotator;
use BeeFramework\Component\Log\FileRotator\FileRotatorInterface;
use BeeFramework\Component\Log\SuperLogger\Message\MessageInterface;
use Komin\Sound\ShellSoundPlayer\ShellSoundPlayer;


/**
 * ToFileListener
 * @author Lingtalfi
 * 2014-10-28
 *
 *
 */
class ToFileListener implements ListenerInterface
{


    protected $file;
    protected $fileRotator;


    public function __construct($file, FileRotatorInterface $fileRotator = null)
    {
        if (!file_exists($file)) {
            if (false === FileSystemTool::touch($file)) {
                throw new \RuntimeException(sprintf("Cannot create file %s", $file));
            }
        }
        if (null === $fileRotator) {
            $fileRotator = new BySizeFileRotator([
                'maxSize' => '100M',
            ]);
        }
        $this->file = $file;
        $this->fileRotator = $fileRotator;
//        $this->fileRotator->setFile($file);
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ListenerInterface
    //------------------------------------------------------------------------------/
    public function parse(MessageInterface $message)
    {
        if ($this->fileRotator) {
            $this->fileRotator->update();
        }

        $format = '{date8601} -- [{id}] -- {msg}';
        $values = [
            $message->getDate(),
            $message->getId(),
            $message->getMessage(),
        ];


        if (
            isset($_SERVER['REMOTE_ADDR']) && 
            isset($_SERVER['HTTP_USER_AGENT']) &&
            isset($_SERVER['REQUEST_URI']) 
        ) {
            $format .= ' ........... {ip} -- {userAgent} -- {requestUri}';
            $values[] = $_SERVER['REMOTE_ADDR'];
            $values[] = $_SERVER['HTTP_USER_AGENT'];
            $values[] = $_SERVER['REQUEST_URI'];
        }


        $line = str_replace([
            '{date8601}',
            '{id}',
            '{msg}',
            '{ip}',
            '{userAgent}',
            '{requestUri}',
        ], $values, $format);


        $line .= PHP_EOL;
        file_put_contents($this->file, $line, \FILE_APPEND);
    }


}
