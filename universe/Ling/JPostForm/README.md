JPostForm
===========
2019-12-10



A js tool to post a request like a form submit.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/JPostForm
```

Or just download it and place it where you want otherwise.



How to use
===========


Given the following code:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="/libs/universe/Ling/JPostForm/post-form.js"></script>


</head>


<?php


require_once __DIR__ . "/init.inc.php"; // just to get the "a" debug function
a($_POST);


$data = [
    "csrf_token" => "abcd",
    "rows" => [
        [
            "user_id" => 1,
            "permission_group_id" => 1,
        ],
        [
            "user_id" => 1,
            "permission_group_id" => 2,
        ],
    ],
    'object' => [
        "apple" => [
            "color" => 'red',
            "age" => '23 days',
            "types" => [
                "golden",
                "opal",
            ],
        ]
    ],
    'the_null' => null,
];

?>
<body>
<button id="testButton">Button</button>
<script>
    $(document).ready(function () {
        $('#testButton').on('click', function () {
            postForm(<?php echo json_encode($data); ?>);
        });
    });
</script>


</body>
</html>
```

If I click the button, I get the following $_POST array:


```text
array(3) {
  ["csrf_token"] => string(4) "abcd"
  ["rows"] => array(2) {
    [0] => array(2) {
      ["user_id"] => string(1) "1"
      ["permission_group_id"] => string(1) "1"
    }
    [1] => array(2) {
      ["user_id"] => string(1) "1"
      ["permission_group_id"] => string(1) "2"
    }
  }
  ["object"] => array(1) {
    ["apple"] => array(3) {
      ["color"] => string(3) "red"
      ["age"] => string(7) "23 days"
      ["types"] => array(2) {
        [0] => string(6) "golden"
        [1] => string(4) "opal"
      }
    }
  }
}


```






History Log
=============

- 1.0.0 -- 2019-12-10

    - initial commit