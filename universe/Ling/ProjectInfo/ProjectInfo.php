<?php


namespace Ling\ProjectInfo;


use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\DirScanner;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;

/**
 * The ProjectInfo class.
 */
class ProjectInfo
{


    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;


    /**
     * Builds the ProjectInfo instance.
     * @param string $rootDir
     */
    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }


    /**
     * Returns an array of information about the current project.
     *
     * The information is an array of "file extension" => number of occurrences.
     * The special "(empty)" key contains files without extension (such as LICENCE for instance).
     * There is also a special key: __extra_project_info__, which is an array with the following structure:
     *
     * - empty_extensions: array. The details for files with empty extensions.
     *          It's an array of "file name" => number of occurrences.
     * - dir: string. The root directory.
     * - weight_count: array of extension => total weight in mega bytes.
     *      Note: the extensions are the same as the extensions listed at the root of the info array.
     * - nb_classes: int. The number of php classes found.
     * - nb_php_files: int. The number of php files found.
     * - nb_total_files: int. The total number of files found.
     * - size_total_files_bytes: int. The total weight of all files in bytes
     * - size_total_files_megabytes: int. The total weight of all files in mega bytes.
     *
     * @param array $options
     * An array of options to control the behaviour of the getInfo method.
     * The entries are:
     * - followSymlinks: bool=false. Whether the method should follow symlinks (directories).
     * - hiddenDirs: bool=false. Whether to include the hidden directories (directories which name start with a dot).
     * - hiddenFiles: bool=false. Whether to include the hidden files (files which name starts with a dot).
     *
     *
     *
     * @return array
     */
    public function getInfo(array $options = [])
    {

        $followSymlinks = $options['followSymlinks'] ?? false;
        $hiddenDirs = $options['hiddenDirs'] ?? false;  // .git, .idea, ...
        $hiddenFiles = $options['hiddenFiles'] ?? false; // .DS_Store, .gitignore,


        $info = [];
        $weightCount = [];

        $emptyExtensions = [];
        $allClasses = [];
        $nbTotalFiles = 0;
        $weightTotalFiles = 0;
        $nbPhpFiles = 0;
        DirScanner::create()->setFollowLinks($followSymlinks)->scanDir($this->rootDir, function ($path, $rPath, $level, &$skipDir)
        use (&$info, &$emptyExtensions, &$allClasses, $hiddenDirs, $hiddenFiles, &$nbTotalFiles, &$weightTotalFiles, &$weightCount, &$nbPhpFiles) {


            $fileName = basename($path);
            $isHidden = (0 === strpos($fileName, '.'));


            if (true === $isHidden) {
                if (false === $hiddenDirs && is_dir($path)) {
                    $skipDir = true;
                    return;
                } elseif (false === $hiddenFiles && is_file($path)) {
                    return;
                }
            }


            if (false === is_link($path) && is_file($path)) {


                $fileSize = filesize($path);
                $nbTotalFiles++;
                $weightTotalFiles += $fileSize;


                $originalExtension = FileSystemTool::getFileExtension($fileName);
                $extension = $originalExtension;
                if ('' === $originalExtension) {
                    $extension = '(empty)'; // enhanced for report
                }


                if (false === array_key_exists($extension, $info)) {
                    $info[$extension] = 0;
                }
                $info[$extension]++;


                if (false === array_key_exists($extension, $weightCount)) {
                    $weightCount[$extension] = 0;
                }
                $weightCount[$extension] += $fileSize;


                //--------------------------------------------
                // EMPTY EXTENSIONS DETAILS
                //--------------------------------------------
                if ($originalExtension === '') {
                    if (false === array_key_exists($fileName, $emptyExtensions)) {
                        $emptyExtensions[$fileName] = 0;
                    }
                    $emptyExtensions[$fileName]++;
                }


                if ('php' === $extension) {
                    $nbPhpFiles++;
                    $classNames = TokenFinderTool::getClassNames(token_get_all(file_get_contents($path)));
                    if (count($classNames) > 0) {
                        $allClasses = array_merge($allClasses, $classNames);
                    }
                }
            }
        });


        $allClasses = array_unique($allClasses);
        ksort($info);
        ksort($weightCount);


        array_walk($weightCount, function (&$v) {
            $v = ConvertTool::convertBytes($v, 'm');
        });


        $info['__extra_project_info__'] = [
            'empty_extensions' => $emptyExtensions,
            'dir' => $this->rootDir,
            'weight_count' => $weightCount,
            'nb_classes' => count($allClasses),
            'nb_php_files' => $nbPhpFiles,
            'nb_total_files' => $nbTotalFiles,
            'size_total_files_bytes' => $weightTotalFiles,
            'size_total_files_megabytes' => ConvertTool::convertBytes($weightTotalFiles, 'm'),
        ];
        return $info;

    }


    /**
     * Show a report of the current project.
     *
     * If the showReport method is called from the console, it will print a report formatted for the console,
     * if it's displayed in a web browser, it will display an html report.
     *
     * See the examples for more details.
     *
     *
     * @param array $options
     */
    public function showReport(array $options = [])
    {
        $info = $this->getInfo($options);
        if ('cli' !== PHP_SAPI) {
            $tpl = __DIR__ . "/templates/report-html.php";
        } else {
            $tpl = __DIR__ . "/templates/report-cli.php";
        }
        include $tpl;

    }

}