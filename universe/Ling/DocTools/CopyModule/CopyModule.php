<?php


namespace Ling\DocTools\CopyModule;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\DocTools\Exception\CopyModuleException;
use Ling\DocTools\Interpreter\NotationInterpreterInterface;
use Ling\DocTools\Report\ReportInterface;

/**
 * The CopyModule class.
 */
class CopyModule implements CopyModuleInterface
{


    /**
     * @implementation
     */
    public function copy(string $sourceDir, string $destinationDir, NotationInterpreterInterface $interpreter, ReportInterface $report = null, array $options = []): void
    {

        $filter = $options['filter'] ?? [];
        if (false === is_array($filter)) {
            $filter = [$filter];
        }

        if (is_dir($sourceDir)) {
            $files = YorgDirScannerTool::getFiles($sourceDir, true, true);
            foreach ($files as $file) {


                //--------------------------------------------
                // FILTER
                //--------------------------------------------
                $fileName = basename($file);
                if (in_array($fileName, $filter, true)) {
                    continue;
                }


                //--------------------------------------------
                // COPY
                //--------------------------------------------
                $fileAbs = $sourceDir . "/" . $file;
                $report->setCurrentContext($fileAbs);


                $content = file_get_contents($fileAbs);
                $newContent = $interpreter->resolveInlineTags($content, $report);
                $newPath = $destinationDir . "/" . $file;
                FileSystemTool::mkfile($newPath, $newContent);

            }
        }
        else {
            throw new CopyModuleException("Argument sourceDir is not a directory: $sourceDir");
        }

    }

}