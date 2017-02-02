<?php



use AdminTable\Listable\QuickPdoListable;
use AdminTable\Table\AdminTable;
use AdminTable\View\AdminTableRenderer;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);
?>
    <link rel="stylesheet" href="/style/admintable.css">
<?php


$fields = '
c.id,
c.equipe_id,
o.nom as equipe_nom,
c.titre,
c.url_photo,
c.url_video,
c.date_debut,
c.date_fin,
c.lots,
c.reglement,
c.description
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$list = AdminTable::create()
    ->setRic(['id'])
    ->setListable(QuickPdoListable::create()->setFields($fields)->setQuery($query))
    ->setRenderer(AdminTableRenderer::create());
$list->displayTable();


