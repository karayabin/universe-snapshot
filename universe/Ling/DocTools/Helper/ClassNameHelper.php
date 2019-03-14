<?php


namespace Ling\DocTools\Helper;


use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;

/**
 * The ClassNameHelper class.
 * It helps with class names found in the doc comments.
 */
class ClassNameHelper
{


    /**
     * Returns an array of info corresponding to the given $className, or returns false if the url cannot be found.
     *
     * The array structure is:
     *
     * - 0: class short name
     * - 1: class long name
     * - 2: url to the generated documentation
     *
     *
     * This method will first resolve the given class name, which is a class name written in a doc comment file,
     * meaning it can have multiple forms:
     *
     * - a fully qualified class name, starting with a backslash, for instance \Exception, \Ling\Bat\BatException
     * - an explicit class name alias defined in the use statements at the top of the class file
     * - an implicit class name alias using the namespace of the class
     * - an class name alias defined in a parent class (happens when the class uses the "@implementation" or "@overrides" tags).
     *
     * When the class name is resolved, this method then look whether it's in the given $generatedItems2Url array.
     * If it is, it returns the array described above, if not it returns false.
     *
     *
     *
     *
     * @param string $className
     * @param \ReflectionClass $class
     * @param array $generatedItems2Url
     *
     * @param array $includeReferences
     * Array of long class names referenced by the "@implementation" or "@overrides" tags, if used at all.
     *
     * @param string|null $useStatementFound
     * If the method returns false, but a use statement was matching, then this use statement (which is a class long name)
     * will feed the $useStatementFound argument.
     *
     * @return false|array
     */
    public static function getClassNameInfo(string $className, \ReflectionClass $class, array $generatedItems2Url, array $includeReferences, &$useStatementFound = null)
    {

        $longName = false;
        $url = false;


        if (array_key_exists($className, $generatedItems2Url)) {
            $url = $generatedItems2Url[$className];
            $longName = $className;
        } else {

            if (0 === strpos($className, '\\')) {
                // this is already a fully qualified namespace, it should have been resolved by now
                $shorter = ltrim($className, '\\');
                if (array_key_exists($shorter, $generatedItems2Url)) {
                    $url = $generatedItems2Url[$shorter];
                    $longName = $className;
                }
            } else {


                /**
                 * This is a user defined class, using an unqualified class name (aka class short name),
                 * we need to lookup the use statements to get the (fully qualified) class name.
                 */
                $tokens = token_get_all(file_get_contents($class->getFileName()));
                $useStatements = TokenFinderTool::getUseDependencies($tokens);


                $match = false;
                foreach ($useStatements as $statement) {
                    $p = explode('\\', $statement);
                    $unqualifiedName = array_pop($p);
                    if ($className === $unqualifiedName) {
                        $useStatementFound = $statement;
                        if (array_key_exists($statement, $generatedItems2Url)) {
                            $match = true;
                            $url = $generatedItems2Url[$statement];
                            $longName = $className;
                        }
                        break;
                    }
                }

                /**
                 * But sometimes, the unqualified name is not in the use statements, because
                 * the called class is in the same namespace, so if no use statements match,
                 * we then try the namespace.
                 */
                if (false === $match) {
                    $namespace = $class->getNamespaceName();
                    $epuratedClassName = $namespace . "\\" . $className;
                    if (array_key_exists($epuratedClassName, $generatedItems2Url)) {
                        $url = $generatedItems2Url[$epuratedClassName];
                        $longName = $className;
                        $match = true;
                    }
                }


                /**
                 * Maybe the docComment used the "@implementation" or "@overrides" tag,
                 * and so we might not be able to resolve the class name because the definition is in the parent.
                 * Checking for the parents too...
                 */
                if (false === $match) {

                    if ($includeReferences) {
                        foreach ($includeReferences as $includeReference) {

                            try {

                                $refClass = new \ReflectionClass($includeReference);

                                /**
                                 * This is a user defined class, using an unqualified class name (aka class short name),
                                 * we need to lookup the use statements to get the (fully qualified) class name.
                                 */
                                $tokens = token_get_all(file_get_contents($refClass->getFileName()));
                                $useStatements = TokenFinderTool::getUseDependencies($tokens);


                                $match = false;
                                foreach ($useStatements as $statement) {
                                    $p = explode('\\', $statement);
                                    $unqualifiedName = array_pop($p);
                                    if ($className === $unqualifiedName) {
                                        $useStatementFound = $statement;
                                        if (array_key_exists($statement, $generatedItems2Url)) {
                                            $match = true;
                                            $url = $generatedItems2Url[$statement];
                                            $longName = $className;
                                        }
                                        break;
                                    }
                                }

                                /**
                                 * But sometimes, the unqualified name is not in the use statements, because
                                 * the called class is in the same namespace, so if no use statements match,
                                 * we then try the namespace.
                                 */
                                if (false === $match) {
                                    $namespace = $refClass->getNamespaceName();
                                    $epuratedClassName = $namespace . "\\" . $className;
                                    if (array_key_exists($epuratedClassName, $generatedItems2Url)) {
                                        $url = $generatedItems2Url[$epuratedClassName];
                                        $longName = $className;
                                        $match = true;
                                    }
                                }

                            } catch (\ReflectionException $e) {
                                /**
                                 * Nah, we cannot resolve this class...
                                 */
                            }

                        }
                    }

                }

            }
        }


        if (false !== $url) {
            $p = explode('\\', $longName);
            $short = array_pop($p);
            return [
                $short,
                $longName,
                $url,
            ];
        }

        return false;
    }

}