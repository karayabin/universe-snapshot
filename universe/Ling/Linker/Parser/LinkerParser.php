<?php

namespace Ling\Linker\Parser;

/*
 * LingTalfi 2016-03-24
 */
class LinkerParser
{


    public function parse(string $file, array $vars = []): array
    {
        $ret = [];
        $lines = file($file);
        foreach ($lines as $line) {
            $line = str_replace(array_keys($vars), array_values($vars), $line);
            $p = explode('->', $line, 2);
            $ret[] = [trim($p[0]), trim($p[1])];
        }
        return $ret;
    }

}
