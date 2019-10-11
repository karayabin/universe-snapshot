<?php


namespace Ling\Light_UserData\Api;


/**
 * The DirectoryMapApiInterface interface.
 */
interface DirectoryMapApiInterface
{

    /**
     * Returns the directoryMap row identified by the given obfuscated_name.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $obfuscated_name
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getDirectoryMapByObfuscatedName(string $obfuscated_name, $default = null, bool $throwNotFoundEx = false);

    /**
     * Updates the directoryMap row identified by the given obfuscated_name.
     *
     * @param string $obfuscated_name
     * @param array $directoryMap
     * @return void
     * @throws \Exception
     */
    public function updateDirectoryMapByObfuscatedName(string $obfuscated_name, array $directoryMap);

    /**
     * Inserts the given directoryMap in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $directoryMap
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertDirectoryMap(array $directoryMap, bool $ignoreDuplicate = true, bool $returnRic = false);


    /**
     * Deletes the directoryMap identified by the given obfuscated_name.
     *
     * @param string $obfuscated_name
     * @return void
     * @throws \Exception
     */
    public function deleteDirectoryMapByObfuscatedName(string $obfuscated_name);
}
