<?php


namespace Ling\Deploy\Helper;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;

/**
 * The ScpHelper class.
 */
class ScpHelper
{


    /**
     * Silently transfers the $srcPath on the local machine to $dstPath on the remote machine (identified by $sshConfigId),
     * and returns whether the transfer was successful.
     *
     * @param string $srcPath
     * @param string $dstPath
     * @param string $sshConfigId
     * @return bool
     */
    public static function push(string $srcPath, string $dstPath, string $sshConfigId)
    {
        $dstDir = dirname($dstPath);
        $dstPath = Quoter::scpEscapeSpace($dstPath);

        $sRecursive = "";
        if (is_dir($srcPath)) {
            $sRecursive = "-r";
        }
        $cmd = "ssh $sshConfigId 'mkdir -p \"$dstDir\"' && scp -Cq $sRecursive \"$srcPath\" $sshConfigId:\"$dstPath\"";
        return ConsoleTool::passThru($cmd);
    }


    /**
     * Silently transfers the $srcPath on the remote machine (identified by $sshConfigId) to $dstPath on the local machine,
     * and returns whether the transfer was successful.
     *
     * @param string $srcPath
     * @param string $dstPath
     * @param string $sshConfigId
     * @return bool
     */
    public static function fetch(string $srcPath, string $dstPath, string $sshConfigId)
    {
        $dstDir = dirname($dstPath);
        FileSystemTool::mkdir($dstDir);
        $srcPath = Quoter::scpEscapeSpace($srcPath);
        $cmd = "scp -Cq $sshConfigId:\"$srcPath\" \"$dstPath\"";
        return ConsoleTool::passThru($cmd);
    }
}