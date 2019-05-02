<?php

namespace Ling\Light_Kit\CssFileGenerator;


use Ling\Bat\FileSystemTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\HtmlPageTools\CssFileGenerator\CssFileGeneratorInterface;


/**
 * The LightKitCssFileGenerator class.
 *
 * With this class, the identifier is treated as a page name.
 *
 *
 */
class LightKitCssFileGenerator implements CssFileGeneratorInterface
{

    /**
     * This property holds the rootDir for this instance.
     * This is the web root directory.
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the defaultIdentifier for this instance.
     * The default identifier to use.
     * @var string
     */
    protected $defaultIdentifier;

    /**
     * This property holds the format for this instance.
     * The format of the css web relative path when the identifier is passed.
     *
     * The default value is:
     *
     * - css/tmp/$identifier-compiled-widgets.css
     *
     * You can use the "$identifier" tag to reference the value of the given $identifier (see the generate method of this class).
     * Note: a common practice is to pass the page name aas the identifier.
     *
     *
     *
     * @var string
     */
    protected $format;



    /**
     * Builds the LightKitCssFileGenerator instance.
     * @param string $rootDir
     * @param string $format
     */
    public function __construct(string $rootDir, string $format=null)
    {
        if(null===$format){
            $format = 'css/tmp/$identifier-compiled-widgets.css';
        }
        $this->rootDir = $rootDir;
        $this->format = $format;
        $this->defaultIdentifier = "default.css";
    }


    /**
     * @implementation
     */
    public function generate(HtmlPageCopilot $copilot, string $identifier = null): string
    {
        if (null === $identifier) {
            $webRelPath = $this->defaultIdentifier;
        }
        else{
            $webRelPath = str_replace('$identifier',$identifier, $this->format);
        }


        $file = $this->rootDir . "/" . $webRelPath;
        $content = implode(PHP_EOL, $copilot->getCssCodeBlocks());
        FileSystemTool::mkfile($file, $content);
        return "/" . $webRelPath . "?time=" . time(); // prevent css cache
    }

}