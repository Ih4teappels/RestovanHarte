<?php
$codes = $mysqli->query("SELECT code FROM codes WHERE facebook_id = '$user_id'");
$user_count = $codes->num_rows;
$points = $user_count *5;

?>
