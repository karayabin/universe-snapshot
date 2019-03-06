<?php


namespace Ling\Logger\Listener;


use Ling\Logger\Formatter\DefaultFormatter;
use Ling\Logger\Formatter\FormatterInterface;

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