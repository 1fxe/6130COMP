<?php

// Load our template
$head = file_get_contents("head.html");
// form template
$form = file_get_contents("form.html");
$foot = file_get_contents("foot.html");

echo $head . $form . $foot;
?>