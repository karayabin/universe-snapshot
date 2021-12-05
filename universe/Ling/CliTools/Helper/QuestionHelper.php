<?php


namespace Ling\CliTools\Helper;


use Ling\Bat\ConsoleTool;
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
     *
     * Prints a question to the terminal.
     * If the validate callback is defined, the user's response is passed to the callback.
     * If the callback returns false, the retryMessage is displayed, asking for the user to retry.
     *
     * The main idea of this method is that the retry message is always printed on the same line, thus not adding
     * to the total number of printed lines, thus saving screen space.
     *
     * Depending on your taste, you might end the question with a PHP_EOL (I personally tend to prefer to have the user's response
     * on the same line, but adding the PHP_EOL at the end will put the user response on the next line).
     * Same with the retry message, you can end it with a PHP_EOL or not.
     * The retry message should probably re-introduce the question, or part of it.
     *
     * For instance, a typical question/retryMessage would be:
     *
     * - (question:) Which map do you want to restore? (type a number):
     * - (retryMessage:) Invalid number, try again (type a number):
     *
     *
     *
     *
     * @param OutputInterface $output
     * @param string $question
     * @param string $retryMessage
     * @param callable|null $validate
     * @return string
     */
    public static function askClear(OutputInterface $output, string $question, string $retryMessage, callable $validate = null)
    {
        $output->write($question);
        $line = trim(fgets(STDIN));
        $retryNbLines = substr_count($retryMessage, PHP_EOL);
        if (null !== $validate) {
            while (false === call_user_func($validate, $line)) {
                ConsoleTool::cursorUp($retryNbLines + 1);
                ConsoleTool::clearLine();
                $output->write($retryMessage);
                $line = trim(fgets(STDIN));
            }
        }
        return $line;
    }


    /**
     * Asks the user to choose from the given list.
     * The question argument is prepended to the list choice.
     *
     *
     * @param OutputInterface $output
     * @param string $question
     * @param array $list
     * @return string
     */
    public static function askSelectListItem(OutputInterface $output, string $question, array $list)
    {

        $dataType = "number";
        $sItems = "";
        foreach ($list as $k => $v) {
            if (false === is_numeric($k)) {
                $dataType = "letter";
            }
            $sItems .= "- <b>$k</b>: $v" . PHP_EOL;
        }
        $retryMessage = "Invalid answer, try again (type a $dataType):";
        $q = $question . PHP_EOL .  $sItems;

        return self::askClear($output, $q, $retryMessage, function ($response) use ($list) {
            return array_key_exists($response, $list);
        });
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