<?php


namespace Ling\Light_UserData\VirtualMachine;


use Ling\Light_UserData\Service\LightUserDataService;

/**
 * The LightUserDataVirtualMachineInterface interface.
 * See @page(the virtual machine section of the conception notes) for more details.
 */
interface LightUserDataVirtualMachineInterface
{




//    public function initialize();


//    /**
//     * Resets the virtual machine.
//     *
//     * @param string $virtualContextId
//     */
//    public function reset(string $virtualContextId);
//
//
//    /**
//     * Returns the row stored by the vm (either in inserts or updates) corresponding to the given virtual context id and resource identifier,
//     * or false if the row is not found in the virtual machine.
//     *
//     * @param string $virtualContextId
//     * @param string $resourceIdentifier
//     * @return array|false
//     * @throws \Exception
//     */
//    public function getResourceRowByResourceIdentifier(string $virtualContextId, string $resourceIdentifier);
//
//
//    /**
//     * Returns the original directory for the given virtual context id and user.
//     *
//     * @param string $virtualContextId
//     * @return string
//     */
//    public function getOriginalDirectory(string $virtualContextId): string;
//
//
//    /**
//     *
//     * Adds an insert operation to the virtual machine.
//     *
//     * Available options come from LightUserDataService->save method (see there for more details):
//     *
//     * - overwrite: bool=false
//     * - keep_original: bool=false
//     *
//     *
//     *
//     *
//     * @param string $virtualContextId
//     * @param string $resourceIdentifier
//     *
//     * @param string $data
//     * @param string $path
//     * The relative path, from the user dir, to the resource.
//     *
//     * @param array $insertRow
//     * @param array $tags
//     * @param array $options
//     * @return void
//     * @throws \Exception
//     */
//    public function executeInsert(string $virtualContextId, string $resourceIdentifier, string $path, string $data, array $insertRow, array $tags = [], array $options = []);


}