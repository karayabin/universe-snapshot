<?php


namespace Ling\DocTools\Widget\PlanetTocList;

use Ling\DocTools\Exception\BadWidgetConfigurationException;
use Ling\DocTools\Info\ClassInfo;
use Ling\DocTools\Info\CommentInfo;
use Ling\DocTools\Info\MethodInfo;
use Ling\DocTools\Info\PlanetInfo;
use Ling\DocTools\Report\ReportInterface;
use Ling\DocTools\Widget\Widget;

/**
 * This PlanetTocListWidget widget displays a list of each class of the planet and their methods.
 * Each item being a link to a separate doc page.
 *
 *
 * This was inspired by the following page from the php.net website: http://php.net/manual/en/book.reflection.php
 * See the [screenshot here](http://lingtalfi.com/img/universe/DocTools/toclist-widget.png).
 *
 *
 * Options
 * -----------
 * - internal_link_base_uri: string, the uri prefix for internal links. It doesn't end with slash.
 * - ?display_class_description: bool=true, whether to display the short class description next to the generated class links.
 *
 * - ?class_description_mode: string=mixed (first_line | first_sentence | format_text | mixed).
 *          Defines what the class description is (this option is only relevant if the display_class_description option is set to true).
 *          The possible modes are:
 *              - first_line: this will display the first line of the class' (doc block) comment. If the class has no comment,
 *                          this displays an empty string.
 *              - first_sentence: this will display the first sentence of the class' (doc block) comment. If the class has no comment,
 *                          this displays an empty string.
 *              - format_text: this will display a formatted text defined with the class_description_format option.
 *              - mixed: first try the first_sentence, and if empty use the format_text mode (as a fallback).
 *                      This is the default value.
 *
 *
 * - ?class_description_format: string, the default text to display as the class description.
 *              Is only relevant when display_class_description=true and class_description_use_class_comment_first_line=false
 *              Default value: "The {short} class".
 *              The following tags can be used:
 *                  - {class}: the class name
 *                  - {short}: the short class name
 *
 * - ?display_methods: bool=true, whether to display the methods. If false, only the class links will be generated.
 * - ?methods_filter: string|array=public. A string or array of flags indicating which type of methods to return.
 *                  The available flags are:
 *                      - public
 *                      - protected
 *                      - private
 *
 * - ?display_method_description: bool=true. Whether to display the short method description next to the generated method links.
 *          Is only relevant if display_methods is set to true.
 *
 * - ?method_description_mode: string=mixed (first_line | first_sentence | format_text | mixed).
 *          Same as the class_description_mode option, but for methods.
 *
 *
 * - ?method_description_format: string, same as class_description_format, but for methods.
 *              Default value: "The {method} method".
 *              The following tags can be used:
 *                  - {method}: the method name
 *
 *
 *
 *
 *
 */
class PlanetTocListWidget extends Widget
{

    /**
     * This property holds a @doc(PlanetInfo) instance.
     * @var PlanetInfo
     */
    protected $planetInfo;


    /**
     * Builds the PlanetTocListWidget instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->planetInfo = null;
    }


    /**
     * Sets the planet info.
     *
     * @param PlanetInfo $planetInfo
     * @return $this
     */
    public function setPlanetInfo(PlanetInfo $planetInfo)
    {
        $this->planetInfo = $planetInfo;
        return $this;
    }


