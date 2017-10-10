<?php


namespace Kamille\Utils\Claws;


/**
 * Note: I deliberately did not include all Kamille\Mvc\Widget options here
 * (things like setLoader...),
 * that's because it's generally not needed, and the more you provide
 * options to the user/developer, the more complex it becomes
 * to focus on the main goal.
 *
 * If that's required, though, this class can be extended...
 *
 * Ps:
 * Even the class (setClass) is almost never used, but I wanted
 * to give an example (expose the benefit of using a class over a string)
 * otherwise this ClawsLayout class has no advantage
 * over a simple template string.
 *
 */
class ClawsLayout
{
    private $template;
    private $class;


    public function __construct()
    {
        $this->class = "Kamille\Mvc\Layout\HtmlLayout";
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }
}