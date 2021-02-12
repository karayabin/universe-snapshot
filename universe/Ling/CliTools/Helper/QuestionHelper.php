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


    /**
     * Asks the given question to the user, repeats it until the answer is either y or n, and returns whether the answer was y.
     * If it's something else, ask to try again until the answer is y or n.
     *
     * @param OutputInterface $output
     * @param string $question
     * @return bool
     */
    public static function askYesNo(OutputInterface $output, string $question): bool
    {
        $userResponse = false;
        self::ask($output, $question . ' (y/n)', function ($response) use (&$userResponse, $output) {
            if (true === in_array($response, ['y', 'n'], true)) {
                $userResponse = $response;
                return true;
            }
            $output->write("<error>Invalid answer, try again (y/n).</error>" . PHP_EOL);
            return false;
        });
        return ('y' === $userResponse);
    }
}