<?php

use DirScanner\YorgDirScannerTool;

require_once "bigbang.php";


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$mailsDir = __DIR__ . "/../mails";


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
$baseUrl = explode('?', $_SERVER['REQUEST_URI'])[0];

$template = null;
if (array_key_exists('template', $_GET)) {
    $template = $_GET['template'];
}

$templates = YorgDirScannerTool::getFilesWithExtension($mailsDir, 'html',false, true, true);
$templates = array_filter($templates, function ($v) {
    if ('.html' === substr($v, -5)) {
        return true;
    }
    return false;
});


ob_start();
?>
    <style type="text/css">
        #template-selector-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 20px;
            background: white;
            border-bottom: 1px solid #ccc;
        }
    </style>
    <div id="template-selector-container">
        <select id="template-selector">
            <?php
            foreach ($templates as $_template):
                $sel = ($_template === $template) ? ' selected="selected"' : '';
                ?>
                <option <?php echo $sel; ?> value="<?php echo $_template; ?>"><?php echo $_template; ?></option><?php
            endforeach;
            ?>
        </select>
    </div>
    <script src="/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#template-selector').on('change', function () {
                window.location.href = "<?php echo $baseUrl; ?>?template=" + $(this).val();
            });
        });
    </script>
<?php
$inject = ob_get_clean();

if (null === $template) {
    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Template selector</title>
    </head>
    <body>
    </body>
    </html>
    <?php
    $template = ob_get_clean();
} else {
    $templateFile = $mailsDir . '/' . $template;
    $template = file_get_contents($templateFile);
}
//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/

$s = preg_replace('!</body>!', $inject . '</body>', $template);
echo $s;