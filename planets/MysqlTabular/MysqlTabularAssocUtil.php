<?php


namespace MysqlTabular;

/*
 * LingTalfi 2015-10-03
 * 
 * Goal:
 * Generate a table like this:
 * 
+----+--------------+-----------+---------------------+--------+
| id | committer_id | the_name  | publish_date        | active |
+----+--------------+-----------+---------------------+--------+
| 68 |           15 | pou       | 2015-10-02 09:29:02 |      0 |
| 67 |           14 | r         | 2015-10-02 09:22:52 |      0 |
| 66 |           13 | zezer     | 2015-10-02 07:59:16 |      0 |
| 65 |           13 | ze        | 2015-10-02 07:58:21 |      0 |
| 64 |           13 | pjzpeée   | 2015-10-02 07:37:46 |      0 |
| 63 |           13 | pjzper    | 2015-10-02 07:20:16 |      0 |
| 62 |           13 | zer       | 2015-10-02 06:59:53 |      0 |
| 60 |           12 | sdf       | 2015-10-02 06:52:51 |      0 |
| 59 |           11 | Chun li   | 2015-09-30 14:03:27 |      0 |
| 58 |           11 | Boris Pan | 2015-09-30 13:50:51 |      0 |
+----+--------------+-----------+---------------------+--------+
 *
 * I don't know which heuristics is really used by the mysql tool under the hood, 
 * but I will do as if integer types are right-aligned, and text types are left aligned.
 * 
 */
use MysqlTabular\Exception\MysqlTabularAssocUtilException;

class MysqlTabularAssocUtil
{

    private $eol;
    private $padLeft;
    private $padRight;
    private $joinChar;
    private $hChar;
    private $vChar;
    private $spaceChar;

    private $_lengths;
    private $_types;
    private $_sepLine;

    function __construct()
    {
        $this->eol = PHP_EOL;
        $this->padLeft = 1;
        $this->padRight = 1;
        $this->joinChar = '+';
        $this->hChar = '-';
        $this->vChar = '|';
        $this->spaceChar = ' ';
    }


    public function renderRows(array $rows)
    {
        $s = '';
        if ($rows) {
            $this->_lengths = null;
            $this->_types = null;
            $this->analyze($rows);
            $s .= $this->renderHeader();
            foreach ($rows as $row) {
                $s .= $this->renderRow($row);
            }
            $s .= $this->_sepLine;
        }
        else {
            $s = $this->renderEmptySet();
        }
        return $s;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function renderEmptySet()
    {
        return 'Empty set' . $this->eol;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function renderHeader()
    {
        if (null === $this->_lengths || null === $this->_types) {
            throw new MysqlTabularAssocUtilException("Call analyze method first");
        }

        /**
         * We will create and memorize the sepLine from here,
         * it will be used three times total.
         */
        $this->_sepLine = '';
        $tpad = $this->padLeft + $this->padRight;
        $x = '';
        foreach ($this->_lengths as $name => $len) {
            $nameLen = $this->getStringLength($name);
            $maxLen = ($len >= $nameLen) ? $len : $nameLen;


            $this->_sepLine .= $this->joinChar;
            $this->_sepLine .= str_repeat($this->hChar, $maxLen + $tpad);

            $x .= $this->vChar;
            $x .= str_repeat($this->spaceChar, $this->padLeft);
            $x .= $name;
            $n = $maxLen - $nameLen;

            $x .= str_repeat($this->spaceChar, $n);
            $x .= str_repeat($this->spaceChar, $this->padRight);

        }
        $x .= $this->vChar . $this->eol;
        $this->_sepLine .= $this->joinChar . $this->eol;

        
        $s = '' .
            $this->_sepLine .
            $x .
            $this->_sepLine .
            '';

        return $s;
    }

    private function renderRow(array $row)
    {
        if (null === $this->_lengths || null === $this->_types) {
            throw new MysqlTabularAssocUtilException("Call analyze method first");
        }
        $s = '';
        foreach ($row as $k => $v) {
            $align = $this->getAlignment($this->_types[$k]);
            $s .= $this->renderField($v, $this->_lengths[$k], $align);
        }
        $s .= $this->vChar . $this->eol;
        return $s;
    }


    private function getAlignment($type)
    {
        if ('int' === $type) {
            return 'right';
        }
        return 'left';
    }

    private function renderField($string, $maxLen, $align)
    {
        $nameLen = $this->getStringLength($string);


        $s = $this->vChar;
        $s .= str_repeat($this->spaceChar, $this->padLeft);

        $rest = $maxLen - $nameLen;

        if ('left' === $align) {
            $s .= $string;
            $s .= str_repeat($this->spaceChar, $rest);
        }
        else {
            $s .= str_repeat($this->spaceChar, $rest);
            $s .= $string;
        }
        $s .= str_repeat($this->spaceChar, $this->padRight);
        return $s;
    }

    private function analyze(array $rows)
    {
        $this->_lengths = [];
        // str|int, is int only if all values are int   
        $this->_types = [];

        if ($rows) {
            $keys = array_keys($rows[0]);
            $this->_lengths = array_fill_keys($keys, 0);
            $this->_types = array_fill_keys($keys, 'int');
            foreach ($rows as $row) {
                foreach ($row as $k => $v) {
                    $klen = $this->getStringLength($k);
                    $len = $this->getStringLength($v);
                    $maxLen = ($klen >= $len) ? $klen : $len;
                    if ($maxLen > $this->_lengths[$k]) {
                        $this->_lengths[$k] = $maxLen;
                    }
                    if (!is_numeric($v)) {
                        $this->_types[$k] = 'str';
                    }
                }
            }
        }
    }

    private function getStringLength($string)
    {
        return mb_strlen($string);
    }
}
