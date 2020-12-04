<?php


namespace Ling\CliTools\Util;


use Ling\CliTools\Output\OutputInterface;

/**
 * The LoaderUtil class.
 */
class LoaderUtil
{


    /**
     * This property holds the output for this instance.
     * @var OutputInterface $output
     */
    protected $output;

    /**
     * This property holds the nbTotalItems for this instance.
     * @var int
     */
    protected $nbTotalItems;

    /**
     * This property holds the displayMode for this instance.
     * It shows the display of this widget either in percent (i.e. 94%) or showing ratio of items done vs item total (i.e. 67/89).
     * @var string (percent|int = int)
     */
    protected $displayMode;


    /**
     * The number of visible characters last displayed by this loader.
     * @var int
     */
    private $lastLoaderLength;


    /**
     * Builds the LoaderUtil instance.
     */
    public function __construct()
    {
        $this->output = null;
        $this->nbTotalItems = 0;
        $this->displayMode = 'int';
        $this->currentItem = 0;
        $this->lastLoaderLength = 0;

    }

    /**
     * Sets the output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Sets the nbTotalItems.
     *
     * @param int $nbTotalItems
     */
    public function setNbTotalItems(int $nbTotalItems)
    {
        $this->nbTotalItems = $nbTotalItems;
    }

    /**
     * Sets the displayMode.
     *
     * @param string $displayMode
     */
    public function setDisplayMode(string $displayMode)
    {
        $this->displayMode = $displayMode;
    }


    /**
     * Increments the loader by the given amount.
     *
     * @param int $int
     */
    public function incrementBy($int = 1)
    {
        $this->currentItem += $int;
        $this->refreshDisplay();
    }


    /**
     * Starts running the loader, which displays the widget to the output.
     */
    public function start()
    {
        $this->currentItem = 0;
        $this->refreshDisplay();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Refreshes the display of the widget.
     */
    protected function refreshDisplay()
    {
        // works on my mac, don't know about other systems
        $left = "\033[D";

        if ($this->currentItem >= $this->nbTotalItems) {
            $this->currentItem = $this->nbTotalItems;
        }

        if ('int' === $this->displayMode) {
            $visibleChars = (string)($this->currentItem . "/" . $this->nbTotalItems);
        } // assuming percent mode
        else {
            if ($this->currentItem >= $this->nbTotalItems) {
                $percent = '100';
            } else {
                $percent = (int)(($this->currentItem / $this->nbTotalItems) * 100);
            }
            $visibleChars = '' . $percent . '%';
        }


        //
        if (0 === $this->currentItem) {
            $message = '';
        } else {
            $message = str_repeat($left, $this->lastLoaderLength);
        }
        $message .= $visibleChars;


        $this->lastLoaderLength = strlen($visibleChars);

        $this->output->write($message);
    }
}