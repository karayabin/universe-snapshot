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
     * The options is an extra array that the developer can pass to its bullsheeter instance.
     *
     *
     * @param int $nbRows
     * @param array $options
     * @return void
     * @throws \Exception. When something goes wrong.
     */
    public function generateRows(int $nbRows, array $options = []);

}