<?php


namespace ArrayRefResolver;


/**
 * The ArrayRefResolverInterface interface is the base interface for all tag resolver instances.
 */
interface ArrayRefResolverInterface
{

    /**
     * Walks the given $conf array recursively and replaces the references by their values, directly into the $conf
     * array (in place).
     *
     *
     * Note, the exact definition of a reference is left to the concrete class.
     *
     *
     *
     * @param array $conf
     * @param array $options, defined by the concrete class.
     * @return void
     */
    public function resolve(array &$conf, array $options = []);
}