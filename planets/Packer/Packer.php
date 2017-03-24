<?php


namespace Packer;


use DirScanner\YorgDirScannerTool;
use TokenFun\TokenFinder\Tool\TokenFinderTool;
use TokenFun\Tool\TokenTool;

/**
 * Note: this is a simple naive packer,
 * which isn't very safe in that it doesn't deal with namespace tokens as a packer should.
 *
 * Instead, it uses regexes, and assumes that the files you want to pack have a namespace AT THE TOP of the file.
 * So, for instance if your code has some comments at the top of your file, and that comment contains the word
 * "namespace", then the code of THIS packer might have unexpected consequences.
 *
 * But usually, you don't have that kind of comment, do you?
 *
 *
 */
class Packer
{


    private $droppedNamespaces;


    public function __construct()
    {
        $this->droppedNamespaces = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addDroppedNamespace($namespace)
    {
        $this->droppedNamespaces[] = $namespace;
        return $this;
    }


    /**
     * - rootDirectory: at its root, contains the planets/packages to pack.
     *
     *
     * @return string, the packed output
     */
    public function pack($rootDirectory)
    {
        $files = YorgDirScannerTool::getFilesWithExtension($rootDirectory, 'php', false, true, true);
        $classFiles = array_filter($files, function ($v) use ($rootDirectory) {
            $file = $rootDirectory . "/$v";
            $c = file_get_contents($file);
            $tokens = token_get_all($c);
            foreach ($tokens as $token) {
                if (is_array($token) && $token[0] === T_NAMESPACE) {
                    return true;
                }
            }
            return false;
        });


        $namespace2Files = [];
        foreach ($classFiles as $classFile) {
            $p = explode('/', $classFile);
            array_pop($p);
            $namespace = implode('\\', $p);
            $namespace2Files[$namespace][] = $rootDirectory . "/" . $classFile;
        }


        $tree = $this->createDependencyTree($classFiles, $rootDirectory);


        // define namespaces order
        $namespaces = [];
        foreach ($tree as $info) {
            $files = $info[1];
            $files = array_reverse($files);
            foreach ($files as $file) {
                $p = explode('/', $file);
                array_pop($p);
                $namespace = implode('/', $p);
                $namespaces[$namespace][] = $file;
            }
        }
        foreach ($namespaces as $k => $v) {
            $v = array_unique($v);
            $namespaces[$k] = $v;
        }


        //--------------------------------------------
        // PACKING
        //--------------------------------------------
        $s = "";
        foreach ($namespaces as $namespace => $files) {

            if (in_array($namespace, $this->droppedNamespaces)) {
                continue;
            }

            $namespace = str_replace('/', '\\', $namespace);
            $s .= 'namespace ' . $namespace . ' {' . PHP_EOL;
            $allUseDeps = [];
            foreach ($files as $file) {

                $file = $rootDirectory . "/$file.php";


                /**
                 * get rid of namespaces
                 */
                $c = file_get_contents($file);
                $c = preg_replace('!namespace.*!', '', $c);
                $c = trim($c);


                /**
                 * be sure that two use identical statements
                 * are not written in the same namespace context
                 */
                $tokens = token_get_all($c);
                $useDeps = TokenFinderTool::getUseDependencies($tokens);
                if (count($useDeps) > 0) {
                    $replaced = false; // just for debug purposes
                    foreach ($useDeps as $dep) {
                        if (in_array($dep, $allUseDeps, true)) {
                            $replaced = true;
                            $c = preg_replace('!use\s+' . str_replace('\\','\\\\',$dep) . '\s*;!', '', $c);
                        }
                    }
                    $allUseDeps = array_merge($allUseDeps, $useDeps);
                }


                if ('<?php' === substr($c, 0, 5)) {
                    $c = substr($c, 5);
                }
                if ('?>' === substr($c, -2)) {
                    $c = substr($c, 0, -2);
                }
                $s .= $c;
                $s .= PHP_EOL;
                $s .= PHP_EOL;
            }
            $s .= '}' . PHP_EOL;
            $s .= "// ------------------------------";
            $s .= PHP_EOL;
            $s .= PHP_EOL;
        }
        return $s;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getRequiredClasses($file)
    {

        $tokens = token_get_all(file_get_contents($file));
        $useDeps = TokenFinderTool::getUseDependencies($tokens);
        /**
         * Some parent classes belong to the php space, we don't need those
         */
        $phpSpaceClasses = [
            "\\Exception",
        ];
        $extend = TokenFinderTool::getParentClassName($tokens, true, function ($v) use ($phpSpaceClasses) {
            if (in_array($v, $phpSpaceClasses, true)) {
                return false;
            }
            return $v;
        });

        $interfaces = TokenFinderTool::getInterfaces($tokens, true);


        if (false === $extend) {
            $extend = [];
        } else {
            $extend = [$extend];
        }
        $ret = array_merge($useDeps, $extend, $interfaces);
        $ret = array_unique($ret);
        return $ret;
    }


    private function createDependencyTree($classFiles, $rootDirectory)
    {
        //--------------------------------------------
        // CREATING DEPENDENCY TREE
        //--------------------------------------------
        /**
         * First iteration: define the actors
         */
        $allDeps = [];
        foreach ($classFiles as $classFile) {
            $file = $rootDirectory . "/" . $classFile;
            $className = substr($classFile, 0, -4); // remove .php extension
            $required = $this->getRequiredClasses($file);
            $required = array_map(function ($v) {
                return str_replace('\\', '/', $v);
            }, $required);
            $allDeps[$className] = $required;
        }
        /**
         * Second iteration: bind branches together
         */
        $nodes = [];
        $treatedNodes = [];
        foreach ($allDeps as $actor => $deps) {
            if (!in_array($actor, $treatedNodes)) {
                $nodeChain = [$actor];
                $maxDepth = 0;
                foreach ($deps as $dep) {
                    $this->bindNode($dep, $nodeChain, $allDeps, $treatedNodes, $maxDepth);
                }
                $nodes[] = [$maxDepth, $nodeChain];
            }
        }
        usort($nodes, function ($a, $b) {
            return $a[0] < $b[0];
        });
        return $nodes;
    }


    private function bindNode($className, array &$nodeChain, array $allDeps, array &$treatedNodes, &$maxDepth)
    {
        if (array_key_exists($className, $allDeps)) {
            $treatedNodes[] = $className;
            $nodeChain[] = $className;
            $deps = $allDeps[$className];
            $incremented = false;
            foreach ($deps as $dep) {
                if (false === $incremented) {
                    $maxDepth++;
                    $incremented = true;
                }
                $this->bindNode($dep, $nodeChain, $allDeps, $treatedNodes, $maxDepth);
            }
        }
    }

}

