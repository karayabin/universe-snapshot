<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog;

use Komin\Component\Console\Dialog\KeyboardListener\DialogKeyboardListener;
use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;


/**
 * Dialog
 * @author Lingtalfi
 * 2015-05-08
 *
 * This dialog uses EditableLine as its core engine.
 *
 *
 */
class Dialog implements DialogInterface
{
    private $question;
    private $submitCodes;
    /**
     * @var DialogKeyboardListener
     */
    private $line;

    /**
     * The dialog might be executed many times,
     * but we only want the post events to be bound once.
     */
    private $init;

    public function __construct()
    {
        $this->question = '';
        $this->submitCodes = [];
        $this->line = new DialogKeyboardListener();
        $this->init = false;
    }


    public static function create()
    {
        return new static();
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS DialogInterface
    //------------------------------------------------------------------------------/
    /**
     * Sets the question which precedes the user prompt.
     * Since the question and the user answer could be on the same line,
     * one has to specify any carriage return should we need any.
     */
    public function setQuestion($q)
    {
        $this->question = $q;
        return $this;
    }

    /**
     * Sets the symbolic codes by which the user answer is recognized as such (usually return, or y, or n)
     */
    public function setSubmitCodes($c)
    {
        $this->submitCodes = $c;
        return $this;
    }


    /**
     * @return mixed, the user answer
     */
    public function execute()
    {
        echo $this->question;


        // each time the dialog is executed, we refresh the cursor position
        $this->line->getEditableLineObserver()->getEditableLine()->reset()->refreshBeginPosition();


        if (false === $this->init) {
            $this->line->getEditableLineObserver()->setPostEvent(function ($keyCode, EditableLine $editableLine, KeyboardListenerInterface $kb)  {
                $kb->stopListening();
            }, $this->submitCodes);
            $this->init = true;
        }
        $this->line->listen();

        $ret = $this->line->getEditableLineObserver()->getEditableLine()->getText();
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return DialogKeyboardListener
     */
    public function getDialogKeyboardListener()
    {
        return $this->line;
    }


}
