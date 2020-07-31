<?php

namespace Ling\BabyYaml\Reader\NodeToArrayConvertor;

use Ling\BabyYaml\Exception\BabyYamlException;
use Ling\BabyYaml\Reader\Node\NodeInfoNode;
use Ling\BabyYaml\Reader\Node\NodeInterface;
use Ling\BabyYaml\Reader\ValueInterpreter\BabyYamlValueNodeInfoInterpreter;
use Ling\BabyYaml\Reader\ValueInterpreter\ValueInterpreterInterface;


/**
 * NodeToArrayNodeInfoConvertor
 *
 */
class NodeToArrayNodeInfoConvertor implements NodeToArrayConvertorInterface
{


    /**
     * The comment map.
     * An array of bdotPath => @page(commentItems) for this instance.
     * See the @page(BabyYamlCommentsReader->commentsMap property) for more details.
     *
     * @var array
     */
    protected $comments;

    /**
     * This property holds the types for this instance.
     *
     * An array of bdotPath => [type, value, nodeValue, keyType]
     *
     * @var array
     */
    protected $types;

    /**
     * This property holds the _previousCurrentPath for this instance.
     * @var string
     */
    private $_previousCurrentPath;


    /**
     * Builds the NodeToArrayCommentsConvertor instance.
     */
    public function __construct()
    {
        $this->comments = [];
        $this->_previousCurrentPath = '';
    }


    /**
     * @implementation
     */
    public function convert(NodeInterface $node, ValueInterpreterInterface $interpreter)
    {
        if ($interpreter instanceof BabyYamlValueNodeInfoInterpreter) {

            $breadcrumbs = [];
            $res = $this->resolveChildren($node->getChildren(), $interpreter, $breadcrumbs);


            $comments = $interpreter->getComments();


            if ($comments) { // don't forget the last comment if any
                $this->comments[$this->_previousCurrentPath] = $comments;

            }
            return $res;
        } else {
            $class = get_class($interpreter);
            throw new BabyYamlException("I only work with BabyYamlValueCommentInterpreter instances, sorry ($class given).");
        }
    }


    /**
     * Returns the commentsMap collected by this instance.
     * @return array
     */
    public function getCommentsMap(): array
    {
        return $this->comments;
    }

    /**
     * Returns the types of this instance.
     *
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function resolveChildren(array $children, BabyYamlValueNodeInfoInterpreter $interpreter, array $breadcrumbs = [])
    {
        $ret = [];
        foreach ($children as $_k => $node) {

            /**
             * @var $node NodeInfoNode
             */

            $k = $node->getKey();
            $commentK = $k;
            if (null === $commentK) {
                $commentK = $_k;
            }
            $commentK = str_replace('.', '\.', $commentK);

            $breadcrumbs[] = $commentK;


            $valueType = null;
            $keyType = 'manual';
            $nodeValue = $node->getValue();

            //--------------------------------------------
            // ADD COMMENTS
            //--------------------------------------------
            $comments = $interpreter->getComments();
            $currentPath = implode('.', $breadcrumbs);
            if ($comments) {
                if (false === array_key_exists($this->_previousCurrentPath, $this->comments)) {
                    $this->comments[$this->_previousCurrentPath] = [];
                }
                $this->comments[$this->_previousCurrentPath] = array_merge_recursive($this->comments[$this->_previousCurrentPath], $comments);
                $interpreter->resetComments();
            }
            if ($node->hasComments()) {
                if (false === array_key_exists($currentPath, $this->comments)) {
                    $this->comments[$currentPath] = [];
                }
                $comments = $node->getComments();
                $this->comments[$currentPath] = array_merge_recursive($this->comments[$currentPath], $comments);

            }


            $this->_previousCurrentPath = $currentPath;


            if (false === $node->isMultiline()) {
                $v = $interpreter->getValue($nodeValue);
                if (0 === count($node->getChildren())) {
                    $valueType = $interpreter->getValueType();
                }
            } else {
                /**
                 * We don't want to interpret a multiline.
                 */
                $v = $nodeValue;
                $valueType = "multi";
            }


            $children2 = $node->getChildren();
            if ($children2) {
                if (null === $k) {
                    $keyType = "auto";
                    $ret[] = $this->resolveChildren($children2, $interpreter, $breadcrumbs);
                } else {
                    $ret[$k] = $this->resolveChildren($children2, $interpreter, $breadcrumbs);
                }

            } else {
                if (null === $k) {
                    $keyType = "auto";
                    $ret[] = $v;
                } else {
                    $ret[$k] = $v;
                }
            }


            if (null !== $valueType) {

                $this->types[$currentPath] = [
                    $valueType,
                    $v,
                    $nodeValue,
                    $keyType,
                ];
            }

            array_pop($breadcrumbs);

        }
        return $ret;
    }
}
