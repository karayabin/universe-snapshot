<?php


namespace DocTools\Info;


/**
 * The PlanetInfo class.
 * Contains information at the planet level, including the classes it contains, and the dependencies it uses.
 *
 */
class PlanetInfo implements InfoInterface
{


    /**
     * This property holds the dependencies for this instance.
     * It's an array of strings.
     *
     * See more about dependencies in the [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/DependencyTool.md#getdependencylist) documentation.
     *
     * @var array
     */
    protected $dependencies;

    /**
     * This property holds an array of @doc(ClassInfo) instances.
     * @var ClassInfo[]
     */
    protected $classes;

    /**
     * This property holds the name of the planet.
     * @var null
     */
    protected $name;


    /**
     * Builds the PlanetInfo instance.
     */
    public function __construct()
    {
        $this->dependencies = [];
        $this->classes = [];
        $this->name = null;
    }

    /**
     * Returns the array of dependencies to other planets.
     * See more about dependencies in the [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/DependencyTool.md#getdependencylist) documentation.
     *
     * @return array
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }


    /**
     * Sets the dependencies for this instance.
     *
     * @param array $dependencies
     * @return $this
     */
    public function setDependencies(array $dependencies)
    {
        $this->dependencies = $dependencies;
        return $this;
    }

    /**
     * Returns the array of @doc(ClassInfo) instances found in this planet.
     *
     * @return ClassInfo[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    /**
     * Adds a class to this instance.
     *
     * @param ClassInfo $class
     * @return $this
     */
    public function addClass(ClassInfo $class)
    {
        $this->classes[$class->getName()] = $class;
        return $this;
    }


    /**
     * Returns the ClassInfo object named $className (if it has been parsed by this instance),
     * or null otherwise.
     *
     *
     * @param $className
     * @return ClassInfo|null
     */
    public function getClass($className)
    {
        return $this->classes[$className] ?? null;
    }


    /**
     * Returns the name of the planet.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Sets the name of this planet.
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}