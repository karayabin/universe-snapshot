<?php


namespace Ling\EasyConsoleMenu;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ConsoleTool;
use Ling\Bat\OsTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\OutputInterface;
use Ling\EasyConsoleMenu\Exception\EasyConsoleMenuException;
use Ling\EasyConsoleMenu\Helper\VariableHelper;
use Ling\EasyConsoleMenu\History\HistoryInterface;
use Ling\EasyConsoleMenu\History\StepsHistory;
use Ling\KrankenStein\KrankenSteinTool;


/**
 * The MenuExecutor class.
 */
class MenuExecutor
{


    /**
     * This property holds the steps for this instance.
     * @var array
     */
    protected $steps;

    /**
     * This property holds the stepsHistory for this instance.
     * @var HistoryInterface
     */
    protected $stepsHistory;

    /**
     * This property holds the commands for this instance.
     * @var array
     */
    protected $commands;

    /**
     * This property holds the settings for this instance.
     * @var array
     */
    protected $settings;

    /**
     * This property holds the variables for this instance.
     * @var array
     */
    protected $variables;

    /**
     * Builds the MenuExecutor instance.
     */
    public function __construct()
    {
        $this->steps = [];
        $this->variables = [];
        $this->stepsHistory = new StepsHistory();
        $this->commands = [];
        $this->settings = [
            "intro_msg" => null,
            "first_step" => null,
            "use_clear" => true,
            "use_history_nav" => true,
            "history_nav_color" => "lightBlue",
            "execute_step_color" => "red",
            "debug" => false, // show exception trace
            "header" => null,
            "execute_after_mode" => "home", // home|last|quit|step:$stepName
            "ask_back" => "__back__",
        ];
    }


