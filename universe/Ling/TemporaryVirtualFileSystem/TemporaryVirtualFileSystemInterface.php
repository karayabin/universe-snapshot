<?php


namespace Ling\TemporaryVirtualFileSystem;


/**
 * The TemporaryVirtualFileSystemInterface interface.
 *
 * See more details in the @page(temporary virtual file system conception notes).
 */
interface TemporaryVirtualFileSystemInterface
{


    /**
     * Returns the root dir path.
     * @return string
     */
    public function getRootDir(): string;


    /**
     * Resets the virtual file system.
     *
     * @param string $contextId
     * @return mixed
     */
    public function reset(string $contextId);


    /**
     * Returns the commit list, which is the minimal list of operations to execute to reproduce the operations stored in the given context of this vfs.
     * See the @page(TemporaryVirtualFileSystem conception notes) for more details.
     *
     * @param string $contextId
     * @return array
     */
    public function commit(string $contextId): array;


    /**
     * Returns the commit list entry attached to the given id in the given context.
     * See the @page(temporary virtual file system conception notes) for more details.
     *
     * Throws an exception if the file doesn't exist or in case of a problem.
     *
     * The options are:
     * - realpath: bool=false. If true, the **realpath** entry is added to the returned array, and contains the
     *          realpath to the file. This only works if the operation type allows it (i.e. not delete).
     *
     *
     *
     *
     * @param string $contextId
     * @param string $id
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function get(string $contextId, string $id, array $options = []): array;


    /**
     * Returns whether the server has an entry identified by the given id and contextId.
     *
     * You can specify in which type to search with the allowedTypes parameter.
     * By default (with allowedTypes=null) it will search in all entry types.
     *
     *
     * @param string $contextId
     * @param string $id
     * @param array|null $allowedTypes
     * @return bool
     */
    public function has(string $contextId, string $id, array $allowedTypes = null): bool;

    /**
     * Adds an "add" operation to the commit list for the file identified by the given parameters,
     * and returns the added entry, which is an array containing at least the following:
     *
     * - id: string, the id to access the uploaded file
     * - meta: array, an array of meta information that the application might provide
     *
     *
     * For more details see the heuristic section of the @page(TemporaryVirtualFileSystem conception notes).
     *
     * The options are:
     * -  move: bool=false. Whether to move or copy the given path to the destination.
     *
     *
     *
     * You can pass some extra options to the concrete class via this options array.
     *
     *
     *
     * @param string $contextId
     * @param string $path
     * @param array $meta
     * @param array $options
     * @return array
     */
    public function add(string $contextId, string $path, array $meta, array $options = []): array;


    /**
     * Adds a "remove" operation to the commit list for the given id and context.
     *
     * For more details see the heuristic section of the @page(TemporaryVirtualFileSystem conception notes).
     *
     * @param string $contextId
     * @param string $id
     */
    public function remove(string $contextId, string $id);

    /**
     * Adds an "update" operation to the commit list for the file identified by the given parameters.
     *
     * For more details see the heuristic section of the @page(TemporaryVirtualFileSystem conception notes).
     *
     * The options are:
     * -  move: bool=false. Whether to move or copy the given path to the destination.
     *
     * You can pass some extra options to the concrete class via this options array.
     *
     * @param string $contextId
     * @param string $id
     * @param string $path
     * @param array $meta
     * @param array $options
     */
    public function update(string $contextId, string $id, string $path, array $meta, array $options = []);


}