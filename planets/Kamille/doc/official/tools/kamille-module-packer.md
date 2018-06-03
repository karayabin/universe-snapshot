Kamille module packer
===========
2018-03-07





Empaqueter un module
------------------------

L'outil KamilleModulePacker (planets/Kamille/Utils/ModulePacker/KamilleModulePacker.php)
aide le développeur à créer une version distribuable de son module.


L'idée principale est que le développeur développe souvent un module au sein d'une application.

Quand vient le moment d'exporter/partager son module, le développeur doit empaqueter son module
d'une certaine manière.

C'est à ce moment qu'intervient l'outil KamilleModulePacker.
Voici un exemple de code en php qui permet d'empaqueter le module Test en cours de développement
dans l'application:


```php
<?php


use Core\Services\A;
use Kamille\Utils\ModulePacker\KamilleModulePacker;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();

$appDir = A::appDir();

KamilleModulePacker::create()
    ->setApplicationDir($appDir)
    ->pack("Test");



```

Les actions suivantes seront réalisées:

- empaquetage des fichiers de configuration de `config/module/Test.conf.php` vers `class-modules/Test/conf.php`
- empaquetage des fichiers.<br>
Le développeur doit au préalable créer un fichier `_pack.txt` à la racine de son module pour indiquer les entrées à empaqueter.<br>
La syntaxe de ce fichier est expliquée ici: `planets/Kamille/Utils/ModulePacker/README.md`. Un exemple est donné plus bas dans ce document.
- empaquetage des Hooks de `class-core/Services/Hooks.php` vers `class-modules/Test/TestHooks.php`
- empaquetage des Services de `class-core/Services/X.php` vers `class-modules/Test/TestServices.php`
- empaquetage des routes (routsy) de `config/routsy/{fileNames}` vers `class-modules/routsy/{fileNames}`





###### Exemple de fichier _pack.txt


Exemple (`class-modules/Test/_pack.txt`):

```txt
[app]/class-controllers/{ModuleName}
[app]/class-themes/{ModuleName}
[app]/class-themes/{ModuleName}Theme.php
[app]/theme/{ModuleName}
[app]/www/theme/{ModuleName}
```



Trouver les dépendances d'un module
-------------------------

Pour empaqueter un module, il vous faut également connaître les dépendances de celui-ci vers les 
autres modules et/ou planètes qu'il utilise.

L'outil KamilleModulePacker propose un helper pour ce cas:


```php
<?php


use ArrayToString\ArrayToStringTool;
use Core\Services\A;
use Kamille\Utils\ModulePacker\Helper\KamilleModulePackerHelper;


// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();




$dir = "/myphp/leaderfit/leaderfit/class-modules/Ekom";
$deps = KamilleModulePackerHelper::getDependenciesInfoByDir($dir);
echo nl2br(ArrayToStringTool::toPhpArray($deps, null, 4));

```


L'exemple ci-dessus va afficher une sortie semblable à celle-ci:

```txt
[
    'planets' => [
        'ArrayToString',
        'Authenticate',
        'Bat',
        'BeeFramework',
        'Chronos',
        'ConditionResolver',
        'Controller',
        'Core',
        'CrudGeneratorTools',
        'DerbyCache',
        'DirScanner',
        'Dispatcher',
        'Ecp',
        'EkomContextAwareTrait',
        'Ekom',
        'FileDeletor',
        'FormModel',
        'FormTools',
        'Http4All',
        'HybridList',
        'Ingenico',
        'Kamille',
        'ListModifier',
        'ListParams',
        'Logger',
        'Models',
        'Notifier',
        'OnTheFlyForm',
        'OrmTools',
        'PhpBeast',
        'PhpFile',
        'QueryFilterBox',
        'QuickPdo',
        'RowsGenerator',
        'SafeUploader',
        'SaveOrmObject',
        'SaveOrm',
        'SokoForm',
        'StepFormBuilder',
        'ThumbnailTools',
        'Umail',
        'XiaoApi',
    ],
    'modules' => [
        'AutoAdmin',
        'EkomCardCombination',
        'EkomCartTracker',
        'EkomEstimate',
        'EkomEvents',
        'EkomFastSearch',
        'EkomProductCardVideo',
        'EkomTrainingProducts',
        'EkomUserProductHistory',
        'EkomUserTracker',
        'Ekom',
        'FishMailer',
        'NullosAdmin',
        'PeiPei',
        'TeamMail',
        'ThisApp',
    ],
    'themes' => [
        'LeeTheme',
        'Lee',
    ],
]
```



