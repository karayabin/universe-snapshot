<?php


namespace Ling\LingTalfi\Util;

use Ling\Kwin\Helper\MiniMarkdownToBashtmlTranslator;
use Ling\Kwin\KwinParser;
use Ling\LingTalfi\Exception\LingTalfiException;

/**
 * The KwinToLightCliCommandCodeUtil class.
 */
class KwinToLightCliCommandCodeUtil
{


    /**
     * Prints the php code corresponding to the given kwin string.
     *
     * Available options are:
     * - appId: string, the app id to use with aliases. Actually it's mandatory if an alias is described int the given string.
     * - verbose: bool=false, whether to use a verbose version of the kwin parser.
     *
     *
     *
     * @param string $str
     * @param array $options
     * @throws \Exception
     */
    public function printCodeByKwin(string $str, array $options = [])
    {
        $appId = $options['appId'] ?? null;
        $verbose = $options['verbose'] ?? false;


        $p = new KwinParser();
        $arr = $p->parseString($str, [
            'verbose' => $verbose,
        ]);


        $arr = MiniMarkdownToBashtmlTranslator::convertArray($arr, [
            "fmtText" => '$co',
            "fmtUrl" => '$url',
        ]);


        $commandName = $arr['name'];
        $description = $arr['description'];
        $parameters = $arr['parameters'];
        $options = $arr['options'];
        $flags = $arr['flags'];
        $aliases = $arr['aliases'];


        $s = <<<EEE
    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------    
EEE;;

        //--------------------------------------------
        // DESCRIPTION
        //--------------------------------------------
        $desc = $this->format($description);
        $s .= <<<EEE

    /**
     * @overrides
     */
    public function getDescription(): string
    {
        \$co = LightCliFormatHelper::getConceptFmt();
        \$url = LightCliFormatHelper::getUrlFmt();
        return "$desc";
    }

EEE;

        //--------------------------------------------
        // PARAMETERS
        //--------------------------------------------
        if ($parameters) {


            $s .= <<<EEE

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        \$co = LightCliFormatHelper::getConceptFmt();
        \$url = LightCliFormatHelper::getUrlFmt();
        
        return [        
EEE;

            foreach ($parameters as $k => $info) {

                list($v, $isMandatory) = $info;

                $k = $this->format($k);
                $v = $this->format($v);
                $sMandatory = (true === $isMandatory) ? 'true' : 'false';


                $s .= <<<EEE

            "$k" => [
                "$v",
                $sMandatory,
            ],
EEE;
            }

            $s .= <<<EEE

        ];
    }

EEE;
        }
        //--------------------------------------------
        // OPTIONS
        //--------------------------------------------
        if ($options) {


            $s .= <<<EEE

    /**
     * @overrides
     */
    public function getOptions(): array
    {
        \$co = LightCliFormatHelper::getConceptFmt();
        \$url = LightCliFormatHelper::getUrlFmt();
            
        return [
EEE;

            foreach ($options as $k => $item) {

                $desc = $item['desc'];
                $values = $item['values'];

                $k = $this->format($k);
                $desc = $this->format($desc);


                $s .= <<<EEE

            "$k" => [
                'desc' => "$desc",
                'values' => [
EEE;

                foreach ($values as $vk => $vv) {
                    $vk = $this->format($vk);
                    $vv = $this->format($vv);
                    $s .= <<<EEE

                    '$vk' => "$vv",
EEE;

                }

                $s .= <<<EEE

                ],
            ],
EEE;
            }

            $s .= <<<EEE

        ];
    }

EEE;
        }


        //--------------------------------------------
        // FLAGS
        //--------------------------------------------
        if ($flags) {


            $s .= <<<EEE

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        \$co = LightCliFormatHelper::getConceptFmt();
        \$url = LightCliFormatHelper::getUrlFmt();
        
        return [        
EEE;

            foreach ($flags as $k => $v) {

                $k = $this->format($k);
                $v = $this->format($v);
                $s .= <<<EEE

            "$k" => "$v",
EEE;
            }

            $s .= <<<EEE

        ];
    }

EEE;
        }


        //--------------------------------------------
        // ALIASES
        //--------------------------------------------
        if ($aliases) {


            if (null === $appId) {
                throw new LingTalfiException("You must define appId, otherwise I cannot generate the alias section properly.");
            }

            $s .= <<<EEE

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        \$co = LightCliFormatHelper::getConceptFmt();
        \$url = LightCliFormatHelper::getUrlFmt();
        
        return [        
EEE;

            foreach ($aliases as $alias) {

                $alias = $this->format($alias);
                $s .= <<<EEE

            "$alias" => "$appId $commandName",
EEE;
            }

            $s .= <<<EEE

        ];
    }

EEE;
        }


        echo $s;;


    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Formats the given string.
     *
     * @param string $str
     * @return string
     */
    private function format(string $str): string
    {
        $str = preg_replace('!\n+!', "\n", $str);
        $str = preg_replace('! +!', " ", $str);
        return str_replace('"', '\"', $str);
    }
}