<?php


namespace Ling\DocTools\Helper;


use Ling\DocTools\Exception\DocToolsException;
use Ling\DocTools\Info\CommentInfo;

/**
 * The CommentHelper class.
 * This is a generic helper class to help with the comments (doc comments, or @kw(CommentInfo)).
 */
class CommentHelper
{


    /**
     * This property holds the php types (i.e. not including custom user class) allowed
     * for a @var tag in DocTools.
     *
     *
     * @var array
     * * http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.types
     */
    public static $propertyVarTagTypes = [
        'int',
        'float',
        'bool',
        'mixed',
        'null',
        'array',
        'callable',
        'string',
    ];


    /**
     * This property holds the php types (i.e. not including custom user class) allowed
     * for a @return tag in DocTools.
     *
     *
     * @var array
     * * http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.types
     */
    public static $propertyReturnTagTypes = [
        'int',
        'mixed',
        'float',
        'bool',
        'false',
        'true',
        'null',
        'array',
        'callable',
        'string',
        'void',
    ];


    /**
     * Returns a human sentence out of the see items collected into the given CommentInfo instance.
     *
     * @param CommentInfo $comment
     * @return string|null
     * @throws DocToolsException
     */
    public static function displaySeeAlsoItemsSentence(CommentInfo $comment): ?string
    {
        $seeItems = $comment->getSeeItems();
        if ($seeItems) {
            $s = "";
            $s .= "See also ";
            $c = 0;
            foreach ($seeItems as $item) {

                if (0 !== $c) {
                    $s .= ', ';
                }

                $type = $item['type'];
                $value = $item['value'];


                $url = $item['url'];
                $word = null;

                if ('class' === $type) {
                    $p = explode('\\', $value);
                    $shortName = array_pop($p);
                    $word = 'the ' . $shortName . ' class';
                }
                elseif ('method' === $type) {
                    $p = explode('::', $value);
                    $q = explode('\\', $p[0]);
                    $shortName = array_pop($q);
                    $methodName = $shortName . "::" . $p[1];
                    $word .= 'the ' . $methodName . ' method';
                }
                else {
                    throw new DocToolsException("Unknown type $type");
                }

                if (null !== $url) {
                    $word = '[' . $word . '](' . $url . ')';
                }

                $s .= $word;


                $c++;
            }
            return $s;
        }
        return null;
    }

}