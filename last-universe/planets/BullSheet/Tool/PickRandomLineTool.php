<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-13
 */
use Bat\LocalHostTool;
use BullSheet\Exception\BullSheetException;

class PickRandomLineTool
{

    
    public static function getRandomLine(string $file): string
    {
        
        /**
         * http://stackoverflow.com/questions/12118995/how-to-echo-random-line-from-text-file
         */
        $handle = @fopen($file, "r");
        if ($handle) {
            $random_line = null;
            $line = null;
            $count = 0;
            while (($theline = fgets($handle)) !== false) {
                $count++;
                // P(1/$count) probability of picking current line as random line
                if (mt_rand() % $count == 0) {
                    $line = $theline;
                }
            }
            if (!feof($handle)) {
                fclose($handle);
                throw new BullSheetException("Error: unexpected fgets() fail");
            }
            else {
                fclose($handle);
            }
            /**
             * remove the line carriage return that sometimes get appended
             */
            $line = trim($line);
        }



        return $line;
    }
    
    
    private function perfTestNotes(){
        /**
         * I did some performances test,
         * php (code above) ~2.32s  to pick 1 line 100 times in a 10 000 lines
         * unix (code below) ~3.37s  to pick 1 line 100 times in a 10 000 lines
         *
         * The test code was:
         *          $start = microtime(true);
         *          for ($i = 0; $i < 100; $i++) {
         *              $line = PickRandomLineTool::getRandomLine($f);
         *              echo '.';
         *              if (0 === $i % 100) {
         *                  echo '<br>';
         *              }
         *          }
         *          $time_elapsed_secs = microtime(true) - $start;
         *          a($time_elapsed_secs);
         *
         *
         */
        if (LocalHostTool::isUnix()) {
            /**
             * Theoretically, I would use unix tools first, because they are generally faster
             *
             * http://stackoverflow.com/questions/2162497/efficiently-counting-the-number-of-lines-of-a-text-file-200mb
             *
             * However, it turns out that from my experience,
             * the unix version is about 3-4 times slower than the php code below.
             */
            $sFile = '"' . str_replace('"', '\"', $file) . '"';
            $out = trim(exec('wc -l ' . $sFile));
            $nbLines = (int)substr($out, 0, strpos($out, ' ')) + 1;

            $randLine = mt_rand(1, $nbLines);
            $line = exec('tail -n+' . $randLine . ' ' . $sFile . ' | head -n1');
        }
    }

}
