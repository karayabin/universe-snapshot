<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Util\TimConflictsReader;


/**
 * The ExploreConflictsCommand class.
 *
 */
class ExploreConflictsCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * This property holds the reader for this instance.
     * @var TimConflictsReader
     */
    private TimConflictsReader $reader;


    /**
     * Builds the ExploreConflictsCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {

        $conflictsPath = $input->getParameter(2);
        if (null === $conflictsPath) {
            $this->writeError("Missing conflicts path parameter. Try again." . PHP_EOL);
        }

        ConsoleTool::reset();


        $r = new TimConflictsReader();
        $r->init($conflictsPath);
        $this->reader = $r;
        $this->stepMain($output);


    }






    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return "
 This command provides a gui to investigate dependency conflicts (i.e. <$co>interplanet conflicts</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#inter-planet-conflicts</$url>)) that might have occurred during your <b>import/install</b>.
 ";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "conflictsPath" => [
                " the path to the conflicts file to investigate.
 ",
                true,
            ],
        ];
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prints the main step gui.
     *
     * Available options are:
     * - invalid: bool=false. If true, the prompt will tell the user that his answer is invalid and ask to try again.
     *          If true, by default, the prompt will ask the user for a number (of the planet to investigate).
     *          This is a trick I use which allows me to clean the console screen, and let the user know that his answer was wrong, and that he should try again.
     *
     *
     *
     * @param OutputInterface $output
     * @param array $options
     */
    private function stepMain(OutputInterface $output, array $options = [])
    {
        ConsoleTool::reset();
        $this->banner($output);
        $invalid = $options['invalid'] ?? false;

        $stats = $this->reader->getStats();
        $tmpArray = [];

        if ($stats) {

            $this->write("The following planets were conflictual." . PHP_EOL);
            $index = 1;
            foreach ($stats as $planetDotName => $nbConflicts) {
                $this->write("- $index: <b:red>$planetDotName</b:red> ($nbConflicts conflicts)" . PHP_EOL);
                $tmpArray[$index] = $planetDotName;
                $index++;
            }
            $maxIndex = count($stats);


            if (true === $invalid) {
                $this->write(PHP_EOL . "<error>Invalid answer, try again.</error>" . PHP_EOL);
            }


            $userAnswerIsOk = true;
            $answer = QuestionHelper::ask($output, "Which one do you want to investigate? (type a number)" . PHP_EOL, function ($_answer) use ($maxIndex, &$userAnswerIsOk) {
                $_answer = (int)$_answer;
                if ($_answer < 1 || $_answer > $maxIndex) {
                    $userAnswerIsOk = false;
                }
                return true;
            });

            if (false === $userAnswerIsOk) {


                $this->stepMain($output, [
                    "invalid" => true,
                ]);

            } else {


                $selectedPlanetDotName = $tmpArray[$answer];
                $this->stepConflictDetail($output, $selectedPlanetDotName);
            }

        } else {
            $conflictsPath = $this->reader->getConflictsPath();
            $this->write("There is no conflict to explore in the given file (<b>$conflictsPath</b>). Bye." . PHP_EOL);
        }
    }


    /**
     * Prints the details of a conflictual step.
     *
     * @param OutputInterface $output
     * @param string $planetDotName
     * @param array $options
     * @throws LightPlanetInstallerException
     */
    private function stepConflictDetail(OutputInterface $output, string $planetDotName, array $options = [])
    {

        $invalid = $options['invalid'] ?? false;

        ConsoleTool::reset();
        $this->banner($output);


        $this->write("Conflicts details for planet <red>$planetDotName</red>." . PHP_EOL);

        $items = [];
        $conflicts = $this->reader->getConflicts();
        foreach ($conflicts as $conflict) {
            list($_planetDotName, $_version, $_parentChain) = $conflict;

            if (true === empty($_parentChain)) {
                continue;
            }

            if ($planetDotName === $_planetDotName) {
                if (false === array_key_exists($_version, $items)) {
                    $items[$_version] = [];
                }

                $items[$_version][] = $_parentChain;

            }
        }

        ksort($items);

        if ($items) {


            foreach ($items as $version => $chains) {

                $output->write("----- <b>$version</b>" . PHP_EOL);
                foreach ($chains as $chain) {
                    $output->write("- " . implode(" -> ", $chain) . " -> <b>$planetDotName:$version</b>" . PHP_EOL);
                }
            }
            $output->write(PHP_EOL);
        }


        $s = '';
        $s .= "z. Go back to the main screen" . PHP_EOL;
        $s .= "q. Quit this program" . PHP_EOL;

        if (true === $invalid) {
            $this->write(PHP_EOL . "<error>Invalid answer, try again</error>." . PHP_EOL);
        }


        $userAnswerIsOk = true;
        $answer = QuestionHelper::ask($output, "Now what do you want to do?" . PHP_EOL . $s, function ($_answer) use (&$userAnswerIsOk) {
            if (false === in_array($_answer, ['z', 'q'])) {
                $userAnswerIsOk = false;
            }
            return true;
        });


        if (false === $userAnswerIsOk) {
            $this->stepConflictDetail($output, $planetDotName, [
                'invalid' => true,
            ]);
        } else {


            switch ($answer) {
                case "q":
                    $this->stepQuit($output);
                    break;
                case "z":
                    $this->stepMain($output);
                    break;
                default:
                    /*
                      * This should never happen, because the answer has already been checked via the question callback just above...
                      */
                    throw new LightPlanetInstallerException("Unexpected answer: $answer.");
                    break;
            }
        }
    }


    /**
     * Prints a quit message.
     * @param OutputInterface $output
     */
    private function stepQuit(OutputInterface $output)
    {
        $output->write("Ok, bye." . PHP_EOL);
    }


    /**
     * Prints a banner to the output.
     *
     * @param OutputInterface $output
     */
    private function banner(OutputInterface $output)
    {
        $output->write("--------------------------" . PHP_EOL);
        $output->write("--- <blue:bold>Conflicts Explorer</blue:bold> ---" . PHP_EOL);
        $output->write("--------------------------" . PHP_EOL);
    }
}