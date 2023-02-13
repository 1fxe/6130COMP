<?php

// Send the data from the HTML form to our backend, the load balancer is running on port 3000
$response = file_get_contents("http://172.17.0.1:3000/backend.php?data=" . $_POST);

$body = "";

// The response returns "VOUCHER" is the user has won a voucher
if ($response == "VOUCHER") {
    $body = <<<HTML
<h1>Congratulations you won a free football voucher! It will be emailed to you.</h1>
HTML;
} else if ($response === "DISCOUNT") {
    $body = <<<HTML
<h1>Congratulations you won a 10% off discount code! It will be emailed to you.</h1>
HTML;
} else {
    $body = <<<HTML
<h1>Something went wrong processing the form $response<h1>
HTML;
}

// Load our template
$head = file_get_contents("head.html");
$foot = file_get_contents("foot.html");

echo $head . $body . $foot;
?>