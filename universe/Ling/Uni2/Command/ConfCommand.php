<?php


namespace Ling\Uni2\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The ConfCommand class.
 * This command will display the @page(uni-tool configuration), and update configuration values.
 *
 *
 * The configuration is always displayed.
 *
 *
 * But we can decide to update the configuration values or not.
 * To set configuration values, we use @concept(command line options), each option representing
 * a configuration key/value pair to update.
 *
 *
 * Note: the @concept(bdot notation) is used to set the configuration values.
 *
 *
 *
 * So for instance, to display the configuration, we can do this:
 *
 * ```bash
 * uni conf
 * ```
 *
 *
 * And to set a value, we can do this:
 *
 * ```bash
 * uni conf local_server.is_active=0
 * ```
 *
 * We can even set multiple options at once if we want to:
 *
 * ```bash
 * uni conf local_server.is_active=0 automatic_updates.frequency=70
 * ```
 *
 * Note: in all cases, the configuration is displayed.
 * And if you've changed the configuration (by passing some options), the new configuration will be displayed (i.e. not the old one).
 *
 *
 *
 *
 *
 *
 *
 */
class ConfCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $conf = $this->application->getConf();


        //--------------------------------------------
        // UPDATE (if relevant options are passed)
        //--------------------------------------------
        $hasOneRelevantOption = false;
        $options = $input->getOptions();
        foreach ($options as $k => $v) {
            if (BDotTool::hasDotValue($k, $conf)) {
                BDotTool::setDotValue($k, $v, $conf);
                $hasOneRelevantOption = true;
            }
        }

        if (true === $hasOneRelevantOption) {
            $confFile = $this->application->getConfFile();
            BabyYamlUtil::writeFile($conf, $confFile);
        }


        //--------------------------------------------
        // DISPLAY
        //--------------------------------------------
        $string = BabyYamlUtil::getBabyYamlString($conf);
        $output->write($string . PHP_EOL);

    }

}