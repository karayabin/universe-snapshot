<?php

namespace CommandLineOutput\Adaptor;


interface AdaptorInterface
{

    public function getStartTag($name, array $parents = []);

    public function getStopTag($name, array $parents = []);
}
