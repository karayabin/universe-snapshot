<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog\KeyboardListener;

use Komin\Component\Console\KeyboardListener\KeyboardListener;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodesKeyboardListenerObserver;


/**
 * DialogKeyboardListener
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class DialogKeyboardListener extends KeyboardListener
{

    /**
     * @var EditableLineSymbolicCodeObserver
     */
    private $editableLineObserver;

    /**
     * @var SymbolicCodesKeyboardListenerObserver
     */
    private $symbolicObserver;


    public function __construct()
    {
        parent::__construct();
        $this->editableLineObserver = EditableLineSymbolicCodeObserver::create();
        $this->symbolicObserver = SymbolicCodesKeyboardListenerObserver::create()->setObserver($this->editableLineObserver);
        $this->setObserver($this->symbolicObserver);
    }

    /**
     * @return EditableLineSymbolicCodeObserver
     */
    public function getEditableLineObserver()
    {
        return $this->editableLineObserver;
    }

    /**
     * @return SymbolicCodesKeyboardListenerObserver
     */
    public function getSymbolicCodesObserver()
    {
        return $this->symbolicObserver;
    }

}
