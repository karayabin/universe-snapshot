<?php


namespace BabyYaml\Reader\ParentsAwareMarkupParser\ParentsAwareMarkupParser\Adaptor;


/**
 * ParentsAwareMarkupParserAdaptorInterface
 * @author Lingtalfi
 * 2015-05-21
 *
 */
interface ParentsAwareMarkupParserAdaptorInterface
{


    public function getStartTagValue($identifier, array $parents);

    public function getStopTagValue($identifier, array $parents);
}
