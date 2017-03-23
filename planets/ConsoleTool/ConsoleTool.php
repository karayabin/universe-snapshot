<?php


namespace ConsoleTool;


use ConsoleTool\Exception\ConsoleToolException;

class ConsoleTool
{
    private static $stty;


    public static function eraseLine($n = 1)
    {
        if ($n < 1) {
            throw new ConsoleToolException("Cannot erase less than one line");
        }
        for ($i = 0; $i < $n; $i++) {
            echo "\x1B[1A\x1B[2K";
        }
    }


    public static function booleanCapture($default = false, array $bChoices = [])
    {
        $booleanChoices = array_merge([
            'y' => true,
            'yes' => true,
            'n' => false,
            'no' => false,
        ], $bChoices);
        $r = self::capture();
        $r = strtolower(trim($r));
        if (array_key_exists($r, $booleanChoices)) {
            return $booleanChoices[$r];
        }
        return $default;
    }

    public static function capture()
    {
        if (self::hasSttyAvailable()) {

            $inputStream = STDIN;
            $sttyMode = shell_exec('stty -g');
            shell_exec('stty -icanon -echo');
            $value = "";
            while (!feof($inputStream)) {


                $c = fread($inputStream, 1);
                if ("\n" === $c) {
                    break;
                }

                $value .= $c;
                echo $c;

            }

            shell_exec(sprintf('stty %s', $sttyMode));

            if (false === $value) {
                throw new ConsoleToolException('Aborted: fgets failed');
            }

            $value = trim($value);
            echo "" . PHP_EOL;
            return $value;
        } else {
            throw new ConsoleToolException("stty program is not available on this machine");
        }
    }

    private static function hasSttyAvailable()
    {
        if (null !== self::$stty) {
            return self::$stty;
        }
        exec('stty 2>&1', $output, $exitcode);
        return self::$stty = $exitcode === 0;
    }
}