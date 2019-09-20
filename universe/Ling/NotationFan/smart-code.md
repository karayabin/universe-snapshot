Smart code
============
2019-09-18



Smart code refers to a special notation for writing variables.



Technically, a smart code is an alias for the [BabyYaml](https://github.com/lingtalfi/BabyYaml) inline syntax.



So for instance:



| SmartCode               |   Php value equivalent 
|----------------------- | -------------------
| hello                   |   string hello
| 123                     |   int 123
| 12.3                    |   float 12.3
| null                    |   null
| true                    |   true
| false                   |   false
| [a, b]                  |   array ["a", "b"]
| {a: 123, b: 456 }       |   array ["a" => 123, "b" => 456]
| {a: 123, b: [e, t] }    |   array ["a" => 123, "b" => ["e", "t"]]



Now this syntax is very flexible.
As it turns out, it has been used in various ways, mostly to provide developers with a tool for creating custom notations on the fly.


Some examples include:


- [SmartCodeTool::parse](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md#parse), to parse the smart code as is
- [SmartCodeTool::parseArguments](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md#parsearguments), to parse arguments using the smart code notation
- [SmartCodeTool::replaceSmartCodeFunction](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md#replacesmartcodefunction), to replace smart code recursively in an array using a function-like notation
- [ClassTool::executePhpMethod](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call), a little bit more involved notation to create class instances or call services


