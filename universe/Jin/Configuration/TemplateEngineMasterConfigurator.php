<?php


namespace Jin\Configuration;


use Jin\Registry\Access;
use Jin\TemplateEngine\TemplateEngineMaster;

/**
 * @info The TemplateEngineMasterConfigurator class configures the template engine master for the jin app.
 *
 *
 *
 * The registration of template engines is done via the yml files:
 *
 * - config/template_engines.yml            # The configuration file at the application level
 * - config/template_engines/              # Third-party plugins can add their configuration in this directory
 *
 * The syntax of a template engine yml file is the same for the application and for the plugins, and looks like this:
 *
 * ```yml
 * default_engine: jin
 * template_engines:
 *     jin:
 *         instance: Jin\TemplateEngine\JinTemplateEngine
 *         methods:
 *             setDirectories:
 *                 -
 *                     pages: ${appDir}/pages
 * ```
 *
 * Note: JinTemplateEngine is actually the default template engine in a jin app.
 *
 *
 */
class TemplateEngineMasterConfigurator
{


    /**
     * @info Configures the template engine master instance.
     *
     * @param $appDir
     * @param ConfigurationFileParser $confParser
     * @return true|array, true is returned if no error has occurred.
     * Otherwise, an array of error messages is returned. Note: those errors are intended for the main logger when the
     * application initializes (see Jin\Application\Application->init method for more details).
     *
     * @see \Jin\Application\Application::init()
     */
    public static function configure($appDir, ConfigurationFileParser $confParser)
    {
        $errors = [];

        $file = $appDir . "/config/template_engines.yml";
        $dir = $appDir . "/config/template_engines";
        $masterConf = $confParser->parseFileWithDir($file, $dir, true);


        $master = new TemplateEngineMaster();
        $master->setDefaultEngine($masterConf['default_engine']);
        $engines = $masterConf['template_engines'];
        if (is_array($engines)) {
            foreach ($engines as $name => $engine) {
                $master->addEngine($name, $engine['instance']);
            }
        }
        Access::setTemplateEngineMaster($master);


        if ($errors) {
            return $errors;
        }
        return true;
    }
}