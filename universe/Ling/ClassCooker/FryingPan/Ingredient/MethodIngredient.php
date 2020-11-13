<?php


namespace Ling\ClassCooker\FryingPan\Ingredient;


use Ling\Bat\CommentTool;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;

/**
 * The MethodIngredient class.
 *
 * This class will add a method to the class we're working on.
 *
 * The method will be added using the same heuristics and options as the @page(ClassCooker->addMethod) method.
 *
 *
 *
 */
class MethodIngredient extends BaseIngredient
{


    /**
     * @implementation
     */
    public function execute()
    {
        list($methodName, $options) = $this->valueInfo;
        $addAsComment = $options['addAsComment'] ?? false;
        $cooker = $this->fryingPan->getCooker();
        $className = $cooker->getClassName();


        $hasMethod = false;
        if (true === $cooker->hasMethod($methodName)) {
            $hasMethod = true;
            if (false === $addAsComment) {
                $this->fryingPan->sendToLog("The method \"$methodName\" is already found in class \"$className\".", 'skip');
            } else {
                $this->fryingPan->sendToLog("The method \"$methodName\" was found in class \"$className\", will try add it as comments.", 'skip');
            }
        }


        if (false === $hasMethod ||
            (true === $hasMethod && true === $addAsComment)
        ) {
            if (array_key_exists('template', $options)) {
                $template = $options['template'];

                $sAsComment = '';
                if (true === $hasMethod) {

                    $file = $this->fryingPan->getFile();
                    $content = file_get_contents($file);

                    if (false !== strpos($content, $template)) {
                        $this->fryingPan->sendToLog("The method \"$methodName\" already exists verbatim.", 'skip');
                        return;
                    }


                    $sAsComment = ' as comment';
                    $template = CommentTool::comment($template) . PHP_EOL; // the php_eol here is crucial

                    /**
                     * assuming if it matches, it means that the commented method was already found in that class
                     */
                    if (false !== strpos($content, $template)) {
                        $this->fryingPan->sendToLog("The method \"$methodName\" already exists as comment.", 'skip');
                        return;
                    }


                }


                $this->fryingPan->sendToLog("Adding method \"$methodName\" to class \"$className\"$sAsComment.", 'add');

                unset($options['template']);
                $options['throwEx'] = false;
                $options['checkDuplicate'] = false;
                $cooker->addMethod($methodName, $template, $options);


            } else {
                $this->fryingPan->sendToLog("template option not found for the MethodIngredient.", 'error');
            }
        }


    }


    /**
     * Returns whether the content of methodA is the same as the content of methodB.
     *
     * This is a line by line comparison of the method contents, and each line is trimmed before comparison.
     * This method returns true only if every line matches.
     *
     *
     * @param $methodA
     * @param $methodB
     * @return bool
     * @throws \Exception
     */
    private static function compareMethodsContent($methodA, $methodB)
    {

        /**
         * Sometimes, a simple strpos failed in my case because the indentation is not exactly the same.
         * If that's the case, you can use this method to try investigate what's wrong,
         * but I recommend fixing why the indentation is not the same in the first place rather than using
         * this cpu consuming method.
         *
         * In my case, I simply forgot to reformat the code after an uncomment manual operation in the ide,
         * and so the indentation was messed up by one space for each line, and I didn't notice at first...
         *
         * So, always reformat your code after uncommenting methods, and you probably won't have to use this method.
         *
         *
         */

        // get method A content
        $phpString = <<<EEE
<?php 

class ABC{
    $methodA
}
EEE;
        $tokens = token_get_all($phpString);
        $methodsInfo = TokenFinderTool::getMethodsInfo($tokens);
        $methodInfo = array_shift($methodsInfo);
        $contentA = $methodInfo['content'];


        // get method B content
        $phpString = <<<EEE
<?php 

class ABC{
    $methodB
}
EEE;
        $tokens = token_get_all($phpString);
        $methodsInfo = TokenFinderTool::getMethodsInfo($tokens);
        $methodInfo = array_shift($methodsInfo);
        $contentB = $methodInfo['content'];


        $linesA = explode(PHP_EOL, $contentA);
        $linesB = explode(PHP_EOL, $contentB);


        if (count($linesA) !== count($linesB)) {
            return false;
        }
        foreach ($linesA as $index => $line) {
            $trimA = trim($line);
            $trimB = trim($linesB[$index]);
            if ($trimA !== $trimB) {
                return false;
            }
        }

        return true;
    }
}