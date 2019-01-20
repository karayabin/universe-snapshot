<?php


namespace Logger\Listener;


use Logger\Formatter\DefaultFormatter;
use Logger\Formatter\FormatterInterface;

abstract class WithFormatLoggerListener extends AbstractLoggerListener
{

    /**
     * @var FormatterInterface
     */
    private $formatter;

    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
        return $this;
    }

    protected function format($msg, $identifier)
    {
        if (null === $this->formatter) {
            $this->formatter = DefaultFormatter::create();
        }
        return $this->formatter->format($msg, $identifier);
    }

}