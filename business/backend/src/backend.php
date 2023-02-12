<?php

// Matches 10 digit hex code
$CODE_REGEX = "/^[a-f0-9]{10}$/";


// Sanatize the data remove spaces, slashes and special characters
function sanatize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form has been submitted and if so, get the code and playername
if (isset($_POST['submit'])) {
    $code = strtolower(sanatize($_POST['code']));
    $playerName = sanatize($_POST['playerName']);

    // Check if the code is valid
    if (!preg_match($CODE_REGEX, $code, )) {
        echo "Invalid code";
        exit();
    }

    // Check if the player name is valid
    $nameLength = strlen($playerName);
    if ($nameLength < 3 || $nameLength > 35) {
        echo "Invalid player name";
        exit();
    }

    echo "VOUCHER";
}

?>