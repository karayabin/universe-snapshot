<?php

namespace BullSheet\Generator;

/*
 * LingTalfi 2016-02-10
 * This class assumes that you use the ling bullsheets repository.
 * https://github.com/bullsheet/bullsheets-repo/tree/master/bullsheets/ling
 * 
 */

use Bat\FileSystemTool;
use BullSheet\Exception\BullSheetException;
use BullSheet\Util\RelationalUtil;

class LingBullSheetGenerator extends AuthorBullSheetGenerator
{

    private $relationalUtil;

    //------------------------------------------------------------------------------/
    // GOODIES
    //------------------------------------------------------------------------------/
    public function populate($table, $domain, callable $populate)
    {
        $file = $this->selectFile($domain);
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                call_user_func($populate, $line, $this);
            }
        }
    }


    //------------------------------------------------------------------------------/
    // RELATIONAL DATA 
    //------------------------------------------------------------------------------/
    public function getTableKey($table, array $weights = null, $keyName = 'id', $allowAutoIncrementReset = true)
    {
        return $this->getRelationalUtil()->getTableKey($table, $weights, $keyName, $allowAutoIncrementReset);
    }

    //------------------------------------------------------------------------------/
    // COMBINED DATA
    //------------------------------------------------------------------------------/
    public function comment($min = 5,  $max = 10)
    {
        $s = '';
        $n = mt_rand($min, $max);
        for ($i = 0; $i < $n; $i++) {
            if (0 !== $i) {
                $s .= "\n";
            }
            $s .= $this->getPureData('comment') . ".";
        }
        return $s;
    }

    /**
     * lineLength: approximate minimum line length
     */
    public function dummySentence($min = 3,  $max = 5,  $lineLength = 50)
    {
        $s = '';
        $len = 0;
        $n = mt_rand($min, $max);
        for ($i = $n; $i > 0; $i--) {
            $line = $this->getPureData('text/sentence/all') . ".";
            $s .= $line;
            $len += strlen($line);
            if ($i > 1) {
                if ($len >= $lineLength) {
                    $s .= "\n";
                    $len = 0;
                }
                else {
                    $s .= " ";
                }
            }
        }
        return $s;
    }

    public function email($useGenerator = false)
    {
        return $this->pseudo($useGenerator) . '@' . $this->getPureData('free_email_provider_domain');
    }

    public function loremSentence($min = 5,  $max = 10)
    {
        $s = '';
        $n = mt_rand($min, $max);
        for ($i = 0; $i < $n; $i++) {
            if (0 !== $i) {
                $s .= "\n";
            }
            $s .= $this->getPureData('lorem/sentence') . ".";
        }
        return $s;
    }


    public function loremWord($min = 5,  $max = 10)
    {
        $s = '';
        $n = mt_rand($min, $max);
        for ($i = 0; $i < $n; $i++) {
            if (0 !== $i) {
                $s .= ' ';
            }
            $s .= $this->getPureData('lorem/word');
        }
        return $s;
    }



    /**
     * Returns a pseudo, using either a generator (lots of variations),
     * or a pure data stream (1932 variations).
     */
    public function pseudo($useGenerator = true)
    {
        if (true === $useGenerator) {


            /**
             * Rules used to generate the random pseudo
             * -----------------------------------
             *
             * A generated pseudo uses the following components:
             *
             * - first name
             * - last name
             * - pseudo (pure data)
             * - number
             *
             *
             * The 3 first components are called name components, and the last one is the number component.
             * The generated pseudo contains at least one name component, and at most two name components
             * (i.e, you can never have the three types of name components in a generated pseudo).
             * Most likely (990 times out of 1000), two name components will be used (and not just one).
             *
             * The number component is added most of the time (999 times out of 1000).
             *
             * The order in which components are combined is defined randomly, but it cannot start with
             * the number component.
             *
             * There is a separator char between components; it can be either dash, underscore,
             * empty string (it has been chosen so to be compatible with the locale part of an email address).
             * This separator too is chosen randomly.
             *
             * If the number component is used (and it will probably), then the number's length is
             * a random number between 1 and 6, but the highest the number (6 is the highest), the higher probability
             * it has to get picked (i.e., there is more chance that the number has
             * length 6 than 5, 5 than 4, 4 than 3, and so on).
             *
             */

            $s = '';
            $useNumber = (mt_rand(1, 1000) < 1000);
            $useSecondName = (mt_rand(1, 1000) <= 990);
            $p = [
                'f',
                'l',
                'p',
            ];
            $sep = [
                '_',
                '-',
                '',
            ];

            // start by choosing one name component
            $index = mt_rand(0, 2);
            $letter = $p[$index];
            unset($p[$index]);
            $p = array_values($p);
            $s .= $this->getComponentName($letter);


            $c = [];
            $n = 0;
            if (true === $useNumber) {
                $str = '122333444455555666666';
                $length = $str[mt_rand(0, 20)];
                $c[] = $this->numbers($length);
                $n++;
            }

            if (true === $useSecondName) {
                $index = mt_rand(0, 1);
                $c[] = $this->getComponentName($p[$index]);
                $n++;
            }
            if (2 === $n) {
                shuffle($c);
                $se = $sep[mt_rand(0, 2)];
                $s2 = $sep[mt_rand(0, 2)];
                $suffix = $s2 . implode($se, $c);
            }
            elseif (1 === $n) {
                $se = $sep[mt_rand(0, 2)];
                $suffix = $se . current($c);
            }
            else {
                $suffix = '';
            }
            $s .= $suffix;
        }
        else {
            $s = $this->getPureData('pseudo');
        }


        return $s;
    }

 

    //------------------------------------------------------------------------------/
    // GENERATED DATA EXTENSION
    //------------------------------------------------------------------------------/
    public function colorHexa($prefix = '#')
    {
        return $prefix . $this->hexa(6);
    }

    public function colorRgb($useAlpha = false)
    {
        $s = 'rgb(' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', ' . mt_rand(0, 255);
        if (true === $useAlpha) {
            $s .= ', ' . round(mt_rand(0, 100) / 100, 2);
        }
        $s .= ')';
        return $s;
    }

    public function colorWeb()
    {
        if (1 === mt_rand(0, 1)) {
            return $this->colorHexa();
        }
        else {
            return $this->colorRgb((bool)mt_rand(0, 1));
        }
    }

    public function dateMysql($min = '-1 month', $max = '+1 month')
    {
        return $this->dateTimeBetween($min, $max)->format('Y-m-d');
    }

    public function dateTimeMysql($min = '-1 month', $max = '+1 month')
    {
        return $this->dateTimeBetween($min, $max)->format('Y-m-d H:i:s');
    }


    //------------------------------------------------------------------------------/
    // PURE DATA
    //------------------------------------------------------------------------------/
    public function actor()
    {
        return $this->getPureData('actor');
    }

    public function firstName()
    {
        return $this->getPureData('first_name');
    }

    public function lastName()
    {
        return $this->getPureData('last_name');
    }

    public function passwordHuman()
    {
        return $this->getPureData('password/common');
    }

    public function topLevelDomain()
    {
        return $this->getPureData('top_level_domain');
    }
    
    public function websiteDomain()
    {
        return $this->getPureData('website_domain');
    }


    //------------------------------------------------------------------------------/
    // PURE DATA IMAGES
    //------------------------------------------------------------------------------/
    public function imageUrlFromLorem($width = 400,  $height = 200, $category = null)
    {
        if (null === $category) {
            return "http://lorempixel.com/$width/$height";
        }
        return "http://lorempixel.com/$width/$height/$category";
    }

    public function uploadedImage($dstPath, $dstUrl, $domain = 'image')
    {
        return $this->uploadedMedia($dstPath, $dstUrl, $domain, '[image]');
    }


    public function uploadedMedia($dstPath, $dstUrl, $domain = 'image', $tag = '[media]')
    {
        $file = $this->getDir() . '/' . $this->getPureData($domain);
        if (!file_exists($file)) {
            throw new BullSheetException("File not found: $file");
        }

        $baseName = basename($file);
        if (!is_string($dstPath)) {
            $dstPath = call_user_func($dstPath, $baseName);
            if (!is_string($dstPath)) {
                throw new BullSheetException(sprintf("Return value of dstPath() must be of type string, %s returned", gettype($dstPath)));
            }
        }
        $dstPath = str_replace($tag, $baseName, $dstPath);

        if (!is_string($dstUrl)) {
            $dstUrl = call_user_func($dstUrl, $baseName);
            if (!is_string($dstUrl)) {
                throw new BullSheetException(sprintf("Return value of dstUrl() must be of type string, %s returned", gettype($dstUrl)));
            }
        }
        $dstUrl = str_replace($tag, $baseName, $dstUrl);


        $dir = dirname($dstPath);
        if (false === FileSystemTool::mkdir($dir, 0777, true)) {
            throw new BullSheetException("Cannot create dstPath directory: $dir");
        }

        if (false === copy($file, $dstPath)) {
            throw new BullSheetException("Could not copy $file to $dstPath");
        }
        return $dstUrl;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getDir()
    {
        return parent::getDir() . '/ling';
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getComponentName($choice)
    {
        switch ($choice) {
            case 'f':
                return $this->firstName();
                break;
            case 'l':
                return $this->lastName();
                break;
            case 'p':
                return $this->getPureData('pseudo');
                break;
            default:
                throw new BullSheetException("Unknown choice: $choice");
                break;
        }
    }

    private function getRelationalUtil()
    {
        if (null === $this->relationalUtil) {
            $this->relationalUtil = RelationalUtil::create();
        }
        return $this->relationalUtil;
    }
}
