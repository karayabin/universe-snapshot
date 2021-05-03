<?php


$layout = $conf['layout'];
$layoutFilename = basename($layout);
$zones = $conf['zones'];
$project = $jetbrainProject;



function getJetbrainUrl(string $path, string $project): string
{
    return "jetbrains://php-storm/navigate/reference?project=$project&path=$path";
}


?>

<div class="alert alert-primary" role="alert">
    Click a link below to open the corresponding file in phpStorm.
</div>


<table class="table table-sm">
    <tr>
        <td>Layout</td>
        <td class="toolbox-wordbreak"><a
                    href="<?php echo htmlspecialchars(getJetbrainUrl($layout, $project)); ?>"><?php echo $layoutFilename; ?></a>
        </td>
    </tr>

    <?php foreach ($zones as $zoneName => $widgets): ?>
        <tr>
            <td><?php echo $zoneName; ?></td>
            <td class="toolbox-wordbreak">
                <?php foreach ($widgets as $widget): ?>
                    <a href="<?php echo htmlspecialchars(getJetbrainUrl($widget['widgetFile'], $project)); ?>"><?php echo $widget['name']; ?></a>
                    <br><br>
                <?php endforeach; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>