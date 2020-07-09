<?php


namespace Ling\SqlWizard\Tool;


/**
 * The SqlWizardGeneralTool class.
 */
class SqlWizardGeneralTool
{

    /**
     * Returns the first component of an underscore separated string, which we assume is a table prefix,
     * or null if the table name doesn't contain any underscore
     *
     * @param string $table
     * @return string|null
     */
    public static function getTablePrefix(string $table): ?string
    {
        $p = explode('_', $table, 2);
        if (count($p) > 1) {
            return array_shift($p);
        }
        return null;
    }


    /**
     * Removes the double-dash comments from the given content, and returns the stripped content.
     *
     * @param string $content
     * @return string
     */
    public static function removeDoubleDashComments(string $content): string
    {
        return preg_replace('!^--.*!m', '', $content);
    }


    /**
     * Decorates the statement with some temporarily defined (system) variables.
     *
     * The available variables are the following:
     *
     * - foreign_key_checks: bool = false
     * - unique_checks: bool = false
     * - sql_mode: string = null. A comma separated list of sql modes (https://dev.mysql.com/doc/refman/8.0/en/sql-mode.html).
     *
     *
     * https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html
     *
     *
     * @param string $stmt
     * @param array $variables
     * @return string
     */
    public static function decorateStatement(string $stmt, array $variables = []): string
    {
        $fk = $variables['foreign_key_checks'] ?? false;
        $uq = $variables['unique_checks'] ?? false;
        $sqlMode = $variables['sql_mode'] ?? null;


        $s = '';
        if (true === $uq) {
            $s .= 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;' . PHP_EOL;
        }
        if (true === $fk) {
            $s .= 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;' . PHP_EOL;
        }
        if (null !== $sqlMode) {
            $s .= 'SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'' . $sqlMode . '\';' . PHP_EOL;
        }


        $s .= $stmt;

        if (null !== $sqlMode) {
            $s .= 'SET SQL_MODE=@OLD_SQL_MODE;' . PHP_EOL;
        }
        if (true === $fk) {
            $s .= 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;' . PHP_EOL;
        }
        if (true === $uq) {
            $s .= 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;' . PHP_EOL;
        }

        return $s;
    }

    /**
     * Decorates the given statement with variables so that foreign key checks and unique keys checks
     * will be disabled for that statement.
     *
     *
     * @param string $stmt
     * @return string
     */
    public static function statementDisableFkChecksUqChecks(string $stmt): string
    {
        return self::decorateStatement($stmt, [
            "foreign_key_checks" => true,
            "unique_checks" => true,
            "sql_mode" => "TRADITIONAL,ALLOW_INVALID_DATES",
        ]);
    }

}