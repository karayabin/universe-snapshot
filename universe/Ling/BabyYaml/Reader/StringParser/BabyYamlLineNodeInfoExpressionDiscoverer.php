<?php


namespace Ling\BabyYaml\Reader\StringParser;


use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\MappingNodeInfoContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Container\SequenceNodeInfoContainerExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\HybridNodeInfoExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\Miscellaneous\PolyExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscoverer\SimpleQuoteNodeInfoExpressionDiscoverer;
use Ling\BabyYaml\Reader\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModel;


/**
 * BabyYamlLineNodeInfoExpressionDiscoverer
 *
 * A modified version of the BabyYamlLineExpressionDiscoverer, see more details in there.
 *
 * The goal was to get the inline comments, and node info.
 *
 */
class BabyYamlLineNodeInfoExpressionDiscoverer extends PolyExpressionDiscoverer
{

    /**
     * This property holds the hybridDiscoverer for this instance.
     * @var HybridNodeInfoExpressionDiscoverer
     */
    protected $hybridDiscoverer;

    /**
     * This property holds the simpleQuoteDiscoverer for this instance.
     * @var SimpleQuoteNodeInfoExpressionDiscoverer
     */
    protected $simpleQuoteDiscoverer;

    /**
     * This property holds the sequenceDiscoverer for this instance.
     * @var SequenceNodeInfoContainerExpressionDiscoverer
     */
    protected $sequenceDiscoverer;


    /**
     * This property holds the sequenceDiscovererComments for this instance.
     * @var array
     */
    protected $sequenceDiscovererComments;


    /**
     * This property holds the mappingDiscoverer for this instance.
     * @var MappingNodeInfoContainerExpressionDiscoverer
     */
    protected $mappingDiscoverer;


    /**
     * This property holds the mappingDiscovererComments for this instance.
     * @var array
     */
    protected $mappingDiscovererComments;

    /**
     * This property holds the valueType for this instance.
     * @var string
     */
    protected $valueType;


    /**
     * Builds the BabyYamlLineCommentExpressionDiscoverer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->valueType = null;


        $this->hybridDiscoverer = HybridNodeInfoExpressionDiscoverer::create();
        $this->hybridDiscoverer->setOnSuccess(function () {
            $this->valueType = "hybrid";
        });


        $this->simpleQuoteDiscoverer = new SimpleQuoteNodeInfoExpressionDiscoverer();
        $this->simpleQuoteDiscoverer->setOnSuccess(function () {
            $this->valueType = "quote";
        });


        $this->sequenceDiscoverer = new SequenceNodeInfoContainerExpressionDiscoverer();
        $this->sequenceDiscoverer->setOnCommentFound(function ($comment) {
            $this->sequenceDiscovererComments[] = [
                'inline-value',
                $comment,
            ];
        });
        $this->sequenceDiscoverer->setOnSuccess(function () {
            $this->valueType = "sequence";
        });


        $this->mappingDiscoverer = new MappingNodeInfoContainerExpressionDiscoverer();
        $this->mappingDiscoverer->setOnCommentFound(function ($comment) {
            $this->mappingDiscovererComments[] = [
                'inline-value',
                $comment,
            ];
        });
        $this->mappingDiscoverer->setOnSuccess(function () {
            $this->valueType = "mapping";
        });



        $seq = $this->sequenceDiscoverer;
        $map = $this->mappingDiscoverer;


        $disco = [
            new ExpressionDiscovererModel($map),
            new ExpressionDiscovererModel($seq),
            $this->simpleQuoteDiscoverer,
            $this->hybridDiscoverer,
        ];
        $seq->setDiscoverers($disco);
        $map->setDiscoverers($disco);
        $this
            ->setDiscoverers($disco)
            ->setGreedyDiscoverersSymbols([' #']) // there was a bug, no time for that sorry...
            ->setValidatorSymbols([' #']);

        $this->sequenceDiscovererComments = [];
        $this->mappingDiscovererComments = [];

    }


    /**
     * Returns the array of the @page(commentItems) that this discoverer parsed.
     * @return array
     */
    public function getComments(): array
    {
        $commentsOne = $this->hybridDiscoverer->getComments();
        $commentsTwo = $this->simpleQuoteDiscoverer->getComments();


        return array_merge(
            $commentsOne,
            $commentsTwo,
            $this->sequenceDiscovererComments,
            $this->mappingDiscovererComments
        );

    }


    /**
     * Reset the comments.
     */
    public function resetComments()
    {
        $this->hybridDiscoverer->resetComments();
        $this->simpleQuoteDiscoverer->resetComments();
        $this->sequenceDiscovererComments = [];
        $this->mappingDiscovererComments = [];
    }


    /**
     * Returns the value type of the last successfully processed node (or null otherwise), and then empties the value.
     *
     *
     * @return string|null
     */
    public function peakValueType(): ?string
    {
        $s = $this->valueType;
        $this->valueType = null;
        return $s;
    }

}
