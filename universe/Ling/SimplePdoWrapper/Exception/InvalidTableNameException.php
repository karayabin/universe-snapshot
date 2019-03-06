<?php


namespace Ling\SimplePdoWrapper\Exception;


/**
 * The InvalidTableNameException class is thrown when a syntax error occurs with the table name.
 *
 * The table name should be using backticks to escape either the table name and/or the database name.
 *
 *
 * The possible combinations of valid table names look like this:
 *
 * - `my_db`.`my_table`
 * - `my_db`.my_table
 * - my_db.`my_table`
 * - my_db.my_table
 * - `my_table`
 * - my_table
 *
 *
 * Anything not formatted with the above list will result in throwing the **InvalidTableNameException** exception.
 *
 */
class InvalidTableNameException extends SimplePdoWrapperException
{
    
}