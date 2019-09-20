<?php


require_once "/myphp/universe/bigbang.php"; // change this to your bigbang.php location


function success_message(string $postTokenValue = null)
{
    echo "<h1 style='color: green'>THE FORM WAS POSTED SUCCESSFULLY!</h1>";
    if (null !== $postTokenValue) {
        echo '<h4 style="color: green;">With token value: ' . $postTokenValue . '</h4>';
    }
}

function success_message_service(string $serviceId, string $postTokenValue = null)
{
    echo "<h1 style='color: green'>ACCESS TO SERVICE " . strtoupper($serviceId) . " GRANTED!</h1>";
    if (null !== $postTokenValue) {
        echo '<h4 style="color: green;">With token value: ' . $postTokenValue . '</h4>';
    }
}

function error_message(string $msg)
{
    echo "<h1 style='color: red'>" . $msg . " </h1>";
}


function back_to_summary()
{
    echo '<br><a href="../summary.php">Back to summary</a>';
}


function iframe(string $name = null)
{
    if (null === $name) {
        $name = "my_iframe";
    }

    echo '<iframe style="display: block; width: 100%; height: 400px;"  src="" name="' . htmlspecialchars($name) . '"></iframe>';
}