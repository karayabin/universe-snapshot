<?php


namespace Ling\Deploy\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Exception\DeployException;


/**
 * The RemoteConfHelper class.
 */
class RemoteConfHelper
{


    /**
     * Returns the configuration array corresponding to the given $confPath.
     * Throws an exception if the $confPath file doesn't exist.
     *
     *
     * @param string $confPath
     * @return array
     * @throws DeployException
     */
    public static function readConfByFile(string $confPath)
    {
        if (is_file($confPath)) {

            $conf = BabyYamlUtil::readFile($confPath);
            return $conf;
        }
        throw new DeployException("Cannot read conf from file: file doesn't exist: $confPath.");
    }


    /**
     * Pushes the given conf array as a file on the remote identified by $sshConfigId, at the given $dstPath;
     * and returns whether the result was successful.
     *
     *
     * @param array $conf
     * @param string $sshConfigId
     * @param string $appDir
     * @param string $dstPath
     * @param OutputInterface $output
     * @param int $indentLevel
     * @return bool
     */
    public static function pushConf(array $conf, string $sshConfigId, string $appDir, string $dstPath, OutputInterface $output, int $indentLevel = 0): bool
    {
        $tmpFile = $appDir . "/.deploy/tmp-conf.byml";
        H::info(H::i($indentLevel) . "Creating temporary conf file in <b>$tmpFile</b>...", $output);
        if (true === FileSystemTool::mkfile($tmpFile, BabyYamlUtil::getBabyYamlString($conf))) {
            $output->write("<success>ok</success>." . PHP_EOL);
            H::info(H::i($indentLevel) . "Sending temporary conf file to remote <b>$dstPath</b>...", $output);
            if (true === ScpHelper::push($tmpFile, $dstPath, $sshConfigId)) {
                $output->write("<success>ok</success>." . PHP_EOL);
                return true;
            } else {
                $output->write("<error>oops</error>." . PHP_EOL);
                H::error(H::i($indentLevel + 1) . "Could not send the temporary conf file to remote." . PHP_EOL, $output);
            }
        } else {
            $output->write("<error>oops</error>." . PHP_EOL);
            H::error(H::i($indentLevel + 1) . "Could not create the temporary conf file." . PHP_EOL, $output);
        }
        return false;
    }
}