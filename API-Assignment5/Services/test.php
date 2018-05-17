<?php



$load= file_get_contents('../Data/database.json');
$load = json_decode($load);

$say = "FUCK SAKE NEWN BAIH";

$load = $say;

$new = json_encode($load);
file_put_contents('../Data/database.json', $new);


?>