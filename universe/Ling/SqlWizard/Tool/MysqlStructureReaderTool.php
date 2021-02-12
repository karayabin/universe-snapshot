<?php


namespace Ling\SqlWizard\Tool;


use Ling\SqlWizard\Exception\SqlWizardException;
use Ling\SqlWizard\Util\MysqlStructureReader;

/**
 * The MysqlStructureReaderTool class.
 */
class MysqlStructureReaderTool
{


    /**
     * Returns the array of tables listed defined (with a create statement) in the given created file.
     *
     *
     * @param string $createFile
     * @return array
     */
    public static function getTablesFromCreateFile(string $createFile): array
    {
        if (false === file_exists($createFile)) {
            throw new SqlWizardException("File does not exist: $createFile.");
        }
        $reader = new MysqlStructureReader();
        $info = $reader->readContent(file_get_contents($createFile));
        return array_keys($info);

    }
}