<?php


namespace Ling\BabyYaml\Reader;


use Ling\BabyYaml\Exception\BabyYamlException;
use Ling\BabyYaml\Reader\MultiLineDelimiter\SingleCharCommentsMultiLineDelimiter;
use Ling\BabyYaml\Reader\Node\NodeInterface;
use Ling\BabyYaml\Reader\Node\NodeInfoNode;

/**
 * The BabyYamlCommentsBuilder class.
 */
class BabyYamlCommentsBuilder extends BabyYamlBuilder
{


    /**
     * This property holds the @page(commentItems) for this instance.
     *
     * @var array
     */
    protected $comments;


    /**
     * @overrides
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->comments = [];
    }

    /**
     * Returns the comments of this instance.
     *
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @overrides
     */
    public function getMultiLineDelimiter()
    {
        if (null === $this->multiLineDelimiter) {
            $this->multiLineDelimiter = new SingleCharCommentsMultiLineDelimiter();
            $this->multiLineDelimiter->setOnCommentFoundCallback(function (string $comment, bool $isBegin) {

                $type = (true === $isBegin) ? 'multi-top' : "multi-bottom";

                $this->comments[] = [
                    $type,
                    $comment,
                ];
            });
        }
        return $this->multiLineDelimiter;
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function getNodeInstance(string $value = '', $key = null): NodeInterface
    {
        return new NodeInfoNode($value, $key);
    }


    /**
     * @overrides
     */
    protected function skipLine(string $trimmedLine, string $line)
    {
        if ('' === $trimmedLine) {
            return true;
        }

        if (0 === strpos($trimmedLine, $this->options['commentSymbol'])) {
            $this->comments[] = ['block', $line];
            return true;
        }

        return false;
    }


    /**
     * @overrides
     */
    protected function stripLeadingComment(string $value, string $lineContent)
    {
        if (0 === strpos($value, $this->options['commentSymbol'])) {

            if ('-' === substr($lineContent, 0, 1)) {
                $comment = substr($lineContent, 1);
            } else {
                $p = explode(':', $lineContent);
                $comment = array_pop($p);
            }
            $this->comments[] = ['inline', $comment];
            return '';
        }
        return $value;
    }


    /**
     * @overrides
     */
    protected function onCurrentNodeProcessed(NodeInterface $node)
    {
        $this->onNodeProcessed($node);
    }

    /**
     * @overrides
     */
    protected function onCurrentMultiNodeProcessed(NodeInterface $node)
    {
        $this->onNodeProcessed($node);
    }


    /**
     * Attaches the comments to their node.
     *
     *
     * @param NodeInterface $node
     * @throws BabyYamlException
     */
    protected function onNodeProcessed(NodeInterface $node)
    {
        if ($node instanceof NodeInfoNode) {

            foreach ($this->comments as $comment) {
                $node->addComment($comment[1], $comment[0]);
            }
            $this->comments = []; // don't forget to reset the comments "store" for the next node...

        } else {
            $class = get_class($node);
            throw new BabyYamlException("We only work with NodeInfoNode instances, $class passed.");
        }
    }


}