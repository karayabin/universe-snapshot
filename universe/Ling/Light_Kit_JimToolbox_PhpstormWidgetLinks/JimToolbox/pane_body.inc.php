<?php


$layout = $conf['layout'];
$layoutFilename = basename($layout);
$zones = $conf['zones'];
$project = $jetbrainProject;
$controller = $conf['controller'];
$controllerShortName = $conf['controllerShortName'];
$babyPagePath = $conf['babyPagePath'] ?? null;
$babyPageLabel = $conf['babyPageLabel'] ?? null;


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
        <td>Controller</td>
        <td class="toolbox-wordbreak">
            <?php if (null !== $controller): ?>
                <a href="<?php echo htmlspecialchars(getJetbrainUrl($controller, $project)); ?>"><?php echo $controllerShortName; ?></a>
            <?php else: ?>
                NULL
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>Page</td>
        <td class="toolbox-wordbreak">
            <?php if (null !== $babyPagePath): ?>
                <a href="<?php echo htmlspecialchars(getJetbrainUrl($babyPagePath, $project)); ?>"><?php echo $babyPageLabel; ?></a>
            <?php else: ?>
                NULL
            <?php endif; ?>
        </td>
    </tr>

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