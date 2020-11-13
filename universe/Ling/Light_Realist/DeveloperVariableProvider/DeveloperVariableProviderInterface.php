<?php


namespace Ling\Light_Realist\DeveloperVariableProvider;


/**
 * The DeveloperVariableProviderInterface interface.
 */
interface DeveloperVariableProviderInterface
{


    /**
     * Returns the developer variables for the given contextId.
     *
     * Note: usually, the contextId can be just the [request id](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-id.md).
     *
     * @param string|null $contextId
     * @return array
     */
    public function getVariables(string $contextId = null): array;
}