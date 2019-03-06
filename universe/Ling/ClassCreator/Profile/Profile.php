<?php


namespace Ling\ClassCreator\Profile;


/**
 * The Profile class contains the cosmetic settings for the class to be created.
 *
 * All properties are public.
 *
 * For the sake of readability, I didn't comment the properties of this class,
 * because each property is self-descriptive
 *
 * See documentation for more info.
 *
 */
class Profile
{
    //--------------------------------------------
    // HEADER & CLASS
    //--------------------------------------------
    public $number_of_eol_after_php_opening_tag = 1;
    public $number_of_eol_after_namespace = 1;
    public $number_of_eol_after_use_statements = 1;
    public $class_opening_brace_on_new_line = false;
    public $space_between_class_signature_and_opening_brace = true; // only if $class_opening_brace_on_new_line=false
    public $number_of_eol_before_class_closing_brace = 0;
    public $number_of_eol_after_class_closing_brace = 10;

    //--------------------------------------------
    // CLASS CHILDREN
    //--------------------------------------------
    public $class_children_indentation_number = 4;
    public $class_children_indentation_unit = 'space'; // space|tab


    //--------------------------------------------
    // PROPERTIES
    //--------------------------------------------
    public $number_of_eol_before_properties = 1;
    public $number_of_eol_before_property = 1;


    //--------------------------------------------
    // METHODS
    //--------------------------------------------
    public $number_of_eol_before_methods = 1;
    public $number_of_eol_before_method = 1;
    public $method_opening_brace_on_new_line = false;
    public $space_between_method_signature_and_opening_brace = true; // only if $method_opening_brace_on_new_line=false
    public $number_of_eol_before_method_body = 0;
    public $number_of_eol_after_method_body = 0;

    //--------------------------------------------
    // METHODS CHILDREN
    //--------------------------------------------
    public $method_children_indentation_number = 8;
    public $method_children_indentation_unit = 'space'; // space|tab

}