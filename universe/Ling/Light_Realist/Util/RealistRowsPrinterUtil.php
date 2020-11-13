<?php


namespace Ling\Light_Realist\Util;


use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_Realist\Helper\RequestDeclarationHelper;

/**
 * The RealistRowsPrinterUtil class.
 */
class RealistRowsPrinterUtil
{
    /**
     * This property holds the conf for this instance.
     * @var array
     */
    protected $conf;


    /**
     * Builds the RealistRowsPrinterUtil instance.
     */
    public function __construct()
    {
        $this->conf = null;
    }

    /**
     * Sets the conf.
     *
     * @param array $conf
     */
    public function setConf(array $conf)
    {
        $this->conf = $conf;
    }


    /**
     * Returns an array of rows ready to be printed, based on the given rows and the request declaration.
     *
     * A header will be prefixed to the returned rows.
     *
     *
     *
     * @param array $rows
     * @return array
     */
    public function prepareRows(array $rows): array
    {
        $finalRows = [];
        $headers = RequestDeclarationHelper::getListHeadersByConf($this->conf, [
            'removeNonPrintable' => true,
        ]);
        if (false === $headers) {
            throw new LightRealistException("No headers found in the request declaration, are you
            sure you want to proceed?");
        }

        // adding headers
        array_unshift($finalRows, $headers);
        $cols = array_keys($headers);

        foreach ($rows as $row) {
            $finalRow = [];
            foreach ($cols as $col) {
                if (array_key_exists($col, $row)) {
                    $finalRow[$col] = $row[$col];
                }
            }
            $finalRows[] = $finalRow;
        }

        return $finalRows;
    }
}