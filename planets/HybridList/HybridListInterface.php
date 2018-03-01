<?php


namespace HybridList;


use HybridList\Exception\HybridListException;
use HybridList\HybridListControl\HybridListControlInterface;
use HybridList\ListShaper\ListShaperInterface;
use HybridList\RequestGenerator\RequestGeneratorInterface;

interface HybridListInterface
{

    /**
     * @return array
     *          - items: array, the rows
     *          - sliceNumber: int|null, the number of the slice representing the items (aka the current page number),
     *                          or null if not used
     *          - sliceLength: int|null, the number of items per slice, or null if not used
     *          - totalNumberOfItems: int, the total number of items
     *          - offset: int|null, the offset of the returned slice's first element (compared to the whole items array),
     *                          or null if not used
     *
     */
    public function execute();


    public function setRequestGenerator(RequestGeneratorInterface $requestGenerator);


    public function addControl($name, HybridListControlInterface $control);

    /**
     * @return HybridListControlInterface|mixed
     * @throws HybridListException
     */
    public function getControl($name, $throwEx = true, $default = null);

    public function removeControl($name);


    /**
     * @return RequestGeneratorInterface
     */
    public function getRequestGenerator();


    public function addListShaper(ListShaperInterface $listShaper);

    /**
     * The entry point of the hybrid list, this is where you inject your $_GET/$_POST/testArray
     * parameters...
     */
    public function setListParameters(array $listParameters);

    public function getListParameters();

}