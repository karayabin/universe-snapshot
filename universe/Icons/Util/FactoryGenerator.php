<?php


namespace Icons\Util;


class FactoryGenerator
{


    public static function createFactory($className, array $svgFiles, $dstDir)
    {

        //------------------------------------------------------------------------------/
        // COLLECT AND SORT
        //------------------------------------------------------------------------------/
        $items = [];
        foreach ($svgFiles as $svgFile) {
            $content = file_get_contents($svgFile);
            if (preg_match_all('!<g id="([^"]*)">(.*)</g>!Us', $content, $matches)) {
                foreach ($matches[1] as $k => $id) {
                    $items[] = [$id, $matches[2][$k]];
                }
            }
        }
        usort($items, function ($item1, $item2) {
            return $item1[0] > $item2[0];
        });


        //------------------------------------------------------------------------------/
        // WRITE TEMPLATE
        //------------------------------------------------------------------------------/
        $tplFile = __DIR__ . "/tpl/IconsFactory.tpl.php";
        $tplContent = file_get_contents($tplFile);
        $dstFile = $dstDir . "/" . $className . ".php";

        $s = '';
        foreach ($items as $item) {
            $id = $item[0];
            $paths = trim($item[1]);
            $s .= '
                            case "' . $id . '":
                                ?>
                                <g id="' . $id . '">
                                    ' . $paths . '
                                </g>
                                <?php
                                break;';
        }
        $s .= PHP_EOL;

        $newContent = str_replace([
            'IconsFactory',
            '// switch',
        ], [
            $className,
            $s,
        ], $tplContent);

        file_put_contents($dstFile, $newContent);

    }

}