    /**
     * @implementation
     */
    public function render()
    {

        $generatedItems2Url = $this->options['generated_items_2_url'] ?? [];
        /**
         * @var $report ReportInterface
         */
        $report = $this->options['report'] ?? null;

        $display_class_description = $this->options['display_class_description'] ?? true;
        $sort_by_shortname = $this->options['sort_by_shortname'] ?? false;
        $class_description_mode = $this->options['class_description_mode'] ?? 'mixed';
        $class_description_format = $this->options['class_description_format'] ?? 'The {short} class';

        $display_methods = $this->options['display_methods'] ?? true;
        $methods_filter = $this->options['methods_filter'] ?? "public";
        $display_method_description = $this->options['display_method_description'] ?? true;
        $method_description_mode = $this->options['method_description_mode'] ?? 'mixed';
        $method_description_format = $this->options['method_description_format'] ?? 'The {method} method';


        $s = '';


        //--------------------------------------------
        // GENERATED
        //--------------------------------------------
        if (null !== $this->planetInfo) {

            $classes = $this->planetInfo->getClasses();


            if (true === $sort_by_shortname) {
                usort($classes, function (ClassInfo $a, ClassInfo $b) {
                    return $a->getShortName() > $b->getShortName();
                });
            }


            foreach ($classes as $k => $class) {


                /**
                 * @var ClassInfo $class
                 */
                $className = $class->getName();

                if (null !== $report) {
                    $report->setCurrentContext($className);
                }


                if (array_key_exists($className, $generatedItems2Url)) {
                    $classUrl = $generatedItems2Url[$className];
                    $classShortName = $class->getShortName();
                    $link = '[' . $classShortName . '](' . $classUrl . ')';
                    $s .= '- ' . $link;
                } else {
                    if (null !== $report) {
                        $report->addUnresolvedClassReference($className, "PlanetTocListWidget");
                    }
                    $s .= '- ' . $class->getShortName();
                }


                if (true === $display_class_description) {
                    $s .= ' &ndash; ';
                    $s .= $this->getItemDescription($class->getComment(), $class_description_mode,
                        function () use ($class, $class_description_format) {
                            return str_replace([
                                "{class}",
                                "{short}",
                            ], [
                                $class->getName(),
                                $class->getShortName(),
                            ], $class_description_format);
                        }, "class " . $class->getName());
                }

                $s .= PHP_EOL;


                if (true === $display_methods) {

                    $methods = $class->getMethods($methods_filter);
                    foreach ($methods as $methodInfo) {
                        /**
                         * @var MethodInfo $methodInfo
                         */
                        $reflectionMethod = $methodInfo->getReflectionMethod();
                        $methodName = $methodInfo->getName();


                        $methodLongName = $methodInfo->getReflectionMethod()->getDeclaringClass()->getName() . "::" . $methodName;
                        $methodString = $reflectionMethod->getDeclaringClass()->getShortName() . "::$methodName";


                        $s .= '    - ';
                        if (array_key_exists($methodLongName, $generatedItems2Url)) {

                            $url = $generatedItems2Url[$methodLongName];
                            $s .= '[' . $methodString . '](' . $url . ')';
                        } else {
                            if (null !== $report) {
                                $report->addUnresolvedMethodReference($className, $methodLongName, "PlanetTocListWidget");
                            }
                            $s .= $methodString;
                        }


                        if (true === $display_method_description) {
                            $s .= ' &ndash; ';


                            $s .= $this->getItemDescription($methodInfo->getComment(), $method_description_mode,
                                function () use ($methodInfo, $method_description_format) {
                                    return str_replace("{method}", $methodInfo->getName(), $method_description_format);
                                }, "method $methodName");
                        }
                        $s .= PHP_EOL;

                    }
                }
            }


        }

        return $s;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the item description, according to the given $mode.
     *
     * Mode can be one of:
     *
     * - first_sentence: will return the first sentence of the main text (see @concept(comment main text) for more details).
     * - first_line: will return the first line of the main text (see @concept(comment main text) for more details).
     * - format_text: will return the text formatted using the given $formatterCallable
     * - mixed: will try the first_sentence mode first, but if the result is an empty string, then uses the format_text mode as a fallback.
     *
     *
     * @param CommentInfo $comment
     * @param string $mode
     * @param callable $formatterCallable
     * @param string $debugString
     * @return string
     * @throws BadWidgetConfigurationException
     */
    protected function getItemDescription(CommentInfo $comment, string $mode, callable $formatterCallable, string $debugString): string
    {

        switch ($mode) {
            case "mixed":
                $s = $comment->getFirstSentence();
                if (empty($s)) {
                    $s = call_user_func($formatterCallable);
                }
                return $s;
                break;
            case "first_sentence":
                return $comment->getFirstSentence();
                break;
            case "first_line":
                return $comment->getFirstLine();
                break;
            case "format_text":
                return call_user_func($formatterCallable);
                break;
            default:
                throw new BadWidgetConfigurationException("Unknown mode: $mode for $debugString");
                break;
        }

    }
}