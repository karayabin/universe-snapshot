<?php


namespace DocTools\Info;

use DocTools\Exception\DocToolsException;
use DocTools\Helper\CommentHelper;

/**
 * The CommentInfo class.
 *
 * It contains various information about a doc comment found in the code.
 *
 * A doc comment is a php comment that starts with slash double star (/**).
 *
 * A doc comment can be attached to a class, a method or a property.
 *
 *
 * The doc comment structure
 * --------------------
 *
 * The doc comment is composed of two areas:
 *
 * - the main text
 * - the tags area
 *
 *
 * The main text is the base descriptive, human friendly text which describes the commented entity.
 * It starts at the top of the doc comment block and ends when the tags area
 * starts (whenever a @keyword(block-level tag) is found).
 *
 * In the main text, the @keyword(inline-level tags) of the @keyword(docTool markup language) are resolved.
 *
 * Also, the special @implementation block-level tag is resolved: the tag is first replaced with the
 * comment of the relevant interface or abstract class comment, and then the inline tags are resolved
 * from that compiled comment.
 *
 *
 * The tags area is the bottom zone of the doc comment, and contains all the block level tags.
 *
 *
 *
 *
 *
 *
 *
 *
 */
class CommentInfo implements InfoInterface
{


    /**
     * This property holds the doc comment as is.
     * @var string
     */
    protected $rawText;

    /**
     * This property holds the main text (see class description for more details).
     * @var string
     */
    protected $mainText;

    /**
     * This property holds the first line of the main text.
     * @var string
     */
    protected $firstLine;


    /**
     * This property holds the first sentence of the comment (the first sequence of characters ending with a dot, included).
     *
     * @var string $firstSentence
     */
    protected $firstSentence;

    /**
     * This property holds an array of tag name => tag values.
     *
     * Note: a tag can be written multiple times with different values.
     *
     * Each time a tag is found, its value is added to the corresponding tag values array.
     * In each tag value, the @keyword(inline-level tags) are resolved.
     *
     * @var array
     */
    protected $tags;


    /**
     * This property holds the seeItems array for this instance.
     *
     * See items is shorthand for "see also items".
     * This array contains items that the reader should also read.
     *
     * See items are declared with either one of those tags:
     * - "@seeClass"
     * - "@seeMethod"
     *
     * See @kw(the docTool markup language) for more info.
     *
     *
     * The array structure is:
     *
     * - type: the type of seeItem amongst:
     *      - class: the class name (i.e. Jin\Log\Logger)
     *      - method: the method name, either using the method name (if the method is in the same class), or the
     *              long method name (i.e. className::methodName) if the method is not in the same class.
     * - declaringClass: the declaring class name (used to reference a method in the same class)
     * - value: the value, depending on the type (either the class name or the method (long)? name
     *
     *
     * @var array
     */
    protected $seeItems;


    /**
     * Builds the CommentInfo instance.
     */
    public function __construct()
    {
        $this->firstLine = null;
        $this->firstSentence = null;
        $this->rawText = null;
        $this->mainText = null;
        $this->tags = [];
        $this->seeItems = [];
    }


    /**
     * Returns the raw text.
     *
     * @return string
     */
    public function getRawText()
    {
        return $this->rawText;
    }

    /**
     * Returns the main text.
     *
     *
     *
     * @param array $options
     * - useSeeItems: bool=true. Whether to display a human "see also items" sentence when available.
     *      Note: it's available if the tags "@seeClass" or "@seeMethod" have been used.
     *
     *
     * @return string
     * @throws DocToolsException
     */
    public function getMainText(array $options = [])
    {
        $s = $this->mainText;
        $useSeeItems = $options['useSeeItems'] ?? true;
        if (true == $useSeeItems) {
            $s .= PHP_EOL;
            $s .= PHP_EOL;
            $s .= CommentHelper::displaySeeAlsoItemsSentence($this);
        }
        return $s;
    }


    /**
     * Returns whether the main text of this comment is empty.
     *
     * @return bool
     */
    public function hasEmptyMainText()
    {
        return empty($this->mainText);
    }


    /**
     * Returns the body of the given $tag, or the $default value if the tag isn't defined.
     *
     * @param $tagName
     * @param null $default
     * @return mixed|null
     */
    public function getTagContent($tagName, $default = null)
    {
        return $this->tags[$tagName] ?? $default;
    }

    /**
     * Returns the tags array (see the tags property of this class for more details)
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Returns all tags with the given $tagName associated with this comment.
     *
     * @param string $tagName
     * @return array
     */
    public function getTagsByName(string $tagName)
    {
        return $this->tags[$tagName] ?? [];
    }

    /**
     * Returns the first $tagName tag associated with this comment.
     *
     * @param string $tagName
     * @return string|null. Returns null if the $tagName tag is not associated with this comment.
     */
    public function getTagByName(string $tagName)
    {
        if (array_key_exists($tagName, $this->tags)) {
            return array_shift($this->tags[$tagName]);
        }
        return null;
    }

    /**
     * Returns whether the comment has the tag $tagName.
     *
     * @param string $tagName
     * @return bool
     */
    public function hasTag(string $tagName)
    {
        return array_key_exists($tagName, $this->tags);
    }


    /**
     * Sets the raw text of this comment.
     *
     * @param $rawText
     * @return $this
     */
    public function setRawText($rawText)
    {
        $this->rawText = $rawText;
        return $this;
    }


    /**
     * Sets the main text of the comment.
     *
     * @param $mainText
     * @return $this
     */
    public function setMainText($mainText)
    {
        $this->mainText = $mainText;
        return $this;
    }


    /**
     * Sets the tags for this comment.
     *
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * Returns the first line of the main text (see class description for more details).
     *
     * @return string
     */
    public function getFirstLine()
    {
        return $this->firstLine;
    }


    /**
     * Sets the first line for this comment.
     *
     * @param $firstLine
     * @return $this
     */
    public function setFirstLine($firstLine)
    {
        $this->firstLine = $firstLine;
        return $this;
    }

    /**
     * Returns the firstSentence of this instance.
     *
     * @return string
     */
    public function getFirstSentence(): string
    {
        return $this->firstSentence;
    }

    /**
     * Sets the firstSentence.
     *
     * @param $firstSentence
     * @return $this
     */
    public function setFirstSentence(string $firstSentence)
    {
        $this->firstSentence = $firstSentence;
        return $this;
    }


    /**
     * Returns whether the comment is empty.
     * An empty comment is a comment which main text is empty, and which doesn't have any tags.
     *
     *
     * @return bool
     */
    public function isEmpty()
    {
        if (empty($this->rawText)) {
            return true;
        }
        return false;
    }

    /**
     * Returns the seeItems of this instance.
     *
     * @return array
     */
    public function getSeeItems(): array
    {
        return $this->seeItems;
    }

    /**
     * Sets the seeItems.
     *
     * @param array $seeItems
     * @return $this
     */
    public function setSeeItems(array $seeItems)
    {
        $this->seeItems = $seeItems;
        return $this;
    }


}