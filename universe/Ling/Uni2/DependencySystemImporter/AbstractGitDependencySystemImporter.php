<?php


namespace Ling\Uni2\DependencySystemImporter;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;

/**
 * The BaseGitDependencySystemImporter class.
 *
 * Will help importing repos from github.com.
 *
 *
 * Note: I wasn't able to redirect the live output of the git command to the $output object.
 * As a consequence, whenever the git command is called, the output of the git command is just spitted out
 * to the console and I loose the pretty indentation formatting.
 *
 * Note2: solutions might exist to solve this problem but they involve os specific packages, so for now they are not
 * my priority.
 *
 *
 *
 * Specific problems
 * --------------
 * By design, git redirects everything to stderr.
 *
 * To capture git multiple lines output:
 * https://askubuntu.com/questions/989015/how-to-get-git-producing-output-to-a-file/989028#989028
 *
 *
 * Posix way of redirecting every output to a file.
 * https://stackoverflow.com/questions/16077918/redirection-in-php-exec-call-creates-empty-file
 *
 *
 *
 * Implementation vision
 * -----------------
 *
 * The git clone command needs an empty directory to work with.
 * Since we want to clone a repository, we need an empty directory.
 *
 * A naive approach would be to remove the item (planet or other) dir first,
 * then clone with the hope that everything goes well.
 *
 * Well if something goes wrong with the clone command, you end up with having removed the item dir of the user!!
 * That's not an option.
 * Furthermore, as with many http based commands, the clone command will fail a lot because of networking/http connection problems.
 *
 * So, a more sophisticated approach (the one used in this class) is to first clone to a temporary directory,
 * and then if the clone operation is successful, then (and only then) replace the planet dir with that temporary directory.
 *
 *
 *
 *

 */
abstract class AbstractGitDependencySystemImporter implements DependencySystemImporterInterface
{



    /**
     * Imports the github.com repo which path is $repoPath to the $destDir directory.
     * Logs the messages to the output.
     *
     * Note: the output of the git command, as for now, is not passed to the output (due to technical
     * difficulties I encountered which I couldn't resolve) but is spitted out directly to the terminal.
     *
     *
     * The repo path is the part of the repository url after the "https://github.com/" string.
     *
     *
     *
     * @param string $repoPath
     * @param string $destDir
     * @param OutputInterface $output
     * @param array $options
     *      - ?indentLevel: int = 0. The base indent level to start with
     * @return bool
     */
    public function doImportPackage(string $repoPath, string $destDir, OutputInterface $output, array $options = []): bool
    {

        $indentLevel = $options['indentLevel'] ?? 0;

        // create clean tmp dir
        $p = explode("/", $repoPath);
        $repoName = array_pop($p);

        $sysDir = sys_get_temp_dir();
        $tmpDir = $sysDir . "/$repoPath";
        if (is_dir($tmpDir)) {
            FileSystemTool::remove($tmpDir);
        }
        FileSystemTool::mkdir($tmpDir);


        $repoUrl = "https://github.com/" . $repoPath . ".git";


        $symbolicCommand = "git clone $repoUrl";
        $cmds = [
            'cd "' . $tmpDir . '"',
            $symbolicCommand,
        ];
        $cmd = implode('; ', $cmds);
        H::command(H::i($indentLevel) . $symbolicCommand . PHP_EOL, $output);

        $returnVar = 0;
        passthru($cmd, $returnVar);


        $ret = false;
        if (0 === $returnVar) {
            try {
                FileSystemTool::remove($destDir);
                FileSystemTool::copyDir($tmpDir . "/$repoName", $destDir);
                $ret = true;
            } catch (\Exception $e) {
                $msg = "Couldn't copy $tmpDir to $destDir";
                H::warning(H::i($indentLevel) . $msg . PHP_EOL, $output);
            }
        }


        FileSystemTool::remove($tmpDir);
        return $ret;
    }
}