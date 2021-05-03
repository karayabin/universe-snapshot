Example #1: A simple example
----------------


I use the following code to generate my variables description files.


```php
$pageConfFile = "/komin/jin_site_demo/config/Ling.Light_Kit/pages/Light_Kit_Demo/looplab/looplab_home.byml";
$outputDir = "/tmp/assets";
$o = new VariableDescriptionFileGeneratorUtil();
$o->generate($pageConfFile, $outputDir);
```


