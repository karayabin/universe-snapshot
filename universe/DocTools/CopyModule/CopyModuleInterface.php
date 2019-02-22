<?php


namespace DocTools\CopyModule;


use DocTools\Exception\CopyModuleException;
use DocTools\Interpreter\NotationInterpreterInterface;
use DocTools\Report\ReportInterface;

/**
 * The CopyModuleInterface interface.
 *
 * We use a copy module to copy a source directory to a destination directory.
 * The benefit of using a copy module is that it interprets the @kw(docTool inline functions),
 * and so we can write our doc with a compact/intuitive syntax (using docTool inline functions),
 * and when generating the doc, we use the copy module to resolve the inline functions on the fly.
 *
 *
 */
interface CopyModuleInterface
{


    /**
     * Copies the $sourceDir recursively to the $destinationDir, using the given $interpreter during the transfer.
     *
     *
     * Available options are:
     *
     * - filter: string|array of file names to ignore. For instance "about_markdown_language.md".
     *
     *
     *
     * @param string $sourceDir
     * @param string $destinationDir
     * @param NotationInterpreterInterface $interpreter
     * @param ReportInterface|null $report
     * @param array $options
     * @throws CopyModuleException
     * @return void
     */
    public function copy(string $sourceDir, string $destinationDir, NotationInterpreterInterface $interpreter, ReportInterface $report = null, array $options = []): void;

}