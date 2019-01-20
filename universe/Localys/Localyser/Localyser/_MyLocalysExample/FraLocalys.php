<?php


namespace MyLocalys;


use Bat\DateTool;
use Localys\BaseLocalys;

class FraLocalys extends BaseLocalys
{

    private static $months = [
        1 => 'janvier',
        2 => 'février',
        3 => 'mars',
        4 => 'avril',
        5 => 'mai',
        6 => 'juin',
        7 => 'juillet',
        8 => 'août',
        9 => 'septembre',
        10 => 'octobre',
        11 => 'novembre',
        12 => 'décembre',
    ];


    public function getMonth($n)
    {
        return self::$months[(int)$n];
    }

    /**
     *
     * 1 juillet 2017
     */
    public function getLongDate($timestamp)
    {
        $s = date("d __ Y", $timestamp);
        return str_replace('__', $this->getMonth(date("m", $timestamp)), $s);
    }


    /**
     *
     * 1 juillet 2017 à 12h46
     */
    public function getLongDateWithTime($timestamp)
    {
        return $this->getLongDate($timestamp) . " à " . date("H\hi", $timestamp);
    }

    /**
     *
     * mardi 1 juillet 2017
     */
    public function getLongerDate($timestamp)
    {
        $s = date("d __ Y", $timestamp);
        $dayName = $this->getDayNameLong(date('N', $timestamp));
        return $dayName . " " . str_replace('__', $this->getMonth(date("m", $timestamp)), $s);
    }


    /**
     *
     *      - du 1 juillet 2017 au 6 août 2018
     *      - du 1 juillet au 6 août 2017
     *      - du 1 au 6 juillet 2017
     *      - le 7 juillet 2017
     */
    public function getLongDateRange($timestampStart, $timestampEnd)
    {
        $ds = date("Y-m-d", $timestampStart);
        $de = date("Y-m-d", $timestampEnd);
        $ps = explode('-', $ds);
        $pe = explode('-', $de);
        $yearStart = $ps[0];
        $yearEnd = $pe[0];
        $monthStart = sprintf('%02s', $ps[1]);
        $monthEnd = sprintf('%02s', $pe[1]);
        $dayStart = sprintf('%02s', $ps[2]);
        $dayEnd = sprintf('%02s', $pe[2]);


        $monthStart = $this->getMonth($monthStart);
        $monthEnd = $this->getMonth($monthEnd);


        if ($yearEnd !== $yearStart) {
            return "du $dayStart $monthStart $yearStart au $dayEnd $monthEnd $yearEnd";
        } else {
            if ($monthEnd !== $monthStart) {
                return "du $dayStart $monthStart au $dayEnd $monthEnd $yearEnd";
            } else {
                if ($dayEnd !== $dayStart) {
                    return "du $dayStart au $dayEnd $monthEnd $yearEnd";
                } else {
                    return "le $dayStart $monthEnd $yearEnd";
                }
            }
        }
    }


    /**
     * - ["1 juillet 2017", "6 août 2018"]
     * - ["1 juillet", "6 août 2017"]
     * - ["1", "6 juillet 2017"]
     * - ["7 juillet 2017", null]
     */
    public function getLongDateRangeBits($timestampStart, $timestampEnd)
    {
        $ds = date("Y-m-d", $timestampStart);
        $de = date("Y-m-d", $timestampEnd);
        $ps = explode('-', $ds);
        $pe = explode('-', $de);
        $yearStart = $ps[0];
        $yearEnd = $pe[0];
        $monthStart = sprintf('%02s', $ps[1]);
        $monthEnd = sprintf('%02s', $pe[1]);
        $dayStart = sprintf('%02s', $ps[2]);
        $dayEnd = sprintf('%02s', $pe[2]);


        $monthStart = $this->getMonth($monthStart);
        $monthEnd = $this->getMonth($monthEnd);


        if ($yearEnd !== $yearStart) {
            return ["$dayStart $monthStart $yearStart", "$dayEnd $monthEnd $yearEnd"];
        } else {
            if ($monthEnd !== $monthStart) {
                return ["$dayStart $monthStart", "$dayEnd $monthEnd $yearEnd"];
            } else {
                if ($dayEnd !== $dayStart) {
                    return ["$dayStart", "$dayEnd $monthEnd $yearEnd"];
                } else {
                    return ["$dayStart $monthEnd $yearEnd", null];
                }
            }
        }
    }

    public function getGenderAbbreviation($gender)
    {
        $gender = (string)$gender;
        switch ($gender) {
            case '2':
                return 'Me';
                break;
            default:
                return 'M';
                break;
        }
    }

    public function getDayNameLong($dayNumber)
    {
        $dayNumber = (string)$dayNumber;
        switch ($dayNumber) {
            case '1':
                return 'lundi';
                break;
            case '2':
                return 'mardi';
                break;
            case '3':
                return 'mercredi';
                break;
            case '4':
                return 'jeudi';
                break;
            case '5':
                return 'vendredi';
                break;
            case '6':
                return 'samedi';
                break;
            case '7':
                return 'dimanche';
                break;
        }
    }


    public function getDayNameAbbr($dayNumber)
    {
        $dayNumber = (string)$dayNumber;
        switch ($dayNumber) {
            case '1':
                return 'lun';
                break;
            case '2':
                return 'mar';
                break;
            case '3':
                return 'mer';
                break;
            case '4':
                return 'jeu';
                break;
            case '5':
                return 'ven';
                break;
            case '6':
                return 'sam';
                break;
            case '7':
                return 'dim';
                break;
        }
    }


    public function getTimeElapsedString(string $dateTime, array $options = [])
    {
        $full = $options['full'] ?? true;
        return DateTool::getTimeElapsedString($dateTime, [
            "full" => $full,
            "lang" => "fra",
        ]);
    }

}
