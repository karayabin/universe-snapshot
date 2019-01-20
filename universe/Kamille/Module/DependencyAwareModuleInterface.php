<?php


namespace Kamille\Module;


interface DependencyAwareModuleInterface
{


    /**
     * @return array of dependencies, each dependency is a string with the following format:
     *      - <repositoryIdentifier> "." <moduleName>
     *
     */
    public function getDependencies();

}