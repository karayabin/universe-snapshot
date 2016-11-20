Strict Mode Paradigm
=================
2015-10-21



This paradigm deals with error handling.
Error handling is perhaps one of the time most consuming problems for developers.

When developing, a question seems to arise again and again: should I return false or throw an exception?


If you are not sure of the answer, then the Strict Mode Paradigm might be for you.
It does not try to answer this question, but rather provides a simple design that deals with this duality. 


The strict mode solution is based on the use a configurable property: strictMode, which can have either value 0 or 1,
0 being the default.

When strictMode is disabled (value is 0), errors that occurs are collected in an array, and the caller of the method
has to retrieve them manually with a getErrors method.
The function that she called should return false to emphasize that something went wrong.

When strictMode is enabled (value is 1), errors are collected too, but if there is at least one error, then the 
called method throws an exception. From the exception, the caller shall be able to access to the errors.
Either they are written in the exception message, and/or they are accessible via a property/method  of the thrown exception.



Recap
---------

- strictMode: 0|1
- 0: in case of error(s), return false, user has to retrieve errors manually
- 1: in case of error(s), throws an exception, errors are bound somehow to the thrown exception

This is a per call error handling strategy.




Productivity tip
-------------------

If you know that you are going to use the strictMode paradigm,
then you can configure your IDE with some snippet.
I use the **strictt** keyword to expand the following snippet:


```php

private $strictMode;
private $errors;

public function __construct()
{
    $this->strictMode = 0;
    $this->errors = [];
}

public function setStrictMode($strictMode)
{
    $this->strictMode = (int)$strictMode;
    return $this;
}

public function doo()
{
    //------------------------------------------------------------------------------/
    // HANDLING STRICT MODE ERRORS
    //------------------------------------------------------------------------------/
    $c = count($this->errors);
    if ($c) {
        if (1 === $this->strictMode) {
            $m = "Oops, the following errors occurred: ";
            $m .= implode(', ', $this->errors);
            throw new \Exception($m);
        }
        return false;
    }
}

public function getErrors()
{
    return $this->errors;
}

//------------------------------------------------------------------------------/
// 
//------------------------------------------------------------------------------/
private function error($m)
{
    $this->errors[] = $m;
}

```

Then of course, take the content of the doo method and put it near the end of 
your main method.