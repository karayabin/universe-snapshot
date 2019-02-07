<?php


namespace ClassCreator\Creator;


use ClassCreator\Comment\Comment;

/**
 * The CommentCreator class helps creating various comments.
 * It basically encapsulates the type of comment for you.
 *
 */
class CommentCreator
{


    /**
     * Returns a comment of type docBlock.
     * See ClassCreator\Comment\Comment for more details.
     *
     * @seeClass ClassCreator\Comment\Comment
     * @param $string
     * @return Comment
     */
    public static function docBlock($string)
    {
        $o = new Comment();
        $o->setMessage($string);
        $o->setType('docBlock');
        return $o;
    }

    /**
     * Returns a comment of type multiple.
     * See ClassCreator\Comment\Comment for more details.
     *
     * @seeClass ClassCreator\Comment\Comment
     * @param $string
     * @return Comment
     */
    public static function multipleLines($string)
    {
        $o = new Comment();
        $o->setMessage($string);
        $o->setType('multiple');
        return $o;
    }

    /**
     * Returns a comment of type oneLine.
     * See ClassCreator\Comment\Comment for more details.
     *
     * @seeClass ClassCreator\Comment\Comment
     * @param $string
     * @return Comment
     */
    public static function oneLine($string)
    {
        $o = new Comment();
        $o->setMessage($string);
        $o->setType('oneLine');
        return $o;
    }

    /**
     * Returns a comment of type oneLineShell.
     * See ClassCreator\Comment\Comment for more details.
     *
     * @seeClass ClassCreator\Comment\Comment
     * @param $string
     * @return Comment
     */
    public static function oneLineShellStyle($string)
    {
        $o = new Comment();
        $o->setMessage($string);
        $o->setType('oneLineShell');
        return $o;
    }
}