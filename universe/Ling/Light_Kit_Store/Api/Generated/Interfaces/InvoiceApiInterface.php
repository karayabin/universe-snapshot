<?php


namespace Ling\Light_Kit_Store\Api\Generated\Interfaces;


/**
 * The InvoiceApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface InvoiceApiInterface
{


    /**
     * Inserts the given invoice in the database.
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
     * @param array $invoice
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertInvoice(array $invoice, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given invoice rows in the database.
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
     * @param array $invoices
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertInvoices(array $invoices, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the invoice row identified by the given id.
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
    public function getInvoiceById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the invoice row identified by the given invoice_number.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $invoice_number
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getInvoiceByInvoiceNumber(string $invoice_number, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the invoice row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getInvoice($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoices($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the invoice rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoicesColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getInvoicesColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the invoice rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getInvoicesKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lks_invoice table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $invoice_number
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getInvoiceIdByInvoiceNumber(string $invoice_number, $default = null, bool $throwNotFoundEx = false);









    /**
     * Returns an array of all invoice ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the invoice row identified by the given id.
     *
     * @param int $id
     * @param array $invoice
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateInvoiceById(int $id, array $invoice, array $extraWhere = [], array $markers = []);


    /**
     * Updates the invoice row identified by the given invoice_number.
     *
     * @param string $invoice_number
     * @param array $invoice
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateInvoiceByInvoiceNumber(string $invoice_number, array $invoice, array $extraWhere = [], array $markers = []);




    /**
     * Updates the invoice row.
     *
     * @param array $invoice
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateInvoice(array $invoice, $where = null, array $markers = []);



    /**
     * Deletes the invoice rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the invoice identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceById(int $id);

    /**
     * Deletes the invoice identified by the given invoice_number.
     *
     * @param string $invoice_number
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceByInvoiceNumber(string $invoice_number);



    /**
     * Deletes the invoice rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceByIds(array $ids);

    /**
     * Deletes the invoice rows identified by the given invoice_numbers.
     *
     * @param array $invoice_numbers
     * @return void
     * @throws \Exception
     */
    public function deleteInvoiceByInvoiceNumbers(array $invoice_numbers);





}
