<?php


namespace Ling\Light_Kit_Store\Api\Generated\Interfaces;


/**
 * The InvoiceLineApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface InvoiceLineApiInterface
{


    /**
     * Inserts the given invoice line in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your pdo configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $invoiceLine
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertInvoiceLine(array $invoiceLine, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given invoice line rows in the database.
     * By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
     * If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.
     *
     *
     * If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $invoiceLines
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertInvoiceLines(array $invoiceLines, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the rows corresponding to given components.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     *
     * @param array $components
     * @return array
     */
    public function fetchAll(array $components = []): array;


    /**
     *
     * Returns the first row corresponding to given components, or false if there is no match.
     *
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param array $components
     * @return array
     */
    public function fetch(array $components = []);

    /**
     * Returns the invoice line row identified by the given id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getInvoiceLineById(int $id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the invoiceLine row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param $where
     * @param array $markers
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    public function getInvoiceLine($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoiceLines($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the invoiceLine rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoiceLinesColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     * That subset is an array containing the given $columns.
     * The columns parameter can be either an array or a string.
     * If it's an array, the column names will be escaped with back ticks.
     * If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.
     *
     * In both cases, you shall pass the pdo markers when necessary.
     *
     *
     * @param array|string $columns
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoiceLinesColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the invoiceLine rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoiceLinesKey2Value(string $key, string $value, $where, array $markers = []);




    /**
     * Returns the rows of the lks_invoice_line matching the given invoiceId.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param string $invoiceId
     * @param array $components
     * @return array
     */
    public function getInvoiceLinesByInvoiceId(string $invoiceId, array $components = []): array;








    /**
     * Returns an array of all invoiceLine ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the invoice line row identified by the given id.
     *
     * @param int $id
     * @param array $invoiceLine
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateInvoiceLineById(int $id, array $invoiceLine, array $extraWhere = [], array $markers = []);




    /**
     * Updates the invoice line row.
     *
     * @param array $invoiceLine
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateInvoiceLine(array $invoiceLine, $where = null, array $markers = []);



    /**
     * Deletes the invoiceLine rows matching the given where conditions, and returns the number of deleted rows.
     * If where is null, all the rows of the table will be deleted.
     *
     * False might be returned in case of a problem and if you don't catch db exceptions.
     *
     *
     *
     * @param null $where
     * @param array $markers
     * @return false|int
     */
    public function delete($where = null, array $markers = []);

    /**
     * Deletes the invoice line identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceLineById(int $id);



    /**
     * Deletes the invoice line rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceLineByIds(array $ids);





    /**
     * Deletes the invoice line rows having the given invoice id.
     * @param int $invoiceId
     */
    public function deleteInvoiceLineByInvoiceId(int $invoiceId);

}
