<?php


namespace Ling\Light_Bullsheet\Bullsheeter;


/**
 * The LightBullsheeterInterface interface.
 */
interface LightBullsheeterInterface
{


    /**
     * Populates the database with $nbRows random rows in the appropriate table(s).
     *
     *
     * @param int $nbRows
     * @return void
     * @throws \Exception. When something goes wrong.
     */
    public function generateRows(int $nbRows);

}