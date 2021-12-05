<?php


$project = $conf['project'];
$url = function (string $path) use ($project): string {
    return "jetbrains://php-storm/navigate/reference?project=$project&path=$path";
}


?>

<div class="alert alert-primary" role="alert">
    Click a link below to open the corresponding file in phpStorm.
</div>


<table class="table table-sm">
    <tr>
        <td>Routes</td>
        <td class="toolbox-wordbreak">
            <a href="<?php echo htmlspecialchars($url($conf['routesPath'])); ?>">Ling.Light_EasyRoute
                master</a>
        </td>
    </tr>
</table>