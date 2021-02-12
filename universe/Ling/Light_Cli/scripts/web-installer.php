<?php


/**
 * 2021-02-12
 * Here we perform the automatic installation, as described in the conception notes:
 * https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md#automatic-installation
 *
 *
 * Note: We recently switched to php8, and light just adapted immediately. So, you need at least php8 too if you want to use light.
 */


//--------------------------------------------
// USEFUL FUNCTIONS
//--------------------------------------------
function msg($msg, $format)
{
    $s = '';
    $s .= "\033[$format" . "m" . $msg . "\033[0m";
    echo $s;
}

function success($msg)
{
    msg($msg, "32");
}

function warning($msg)
{
    msg($msg, "35");
}

function error($msg)
{
    msg($msg . PHP_EOL, "31");
    exit(1);
}

function info($msg)
{
    msg($msg, "30");
}


function br()
{
    echo PHP_EOL;
}


function bold($msg)
{
    return "\033[1m" . $msg . "\033[0m";
}


function pathUrl($msg)
{
    return "\033[34m" . $msg . "\033[0m";
}


function mkdirr(string $dir)
{
    if (file_exists($dir) && is_dir($dir)) {
        return true;
    }
    return mkdir($dir, 0777, true);

}


function download(string $url, string $dst)
{
    return file_put_contents($dst, fopen($url, 'r'));

}

function unzip($zipFile, $targetDir)
{

    if (class_exists("\ZipArchive")) {
        $zip = new \ZipArchive();
        $res = $zip->open($zipFile);
        if ($res === true) {
            // extract it to the path we determined above
            $zip->extractTo($targetDir);
            $zip->close();
            return true;
        }
    } else {
        ob_start();
        passthru('which unzip');
        $unzipPath = trim(ob_get_clean());

        if ("" !== $unzipPath) {
            $cmd = '"' . $unzipPath . '" -qq -o "' . $zipFile . '" -d "' . $targetDir . '"';
            $output = [];
            $returnVar = 0;
            exec($cmd, $output, $returnVar);
            return (0 === $returnVar);
        }

    }
    return false;
}


function execc(string $cmd): bool
{
    $output = [];
    $ret = 0;
    exec($cmd, $output, $ret);
    return (0 === $ret);
}


//--------------------------------------------
// INSTALL PROCEDURE
//--------------------------------------------
$nbSteps = "6";
$cliPath = "/usr/local/share";
$binDir = "/usr/local/bin";

$cliDir = $cliPath . "/universe/Ling/Light_Cli";


info("1/$nbSteps: Creating cliDir in: " . pathUrl($cliDir) . "...");
if (true === mkdirr($cliDir)) {

    success("ok" . PHP_EOL);

    $boilerZipUrl = "https://github.com/lingtalfi/Light_AppBoilerplate/raw/master/assets/light-app-boilerplate.zip";
    $boilerZip = $cliDir . "/light-app-boilerplate.zip";

    info("2/$nbSteps: Downloading boilerplate from: " . pathUrl($boilerZipUrl) . "...");

    if (false !== download($boilerZipUrl, $boilerZip)) {

        success("ok" . PHP_EOL);

        $standaloneDir = $cliDir . "/light-app-standalone";
        info("3/$nbSteps: Unzipping boilerplate to: " . pathUrl($standaloneDir) . "...");
        if (true === unzip($boilerZip, $standaloneDir)) {
            success("ok" . PHP_EOL);


            $cliBinPath = "$cliPath/universe/Ling/Light_Cli/light-app-standalone/universe/Ling/Light_Cli/bin/light-cli";
            $cmd = "chmod u+x \"$cliBinPath\"";
            info("4/$nbSteps: Making the light-cli binary executable...");
            if (true === execc($cmd)) {

                success("ok" . PHP_EOL);


                //--------------------------------------------
                // CREATING ALIASES IF THEY DON'T EXIST
                //--------------------------------------------
                $lightAliasPath = $binDir . "/light";
                info("5/$nbSteps: Creating " . bold("light") . " symlink...");
                if (false === file_exists($lightAliasPath)) {
                    $cmd = "ln -s \"$cliBinPath\" \"$lightAliasPath\"";
                    if (true === execc($cmd)) {
                        success("ok" . PHP_EOL);
                    } else {
                        br();
                        error("Couldn't create light alias to executable. Process aborted (the command used was: $cmd).");
                    }
                } else {
                    warning("already found, skipping." . PHP_EOL);
                }


                $ltAliasPath = $binDir . "/lt";
                info("6/$nbSteps: Creating " . bold("lt") . " symlink...");
                if (false === file_exists($ltAliasPath)) {
                    $cmd = "ln -s \"$cliBinPath\" \"$ltAliasPath\"";
                    if (true === execc($cmd)) {
                        success("ok" . PHP_EOL);
                    } else {
                        br();
                        error("Couldn't create lt alias to executable. Process aborted (the command used was: $cmd).");
                    }
                } else {
                    warning("already found, skipping." . PHP_EOL);
                }


                success("All good. Try typing " . bold("lt"));
                success(" in your terminal." . PHP_EOL);


            } else {
                br();
                error("Couldn't make the binary executable. Process aborted (the command used was: $cmd).");
            }


        } else {
            error("A problem occurred while unzipping. Process aborted.");
        }
    } else {
        br();
        error("Download failed. Process aborted.");
    }
} else {
    br();
    error("Couldn't create the cliDir: $cliDir. Do you have the right permissions?");
}
















































