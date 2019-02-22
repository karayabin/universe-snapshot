<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocTools - Parser Report</title>
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


        h1,h2,h3,h4,h5,h6{
            /*font-family: 'Montserrat Alternates', sans-serif;*/
            font-family: 'Lato', sans-serif;
        }

        header {
            background: #1a88bc;
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
            width: 12em;
            order: -1;
            background: #1d3a6c;
            color: white;
            padding-left: 10px;
            display: flex;
            flex-direction: column;
            line-height: 1.8em;
        }

        nav a {
            color: white;
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

        footer {
            background: #35604e;
            color: white;
            padding: 9px;
            font-size: 0.8rem;
            text-align: right;
            height: 3vh;
        }

        footer a {
            color: white;
        }
    </style>

</head>

<body>

<header>
    <h1>DocTools - Parser Report</h1>
</header>


<?php

$ids = [
    'salade',
    'tomate',
    'oignon',
    'choucroute',
    'picon',
    'laitue',
    'haricot',
];

?>
<main class="wrapper">
    <section class="content">
        <h2>Flexbox c'est la vie, Hopla!</h2>


        <?php foreach ($ids as $id): ?>
            <h4 id="<?php echo $id; ?>"><?php echo $id; ?></h4>
            <p>
                <?php for ($i = 1; $i <= 30; $i++): ?>
                    The Modern Language Association (MLA) provides explicit, specific recommendations for the margins and spacing of academic papers. (See: Document Format.) But their advice on font selection is less precise: “Always choose an easily readable typeface (e.g. Times New Roman) in which the regular style contrasts clearly with the italic, and set it to a standard size (e.g. 12 point)” (MLA Handbook, 7th ed., §4.2).
                <br>

                    So which fonts are “easily readable” and have “clearly” contrasting italics? And what exactly is a “standard” size?
                <br>

                    For academic papers, an “easily readable typeface” means a serif font, and a “standard” type size is between 10 and 12 point.
                <br>
                <?php endfor; ?>
            </p>
        <?php endforeach; ?>
    </section>

    <nav id="navigation">
        <h3>Inline functions</h3>
        <a href="#salade">Salade</a>
        <a href="#tomate">Tomate</a>
        <a href="#oignon">Oignon</a>
        <a href="#choucroute">Choucroute</a>
        <a href="#picon">Picon bière</a>
        <h3>Block functions</h3>
        <a href="#laitue">Laitue</a>
        <a href="#haricot">Haricot</a>
    </nav>
</main>

<footer><a target="_blank" href="https://github.com/karayabin/universe-snapshot">Universe</a> > <a target="_blank"
                                                                                                   href="https://github.com/karayabin/universe-snapshot/tree/master/universe/DocTools">DocTools</a>
</footer>


</body>
</html>