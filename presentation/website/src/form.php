<?php

// Send the data from the HTML form to our backend, the load balancer is running on port 3000
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://http://172.17.0.1:3000/backend.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
$response = curl_exec($ch);
curl_close($ch);

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