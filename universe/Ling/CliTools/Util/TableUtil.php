<?php


namespace Ling\CliTools\Util;


use Ling\CliTools\Output\OutputInterface;

/**
 * The TableUtil class.
 *
 *
 * Goal: render something like this (found in Symfony Symfony\Component\Console\Helper\Table::render method):
 *
 *
 * Example:
 *
 *
 * ```txt
 *     +---------------+-----------------------+------------------+
 *     | ISBN          | Title                 | Author           |
 *     +---------------+-----------------------+------------------+
 *     | 99921-58-10-7 | Divine Comedy         | Dante Alighieri  |
 *     | 9971-5-0210-0 | A Tale of Two Cities  | Charles Dickens  |
 *     | 960-425-059-0 | The Lord of the Rings | J. R. R. Tolkien |
 *     +---------------+-----------------------+------------------+
 * ```
 *
 *
 */
class TableUtil
{


    /**
     * This property holds the headers for this instance.
     * @var array
     */
    protected $headers;


    /**
     * This property holds the rows for this instance.
     * @var array
     */
    protected $rows;


    /**
     * This property holds the horizontalPadding for this instance.
     * The number of spaces to add to before and after each column (does not apply to the header).
     *
     * @var int = 1
     */
    protected $horizontalPadding;

    /**
     * This property holds the symbols for this instance.
     * It's an array with the following entries:
     *
     *
     * - joint: +   (the symbol used on the corners of the table)
     * - horizontal: -   (the symbol used to create horizontal borders)
     * - vertical: |   (the symbol used to create vertical borders)
     *
     *
     * @var array
     */
    protected $symbols;


    /**
     * This property holds the options for this instance.
     * It's used to customize the look'n'feel of the rendered table.
     * It's an array with the following entries:
     *
     * - use_row_separator: bool=true. If false, no separator line will be rendered between two consecutive rows.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the TableUtil instance.
     */
    public function __construct()
    {
        $this->headers = [];
        $this->rows = [];
        $this->symbols = [
            "joint" => "+",
            "horizontal" => "-",
            "vertical" => "|",
        ];
        $this->options = [];
        $this->horizontalPadding = 1;
    }

    /**
     * Sets the headers.
     *
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Sets the rows.
     *
     * @param array $rows
     */
    public function setRows(array $rows)
    {
        $this->rows = $rows;
    }


    /**
     * Writes a html like table to the given $output.
     *
     * The table will look like this:
     *
     *
     * ```txt
     *     +---------------+-----------------------+------------------+
     *     | ISBN          | Title                 | Author           |
     *     +---------------+-----------------------+------------------+
     *     | 99921-58-10-7 | Divine Comedy         | Dante Alighieri  |
     *     | 9971-5-0210-0 | A Tale of Two Cities  | Charles Dickens  |
     *     | 960-425-059-0 | The Lord of the Rings | J. R. R. Tolkien |
     *     +---------------+-----------------------+------------------+
     * ```
     *
     * @param OutputInterface $output
     */
    public function render(OutputInterface $output)
    {

        //--------------------------------------------
        // GET COLUMNS WIDTHS
        //--------------------------------------------
        $colWidths = $this->getColumnWidths($this->rows, $this->headers);
        array_walk($colWidths, function (&$v) {
            $v = $v + ($this->horizontalPadding * 2);
        });

        //--------------------------------------------
        // RENDER THE TABLE
        //--------------------------------------------
        $j = $this->symbols['joint'];
        $h = $this->symbols['horizontal'];



        // first create the separator
        $sep = '';
        $sep .= $j;
        foreach ($colWidths as $index => $any) {
            $sep .= str_repeat($h, $colWidths[$index]);
            $sep .= $j;
        }
        $sep .= PHP_EOL;

        $use_row_separator = $this->options['use_row_separator'] ?? true;

        // now render the table
        if ($this->headers) {
            $output->write($sep);
            $this->writeRow($output, $this->headers, $colWidths);
        }
        $output->write($sep);


        foreach ($this->rows as $row) {
            $this->writeRow($output, $row, $colWidths);
            if (true === $use_row_separator) {
                $output->write($sep);
            }
        }
        if (false === $use_row_separator) {
            $output->write($sep);
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a table row to the given output.
     * A table row looks like this:
     *
     *      | 9971-5-0210-0 | A Tale of Two Cities  | Charles Dickens  |
     *
     *
     *
     * @param OutputInterface $output
     * @param array $row
     * @param array $columnWidths
     */
    protected function writeRow(OutputInterface $output, array $row, array $columnWidths)
    {
        $v = $this->symbols['vertical'];
        foreach ($row as $index => $content) {
            $width = $columnWidths[$index];
            $output->write($v);
            $output->write(str_repeat(' ', $this->horizontalPadding));
            $output->write($content);
            $output->write(str_repeat(' ', $this->horizontalPadding));

            $drawnLen = mb_strlen($content) + (2 * $this->horizontalPadding);
            $remainingLen = $width - $drawnLen;
            $output->write(str_repeat(" ", $remainingLen));
        }
        $output->write($v . PHP_EOL);
    }

    /**
     * Parses the rows, and returns an array of maxWidths for each column.
     *
     * @param array $headers
     * @param array $rows
     * @return array
     */
    protected function getColumnWidths(array $rows, array $headers)
    {
        $ret = [];
        //--------------------------------------------
        // ROWS
        //--------------------------------------------
        foreach ($rows as $row) {
            foreach ($row as $k => $content) {
                $len = mb_strlen($content);
                if (false === array_key_exists($k, $ret)) {
                    $ret[$k] = $len;
                } elseif ($len > $ret[$k]) {
                    $ret[$k] = $len;
                }
            }
        }


        //--------------------------------------------
        // HEADERS
        //--------------------------------------------
        foreach ($headers as $k => $content) {
            $len = mb_strlen($content);
            if (false === array_key_exists($k, $ret)) {
                $ret[$k] = $len;
            } elseif ($len > $ret[$k]) {
                $ret[$k] = $len;
            }
        }

        return $ret;
    }

}