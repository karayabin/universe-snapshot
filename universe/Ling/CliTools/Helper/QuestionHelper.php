<?php


namespace Ling\CliTools\Helper;


use Ling\CliTools\Output\OutputInterface;

/**
 * The QuestionHelper class.
 *
 * It helps asking questions to the user (and getting the answer).
 *
 */
class QuestionHelper
{


    /**
     * Asks the given $question to the $user, and returns the answer (string).
     * If the $validate callback is set, will repeat the question until the callback returns true.
     *
     *
     *
     *
     * @param OutputInterface $output
     * @param string $question
     *
     * @param callable|null $validate
     * A callable which takes the user answer as its sole argument.
     * Returns bool: whether the user response is valid.
     *
     * @return string
     */
    public static function ask(OutputInterface $output, string $question, callable $validate = null)
    {
        $output->write($question);
        $line = trim(fgets(STDIN));
        if (null !== $validate) {
            while (false === call_user_func($validate, $line)) {
                $output->write($question);
                $line = trim(fgets(STDIN));
            }
        }
        return $line;
    }
}