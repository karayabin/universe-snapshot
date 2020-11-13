Gorman json decoder
========
2020-05-28 -> 2020-10-02




Working with php and js, a common thing to do is to convert a php array into a js array-object using
php's **json_decode** function.


The **json_decode** function works fine, but does not translate callbacks written as php strings to actual js callbacks.


That's where the Gorman json decoder comes handy.

It basically let you define js callbacks as strings in php land.


There are two workflows.


Beware that this tool uses the js Function object under the hood, which is a sibling of eval.

So make sure to have full control over those callbacks before using the Gorman decoder. 



Main workflow
-----------

```php 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>

<body>


<?php


require_once "init.inc.php"; // just the autoloader for the GormanJsonDecoder


use Ling\GormanJsonDecoder\GormanJsonDecoder;

$arr = GormanJsonDecoder::encode([
    'a' => 123,
    'b' => true,
    'c' => "a string",
    'd' => [
        "fruits" => ['apple', 'banana'],
        "dogs" => 4,
    ],
    'e' => 'function(arg1){
        console.log("I was called with arg: " + arg1);
        return 456;
    }',
    'f' => null,
], ['e']);

?>


<script>

    let arr = <?php echo GormanJsonDecoder::decode($arr); ?>;
    console.log(arr.e("hello"));
    // will output:
    // I was called with arg: hello
    // 456


</script>
</body>
</html>
```


In the example above, we use **GormanJsonDecoder::encode** method to convert a regular php array into a **gorman array**.

Then, we use the **GormanJsonDecoder::decode** method to convert the **gorman array** into js code.

Note, the **GormanJsonDecoder::decode** also accepts a regular php array, 
so that you can only use the **encode** method when the regular php array actually some potential callbacks that you want to convert (if you want).





Older workflow
-----------

```php 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>

<body>


<?php



require_once "init.inc.php"; // just the autoloader for the GormanJsonDecoder


use Ling\GormanJsonDecoder\GormanJsonDecoder;

$arr = GormanJsonDecoder::encodeAsGormanData([
    'a' => 123,
    'b' => true,
    'c' => "a string",
    'd' => [
        "fruits" => ['apple', 'banana'],
        "dogs" => 4,
    ],
    'e' => 'function(arg1){
        console.log("I was called with arg: " + arg1);
        return 456;
    }',
    'f' => null,
], ['e']);


?>


<script>

    let arr = <?php echo $arr->toJsCode(); ?>;
    console.log(arr.e("hello"));
    // will output:
    // I was called with arg: hello
    // 456


</script>
</body>
</html>
 

```

In the example above, we work directly with the **GormanEncodedData** object.

We first create the **GormanEncodedData** instance by calling the **GormanJsonDecoder::encodeAsGormanData** method,
then we use this instance to get the js code directly (using the **toJsCode** method).

This was the older workflow, but I recommend using the main workflow which is more flexible in general.