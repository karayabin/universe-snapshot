<?php


namespace Ling\SokoForm\Translator;


class SokoValidationRuleTranslator
{


    /**
     * @var string iso code 3 letter (639-2)
     */
    private static $lang = "eng";


    public static function setLang(string $lang)
    {
        self::$lang = $lang;
    }


    public static function getValidationMessageTranslation(string $msgIdentifier, string $lang = null)
    {

        if (null === $lang) {
            $lang = self::$lang;
        }

        switch ($lang) {
            case "fra":
                switch ($msgIdentifier) {
                    case "required":
                        return "Ce champ est requis";
                        break;
                    case "minLength":
                        return "Ce champ doit contenir au minimum {minChars} caractères";
                        break;
                    case "minNumber":
                        return "Vous devez cocher au moins {minNumber} case(s)";
                        break;
                    case "minMaxDigits":
                        return "Ce champ doit comprendre entre {min} et {max} chiffres";
                        break;
                    case "date":
                        return "Ce champ doit avoir le format suivant: {dateFormat}";
                        break;
                    case "email":
                        return "Cet email n'est pas valide";
                        break;
                    case "fileNotEmpty":
                        return "Ce champ est requis";
                        break;
                    case "inArray":
                        return "La valeur de ce champ doit être l'une des valeurs suivantes: {sArray}";
                        break;
                    case "inRange":
                        return "La valeur de ce champ doit être comprise entre {min} et {max}";
                        break;
                    case "identical":
                        return "Les deux valeurs ne sont pas identiques";
                        break;
                    case "controlNotFound":
                        return "Le champ {otherControl} n'a pas été trouvé";
                        break;
                    case "siret":
                        return "Ce n'est pas un numéro de Siret valide";
                        break;
                    case "tvaIntracom":
                        return "Le numéro de TVA intracom fourni n'est pas valide pour le pays sélectionné ({countryLabel})";
                        break;
                    case "mandatory":
                        return "Ce champ est obligatoire";
                        break;
                    default:
                        break;
                }
                break;
            default:


                switch ($msgIdentifier) {
                    case "required":
                        return "The field is required";
                        break;
                    case "minLength":
                        return "The field must contain at least {minChars} characters";
                        break;
                    case "minNumber":
                        return "You must check at least {minNumber} checkbox(es)";
                        break;
                    case "minMax":
                        return "The value must contain at least {min} digits, and at most {max} digits";
                        break;
                    case "date":
                        return "The field doesn't match the pattern {dateFormat}";
                        break;
                    case "email":
                        return "The email is invalid";
                        break;
                    case "fileNotEmpty":
                        return "The field is required";
                        break;
                    case "inArray":
                        return "The value must be one of {sArray}";
                        break;
                    case "inRange":
                        return "The value must be comprised between {min} and {max}";
                        break;
                    case "identical":
                        return "The two values aren't identical";
                        break;
                    case "controlNotFound":
                        return "The control {otherControl} does not exist";
                        break;
                    case "siret":
                        return "This is not a valid siret number";
                        break;
                    case "tvaIntracom":
                        return "The TVA intracom number isn't valid for the selected country ({countryLabel})";
                        break;
                    case "mandatory":
                        return "This field is mandatory";
                        break;
                    default:
                        break;
                }


                break;
        }
    }


}