<?php


namespace DirScanner;


class NestedFileTreeHelper
{


    /**
     * Return a nested structure from a directory.
     * The default nested structure item looks like this:
     * - name: name of the file
     * - path: absolute path to the file,
     *          or relative path if you set the relativePath option to true
     * - children: array of nested structure items, recursively...
     * - keyName: string=name, the key to use to reference the name
     * - keyPath: string=path, the key to use to reference the path
     * - keyChildren: string=children, the key to use to reference the children
     *
     *
     *
     *
     * @param $dir , the base directory to scan
     * @param array $options ,
     *      - followSymlinks: bool=false, whether or not to follow symlinks on dirs
     *      - recursive: bool=true, whether or not to use recursion (if not, only the root level will be scanned)
     *      - relativePath: bool=false, whether the "path" key is set to the absolute or relative path
     *      - ignoreHidden: bool=true, whether or not to ignore the hidden entries.
     *                          An entry is considered hidden when its fileName starts with the dot character.
     *
     * All options starting with an underscore are private, don't use them.
     *
     *
     * @return array
     */
    public static function getNestedFileTree($dir, array $options = [])
    {
        $relativePath = $options['relativePath'] ?? false;
        if (true === $relativePath) {
            $options['_baseDirLen'] = mb_strlen($dir);
        }

        return self::doIterate($dir, $options);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private static function doIterate(string $dir, array $options = [])
    {
        $followSymlinks = $options['followSymlinks'] ?? false;
        $recursive = $options['recursive'] ?? true;
        $relativePath = $options['relativePath'] ?? false;
        $keyName = $options['keyName'] ?? "name";
        $keyPath = $options['keyPath'] ?? "path";
        $keyChildren = $options['keyChildren'] ?? "children";


        $_baseDirLen = $options['_baseDirLen'] ?? null;

        $ignoreHidden = $options['ignoreHidden'] ?? true;
        $ignoreHiddenFiles = true;
        $ignoreHiddenDirs = true;
        if (false === $ignoreHidden) {
            $ignoreHiddenFiles = false;
            $ignoreHiddenDirs = false;
        }


        $ret = [];
        $files = scandir($dir);
        foreach ($files as $file) {
            if ('.' !== $file && ".." !== $file) {

                $absolutePath = $dir . "/$file";
                $isHidden = ("." === substr($file, 0, 1));
                $isDir = is_dir($absolutePath);


                //--------------------------------------------
                // IGNORE HIDDEN
                //--------------------------------------------
                if (true === $isHidden) {
                    if (
                        (true === $ignoreHiddenDirs && true === $isDir) ||
                        (true === $ignoreHiddenFiles && is_file($absolutePath))
                    ) {
                        continue;
                    }
                }


                $children = [];
                if ($isDir && true === $recursive) {
                    $isLink = is_link($absolutePath);
                    if (
                        (true === $isLink && true === $followSymlinks) ||
                        false === $isLink
                    ) {
                        $children = self::doIterate($absolutePath, $options);
                    }
                }


                $path = $absolutePath;
                if (true === $relativePath) {
                    // note to myself, might be buggy, because of utf8-chars variable length?
                    $path = mb_substr($absolutePath, $_baseDirLen);
                }


                $item = [
                    $keyName => $file,
                    $keyPath => $path,
                    $keyChildren => $children,
                ];
                $ret[] = $item;
            }
        }
        return $ret;
    }
}
