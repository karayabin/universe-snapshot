<?php


function displayWidgets(array $widgets)
{
    foreach ($widgets as $widget):
        $type = $widget['type'];
        ?>
        <?php if ("table" === $type): ?>
        <h3
            <?php if (true === $widget['acceptWarning'] && $widget["nbItems"] > 0): ?>
                class="warning"
            <?php endif; ?>
                id="<?php echo $widget["id"]; ?>"><?php echo $widget["title"]; ?></h3>
        <?php if ($widget["nbItems"] > 0): ?>
            <?php echo $widget["table"]; ?>
        <?php else: ?>
            <p>
                No data
            </p>
        <?php endif; ?>
    <?php endif; ?>
    <?php endforeach;

}


function displayMenuSection($title, array $menuItems)
{
    ?>

    <h3 class="nav-section-title"><?php echo $title; ?></h3>
    <?php foreach ($menuItems as $id => [$title, $count, $acceptWarning]): ?>

    <a
        <?php if (true === $acceptWarning && $count > 0): ?>
            class="warning"
        <?php endif; ?>
            href="#<?php echo $id; ?>"><?php echo $title; ?> (<?php echo $count; ?>)</a>
<?php endforeach; ?>

    <?php
}


$headerColor = (true === $z['hasErrors']) ? '#9f463d' : '#3d9f4c';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocTools - Report</title>
    <!--    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->
    <!--    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Source+Sans+Pro" rel="stylesheet">-->
    <!--    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates|Source+Sans+Pro" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:700|Source+Sans+Pro" rel="stylesheet">

    <style type="text/css">


        html {
            box-sizing: border-box;

        }

        *, *:before, *:after {
            box-sizing: inherit;
        }


        body {
            min-height: 100vh;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;


        }


        h1, h2, h3, h4, h5, h6 {
            /*font-family: 'Montserrat Alternates', sans-serif;*/
            font-family: 'Lato', sans-serif;
        }

        header {
            /*background: #1a88bc;*/
            /*background: #2866a4;*/
            background: <?php echo $headerColor; ?>;
            color: white;
            padding: 0 10px;
            height: 7vh;
        }

        main {
            display: flex;
            flex: 1 1 auto;
            background: #041d44;
            color: white;
        }

        nav {
            width: 18em;
            order: -1;
            background: #1d3a6c;
            color: white;
            padding: 0px;
            display: flex;
            flex-direction: column;
            line-height: 1.8em;
        }

        nav a {
            color: white;
            padding-left: 20px;
        }

        nav a.warning {
            color: #ff5a00;
        }

        nav .nav-section-title {
            background: #062a5a;
            padding-left: 10px;
        }


        .content {
            flex: 1;
            padding: 0 200px;
            height: 90vh;
            overflow-y: auto;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .content p {
            line-height: 1.75em;
        }

        .content .warning {
            color: #ff5a00;
        }

        footer {
            /*background: #35604e;*/
            /*background: #3d0044;*/
            background: #001c3c;
            color: white;
            padding: 9px;
            font-size: 0.8rem;
            text-align: right;
            height: 3vh;
        }

        footer a {
            color: white;
        }


        /*------------------------------------
        - WIDGETS
        ------------------------------------*/
        table {
            width: 100%;
            text-align: left;
            margin-bottom: 50px;
            color: #333;
        }

        table tr td,
        table tr th {
            padding: 4px;
        }

        table thead tr {
            background: #004e9b;
            color: white;
        }

        table tbody tr:nth-child(odd) {
            background: #eee;
        }

        table tbody tr:nth-child(even) {
            background: #ccc;
        }


    </style>

</head>

<body>

<header>
    <h1>DocTools - Report</h1>
</header>


<main class="wrapper">
    <section class="content">

        <!-- TODO TEXTS -->
        <?php displayWidgets($z['todoTextsWidgets']); ?>

        <!-- MISSING COMMENTS -->
        <?php displayWidgets($z['missingCommentsWidgets']); ?>

        <!-- MISSING TAGS -->
        <?php displayWidgets($z['missingTagsWidgets']); ?>

        <!-- EMPTY MAIN TEXT -->
        <?php displayWidgets($z['emptyMainTextWidgets']); ?>


        <!-- LINKAGE -->
        <?php displayWidgets($z['linkageWidgets']); ?>

        <!-- INLINE LEVEL -->
        <?php displayWidgets($z['inlineWidgets']); ?>


        <!-- BLOCK LEVEL -->
        <?php displayWidgets($z['blockWidgets']); ?>


    </section>

    <nav id="navigation">


        <?php displayMenuSection("Todo texts", $z['todoTextsMenuItems']); ?>
        <?php displayMenuSection("Missing comments", $z['missingCommentsMenuItems']); ?>
        <?php displayMenuSection("Missing tags", $z['missingTagsMenuItems']); ?>
        <?php displayMenuSection("Empty main text", $z['emptyMainTextMenuItems']); ?>
        <?php displayMenuSection("Linkage", $z['linkageMenuItems']); ?>
        <?php displayMenuSection("Inline functions", $z['inlineMenuItems']); ?>
        <?php displayMenuSection("Block-level tags", $z['blockMenuItems']); ?>

    </nav>
</main>

<footer><a target="_blank" href="https://github.com/karayabin/universe-snapshot">Universe</a> > <a target="_blank"
                                                                                                   href="https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/DocTools">DocTools</a>
</footer>


</body>
</html>