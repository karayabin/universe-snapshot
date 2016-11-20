<?php

namespace VideoSubtitles\Srt;


class SrtToArrayTool
{


    /**
     * @param string $file
     * @param array $options
     *
     *          - startEndUnit: s|ms = s
     *                  the unit of both start and end properties (second or millisecond).
     *
     * @return array
     */
    public static function getArrayByFile(string $file, array $options = []): array
    {
        $unit = $options['startEndUnit']??'s';
        $defaultItem = $options['defaultItem']??[];


        $ret = [];

        $gen = function ($filename) {
            $file = fopen($filename, 'r');
            while (($line = fgets($file)) !== false) {
                yield rtrim($line);
            }
            fclose($file);
        };

        $c = 0;
        $item = $defaultItem;
        $text = '';
        $n = 0;
        foreach ($gen($file) as $line) {

            if ('' !== $line) {
                if (0 === $n) {
                    $item['id'] = $line;
                    $n++;
                }
                elseif (1 === $n) {
                    $p = explode('-->', $line);
                    $start = str_replace(',', '.', trim($p[0]));
                    $end = str_replace(',', '.', trim($p[1]));
                    $startTime = self::toMilliSeconds(str_replace('.', ':', $start));
                    $endTime = self::toMilliSeconds(str_replace('.', ':', $end));
                    $duration = $endTime - $startTime;
                    
                    if('s' === $unit){
                        $startTime /= 1000;
                        $endTime /= 1000;
                    }
                    
                    $item['start'] = $startTime ;
                    $item['end'] = $endTime;
                    $item['startString'] = $start;
                    $item['endString'] = $end;
                    $item['duration'] = $duration;
                    $n++;
                }
                else {
                    if ($n >= 2) {
                        if ('' !== $text) {
                            $text .= PHP_EOL;
                        }
                        $text .= $line;
                    }
                }
            }
            else {
                if (0 !== $n) {
                    $item['text'] = $text;
                    $ret[] = $item;
                    $item = $defaultItem;
                    $text = '';
                    $n = 0;
                }
            }
            $c++;
        }
        return $ret;
    }


    private static function toMilliSeconds(string $duration): int
    {
        $p = explode(':', $duration);
        return (int)$p[0] * 3600000 + (int)$p[1] * 60000 + (int)$p[2] * 1000 + (int)$p[3];
    }


}