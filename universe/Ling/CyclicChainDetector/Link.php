<?php


namespace Ling\CyclicChainDetector;


/**
 * The Link class.
 * Represents a unidirectional dependency.
 */
class Link
{

    /**
     * The name of the link
     * @var string
     */
    public $name;

    /**
     * The direct dependencies of the link.
     *
     * It's an array of links.
     * @var Link[]
     */
    protected $dependencies;


    /**
     * This source of this link instance.
     * This only applies to dependency links (otherwise it's null).
     *
     *
     * @var Link|null
     */
    protected $source;


    /**
     * Builds the Link instance.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->source = null;
        $this->dependencies = [];
    }


    /**
     * Adds the link as a dependency of the current instance.
     *
     * @param Link $link
     */
    public function addDependency(Link $link)
    {
        $link->source = $this;
        $this->dependencies[] = $link;
    }

    /**
     * Returns the dependencies of this instance.
     *
     * @return Link[]
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * Returns the source of this instance.
     *
     * @return Link|null
     */
    public function getSource(): ?Link
    {
        return $this->source;
    }




    /**
     * Returns whether the current link has a direct dependency to the given name.
     *
     *
     * @param string $name
     * @return bool
     */
    public function hasDependency(string $name): bool
    {
        foreach ($this->dependencies as $dep) {
            if ($name === $dep->name) {
                return true;
            }
        }
        return false;
    }

    /**
     * Returns the link dependency with the given name if it exists, or null otherwise.
     * The search is recursive.
     *
     * Available options are:
     *
     * - last: bool=false. If true, search for the last dependency found instead of the first one.
     *
     *
     * @param string $name
     * @param array $options
     * @return Link|null
     */
    public function getDependencyByName(string $name, array $options = []): ?Link
    {
        $last = $options['last'] ?? false;

        $dependencies = $this->dependencies;

        if (true === $last) {
            $dependencies = array_reverse($dependencies);
        }

        foreach ($dependencies as $dependency) {
            if ($name === $dependency->name) {
                return $dependency;
            }
            $dep = $dependency->getDependencyByName($name, $options);
            if (null !== $dep) {
                return $dep;
            }
        }
        return null;
    }
}