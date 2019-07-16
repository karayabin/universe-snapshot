Example #1: a simple use of the ArrayVariableResolver util
-----------------


The following code:

```php
$array = [
    "zones" => [
        "widgetOne" => [
            "vars" => [
                "userName" => 'Hello ${userName}',
            ],
        ]
    ],
    "value" => 777,
    "world" => [
        "countries" => '${countries}',
    ],
    "classifier" => '${classifier}',
    "userTastes" => [
        'likePizzas' => '${likePizzas}',
        'knowledgeLevel' => '${knowledgeLevel}',
        'favoriteNumber' => '${favoriteNumber}',
    ],
];

$variables = [
    'userName' => 'John',
    'countries' => [
        'france',
        'germany',
        'spain',
    ],
    'classifier' => new \stdClass(),
    'likePizzas' => true,
    'knowledgeLevel' => null,
    'favoriteNumber' => 7,

];
$util = new ArrayVariableResolverUtil();
$util->resolve($array, $variables);
a($array);
```

Will have the following output:

```html
array(5) {
  ["zones"] => array(1) {
    ["widgetOne"] => array(1) {
      ["vars"] => array(1) {
        ["userName"] => string(10) "Hello John"
      }
    }
  }
  ["value"] => int(777)
  ["world"] => array(1) {
    ["countries"] => array(3) {
      [0] => string(6) "france"
      [1] => string(7) "germany"
      [2] => string(5) "spain"
    }
  }
  ["classifier"] => object(stdClass)#4 (0) {
  }
  ["userTastes"] => array(3) {
    ["likePizzas"] => bool(true)
    ["knowledgeLevel"] => NULL
    ["favoriteNumber"] => int(7)
  }
}


```

