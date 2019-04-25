<?php


namespace Ling\HtmlPageTools\Renderer;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\HtmlPageTools\Exception\HtmlPageException;

/**
 * The HtmlPageRenderer class.
 *
 * A possible implementation of an html page renderer.
 *
 *
 * The top and bottom concept
 * -----------
 *
 * This renderer uses the concept of top and bottom.
 *
 * The top is the top part of the html page, starting at the doctype declaration, including the html opening tag,
 * including the complete head tag, and even including the opening body tag.
 *
 * Then the bottom is the part which contains the closing body tag, and usually the part just before (but that's up to the user),
 * which generally contains some js scripts and/or js initialization code blocks.
 *
 * It also includes the closing html tag.
 *
 * The content of the body is left to the user to render.
 *
 * To recap, here is the simplified structure of an html page, using the top and bottom concept:
 *
 *
 * ```txt
 *
 * <!-- BEGIN OF TOP -->
 *      doctype
 *      <html>
 *      <head></head>
 *      <body>
 * <!-- END OF TOP -->
 *
 * <!-- HERE IS THE BODY CONTENT, BUT THAT'S LEFT TO THE USER (YOU) TO RENDER -->
 *
 *
 * <!-- BEGIN OF BOTTOM -->
 *      <!-- usually including some js libraries here, and/or rendering some js initialization code blocks -->
 *      </body>
 *      </html>
 * <!-- END OF BOTTOM -->
 *
 *
 * ```
 *
 *
 *
 *
 *
 */
class HtmlPageRenderer
{

    /**
     * This property holds the copilot for this instance.
     * @var HtmlPageCopilot
     */
    protected $copilot;


    /**
     * Builds the HtmlPageRenderer instance.
     */
    public function __construct()
    {
        $this->copilot = null;
    }

    /**
     * Sets the copilot.
     *
     * @param HtmlPageCopilot $copilot
     */
    public function setCopilot(HtmlPageCopilot $copilot)
    {
        $this->copilot = $copilot;
    }


    /**
     * Prints the content of the top file, which represents the top of the html page.
     *
     * See class description for more info about the concept of top.
     *
     * @param string $topFile
     * @throws HtmlPageException
     */
    public function printTop(string $topFile)
    {
        if (null !== $this->copilot) {
            if (file_exists($topFile)) {

                $copilot = $this->copilot; // just creating a variable for the top file to use
                include $topFile;


            } else {
                throw new HtmlPageException("The top file doesn't exist: $topFile.");
            }
        } else {
            throw new HtmlPageException("You must set the copilot before you can use the renderTop method.");
        }
    }


    /**
     * Prints the content of the bottom file, which represents the bottom of the html page.
     *
     * See class description for more info about the concept of bottom.
     *
     * @param string $bottomFile
     * @throws HtmlPageException
     */
    public function printBottom(string $bottomFile)
    {
        if (null !== $this->copilot) {
            if (file_exists($bottomFile)) {

                $copilot = $this->copilot; // just creating a variable for the bottom file to use
                include $bottomFile;


            } else {
                throw new HtmlPageException("The bottom file doesn't exist: $bottomFile.");
            }
        } else {
            throw new HtmlPageException("You must set the copilot before you can use the renderBottom method.");
        }
    }

}