<?php






//------------------------------------------------------------------------------/
// FETCH THE TEMPLATE
//------------------------------------------------------------------------------/
if (isset($_GET['callback'])) {


    // from bat (https://github.com/lingtalfi/Bat/blob/master/FileSystemTool.md)
    function existsUnder($file, $dir)
    {
        if (false !== $rDir = realpath($dir)) {
            if (false !== $rFile = realpath($file)) {
                return ($rDir === substr($rFile, 0, strlen($rDir)));
            }
        }
        return false;
    }
    
    
    $callback = $_GET['callback'];
    

    $tpl = 'default';
    if (isset($_GET['tpl'])) {
        $tpl = $_GET['tpl'];
    }
    $tplDir = __DIR__ . '/../tpl';
    $file = $tplDir . '/' . $tpl . '/skeleton.html';
    $html = '';
    $cssPath = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
    $end = '/server/fetch-template.php';
    $cssPath = str_replace($end, '/tpl/' . $tpl . '/style.css', $cssPath);

    if (true === existsUnder($file, $tplDir)) {
        $html = file_get_contents($file);
    }
    $jsonOut = [
        'htmlContent' => $html,
        'cssUrl' => $cssPath,
    ];

    //------------------------------------------------------------------------------/
    // WRITING THE OUTPUT
    //------------------------------------------------------------------------------/
    echo $callback . ' ('. json_encode($jsonOut) .');';
}