<?php


namespace Kamille\Utils\Laws;



use Kamille\Utils\Laws\Config\LawsConfig;

interface LawsUtilInterface
{

    /**
     * $config: callable|array
     *          is used to alter the configuration found in the laws configuration file (pointed by the viewId)
     *
     *          If it's an array, it will be merged with the laws config array.
     *          If it's a callable, the laws config array will be passed by reference as the argument of that callable.
     *
     * $options: array,
     *          to alter the behaviour of the method on a per call basis.
     *          Options are defined by the concrete instance.
     *
     *
     */
    public function renderLawsViewById($viewId, LawsConfig $config = null, array $options = []);


    public function renderLawsView(array $config, array $options = []);
}