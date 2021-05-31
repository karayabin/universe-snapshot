<?php


namespace Ling\InvoiceGenerator;

use Ling\Bat\FileSystemTool;
use Ling\InvoiceGenerator\Exception\InvoiceGeneratorException;

/**
 * The InvoiceGenerator class.
 */
class InvoiceGenerator
{


    /**
     * Generates a pdf invoice based on the given parameters.
     *
     * The html parameter will be fed with the html of the invoice.
     *
     * Available options are:
     *
     * - bin: string, path to the binary of the wkhtmltopdf program. Default is /usr/local/bin/wkhtmltopdf
     * - htmlOnly: bool=false, if true will not generate the pdf, only the html part (accessible via the html parameter)
     *
     *
     *
     * @param array $data
     * @param string $templateId
     * @param string $dst
     * @param string|null $html
     * @param array $options
     * @return void
     * @throws \Exception
     */
    public static function generate(array $data, string $templateId, string $dst, string &$html = null, array $options = []): void
    {


        $bin = $options['bin'] ?? "/usr/local/bin/wkhtmltopdf";
        $htmlOnly = $options['htmlOnly'] ?? false;

        if (false === is_file($bin)) {
            self::error("The wkhtmltopdf program was not found on this machine at $bin. Please install it and try again.");
        }


        $templateId = FileSystemTool::removeTraversalDots($templateId);
        $f = __DIR__ . "/templates/$templateId.php";
        if (false === is_file($f)) {
            self::error("Template not found with id $templateId.");
        }

        $html = self::captureTemplateContent($f, $data);


        if (false === $htmlOnly) {

            $temp = FileSystemTool::mkTmpFile($html, null, "html");
            if (false === $temp) {
                self::error("Could not create the temporary file for the template. Aborting.");
            }


            $cmd = "$bin -B 0 -L 0 -R 0 -T 0 $temp $dst 2>&1";
            $resultCode = 0;
            ob_start();
            passthru($cmd, $resultCode);
            $cmdOutput = ob_get_clean();


            if (0 !== $resultCode) {
                self::error("An error occurred when executing the command: $cmd. The output of that command was: $cmdOutput.");
            }
            FileSystemTool::remove($temp);
        }
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Renders the template and returns its output.
     *
     * @param string $__file
     * @param array $data
     * @return string
     */
    private static function captureTemplateContent(string $__file, array $data): string
    {
        ob_start();
        include $__file;
        return ob_get_clean();
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private static function error(string $msg, int $code = null)
    {
        throw new InvoiceGeneratorException(static::class . ": " . $msg, $code);
    }
}