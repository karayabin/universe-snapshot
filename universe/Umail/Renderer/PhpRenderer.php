<?php

namespace Umail\Renderer;

class PhpRenderer extends Renderer
{


    public function render(array $vars)
    {
        $tplContent = $this->tplContent;
        if (false !== ($path = $this->tmpFile($tplContent))) {
            /**
             * Convert all variables accessible as objects.
             * (i.e. $v->my_var withing the template)
             *
             */
            $v = json_decode(json_encode($vars), false);
            /**
             * First interpret the template's php if any
             */
            ob_start();
            include $path;
            $tplContent = ob_get_clean();

        }
        /**
         * Remove nested array, since we will do a basic
         * string replacement
         */
        $vars = array_filter($vars, function ($v) {
            if (is_array($v)) {
                return false;
            }
            return true;
        });

        $keys = array_keys($vars);
        if (is_callable($this->varRefWrapper)) {
            $keys = array_map($this->varRefWrapper, $keys);
        }
        $values = array_values($vars);

        return str_replace($keys, $values, $tplContent);
    }


    private function tmpFile($content)
    {
        $tmpfname = tempnam("/tmp/umail", "FOO");
        file_put_contents($tmpfname, $content);
        return $tmpfname;
    }
}