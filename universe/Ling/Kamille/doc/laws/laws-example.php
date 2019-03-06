<?php



use Ling\Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Ling\Kamille\Ling\Z;
use Ling\Kamille\Mvc\Layout\HtmlLayout;
use Ling\Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Ling\Loader\FileLoader;
use Ling\Kamille\Mvc\Position\Position;
use Ling\Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Ling\Kamille\Mvc\Widget\Widget;
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