<?php


namespace Ling\Uni2\PostInstall\Handler;


use Ling\CliTools\Output\OutputInterface;

/**
 * The PostInstallHandlerInterface interface.
 *
 * This is a handler class for the post install process.
 * See the @page(post install page) for more info.
 *
 * The idea is to delegate all the post install work to this class,
 * rather than using other post install directives.
 *
 */
interface PostInstallHandlerInterface
{

    /**
     * Handles the post install process of a post install directive.
     *
     *
     * @param array $options
     * An array of options, depending on the directive type.
     *
     * @param array $commonOptions
     * An array of common options. It contains the following entries:
     *
     * - application: Uni2\Application\UniToolApplication. The application instance.
     * - planetName: string. The name of the planet being processed.
     *
     *
     *
     * @param int $indentLevel
     * @param OutputInterface $output
     * @return void
     */
    public function handle(array $options, array $commonOptions, int $indentLevel, OutputInterface $output);
}