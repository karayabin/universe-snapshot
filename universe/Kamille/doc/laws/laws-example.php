<?php



use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Ling\Z;
use Kamille\Mvc\Layout\HtmlLayout;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Loader\FileLoader;
use Kamille\Mvc\Position\Position;
use Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Kamille\Mvc\Widget\Widget;
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";




$theme = ApplicationParameters::get('theme');



$wloader = FileLoader::create()->addDir(Z::appDir() . "/theme/$theme/widgets");
$ploader = FileLoader::create()->addDir(Z::appDir() . "/theme/$theme/positions");


$commonRenderer = PhpLayoutRenderer::create();
$proxy = LawsLayoutProxy::create()->bindPosition('top', Position::create()
    ->setTemplate("default")
    ->setLoader($ploader)
    ->setRenderer($commonRenderer)
);
$commonRenderer->setLayoutProxy($proxy);





echo HtmlLayout::create()
    ->setTemplate("my/default")
    ->setLoader(FileLoader::create()
        ->addDir(Z::appDir() . "/theme/$theme/layouts")
    )
    ->setRenderer($commonRenderer)
    ->bindWidget("top.one", Widget::create()
        ->setTemplate("oops/default")
        ->setVariables(['level' => "good"])
        ->setLoader($wloader)
        ->setRenderer($commonRenderer)
    )
    ->bindWidget("top.two", Widget::create()
        ->setTemplate("reoops/default")
        ->setLoader($wloader)
        ->setRenderer($commonRenderer)
    )
    ->render([
        "name" => 'Pierre',
    ]);