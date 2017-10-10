<?php


namespace LinearFile\LineSetFinder;


use LinearFile\LineSet\LineSet;
use LinearFile\LineSet\LineSetInterface;
use LinearFile\LineSetFinder\Exception\LineSetFinderException;

/**
 * This lineSetFinder finds line sets which end line might be found INSIDE the line set too, for instance like this:
 *
 * $pou["index"] = [function(){
 *      // so this line also ends with ];, and the next one too
 *      $o = [];
 * ];
 *
 *
 * This lineSetFinder finds the line sets using two elements:
 *
 * - startPattern, which detects the first line of the line set
 * - potentialEndPattern, which detects a potential last line of the line set.
 *
 *
 *
 * The idea of the algorithm is that we detect the very last occurrence of the last line of the last line set
 * by using the potentialEndPattern, that's the only time where we assume that the potentialEndPattern is
 * safe.
 *
 * Then we parse the lines backward (from the last one to the first one) and can guess the line sets with common sense,
 * knowing that a potential end directly following a start is the desired potential end, and all subsequent
 * potential end until the next start are inner occurrences of the potential end pattern.
 *
 */
class BiggestWrapLineSetFinder implements LineSetFinderInterface
{

    private $namePattern;
    private $startPattern;
    private $potentialEndPattern;
    private $prepareNameCallback;

    public static function create()
    {
        return new static();
    }

    /**
     * @return LineSetInterface[]
     */
    public function find(array $lines)
    {
        $startIndexes = [];
        $endIndexes = [];

        $lineNumber = 1; // I like to start with one
        foreach ($lines as $line) {
            if (preg_match($this->startPattern, $line, $match)) {
                $startIndexes[] = $lineNumber;
            }
            if (preg_match($this->potentialEndPattern, $line, $match)) {
                $endIndexes[] = $lineNumber;
            }
            $lineNumber++;
        }

        $slices = $this->findSlices($startIndexes, $endIndexes, $lines);
        $slices = array_reverse($slices);
        $lineSets = $this->createLineSets($slices);
        return $lineSets;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setStartPattern($startPattern)
    {
        $this->startPattern = $startPattern;
        return $this;
    }

    public function setPotentialEndPattern($potentialEndPattern)
    {
        $this->potentialEndPattern = $potentialEndPattern;
        return $this;
    }

    public function setNamePattern($namePattern)
    {
        $this->namePattern = $namePattern;
        return $this;
    }

    public function setPrepareNameCallback(callable $prepareNameCallback)
    {
        $this->prepareNameCallback = $prepareNameCallback;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function findSlices(array $startIndexes, array $endIndexes, array $lines)
    {
        $ret = [];
        if (count($endIndexes) >= count($startIndexes)) {
            $lastFirstLine = null;
            while (null !== ($lastLine = array_pop($endIndexes))) {
                if (null !== $lastFirstLine && $lastLine > $lastFirstLine) {
                    continue;
                }
                $firstLine = array_pop($startIndexes);
                $_lines = array_slice($lines, $firstLine - 1, $lastLine - $firstLine + 1);
                $content = implode("", $_lines);
                $ret[] = [$firstLine, $lastLine, $content];
                $lastFirstLine = $firstLine;
            }
        } else {
            $n = count($endIndexes);
            $n2 = count($startIndexes);
            throw new LineSetFinderException("There must be at least as many end indexes than start indexes ($n end indexes were found, and $n2 start indexes were found)");
        }
        return $ret;
    }

    protected function createLineSets(array $slices)
    {
        $ret = [];
        foreach ($slices as $k => $slice) {
            $name = $this->getName($k, $slice);
            $ret[$name] = LineSet::create()
                ->setName($name)
                ->setStartLine($slice[0])->setEndLine($slice[1])->setContent($slice[2]);
        }
        return $ret;
    }

    protected function getName($index, array $slice)
    {
        if (null !== $this->namePattern) {
            if (preg_match($this->namePattern, $slice[2], $matches)) {
                $name = $matches[1];
                $name = $this->prepareName($name);
                return $name;
            }
        }
        return $index;
    }

    protected function prepareName($name)
    {
        if (is_callable($this->prepareNameCallback)) {
            $name = call_user_func($this->prepareNameCallback, $name);
        }
        return $name;
    }
}