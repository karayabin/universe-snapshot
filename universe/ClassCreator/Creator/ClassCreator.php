<?php


namespace ClassCreator\Creator;


use Bat\FileSystemTool;
use ClassCreator\Comment\Comment;
use ClassCreator\Method\Method;
use ClassCreator\Profile\Profile;
use ClassCreator\Property\Property;

/**
 * The ClassCreator class helps you creating a well-formatted class.
 */
class ClassCreator
{

    /**
     * This property holds the namespace of the class (if any).
     * @var string=null
     */
    protected $namespace;

    /**
     * This property holds the use statements (if any).
     * @var array
     */
    protected $useStatements;

    /**
     * This property holds the class comment (displayed the class signature).
     * @var Comment
     */
    protected $comment;


    /**
     * This property holds the signature of the class.
     * For instance:
     *
     *      - class Dog extends Animal
     *      - abstract class Entity implements EntityInterface
     *
     * @var string=null
     */
    protected $signature;

    /**
     * This class holds the array of properties for the class being created.
     *
     * @var Property[]
     */
    protected $properties;

    /**
     * This class holds the array of methods for the class being created.
     *
     * @var Method[]
     */
    protected $methods;


    /**
     * Builds the ClassCreator instance.
     */
    public function __construct()
    {
        $this->namespace = null;
        $this->useStatements = [];
        $this->comment = null;

        $this->signature = null;

        $this->properties = [];
        $this->methods = [];
    }


    /**
     * Sets the namespace of the class being created.
     *
     * @param $namespace
     * @return $this
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * Add any number of use statements to add to the class being created.
     *
     * @param array $useStatements
     * @return $this
     */
    public function addUseStatements(array $useStatements)
    {
        $this->useStatements = $useStatements;
        return $this;
    }

    /**
     * Sets the class comment for the class being created.
     *
     * @param Comment $comment
     * @return $this
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Sets the signature of the class being created.
     *
     * @param $signature
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }


    /**
     * Adds a property to the class being created.
     *
     * @param Property $property
     * @return $this
     */
    public function addProperty(Property $property)
    {
        $this->properties[] = $property;
        return $this;
    }


    /**
     * Adds a method to the class being created.
     *
     * @param Method $method
     * @return $this
     */
    public function addMethod(Method $method)
    {
        $this->methods[] = $method;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Creates and returns the content of the class to create.
     * If $file is given, it will also create the class file at the location given by $file.
     *
     * Options:
     *      - profile, the profile to use.
     *          It not set, a default profile will be used.
     *
     *
     * @param null $file
     * @param array $options
     * @return string
     */
    public function export($file = null, array $options = [])
    {
        $profile = $options['profile'] ?? $this->getDefaultProfile();


        //--------------------------------------------
        // PHP FILE
        //--------------------------------------------
        $s = '<?php ' . PHP_EOL;
        $s .= str_repeat(PHP_EOL, $profile->number_of_eol_after_php_opening_tag);


        //--------------------------------------------
        // HEADER
        //--------------------------------------------
        if ($this->namespace) {
            $s .= 'namespace ' . $this->namespace . ";" . PHP_EOL;
            $s .= str_repeat(PHP_EOL, $profile->number_of_eol_after_namespace);
        }

        if ($this->useStatements) {
            foreach ($this->useStatements as $useStatement) {
                $s .= 'use ' . $useStatement . ';' . PHP_EOL;
            }
            $s .= str_repeat(PHP_EOL, $profile->number_of_eol_after_use_statements);
        }


        //--------------------------------------------
        // CLASS COMMENT
        //--------------------------------------------
        if ($this->comment) {
            $s .= self::getFormattedComment($this->comment);
            $s .= PHP_EOL;
        }
        //--------------------------------------------
        // SIGNATURE
        //--------------------------------------------
        $s .= $this->signature;
        if (true === $profile->class_opening_brace_on_new_line) {
            $s .= PHP_EOL;
            $s .= '{';
        } else {
            if (true === $profile->space_between_class_signature_and_opening_brace) {
                $s .= ' ';
            }
            $s .= '{';
        }


        $indentChar = ('tab' === $profile->class_children_indentation_unit) ? "\t" : " ";
        $indentNumber = $profile->class_children_indentation_number;


        //--------------------------------------------
        // PROPERTIES
        //--------------------------------------------
        if ($this->properties) {
            $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_properties);
            foreach ($this->properties as $property) {

                $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_property);

                $comment = $property->getComment();
                $signature = $property->getSignature();
                if ($comment) {
                    $s .= self::getFormattedComment($comment, $indentNumber, $indentChar);
                    $s .= PHP_EOL;
                }
                $s .= str_repeat($indentChar, $indentNumber) . $signature . PHP_EOL;
            }
        }


