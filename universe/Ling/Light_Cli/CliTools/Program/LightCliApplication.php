<?php


namespace Ling\Light_Cli\CliTools\Program;

use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Helper\CommandLineInputHelper;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\AbstractProgram;
use Ling\CliTools\Program\ProgramInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Command\LightCliBaseCommand;
use Ling\Light_Cli\Exception\LightCliException;
use Ling\Light_Cli\Service\LightCliService;

/**
 * The LightCliApplication class.
 *
 */
class LightCliApplication extends LightCliBaseApplication
{


    /**
     * This property holds the currentDirectory when this instance was first instantiated.
     * @var string
     */
    protected string $currentDirectory;

    /**
     * This property holds the current output for this instance.
     *
     * It's set by a command when the command is executed.
     *
     * @var OutputInterface|null
     */
    protected ?OutputInterface $currentOutput;


    /**
     * This property holds the alias2Cmds for this instance.
     * @var array|null
     */
    protected ?array $alias2Cmds;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();

        $this->container = null;
        $this->currentOutput = null;
        $this->currentDirectory = getcwd();
        if (false === $this->currentDirectory) {
            throw new LightCliException("The \"getcwd\" php function returned false, cannot use this class (LightCliApplication).");
        }
        $this->alias2Cmds = null;


        $this->registerCommand("Ling\Light_Cli\CliTools\Command\CommandsCommand", "commands");
        $this->registerCommand("Ling\Light_Cli\CliTools\Command\CreateAppCommand", "create_app");
        $this->registerCommand("Ling\Light_Cli\CliTools\Command\HelpCommand", "help");
        $this->registerCommand("Ling\Light_Cli\CliTools\Command\PlanetsCommand", "planets");
        $this->registerCommand("Ling\Light_Cli\CliTools\Command\RoutesCommand", "routes");
        $this->registerCommand("Ling\Light_Cli\CliTools\Command\ServicesCommand", "services");
    }


    /**
     * Returns the currentDirectory of this instance.
     *
     * @return string
     */
    public function getCurrentDirectory(): string
    {
        return $this->currentDirectory;
    }




    //--------------------------------------------
    // LightCliApplicationInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        /**
         * This is an exception to the rule. Usually app id aren't that long, but this is a
         * reserved keyword used by some other tools at least in this planet.
         */
        return "light_cli";
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandNotFound(string $commandAlias, InputInterface $input, OutputInterface $output): int
    {

        $exitCode = 4;

        /**
         *
         * If this method is called, this means that none of our registered commands (aka specialExpression) match (in the __construct).
         * So next we check if the first param is a third party plugin registered appId.
         */


        $firstParam = $input->getParameter(1); // cannot be null, because defaultCommandAlias = help (see parent class)
        $secondParam = $input->getParameter(2); // cannot be null, because defaultCommandAlias = help (see parent class)



        /**
         * @var $lc LightCliService
         */
        $lc = $this->container->get('cli');
        $cliApps = $lc->getCliApps();



        //--------------------------------------------
        // appId or alias?
        //--------------------------------------------
        if (false === array_key_exists($firstParam, $cliApps)) {
            // alias?
            // is it alias then?
            $this->buildAliases($cliApps);




            if (array_key_exists($firstParam, $this->alias2Cmds)) {


                $cmds = $this->alias2Cmds[$firstParam];
                $nbCmds = count($cmds);
                if ($nbCmds > 1) {
                    $q = "This alias refers to multiple commands, which one do you want to execute?" . PHP_EOL;
                    $index = 1;
                    $choices = [];
                    foreach ($cmds as $cmd) {
                        $choices[$index] = $index;
                        $q .= "$index. $cmd" . PHP_EOL;
                        $index++;
                    }


                    $chosenIndex = null;
                    QuestionHelper::ask($output, $q, function ($response) use ($index, $choices, $output, &$chosenIndex) {
                        $chosenIndex = (int)$response;
                        if (false === in_array($chosenIndex, $choices, true)) {
                            $output->write("<error>Invalid answer, try again.</error>" . PHP_EOL);
                            return false;
                        }
                        return true;
                    });
                    $chosenIndex--;
                    $firstParamAlias = $cmds[$chosenIndex];
                } else {
                    $firstParamAlias = $this->alias2Cmds[$firstParam][0];
                }



                //--------------------------------------------
                // REPLACING ALIAS IN THE OLD COMMAND, AND RE-TRIGGERING THE METHOD
                //--------------------------------------------
                $cmdLineInput = CommandLineInputHelper::getCommandLineByInput($input);
                $cmdLineInput = preg_replace('!' . preg_quote($firstParam, '!') . '!', $firstParamAlias, $cmdLineInput, 1);

                $cmdArgv = CommandLineInputHelper::paramStringToArgv($cmdLineInput);
                array_unshift($cmdArgv, "fake/command");
                $newInput = new CommandLineInput($cmdArgv);
                return $this->onCommandNotFound($commandAlias, $newInput, $output);
            }

        }


        if (true === array_key_exists($firstParam, $cliApps)) {
            $app = $cliApps[$firstParam];

            $appId = $app->getAppId();
            if (null !== $secondParam) {
                if ($app instanceof LightServiceContainerAwareInterface) {
                    $app->setContainer($this->container);
                }


                if ($app instanceof ProgramInterface) {

                    if ($app instanceof AbstractProgram) {
                        $app->setErrorIsVerbose($this->errorIsVerbose);
                    }

                    $parameters = $input->getParameters();
                    array_shift($parameters); // drop the appId
                    $proxyInput = CommandLineInputHelper::getInputWritableCopy($input, [
                        'parameters' => $parameters,
                    ]);

                    return $app->run($proxyInput, $output);

                } else {
                    $output->write("<error>The application registered with appId=\"$appId\" must be implements ProgramInterface from <b>Ling.CliTools</b>.</error>" . PHP_EOL);
                }

            } else {
                $output->write("<error>Invalid command for app \"$appId\", missing the name of the command to execute.</error>" . PHP_EOL);
            }
        } else {
            $output->write("<error>No command or alias named \"$firstParam\" was found.</error>" . PHP_EOL);
        }
        return $exitCode;
    }


    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof LightServiceContainerAwareInterface) {
            $command->setContainer($this->container);
        }
        if ($command instanceof LightCliApplicationAwareInterface) {
            $command->setApplication($this);
        }
        if ($command instanceof LightCliBaseCommand) {
            $command->setApplication($this);
        }

    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Builds the aliases array if not already built.
     * @param LightCliApplicationInterface[] $cliApps
     */
    private function buildAliases(array $cliApps)
    {
        if (null === $this->alias2Cmds) {
            $this->alias2Cmds = [];
            foreach ($cliApps as $app) {
                $commands = $app->getCommands();
                foreach ($commands as $command) {
                    $aliases = $command->getAliases();

                    foreach ($aliases as $alias => $cmd) {
                        if (false === array_key_exists($alias, $this->alias2Cmds)) {
                            $this->alias2Cmds[$alias] = [];
                        }
                        $this->alias2Cmds[$alias][] = $cmd;
                    }
                }
            }
        }
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightCliException($msg, $code);
    }


}