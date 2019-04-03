<?php


namespace Ling\Deploy\Helper;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\OutputInterface;
use Ling\Deploy\Exception\DeployException;


/**
 * The MysqlHelper class.
 */
class MysqlHelper
{


    /**
     * Checks that every passed databaseIdentifier has proper configuration (user, name, pass),
     * and returns an array of databaseIdentifier => info item for every database identifier, or false if an error occurred.
     * Each info item has the following structure:
     *
     * - 0: databaseIdentifier
     * - 1: name
     * - 2: user
     * - 3: pass
     *
     *
     *
     * This method will also print a message explaining what happens on the console screen.
     * In case of success, the message will look something like this:
     *
     * ```txt
     * - Checking the databases configuration...ok
     * ```
     *
     *
     * ```txt
     * In case of failure, the message will look like this:
     * - Checking the databases configuration...oops
     * - The following errors occurred:
     * - ----> blabla
     * - ----> blabla
     * ```
     *
     *
     *
     *
     * @param array $databaseIdentifiers
     * @param array $databasesConf
     * @param OutputInterface $output
     * @param int $indentLevel
     * @return array|false
     */
    public static function getDatabasesConfigurationInfo(array $databaseIdentifiers, array $databasesConf, OutputInterface $output, int $indentLevel)
    {
        $infoStatements = [];
        H::info(H::i($indentLevel) . "Checking the databases configuration in the configuration file...", $output);
        foreach ($databaseIdentifiers as $databaseIdentifier) {
            if (array_key_exists($databaseIdentifier, $databasesConf)) {
                $dbConf = $databasesConf[$databaseIdentifier];
                $name = $dbConf['name'] ?? null;
                $user = $dbConf['user'] ?? null;
                $pass = $dbConf['pass'] ?? null;
                if (null !== $name) {
                    if (null !== $user) {
                        if (null !== $pass) {

                            $infoStatements[$databaseIdentifier] = [
                                $databaseIdentifier,
                                $name,
                                $user,
                                $pass,
                            ];

                        } else {
                            $errors[] = "Missing <b>pass</b> key in <b>databases.$databaseIdentifier</b> of the configuration file.";
                        }
                    } else {
                        $errors[] = "Missing <b>user</b> key in <b>databases.$databaseIdentifier</b> of the configuration file.";
                    }
                } else {
                    $errors[] = "Missing <b>name</b> key in <b>databases.$databaseIdentifier</b> of the configuration file.";
                }
            } else {
                $errors[] = "Database <b>$databaseIdentifier</b> is not defined in the configuration.";
            }
        }

        if (empty($errors)) {
            $output->write('<success>ok</success>' . PHP_EOL);
            return $infoStatements;
        } else {
            $output->write('<error>oops</error>' . PHP_EOL);
            H::error(H::i($indentLevel + 1) . "The following errors occurred:" . PHP_EOL, $output);
            foreach ($errors as $error) {
                H::error(H::i($indentLevel + 2) . $error . PHP_EOL, $output);
            }
            return false;
        }

    }

    /**
     * Returns the version number of the mysql program, or false if the version
     * number can't be obtained.
     *
     *
     * @return string|false
     */
    public static function getVersionNumber()
    {
        $return = 0;
        $res = ConsoleTool::capture('mysql --version', $return);
        if (0 === $return) {
            if (preg_match('![0-9]+\.[0-9]+\.[0-9]+!', $res, $match)) {
                return $match[0];
            }
        }
        return false;
    }


    /**
     * Replaces the collations found in the given $file with the given $newCollation.
     *
     *
     * @param string $file
     * @param string $newCollation
     * @throws DeployException
     */
    public static function alterCollate(string $file, string $newCollation)
    {
        if (is_file($file)) {
            $content = file_get_contents($file);
            $newContent = preg_replace('!(COLLATE(?: |=))([a-zA-Z_0-9]*)!', "$1" . $newCollation, $content);

            FileSystemTool::mkfile($file, $newContent);
        } else {
            throw new DeployException("MysqlHelper: this is not a file: $file");
        }
    }

}