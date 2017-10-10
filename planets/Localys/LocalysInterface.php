<?php


namespace Localys;


/**
 * It's recommended that a Localys object doesn't use a constructor.
 */
interface LocalysInterface
{


    /**
     * @param $n , int, the number of the month (starting at 1)
     * @return string, the name of the month
     */
    public function getMonth($n);

    /**
     *
     * The long date is a human friendly date which contains the following information (although
     * not necessarily in that order):
     *
     * - number of the day of the month (for instance 1)
     * - name of the month
     * - number of the year
     *
     *
     * - possibly some syntactic sugar to accommodate the whole.
     *          For instance in english, you write:
     *              July 1st, 2017
     *              (so the syntactic sugar is the st at the end of 1, and the comma for instance)
     *
     *
     * @param $timestamp
     * @return string, the long date
     */
    public function getLongDate($timestamp);

    /**
     * Like getLongDate, but also adds the name of the day.
     * Example of longer date in french:
     *          mardi 26 septembre 2017
     */
    public function getLongerDate($timestamp);


    /**
     *
     * The long date range is used to announce events.
     * It informs the user of the start date and end date.
     *
     * It typically looks like this, depending on whether or not the start date members (year, month, day)
     * are the same as the end date members:
     *
     *
     * In english (not 100% sure, todo: confirm):
     *      - from 2017 July 1st to 2018 August 6th
     *      - from 2017 July 1st to 2017 August 6th
     *      - from 2017 July 1st to July 6th
     *      - 2017 July 7th
     *
     *
     * In french (100% sure):
     *      - du 1 juillet 2017 au 6 août 2018
     *      - du 1 juillet au 6 août 2017
     *      - du 1 au 6 juillet 2017
     *      - le 7 juillet 2017
     *
     *
     *
     *
     *
     * So, it contains the following info:
     * - start date of the events
     * - end date of the events
     * - human words to make a human readable sentence
     *
     * Note: if you feel that you don't need to repeat the year, or the month if it's the same,
     * it's up to you
     *
     *
     *
     *
     * @param $timestampStart
     * @param $timestampEnd
     * @return string, the long date range sentence
     */
    public function getLongDateRange($timestampStart, $timestampEnd);


    /**
     *
     * Returns the gender abbreviation for a given gender.
     *
     * @param $gender
     *      - 1: male, return Mr in english
     *      - 2: female, returns Mrs in english
     * @return string, the abbreviated version of the given gender
     */
    public function getGenderAbbreviation($gender);



    /**
     * @return string, the long name of the day, all in lowercase, for the given number.
     *          In english:
     *              - 1: monday
     *              - 2: tuesday
     *              - 3: wednesday
     *              - 4: thursday
     *              - 5: friday
     *              - 6: saturday
     *              - 7: sunday
     *
     * Note: dayNumber is based on php date("N") option.
     *
     */
    public function getDayNameLong($dayNumber);


    /**
     * @return string, the abbreviated name of the day (usually 3 letters), all in lowercase, for the given number.
     *          In english:
     *              - 1: mon
     *              - 2: tue
     *              - 3: wed
     *              - 4: thu
     *              - 5: fri
     *              - 6: sat
     *              - 7: sun
     *
     * Note: dayNumber is based on php date("N") option.
     *
     */
    public function getDayNameAbbr($dayNumber);
}