        //--------------------------------------------
        // METHODS
        //--------------------------------------------
        if ($this->methods) {

            $methodIndentChar = ('tab' === $profile->method_children_indentation_unit) ? "\t" : " ";
            $methodIndentNumber = $profile->method_children_indentation_number;


            $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_methods);
            foreach ($this->methods as $method) {
                $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_method);

                $comment = $method->getComment();
                $signature = $method->getSignature();
                $body = $method->getBody();


                if ($comment) {
                    $s .= self::getFormattedComment($comment, $indentNumber, $indentChar);
                    $s .= PHP_EOL;
                }
                $s .= str_repeat($indentChar, $indentNumber) . $signature;

                if (true === $profile->method_opening_brace_on_new_line) {
                    $s .= PHP_EOL;
                    $s .= '{';
                } else {
                    if (true === $profile->space_between_method_signature_and_opening_brace) {
                        $s .= ' ';
                    }
                    $s .= '{';
                }
                $s .= PHP_EOL;


                $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_method_body);
                $s .= self::indent($body, $methodIndentNumber, $methodIndentChar);
                $s .= str_repeat(PHP_EOL, $profile->number_of_eol_after_method_body);


                $s .= PHP_EOL;
                $s .= str_repeat($indentChar, $indentNumber) . '}' . PHP_EOL;

            }
        }


        //--------------------------------------------
        // CLASS END
        //--------------------------------------------
        $s .= str_repeat(PHP_EOL, $profile->number_of_eol_before_class_closing_brace);
        $s .= PHP_EOL;
        $s .= '}';
        $s .= str_repeat(PHP_EOL, $profile->number_of_eol_after_class_closing_brace);


        //--------------------------------------------
        //
        //--------------------------------------------
        if (null !== $file) {
            FileSystemTool::mkfile($file, $s);
        }
        return $s;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the default profile to use to create the class.
     * This method should be overridden if necessary.
     *
     * @return Profile
     */
    protected function getDefaultProfile()
    {
        return new Profile();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a comment formatted and indented.
     *
     * @param Comment $comment
     * @param int $indent
     * @param string $indentChar
     * @return string
     */
    private static function getFormattedComment(Comment $comment, $indent = 0, $indentChar = ' ')
    {
        $s = '';

        $type = $comment->getType();
        $message = $comment->getMessage();
        $lines = explode(PHP_EOL, $message);

        switch ($type) {
            case "multiple":
            case "docBlock":
                if ('multiple' === $type) {
                    $s .= '/*';
                } else {
                    $s .= '/**';
                }
                $s .= PHP_EOL;
                foreach ($lines as $line) {
                    $s .= '* ' . $line . PHP_EOL;
                }
                $s .= '*/';


                break;
            case "oneLine":
            case "oneLineShell":
                if ('oneLine' === $type) {
                    $startChar = '// ';
                } else {
                    $startChar = '# ';
                }
                $s .= $startChar . implode(PHP_EOL . $startChar, $lines);
                break;
                break;
            default:
                break;
        }


        //--------------------------------------------
        // indent
        //--------------------------------------------
        if ($indent) {
            $s = self::indent($s, $indent, $indentChar);
        }
        return $s;
    }

    /**
     * Indents a text.
     *
     *
     * @param $text
     * @param $indent
     * @param $indentChar
     * @return string
     */
    private static function indent($text, $indent, $indentChar)
    {
        $allLines = explode(PHP_EOL, $text);
        $indentation = str_repeat($indentChar, $indent);
        $s = '';
        $s .= $indentation . implode(PHP_EOL . $indentation, $allLines);
        return $s;
    }
}