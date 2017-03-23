<?php


namespace Packer;


use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
use Packer\Node\Node;
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
    public static function create()
    {
        return new static();
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


        az($this->createDependencyTree($classFiles, $rootDirectory));


        // first round, checking that everybody's here
//        $deps = [];
//        foreach ($classFiles as $file) {
//            $p = explode('/', $file);
//            array_pop($p);
//            $namespace = implode('\\', $p);
//            $className = substr($file, 0, -4); // remove .php extension
//            $deps[$className] = [
//                'namespace' => $namespace,
//                'file' => $rootDirectory . "/" . $file,
//                'points' => 0,
//            ];
//        }
//
//        // second round, assigning points to everybody
//        foreach ($deps as $className => $info) {
//            $required = $this->getRequiredClasses($info['file']);
//            $deps[$className]['points'] += count($required);
//        }


        az("p");
        //--------------------------------------------
        // PACKING
        //--------------------------------------------
        $s = "";
        foreach ($namespace2Files as $namespace => $files) {
            $s .= 'namespace ' . $namespace . ' {' . PHP_EOL;
            foreach ($files as $file) {
                $c = file_get_contents($file);
                $c = preg_replace('!namespace.*!', '', $c);
                $c = trim($c);
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
//            if (!in_array($actor, $treatedNodes)) {
            $nodeChain = [$actor];
            foreach ($deps as $dep) {
                $this->bindNode($dep, $nodeChain, $allDeps, $treatedNodes);
            }
            $nodes[] = $nodeChain;
//            }
        }
        az($nodes);
        /**
         * Third iteration: bind the max level possible to each node
         */
        $node2Level = [];
        $level = 0;
        foreach ($nodes as $node) {
            $this->collectParentLevels($node, $level, $node2Level);
        }

        // apply max on every node
        $node2LevelFlat = [];
        foreach ($node2Level as $className => $levels) {
            $node2LevelFlat[$className] = max($levels);
        }
        arsort($node2LevelFlat);
        a($node2LevelFlat);

    }


    private function collectParentLevels(Node $node, $level, array &$node2Level)
    {
        /**
         * @var Node $node
         */
        $name = $node->getName();
        $node2Level[$name][] = $level;
        $parents = $node->getParents();
        if (is_array($parents)) {
            foreach ($parents as $nod) {
                $this->collectParentLevels($nod, $level + 1, $node2Level);
            }
        }
    }

    private function bindNode($className, array &$nodeChain, array $allDeps, array &$treatedNodes)
    {
        if (array_key_exists($className, $allDeps)) {
            $treatedNodes[] = $className;
            $nodeChain[] = $className;
            $deps = $allDeps[$className];
            foreach ($deps as $dep) {
                $this->bindNode($dep, $nodeChain, $allDeps, $treatedNodes);
            }
        }
        else{
            a("not in chain: $className");
        }
    }


//    private function bindNode($className, Node $node, array $allDeps, array &$treatedNodes)
//    {
//        if (array_key_exists($className, $allDeps)) {
//            $treatedNodes[] = $className;
//            $newNode = new Node($className);
//            $node->bindParent($newNode);
//            $deps = $allDeps[$className];
//            foreach ($deps as $dep) {
//                $this->bindNode($dep, $newNode, $allDeps, $treatedNodes);
//            }
//        }
//    }
}

