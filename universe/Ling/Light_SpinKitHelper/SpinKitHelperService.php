<?php


namespace Ling\Light_SpinKitHelper;


use Ling\Bat\StringTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The SpinKitHelperService class.
 */
class SpinKitHelperService
{

    /**
     * This property holds the defaultStyle for this instance.
     * @var string=rotatingPlane
     */
    protected $defaultStyle;

    /**
     * This property holds the defaultColor for this instance.
     * @var string
     */
    protected $defaultColor;


    /**
     * This property holds the container for this instance.
     *
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the SpinKitHelperService instance.
     */
    public function __construct()
    {
        $this->defaultStyle = "rotatingPlane";
        $this->defaultColor = "black";
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Sets the defaultStyle.
     *
     * @param string $defaultStyle
     */
    public function setDefaultStyle(string $defaultStyle)
    {
        $this->defaultStyle = $defaultStyle;
    }

    /**
     * Sets the defaultColor.
     *
     * @param string $defaultColor
     */
    public function setDefaultColor(string $defaultColor)
    {
        $this->defaultColor = $defaultColor;
    }


    /**
     * Renders the spinkit html markup in the chosen style.
     * Note: you need to manually add the sk-loading on the position:relative element
     * containing this markup in order to make the overlay appear.
     *
     * The available styles are (along with the class to add the background-color on):
     *
     * - rotatingPlane              .sk-rotating-plane
     * - doubleBounce               .sk-double-bounce .sk-child
     * - wave                       .sk-wave .sk-rect
     * - wanderingCubes             .sk-wandering-cubes .sk-cube
     * - pulse                      .sk-spinner-pulse
     * - chasingDots                .sk-chasing-dots .sk-child
     * - threeBounce                .sk-three-bounce .sk-child
     * - circle                     .sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before
     * - cubeGrid                   .sk-cube-grid .sk-cube
     * - fadingCircle               .sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before
     * - foldingCube                .sk-folding-cube .sk-cube::before
     *
     *
     *
     *
     * @param string|null $style
     * @param string|null $color
     * A css color.
     * @return string
     * @throws \Exception
     */
    public function render(string $style = null, string $color = null): string
    {

        /**
         * @var $copilot HtmlPageCopilot
         */
        $copilot = $this->container->get("html_page_copilot");
        $copilot->registerLibrary("spinkit_helper", [], [
            "/plugins/Light_SpinKitHelper/spinkit-helper.css",
        ]);


        if (null === $style) {
            $style = $this->defaultStyle;
        }
        if (null === $color) {
            $color = $this->defaultColor;
        }

        $html = "";
        $cssId = StringTool::getUniqueCssId("skh-");
        $sId = 'id="' . $cssId . '"';
        $sSpinner = 'sk-loading-spinner';
        $target = '';


        switch ($style) {
            case 'rotatingPlane':
                $target = '.sk-rotating-plane';
                $html = '<div class="sk-rotating-plane ' . $sSpinner . '" ' . $sId . '></div>';
                break;
            case 'doubleBounce':
                $target = '.sk-double-bounce .sk-child';
                $html = '' .
                    '<div class="sk-double-bounce ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-child sk-double-bounce1"></div>' .
                    '    <div class="sk-child sk-double-bounce2"></div>' .
                    '</div>';
                break;
            case 'wave':
                $target = '.sk-wave .sk-rect';
                $html = '' .
                    '<div class="sk-wave ' . $sSpinner . ' " ' . $sId . '>' .
                    '    <div class="sk-rect sk-rect1"></div>' .
                    '    <div class="sk-rect sk-rect2"></div>' .
                    '    <div class="sk-rect sk-rect3"></div>' .
                    '    <div class="sk-rect sk-rect4"></div>' .
                    '    <div class="sk-rect sk-rect5"></div>' .
                    '</div>';
                break;
            case 'wanderingCubes':
                $target = '.sk-wandering-cubes .sk-cube';
                $html = '' .
                    '<div class="sk-wandering-cubes ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-cube sk-cube1"></div>' .
                    '    <div class="sk-cube sk-cube2"></div>' .
                    '</div>';
                break;
            case 'pulse':
                $target = '.sk-spinner-pulse';
                $html = '<div class="sk-spinner sk-spinner-pulse ' . $sSpinner . '" ' . $sId . '></div>';
                break;
            case 'chasingDots':
                $target = '.sk-chasing-dots .sk-child';
                $html = '' .
                    '<div class="sk-chasing-dots ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-child sk-dot1"></div>' .
                    '    <div class="sk-child sk-dot2"></div>' .
                    '</div>';
                break;
            case 'threeBounce':
                $target = '.sk-three-bounce .sk-child';
                $html = '' .
                    '<div class="sk-three-bounce ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-child sk-bounce1"></div>' .
                    '    <div class="sk-child sk-bounce2"></div>' .
                    '    <div class="sk-child sk-bounce3"></div>' .
                    '</div>';
                break;
            case 'circle':
                $target = '.sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before';
                $html = '' .
                    '<div class="sk-circle ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-circle1 sk-child"></div>' .
                    '    <div class="sk-circle2 sk-child"></div>' .
                    '    <div class="sk-circle3 sk-child"></div>' .
                    '    <div class="sk-circle4 sk-child"></div>' .
                    '    <div class="sk-circle5 sk-child"></div>' .
                    '    <div class="sk-circle6 sk-child"></div>' .
                    '    <div class="sk-circle7 sk-child"></div>' .
                    '    <div class="sk-circle8 sk-child"></div>' .
                    '    <div class="sk-circle9 sk-child"></div>' .
                    '    <div class="sk-circle10 sk-child"></div>' .
                    '    <div class="sk-circle11 sk-child"></div>' .
                    '    <div class="sk-circle12 sk-child"></div>' .
                    '</div>';
                break;
            case 'cubeGrid':
                $target = '.sk-cube-grid .sk-cube';
                $html = '' .
                    '<div class="sk-cube-grid ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-cube sk-cube1"></div>' .
                    '    <div class="sk-cube sk-cube2"></div>' .
                    '    <div class="sk-cube sk-cube3"></div>' .
                    '    <div class="sk-cube sk-cube4"></div>' .
                    '    <div class="sk-cube sk-cube5"></div>' .
                    '    <div class="sk-cube sk-cube6"></div>' .
                    '    <div class="sk-cube sk-cube7"></div>' .
                    '    <div class="sk-cube sk-cube8"></div>' .
                    '    <div class="sk-cube sk-cube9"></div>' .
                    '</div>';
                break;
            case 'fadingCircle':
                $target = '.sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before';
                $html = '' .
                    '<div class="sk-fading-circle ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-circle1 sk-circle"></div>' .
                    '    <div class="sk-circle2 sk-circle"></div>' .
                    '    <div class="sk-circle3 sk-circle"></div>' .
                    '    <div class="sk-circle4 sk-circle"></div>' .
                    '    <div class="sk-circle5 sk-circle"></div>' .
                    '    <div class="sk-circle6 sk-circle"></div>' .
                    '    <div class="sk-circle7 sk-circle"></div>' .
                    '    <div class="sk-circle8 sk-circle"></div>' .
                    '    <div class="sk-circle9 sk-circle"></div>' .
                    '    <div class="sk-circle10 sk-circle"></div>' .
                    '    <div class="sk-circle11 sk-circle"></div>' .
                    '    <div class="sk-circle12 sk-circle"></div>' .
                    '</div>';
                break;
            case 'foldingCube':
                $target = '.sk-folding-cube .sk-cube::before';
                $html = '' .
                    '<div class="sk-folding-cube ' . $sSpinner . '" ' . $sId . '>' .
                    '    <div class="sk-cube1 sk-cube"></div>' .
                    '    <div class="sk-cube2 sk-cube"></div>' .
                    '    <div class="sk-cube4 sk-cube"></div>' .
                    '    <div class="sk-cube3 sk-cube"></div>' .
                    '</div>';
                break;
            default:
                $html = $this->render("rotatingPlane");
                break;
        }

        // adding inline css
        $parent = $cssId . $target;
        $css = <<<EEE

<style type="text/css">
#$parent {
    background-color: $color;
}
</style>

EEE;

        $html = $css . $html;
        return $html;
    }

}