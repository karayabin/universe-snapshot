<?php


use BeeFramework\Application\ServiceContainer\ServiceContainer\SoapContainer;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;
use BeeFramework\Notation\Service\Biskotte\ContainerBuilder\BiscotteContainerBuilderTool;
use Soap\Komin\Db\FixtureLoader\SoapFixtureLoader;

require_once 'alveolus/bee/boot/autoload.php';
ButineurAutoloader::getInst()->addLocation(__DIR__ . '/../soap', 'Soap');


// create the container
$rootDir = __DIR__ . '/..';
$services = BabyYamlTool::parseFile($rootDir . '/config/services.yml');
$params = BabyYamlTool::parseFile($rootDir . '/config/params.yml');
$container = BiscotteContainerBuilderTool::getHotServiceContainer($services, $params);
SoapContainer::setContainer($container);


//------------------------------------------------------------------------------/
// 
//------------------------------------------------------------------------------/
a(SoapFixtureLoader::get()->load($rootDir . '/fixtures'));