    /**
     * Executes the menu provided by the menuFile.
     * See the @page(configuration file) for more details.
     *
     * @param string $menuFile
     * @param OutputInterface $output
     */
    public function executeMenu(string $menuFile, OutputInterface $output)
    {

        $indentLevel = 0;
        if (is_file($menuFile)) {

            $conf = BabyYamlUtil::readFile($menuFile);

            $settings = $conf['settings'] ?? [];
            $this->settings = array_merge($this->settings, $settings);
            $this->steps = $conf['steps'] ?? [];
            $this->commands = $conf['commands'] ?? [];
            $this->variables = $conf['variables'] ?? [];

            $introMessage = $this->settings['intro_msg'];
            if (null !== $introMessage) {
                H::info(H::i($indentLevel) . $introMessage . PHP_EOL, $output);
            }


            $firstStepName = $this->getFirstStepName($this->steps);
            if (false !== $firstStepName) {
                try {

                    $this->executeStep($firstStepName, $output, $indentLevel);
                } catch (\Exception $e) {
                    $msg = "An exception occurred: ";
                    if (true === $this->settings['debug']) {
                        $msg .= (string)$e;

                    } else {
                        $msg .= $e->getMessage();
                    }
                    H::error(H::i($indentLevel) . $msg . PHP_EOL, $output);
                }

            } else {
                H::error(H::i($indentLevel) . "Cannot find the first step to execute. Do you have any steps? If so, did you set the <b>first_step</b> directive?" . PHP_EOL, $output);
            }
        } else {
            H::error(H::i($indentLevel) . "Menu file not found: <b>$menuFile</b>:" . PHP_EOL, $output);
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the name of the first step.
     * Returns false if there is no first step.
     *
     *
     * @param array $steps
     * @return string|false
     */
    protected function getFirstStepName(array $steps)
    {
        $firstStep = $this->settings['first_step'];
        if (null === $firstStep) {
            if ($steps) {
                reset($steps);
                $firstStep = key($steps);
            }
        }

        if (null !== $firstStep && array_key_exists($firstStep, $steps)) {
            return $firstStep;
        }
        return false;
    }

    /**
     * Executes a step.
     * See @page(the configuration file) for more details.
     *
     *
     * @param string $stepName
     * @param OutputInterface $output
     * @param int $indentLevel
     * @throws EasyConsoleMenuException
     */
    protected function executeStep(string $stepName, OutputInterface $output, int $indentLevel)
    {
        if (array_key_exists($stepName, $this->steps)) {


            if (true === $this->settings['use_clear']) {
                OsTool::clear();
            }


            $header = $this->settings['header'];
            if (null !== $header) {
                $output->write($header . PHP_EOL);
            }


            $firstStep = $this->stepsHistory->first();
            $lastStep = $this->stepsHistory->last();
            $this->stepsHistory->add($stepName);


            $step = $this->steps[$stepName];


            // msg?
            $msg = $step['msg'] ?? null;
            if (null !== $msg) {
                $output->write($this->resolveMessage($msg) . PHP_EOL);
            }

            $storeAs = $step['store_as'] ?? null;
            $stepGoto = $step['goto'] ?? null;
            $stepExecute = $step['execute'] ?? null;

            //--------------------------------------------
            // CHOICES
            //--------------------------------------------
            if (
                array_key_exists('choices', $step) ||
                array_key_exists('dynamic_choices', $step)
            ) {

                if (array_key_exists('choices', $step)) {
                    $choices = $step['choices'];
                } else {
                    $sChoices = $step['dynamic_choices'];
                    $sChoices = VariableHelper::resolveVariables($sChoices, $this->variables);
                    /**
                     * dynamic_choices: for now accept KrankenStein one shot notation.
                     */
                    if (true === KrankenSteinTool::isOneShot($sChoices)) {
                        $choices = KrankenSteinTool::executeOneShot($sChoices);
                    } else {
                        throw new EasyConsoleMenuException("Not implemented yet: dynamic choices not with KrankenStein one shot!");
                    }


                    // adapt choices for EasyConsoleMenu style
                    $choices = array_map(function ($v) {
                        if (is_string($v)) {
                            return [
                                'msg' => $v,
                            ];
                        }
                        return $v;
                    }, $choices);
                }


                $this->decorateStepChoices($choices, $stepName);


                $choicesIndexes = [];
                foreach ($choices as $index => $choice) {
                    $choiceColor = $choice['color'] ?? null;
                    $choiceMsg = $choice['msg'] ?? null;


                    if (null !== $choiceMsg) {
                        $choicesIndexes[] = (string)$index;

                        $msg = H::i($indentLevel + 1) . $index . ": " . $choiceMsg;

                        $format = null;

                        if (null !== $choiceColor) {
                            $format = $choiceColor;
                        } elseif (array_key_exists('execute', $choice)) {
                            $format = $this->settings['execute_step_color'];
                        }

                        if (null !== $format) {
                            $msg = '<' . $format . '>' . $msg . '</' . $format . '>';
                        }
                        $output->write($msg . PHP_EOL);
                    }
                }


                $choiceIndex = $this->getUserChoice("Your choice: ", $choicesIndexes, $output);
                // proceed choice
                $choiceItem = $choices[$choiceIndex];


                // store_as: by default we store the msg
                if (null !== $storeAs) {
                    if (array_key_exists("value", $choiceItem)) {
                        $this->variables[$storeAs] = $choiceItem['value'];
                    } else {
                        $this->variables[$storeAs] = $choiceItem['msg'];
                    }
                }


                if (array_key_exists("_history", $choiceItem)) {
                    $historyMove = $choiceItem['_history'];
                    if ('back' === $historyMove) {
                        if (false !== $lastStep) {
                            $this->stepsHistory->pop();
                            $this->stepsHistory->pop();
                            $this->executeStep($lastStep, $output, $indentLevel);
                        } else {
                            H::error(H::i($indentLevel) . "Cannot go back in history. History empty!." . PHP_EOL, $output);
                        }
                    } elseif ('home' === $historyMove) {
                        if (false !== $firstStep) {
                            $this->stepsHistory->clear();
                            $this->executeStep($firstStep, $output, $indentLevel);
                        } else {
                            H::error(H::i($indentLevel) . "Cannot go back to history home. History empty!." . PHP_EOL, $output);
                        }
                    }
                } elseif (array_key_exists("goto", $choiceItem)) {
                    $goto = $choiceItem['goto'];
                    $this->executeStep($goto, $output, $indentLevel);
                } elseif (array_key_exists("execute", $choiceItem)) {
                    $cmdName = $choiceItem['execute'];

                    $res = $this->executeCommand($cmdName, $output, $indentLevel);
                }
            } elseif (array_key_exists("ask", $step)) {
                $question = $step['ask'] . ' ';

                $callback = null;
                if (array_key_exists('ask_validation', $step)) {
                    $validation = $step['ask_validation'];
                    switch ($validation) {
                        case "not_empty":
                            $callback = function ($v) use ($output, $indentLevel) {
                                if (false === empty($v)) {
                                    return true;
                                }
                                H::warning(H::i($indentLevel) . "Your answer cannot be empty." . PHP_EOL, $output);
                                return false;
                            };
                            break;
                        default:
                            throw new EasyConsoleMenuException("Unknown ask_validation: $validation");
                            break;
                    }
                }
                $answer = QuestionHelper::ask($output, $question, $callback);


                /**
                 * Special answers values:
                 */
                if ($this->settings['ask_back'] === $answer) {
                    if (false !== $lastStep) {
                        $this->stepsHistory->pop();
                        $this->stepsHistory->pop();
                        $this->executeStep($lastStep, $output, $indentLevel);
                    } else {
                        H::error(H::i($indentLevel) . "Cannot go back in history. History empty!." . PHP_EOL, $output);
                    }
                }


                // store_as: by default we store the msg
                if (null !== $storeAs) {
                    $this->variables[$storeAs] = $answer;
                }
            }


            //--------------------------------------------
            // STEP GOTO
            //--------------------------------------------
            /**
             * If the choice item didn't redirect with goto,
             * here is the second chance, at the step level...
             */
            if (null !== $stepGoto) {
                $this->executeStep($stepGoto, $output, $indentLevel);
            }

            //--------------------------------------------
            // STEP EXECUTE
            //--------------------------------------------
            if (null !== $stepExecute) {
                $res = $this->executeCommand($stepExecute, $output, $indentLevel);
            }


        } else {
            H::error(H::i($indentLevel) . "Step not found: <b>$stepName</b>." . PHP_EOL, $output);
        }
    }


    /**
     * Asks a choice question to the user and returns the valid answer.
     *
     * @param string $question
     * @param array $choicesIndexes
     * @param OutputInterface $output
     * @return string
     */
    protected function getUserChoice(string $question, array $choicesIndexes, OutputInterface $output)
    {
        $answer = QuestionHelper::ask($output, $question, function ($line) use ($choicesIndexes) {
            return in_array($line, $choicesIndexes, true);
        });
        return $answer;
    }


    /**
     * Decorates the given step choices.
     *
     *
     * @param array $choices
     * @param string $stepName
     */
    protected function decorateStepChoices(array &$choices, string $stepName)
    {
        if (true === $this->settings['use_history_nav']) {
            /**
             * Note: there is always 1 element in the history because
             * the executeStep method adds an element upfront (before the step is actually executed).
             * But in reality, if there is just one element in the (future) history, there is none
             * in the current history.
             * That's why we check that count > 1 and not count > 0.
             *
             */
            if ($this->stepsHistory->count() > 1) {
                $choices = [
                        "b" => [
                            'msg' => "Back to previous step",
                            'color' => $this->settings['history_nav_color'],
                            '_history' => "back",
                        ],
                        "h" => [
                            'msg' => "Back to home",
                            'color' => $this->settings['history_nav_color'],
                            '_history' => "home",
                        ],
                    ] + $choices;
            }
        }
    }


    /**
     * Resolves the variables in the given msg.
     *
     *
     * @param string $msg
     * @return string
     * @throws EasyConsoleMenuException
     */
    protected function resolveMessage(string $msg)
    {
        $undefined = [];
        $newMsg = VariableHelper::resolveVariables($msg, $this->variables, $undefined);
        if ($undefined) {
            throw new EasyConsoleMenuException("Undefined variable(s): " . implode(", ", $undefined));
        }
        return $newMsg;
    }


    /**
     * Executes the given command and returns whether or not
     * the output of the command was a success.
     * @param string $commandName
     * @param OutputInterface $output
     * @param int $indentLevel
     * @return bool
     * @throws EasyConsoleMenuException
     */
    protected function executeCommand(string $commandName, OutputInterface $output, int $indentLevel): bool
    {


        $res = false;
        if (array_key_exists($commandName, $this->commands)) {
            $command = $this->commands[$commandName];


            //--------------------------------------------
            // CMD_* SYSTEM
            //--------------------------------------------
            $usingSpecialCommand = false;
            foreach ($command as $key => $value) {
                if ('cmd_' === substr($key, 0, 4)) {
                    $var = substr($key, 4);
                    if (array_key_exists($var, $this->variables)) {
                        $varValue = $this->variables[$var];
                        if (null !== $varValue && "" !== trim($varValue)) {
                            $usingSpecialCommand = true;
                            $cmd = $this->resolveMessage($value);
                            $res = ConsoleTool::passThru($cmd);
                            goto exec_command_end;
                        }
                    }
                }
            }

            //--------------------------------------------
            // DEFAULT CMD SYSTEM
            //--------------------------------------------
            if (false === $usingSpecialCommand) {
                if (array_key_exists('cmd', $command)) {
                    $cmd = $command["cmd"];
                    $cmd = $this->resolveMessage($cmd);
                    $res = ConsoleTool::passThru($cmd);
                    goto exec_command_end;
                } elseif (array_key_exists('print', $command)) {
                    $msg = $command["print"];
                    $msg = $this->resolveMessage($msg);
                    $output->write($msg . PHP_EOL);
                    goto exec_command_end;
                } else {
                    throw new EasyConsoleMenuException("Unknown command type for command $commandName.");
                }
            }
        } else {
            throw new EasyConsoleMenuException("Undefined command: $commandName.");
        }


        exec_command_end:
        $executeAfterMode = $this->settings['execute_after_mode'];
        $answer = QuestionHelper::ask($output, "Press a key to continue..." . PHP_EOL);
        if ("home" === $executeAfterMode) {
            $firstStepName = $this->stepsHistory->first();
            $this->stepsHistory->clear();
            if (false !== $firstStepName) {
                $this->executeStep($firstStepName, $output, $indentLevel);
            }
        } elseif ("last" === $executeAfterMode) {
            $lastStepName = $this->stepsHistory->last();
            $this->stepsHistory->pop();
            if (false !== $lastStepName) {
                $this->executeStep($lastStepName, $output, $indentLevel);
            }
        } elseif ("quit" === $executeAfterMode) {

        } else {
            if ("step:" === substr($executeAfterMode, 0, 5)) {
                $stepName = substr($executeAfterMode, 5);
                /**
                 * If the step name already exists in the history, we go back to that step,
                 * otherwise, we just append it to the history.
                 */
                if (true === $this->stepsHistory->has($stepName)) {
                    $this->stepsHistory->popUntil($stepName);
                }
                $this->executeStep($stepName, $output, $indentLevel);
            } else {
                throw new EasyConsoleMenuException("Mode not implemented: $executeAfterMode");
            }
        }
        return $res;
    }
}